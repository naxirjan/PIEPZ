function showBootGrid(objParams){

  // Setting default values for properties

  let sGridId = "jqBootGrid";
  let sModuleName = "";
  let sAll = "";
  let aRowsCount = [100, 200, 500, 1000, -1];
  let bSelection = true;
  let bMultiSelect = true;
  let bRowSelect = true;
  let bKeepSelection = true;
  let sSearchBar = "<div class=\"{{css.search}}\"><div class=\"input-group\"><span class=\"{{css.icon}} input-group-addon {{css.iconSearch}}\"></span> <input type=\"text\" class=\"{{css.searchField}}\" placeholder=\"{{lbl.search}}\" /></div></div>";
  let sInfos= "<div class=\"{{css.infos}}\">{{lbl.infos}}</div>";
  let objFormaters = { "link": function(column, rw){return "<a href=\"#\">" + column.id + ": " + row.id + "</a>";}};

  // Check if any property assigned new value from function calling
  if(objParams.hasOwnProperty('sGridId')) sGridId = objParams.sGridId;
  if(objParams.hasOwnProperty('aRowsCount')) aRowsCount = objParams.aRowsCount;
  if(objParams.hasOwnProperty('bSelection')) bSelection = objParams.bSelection;
  if(objParams.hasOwnProperty('bMultiSelect')) bMultiSelect = objParams.bMultiSelect;
  if(objParams.hasOwnProperty('bRowSelect')) bRowSelect = objParams.bRowSelect;
  if(objParams.hasOwnProperty('bKeepSelection')) bKeepSelection = objParams.bKeepSelection;
  if(objParams.hasOwnProperty('sModuleName')) sModuleName = objParams.sModuleName;
  if(objParams.hasOwnProperty('sSearchBar')) sSearchBar = objParams.sSearchBar;
  if(objParams.hasOwnProperty('sInfos')) sInfos = objParams.sInfos;
  if(objParams.hasOwnProperty('sAll')) sAll = objParams.sAll;
  if(objParams.hasOwnProperty('objFormaters')) objFormaters = objParams.objFormaters;


  /*Initializing Grid - Start*/
  var objBootGrid = $("#"+sGridId).bootgrid({
    rowCount: aRowsCount,
    selection: bSelection,
    multiSelect: bMultiSelect,
    rowSelect:bRowSelect,
    keepSelection:bKeepSelection,
    sorting:true,
    caseSensitive:false,
    //columnSelection:true,
    //highlightRows:true,
    columnHeaderAnchor:"bg-info",
    searchSettings: {
      delay: 500,
      characters: 3
    },
    formatters: objFormaters,
    css:{},
    templates: {
      actionDropDown: "<div class=\"{{css.dropDownMenu}}\"><button class=\"btn bg-primary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\"><span class=\"{{css.dropDownMenuText}}\">{{ctx.content}}</span> </button><ul class=\"{{css.dropDownMenuItems}}\" role=\"menu\"></ul></div>",
      actionDropDownItem: "<li><a data-action=\"{{ctx.action}}\" class=\"{{css.dropDownItem}} {{css.dropDownItemButton}}\">{{ctx.text}}</a></li>",
      actionDropDownCheckboxItem: "<li><label class=\"{{css.dropDownItem}}\"><input name=\"{{ctx.name}}\" type=\"checkbox\" value=\"1\" class=\"{{css.dropDownItemCheckbox}}\" {{ctx.checked}} /> {{ctx.label}}</label></li>",
      actions: "<div class=\"{{css.actions}}\"></div>",
      header: "<div id=\"{{ctx.id}} bg-primary\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-sm-12 actionBar\"><p class=\"{{css.search}}\"></p><p class=\"{{css.actions}}\"></p></div></div></div>",
      infos:sInfos,
      search: sSearchBar,
      headerCell: "<th data-column-id=\"{{ctx.column.id}}\" class=\"{{ctx.css}} bg-primary\" style=\"{{ctx.style}}\"><a href=\"javascript:void(0);\" class=\"{{css.columnHeaderAnchor}} {{ctx.sortable}}\"><span class=\"{{css.columnHeaderText}}\">{{ctx.column.text}}</span>{{ctx.icon}}</a></th>",
      rawHeaderCell: "<th class=\"{{ctx.css}} bg-primary\">{{ctx.content}}</th>", // Used for the multi select box
    },
    labels: {
      all:(sAll != "" ? sAll: "All "+sModuleName),
      infos:"Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} "+sModuleName,
      loading:"Loading "+sModuleName+" !...",
      noResults:"No "+sModuleName+" records were found !...",
      refresh:"Refresh",
      search:"Search "+sModuleName+" !..."
    },

  });
  /*Initializing Grid - End*/

  return objBootGrid;

} // ended main function


function getAllSelectedRowsLength(sSelector)
{
  $(document).on("change", sSelector,function (){

    let iTotalLength = $(sSelector + ":checked").length;
    return iTotalLength;
  });
}

function getAllSelectedRowsData(sGridSelector, sOnClickSelector)
{
  $(document).on("click", "#"+sOnClickSelector,function ()
  {
    return $("#"+sGridSelector).bootgrid("getSelectedRows");
  });
}
