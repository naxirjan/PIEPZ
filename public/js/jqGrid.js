// visit: http://www.guriddo.net/demo/guriddojs/ for jqGrid details
function showJQGrid(csrfHeader, GridColumns, URL, Caption = "Records", EditURL = "", bShrinkToFit = false, bEditBulkRecords = true, bSaveBulkRecords = true, bAddRecord = true, bEditRecord= false, bDeleteRecord = true, bSearchRecord = false,  RowsNumber = 25, Width = 950, Height= 300, GridId = "jqGrid", GridPagerId = "jqGridPager")
{
  // Adding CSRF Token in Ajax
  $.ajaxSetup({headers : {'X-CSRF-Token' : csrfHeader}});

  /*Initializing Grid - Start*/
  $("#"+GridId).jqGrid({
    url:URL, // url/route which returns json data
    editurl:EditURL, // url where opertions(add, update, delete, search) show be performed
    colModel: GridColumns,
    width: Width,
    height: Height,
    rowNum: RowsNumber, // Number Of Records Per Page
    pager: "#"+GridPagerId,
    caption: "&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;" + Caption, // Grid Title Text
    datatype: "json",
    multiSort: true,
    viewrecords: true,
    rowList : [25,50,100], // records per page listbox
    rownumbers: true, // Show Serial Number column
    rownumWidth: 25, // Set Serial Number column width,
    shrinkToFit : bShrinkToFit, // Set Resizable Columns
    menubar : true, // Show Menu Bar At Top-Left Of Grid
    colMenu : false, // Show Menu In Column (Sorting, Hide/Show Column)
  });
  /*Initializing Grid - End*/


  /*Grid Navigation Bar Tool Setting - Start*/
  $('#'+GridId).navGrid('#'+GridPagerId, { add: bAddRecord,  edit: bEditRecord, del: bDeleteRecord, search: bSearchRecord, refresh: true, view: true, position: "left", cloneToTop: false },   // the buttons to appear on the toolbar of the grid
    // options for the Edit Dialog
    {
      editCaption: "Edit "+Caption,
      recreateForm: true,
      reloadAfterSubmit:true,
      checkUpdate:true,
      closeAfterEdit: true,
      beforeSubmit : function( postdata, form , oper) {
        if( confirm('Do you want to save the changes?') ) {
          return [true,'Changes were saved !...'];
        } else {
          return [false, 'Changes were not saved !...'];
        }
      },
      afterSubmit : function( response) {

        let result = JSON.parse(response.responseText);

        if(response.status == 200 && response.readyState == 4 && response.statusText == "OK")
        {
          if(result.return == true) return [true, ''];
          else return [false,result.error];
        }
        else return [false,'Something went wrong !...'];
      },
      errorTextFormat: function (data) {
        return 'Error: ' + data.responseText
      },

    },
    // options for the Add Dialog
    {
      recreateForm: true,
      closeAfterAdd: true,
      reloadAfterSubmit:true,
      closeOnEscape:true,
      afterSubmit : function( response) {

        let result = JSON.parse(response.responseText);

        if(response.status == 200 && response.readyState == 4 && response.statusText == "OK")
        {
          if(result.return == true) return [true,''];
          else return [false,result.error];
        }
        else return [false,'Something went wrong !...'];
      },
      errorTextFormat: function (data) {return 'Error: ' + data.responseText},
    },
    // options for the Delete Dailog
    {
      closeAfterDel: true,
      reloadAfterSubmit:true,
      closeOnEscape:true,
      afterSubmit : function( response) {
        if(response.status == 200 && response.readyState == 4 && response.statusText == "OK")
          return [true,''];
        else return [false,'Something went wrong !...'];
      },
      errorTextFormat: function (data) {return 'Error: ' + data.responseText},
    });
  /*Grid Navigation Bar Tool Setting - End*/


  // Edit all rows
  if(bEditBulkRecords === true)
  {
    $('#jqGrid').navButtonAdd('#jqGridPager',
      {
        buttonicon: "ui-icon ui-icon-pencil",
        title: "Edit All " + Caption,
        caption: "Edit All " + Caption,
        position: "last",
        onClickButton: function() {
          editAllRecords();
        }
      }
    );
  }


  // Save all rows data
  if(bSaveBulkRecords === true)
  {
    $('#jqGrid').navButtonAdd('#jqGridPager',
      {
        buttonicon: "ui-icon ui-icon-disk",
        title: "Save All " + Caption,
        caption: "Save All " + Caption,
        position: "last",
        onClickButton: function() {
          saveAllRecords();
        }
      }
    );
  }


  function editAllRecords() {
    var grid = $("#jqGrid");
    var ids = grid.jqGrid('getDataIDs');

    for (var i = 0; i < ids.length; i++) {
      grid.jqGrid('editRow',ids[i]);
    }
  };


  function saveAllRecords() {
    var grid = $("#jqGrid");
    var ids = grid.jqGrid('getDataIDs');

    for (var i = 0; i < ids.length; i++) {
      grid.jqGrid('saveRow', ids[i]);
    }
  }

  /*Action Menu Bar - Start*/
  $("#jqGrid").jqGrid('menubarAdd',  [
    {
      id : 'exportinexcel',
      //cloasoncall : true,
      title : 'Export in Excel',
      click : function ( event) {
        $("#jqGrid").jqGrid("exportToExcel",{
          includeLabels : true,
          includeGroupHeader : true,
          includeFooter: true,
          fileName : "jqGridExport.xlsx",
          maxlength : 100 // maxlength for visible string data
        });
      }
    },
    {
      divider : true,
    },
    {
      id : 'exportinpdf',
      //cloasoncall : true,
      title : 'Export in PDF',
      click : function ( event) {
        $("#jqGrid").jqGrid("exportToPdf",{
          title: 'jqGrid Export to PDF',
          orientation: 'portrait',
          pageSize: 'A4',
          description: 'description of the exported document',
          customSettings: null,
          download: 'download',
          includeLabels : true,
          includeGroupHeader : true,
          includeFooter: true,
          fileName : "jqGridExport.pdf"
        });
      }
    },
    {
      divider : true,
    },
    {
      id : 'exportincsv',
      //cloasoncall : true,
      title : 'Export in CSV',
      click : function ( event) {
        $("#jqGrid").jqGrid("exportToCsv",{
          separator: ",",
          separatorReplace : "", // in order to interpret numbers
          quote : '"',
          escquote : '"',
          newLine : "\r\n", // navigator.userAgent.match(/Windows/) ?	'\r\n' : '\n';
          replaceNewLine : " ",
          includeCaption : false,
          includeLabels : true,
          includeGroupHeader : true,
          includeFooter: true,
          fileName : "jqGridExport.csv",
          returnAsString : false
        });
      }
    },

  ]);
  /*Action Menu Bar - End*/


} // ended main function


