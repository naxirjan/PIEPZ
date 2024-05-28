// Document Load - Start
$(document).ready(function () {

  /*  = = = = = ALL PRODUCTS - START = = = = = */

  /*Initiaze BootGrid - Start*/
  var sProductsGridId, sProductsGridSelector, objProductsParams, iProductsSelectedRows;
  sProductsGridId = "gridProducts";
  sProductsGridSelector = "#" + sProductsGridId;
  objProductsParams = {sGridId: sProductsGridId, sModuleName: 'products'};
  var objGridProducts = showBootGrid(objProductsParams);
  /*Initiaze BootGrid - End*/

  // GRID ONLOAD EVENT - Start
  objGridProducts.on("loaded.rs.jquery.bootgrid", function (e) {

    /*Select/Unselect All Rows - Start*/
    objGridProducts.on("change", "input.select-box", function () {
      if ($(sProductsGridSelector + " .select-box:checked").length > 0) {
        $("#divActionsProducts #btnBulkEdit").removeClass("btn-label-grey disabled").addClass("btn-label-primary");
      } else {
        $("#divActionsProducts #btnBulkEdit").removeClass("btn-label-primary").addClass("btn-label-grey disabled");
      }
    });
    /*Select/Unselect All Rows - End*/

    /*Get All Selected Rows Ids - Start*/
    $(document).on("click", "#divActionsProducts #btnBulkEdit", function () {
      if ($(this).hasClass("disabled")) return false;
      iProductsSelectedRows = $(sProductsGridSelector).bootgrid("getSelectedRows");
      window.location = '/admin/bulk-edit-products/' + btoa(iProductsSelectedRows);
    });
    /*Get All Selected Rows Ids - End*/

  }); // GRID ONLOAD EVENT - End

  /* = = = = = ALL PRODUCTS - END = = = = = */

});
// Document Load - End

