// Document Load - Start
$(document).ready(function () {

  /*  = = = = = ALL ORDER - START = = = = = */

  /*Initiaze BootGrid - Start*/
  var sOrdersGridId, sOrdersGridSelector, objOrdersParams, iOrdersSelectedRows;
  sOrdersGridId = "gridOrders";
  sOrdersGridSelector = "#" + sOrdersGridId;
  objOrdersParams = {sGridId: sOrdersGridId, sModuleName: 'orders', bSelection: false, bMultiSelect: false};
  var objGridOrders = showBootGrid(objOrdersParams);
  /*Initiaze BootGrid - End*/

  // GRID ONLOAD EVENT - Start
  objGridOrders.on("loaded.rs.jquery.bootgrid", function (e) {

    /*Select/Unselect All Rows - Start*/
    objGridOrders.on("change", "input.select-box", function () {
      if ($(sOrdersGridSelector + " .select-box:checked").length > 0) {
        $("#divActionsOrders #btnBulkEdit").removeClass("btn-label-grey disabled").addClass("btn-label-primary");
      } else {
        $("#divActionsOrders #btnBulkEdit").removeClass("btn-label-primary").addClass("btn-label-grey disabled");
      }
    });
    /*Select/Unselect All Rows - End*/

    /*Get All Selected Rows Ids - Start*/
    $(document).on("click", "#divActionsOrders #btnBulkEdit", function () {
      if ($(this).hasClass("disabled")) return false;
      iOrdersSelectedRows = $(sOrdersGridSelector).bootgrid("getSelectedRows");
      window.location = '/vendor/bulk-edit-orders/' + btoa(iOrdersSelectedRows);
    });
    /*Get All Selected Rows Ids - End*/

  }); // GRID ONLOAD EVENT - End

  /* = = = = = ALL ORDER - END = = = = = */


});
// Document Load - End

