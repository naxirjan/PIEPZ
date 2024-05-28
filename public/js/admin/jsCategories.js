// Document Load - Start
$(document).ready(function () {

  /*  = = = = = CATEGORIES - START = = = = = */

  /*Initiaze BootGrid - Start*/
  var sCategoryGridId, sCategoryGridSelector, objCategoryParams, iCategorySelectedRows;
  sCategoryGridId = "gridCategories";
  sCategoryGridSelector = "#" + sCategoryGridId;
  objCategoryParams = {sGridId: sCategoryGridId, sModuleName: 'categories', bSelection: false, bMultiSelect: false};
  var objGridCategory = showBootGrid(objCategoryParams);
  /*Initiaze BootGrid - End*/

  // GRID ONLOAD EVENT - Start
  objGridCategory.on("loaded.rs.jquery.bootgrid", function (e) {

    /*Select/Unselect All Rows - Start*/
    objGridCategory.on("change", "input.select-box", function () {
      if ($(sCategoryGridSelector + " .select-box:checked").length > 0) {
        $("#divActionsCategories #btnBulkEdit").removeClass("btn-label-grey disabled").addClass("btn-label-primary");
      } else {
        $("#divActionsCategories #btnBulkEdit").removeClass("btn-label-primary").addClass("btn-label-grey disabled");
      }
    });
    /*Select/Unselect All Rows - End*/

    /*Get All Selected Rows Ids - Start*/
    $(document).on("click", "#divActionsCategories #btnBulkEdit", function () {
      if ($(this).hasClass("disabled")) return false;
      iCategorySelectedRows = $(sCategoryGridSelector).bootgrid("getSelectedRows");
      window.location = 'bulk-edit-orders/' + btoa(iCategorySelectedRows);
    });
    /*Get All Selected Rows Ids - End*/

  }); // GRID ONLOAD EVENT - End

  /* = = = = = CATEGORIES - END = = = = = */

    /*Select All Rows Data - Start*/
    $(document).on("change", ".category-action-type", function () {
      let $this = $(this);
      if($this.val() == "category"){
        $("#CategoryForm").show();
        $("#SubCategoryForm").hide();
      }
      else if ($this.val() == "subcategory"){
        $("#CategoryForm").hide();
        $("#SubCategoryForm").show();
      }

    });
    /*Select All Rows Data - End*/

});
// Document Load - End

