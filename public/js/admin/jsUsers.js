// Document Load - Start
$(document).ready(function () {

  /*  = = = = = ALL USERS - START = = = = = */

  /*Initiaze BootGrid - Start*/
  var sUsersGridId, sUsersGridSelector, objUsersParams, iUsersSelectedRows;
  sUsersGridId = "gridUsers";
  sUsersGridSelector = "#" + sUsersGridId;
  objUsersParams = {sGridId: sUsersGridId, sModuleName: 'users'};
  var objGridUsers = showBootGrid(objUsersParams);
  /*Initiaze BootGrid - End*/

  // GRID ONLOAD EVENT - Start
  objGridUsers.on("loaded.rs.jquery.bootgrid", function (e) {

    /*Select/Unselect All Rows - Start*/
    objGridUsers.on("change", "input.select-box", function () {
      if ($(sUsersGridSelector + " .select-box:checked").length > 0) {
        $("#divActionsUsers #btnBulkEdit").removeClass("btn-label-grey disabled").addClass("btn-label-primary");
      } else {
        $("#divActionsUsers #btnBulkEdit").removeClass("btn-label-primary").addClass("btn-label-grey disabled");
      }
    });
    /*Select/Unselect All Rows - End*/

    /*Get All Selected Rows Ids - Start*/
    $(document).on("click", "#divActionsUsers #btnBulkEdit", function () {
      if ($(this).hasClass("disabled")) return false;
      iUsersSelectedRows = $(sUsersGridSelector).bootgrid("getSelectedRows");
      window.location = '/admin/users/bulk-edit/' + btoa(iUsersSelectedRows);
    });
    /*Get All Selected Rows Ids - End*/

  }); // GRID ONLOAD EVENT - End

  /* = = = = = ALL USERS - END = = = = = */


});
// Document Load - End

