// Document Load - Start
$(document).ready(function (){
  var aData = [];

  /*INITIALIZE GRID - Start*/
  let sGridId = "gridUsersBulkEdit";
  let sGridSelector = "#" + sGridId;
  let iTotal = $(sGridSelector).data('total');
  let objParams = {
    bSelection: false,
    sGridId: sGridId,
    sModuleName: 'users',
    sSearchBar: "",
    sInfos: "",
    aRowsCount: [-1],
    sAll: "Editing "+((iTotal == undefined || iTotal == 'undefined' || iTotal == "" || iTotal == null) ? "" : iTotal)+" users",
  };
  var objBootGrid = showBootGrid(objParams);
  /*INITIALIZE GRID - End*/


  // GRID ONLOAD EVENT - Start
  objBootGrid.on("loaded.rs.jquery.bootgrid", function (e) {
    aData = [];

    // Get name value if updated.
    objBootGrid.on("change", "select.role", function () {
      e.stopPropagation();
      getUpdatedData($(this), aData);
    });

    // Get first name value if updated
    objBootGrid.on("change", "input.first_name", function () {
      e.stopPropagation();
      getUpdatedData($(this), aData);
    });

    // Get last name value if updated
    objBootGrid.on("change", "input.last_name", function () {
      e.stopPropagation();
      getUpdatedData($(this), aData);
    });

    // Get country value if updated
    objBootGrid.on("change", "input.country", function () {
      e.stopPropagation();
      getUpdatedData($(this), aData);
    });

    // Get status value if updated.
    objBootGrid.on("change", "select.status", function () {
      e.stopPropagation();
      getUpdatedData($(this), aData);
    });

  });
  // GRID ONLOAD EVENT - End

  // ONCLICK EVENT SAVE BUTTON - Start
  $(document).on("click", "#btnSave", function () {
    var params = $.param({"users":aData});
    if(aData.length > 0) {
      //Ajax Call
      callAJAXRequest("/admin/users-bulk-edit-operations", params);
    }
  });
  // ONCLICK EVENT SAVE BUTTON - End

}); // Document Load - End

// GET UPDATED VALUES OF All EDITABLE FIELDS IF THEY WERE UPDATED - Start
function getUpdatedData($this, aData) {

  // #Note: If new more columns are added in Grid then, also do code for them in this "getUpdatedData()" function to get updated data.

  let iRowId = +$this.attr("id").split("")[0];
  let sRole = $("#"+iRowId+"-role").val();
  let sFirstName = $("#"+iRowId+"-first_name").val();
  let sLastName = $("#"+iRowId+"-last_name").val();
  let sCountry = $("#"+iRowId+"-country").val();
  let iStatus = $("#"+iRowId+"-status").val();

  let iColumnsLength = $("table#gridUsersBulkEdit thead tr th").length;

  if (iRowId != null) {

    let aFieldsData = {id:btoa(iRowId)};
    // Check if column is not hidden
    for (let i= 0; i < iColumnsLength; i++){
      let sTHSelector = $("table#gridUsersBulkEdit thead tr").children('th')[i];
      let sColumnName = $(sTHSelector).data('column-id');

      if(sColumnName == "role") aFieldsData.role = sRole;
      else if(sColumnName == "first_name") aFieldsData.first_name = sFirstName;
      else if(sColumnName == "last_name") aFieldsData.last_name = sLastName;
      else if(sColumnName == "country") aFieldsData.country = sCountry;
      else if(sColumnName == "status") aFieldsData.status = iStatus;
    }

    if(aData.length <= 0){
      aData.push(aFieldsData);
    }
    else{
      aData.filter(function( objData, key ) {
        if(objData.id == btoa(iRowId)){
          aData[key] = aFieldsData
        }
        else{
          aData.push(aFieldsData);
        }
      });
    }
    console.log(aData);
  }
}
// GET UPDATED VALUES OF All EDITABLE FIELDS IF THEY WERE UPDATED - End.