function showJQGridNew(objParams){

  let sCSRFToken = objParams.sCSRFToken;
  let aGridColumns = objParams.aGridColumns;
  let sURL = objParams.sURL;
  let sEditURL = objParams.sEditURL;

  let sGridId = "jqGrid";
  let sGridPagerId = "jqGridPager";
  let sCaption = "Records";
  let funGridComplete = function (){};

  let iRowsNumber = 25;
  let iWidth = 950;
  let iHeight= 300;

  let bShrinkToFit = false;
  let bEditBulkRecords = true;
  let bSaveBulkRecords = true;
  let bAddRecord = true;
  let bEditRecord = false;
  let bDeleteRecord = true;
  let bSearchRecord = false;

  if(objParams.hasOwnProperty('sGridId')) sGridId = objParams.sGridId;
  if(objParams.hasOwnProperty('sGridPagerId')) sGridPagerId = objParams.sGridPagerId;
  if(objParams.hasOwnProperty('sCaption')) sCaption = objParams.sCaption;
  if(objParams.hasOwnProperty('funGridComplete')) funGridComplete = objParams.funGridComplete;

  if(objParams.hasOwnProperty('iRowsNumber')) iRowsNumber = objParams.iRowsNumber;
  if(objParams.hasOwnProperty('iWidth')) iWidth = objParams.iWidth;
  if(objParams.hasOwnProperty('iHeight')) iHeight = objParams.iHeight;

  if(objParams.hasOwnProperty('bShrinkToFit')) bShrinkToFit = objParams.bShrinkToFit;
  if(objParams.hasOwnProperty('bEditBulkRecords')) bEditBulkRecords = objParams.bEditBulkRecords;
  if(objParams.hasOwnProperty('bSaveBulkRecords')) bSaveBulkRecords = objParams.bSaveBulkRecords;
  if(objParams.hasOwnProperty('bAddRecord')) bAddRecord = objParams.bAddRecord;
  if(objParams.hasOwnProperty('bEditRecord')) bEditRecord = objParams.bEditRecord;
  if(objParams.hasOwnProperty('bDeleteRecord')) bDeleteRecord = objParams.bDeleteRecord;
  if(objParams.hasOwnProperty('bSearchRecord')) bSearchRecord = objParams.bSearchRecord;


  // Adding CSRF Token in Ajax
  $.ajaxSetup({headers : {'X-CSRF-Token' : sCSRFToken}});

  /*Initializing Grid - Start*/
  $("#"+sGridId).jqGrid({
    url:sURL, // url/route which returns json data
    editurl:sEditURL, // url where opertions(add, update, delete, search) show be performed
    colModel: aGridColumns,
    width: iWidth,
    height: iHeight,
    rowNum: iRowsNumber, // Number Of Records Per Page
    pager: "#"+sGridPagerId,
    gridComplete:initGrid,
    caption: "&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;" + sCaption, // Grid Title Text
    datatype: "json",
    multiSort: true,
    viewrecords: true,
    rowList : [25,50,100], // records per page listbox
    rownumbers: true, // Show Serial Number column
    rownumWidth: 25, // Set Serial Number column width,
    shrinkToFit : bShrinkToFit, // Set Resizable Columns
    menubar : true, // Show Menu Bar At Top-Left Of Grid
    colMenu : false, // Show Menu In Column (Sorting, Hide/Show Column)
  });
  /*Initializing Grid - End*/


  /*Grid Navigation Bar Tool Setting - Start*/
  $('#'+sGridId).navGrid('#'+sGridPagerId, { add: bAddRecord,  edit: bEditRecord, del: bDeleteRecord, search: bSearchRecord, refresh: true, view: true, position: "left", cloneToTop: false },   // the buttons to appear on the toolbar of the grid
    // options for the Edit Dialog
    {
      editCaption: "Edit "+sCaption,
      recreateForm: true,
      reloadAfterSubmit:true,
      checkUpdate:true,
      closeAfterEdit: true,
      beforeSubmit : function( postdata, form , oper) {
        if( confirm('Do you want to save the changes?') ) {
          return [true,'Changes were saved !...'];
        } else {
          return [false, 'Changes were not saved !...'];
        }
      },
      afterSubmit : function( response) {

        let result = JSON.parse(response.responseText);

        if(response.status == 200 && response.readyState == 4 && response.statusText == "OK")
        {
          if(result.return == true) return [true, ''];
          else return [false,result.error];
        }
        else return [false,'Something went wrong !...'];
      },
      errorTextFormat: function (data) {
        return 'Error: ' + data.responseText
      },

    },
    // options for the Add Dialog
    {
      recreateForm: true,
      closeAfterAdd: true,
      reloadAfterSubmit:true,
      closeOnEscape:true,
      afterSubmit : function( response) {

        let result = JSON.parse(response.responseText);

        if(response.status == 200 && response.readyState == 4 && response.statusText == "OK")
        {
          if(result.return == true) return [true,''];
          else return [false,result.error];
        }
        else return [false,'Something went wrong !...'];
      },
      errorTextFormat: function (data) {return 'Error: ' + data.responseText},
    },
    // options for the Delete Dailog
    {
      closeAfterDel: true,
      reloadAfterSubmit:true,
      closeOnEscape:true,
      afterSubmit : function( response) {
        if(response.status == 200 && response.readyState == 4 && response.statusText == "OK")
          return [true,''];
        else return [false,'Something went wrong !...'];
      },
      errorTextFormat: function (data) {return 'Error: ' + data.responseText},
    }
    );
  /*Grid Navigation Bar Tool Setting - End*/


  // Edit all rows
  if(bEditBulkRecords === true)
  {
    $('#'+sGridId).navButtonAdd('#'+sGridPagerId,
      {
        buttonicon: "ui-icon ui-icon-pencil",
        title: "Edit All",
        caption: "Edit All",
        position: "last",
        onClickButton: function() {
          editAllRecords();
        }
      }
    );
  }


  // Save all rows data
  if(bSaveBulkRecords === true)
  {
    $('#'+sGridId).navButtonAdd('#'+sGridPagerId,
      {
        buttonicon: "ui-icon ui-icon-disk",
        title: "Save All",
        caption: "Save All",
        position: "last",
        onClickButton: function() {
          saveAllRecords();
        }
      }
    );
  }


  function editAllRecords() {
    var grid = $("#"+sGridId);
    var ids = grid.jqGrid('getDataIDs');

    for (var i = 0; i < ids.length; i++) {
      grid.jqGrid('editRow',ids[i]);
    }
  };


  function saveAllRecords() {
    var grid = $("#"+sGridId);
    var ids = grid.jqGrid('getDataIDs');

    for (var i = 0; i < ids.length; i++) {
      grid.jqGrid('saveRow', ids[i]);
    }
  }

  /*Action Menu Bar - Start*/
  $("#"+sGridId).jqGrid('menubarAdd',  [
    {
      id : 'exportinexcel',
      //cloasoncall : true,
      title : 'Export in Excel',
      click : function ( event) {
        $("#jqGrid").jqGrid("exportToExcel",{
          includeLabels : true,
          includeGroupHeader : true,
          includeFooter: true,
          fileName : "jqGridExport.xlsx",
          maxlength : 100 // maxlength for visible string data
        });
      }
    },
    {
      divider : true,
    },
    {
      id : 'exportinpdf',
      //cloasoncall : true,
      title : 'Export in PDF',
      click : function ( event) {
        $("#"+sGridId).jqGrid("exportToPdf",{
          title: 'jqGrid Export to PDF',
          orientation: 'portrait',
          pageSize: 'A4',
          description: 'description of the exported document',
          customSettings: null,
          download: 'download',
          includeLabels : true,
          includeGroupHeader : true,
          includeFooter: true,
          fileName : "jqGridExport.pdf"
        });
      }
    },
    {
      divider : true,
    },
    {
      id : 'exportincsv',
      //cloasoncall : true,
      title : 'Export in CSV',
      click : function ( event) {
        $("#"+sGridId).jqGrid("exportToCsv",{
          separator: ",",
          separatorReplace : "", // in order to interpret numbers
          quote : '"',
          escquote : '"',
          newLine : "\r\n", // navigator.userAgent.match(/Windows/) ?	'\r\n' : '\n';
          replaceNewLine : " ",
          includeCaption : false,
          includeLabels : true,
          includeGroupHeader : true,
          includeFooter: true,
          fileName : "jqGridExport.csv",
          returnAsString : false
        });
      }
    },

  ]);
  /*Action Menu Bar - End*/


  function initGrid() {
    $(this).contextMenu('contextMenu', {
      bindings: {
        'edit': function (t) {
          alert("Edit Row Command Selected");
        },
        'add': function (t) {
          alert("Add Row Command Selected");
        },
        'del': function (t) {
          alert("Delete Row Command Selected");
        }
      },
      onContextMenu: function (event, menu) {
        var rowId = $(event.target).parent("tr").attr("id")
        var grid = $("#jqGrid");
        grid.setSelection(rowId);

        return true;
      }
    });
  }

} // ended main function

