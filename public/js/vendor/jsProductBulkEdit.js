// Document Load - Start
$(document).ready(function (){
  var aData = [];

  /*INITIALIZE GRID - Start*/
  let sGridId = "gridBulkEditProducts";
  let sGridSelector = "#" + sGridId;
  let objParams = {
    bSelection: false,
    sGridId: sGridId,
    sModuleName: 'products',
    sSearchBar: "",
    sInfos: "",
    aRowsCount: [-1],
    sAll: "Editing "+$(sGridSelector).data('total')+" products",
    objFormaters: {
      // example if you want to replace fileds with JS
      "prices": function (column, row) { return "<input id=\"" + row.id + "-price\" type=\"number\" class=\"price form-control\" value=\"" + row.price + "\" />";},
    }
  };
  var objBootGrid = showBootGrid(objParams);
  /*INITIALIZE GRID - End*/


  // GRID ONLOAD EVENT - Start
  objBootGrid.on("loaded.rs.jquery.bootgrid", function (e) {
    aData = [];

    // Get status value if updated.
    objBootGrid.on("change", "select.status", function () {
      e.stopPropagation();
      getUpdatedData($(this), aData);
    });

    // Get type value if updated
    objBootGrid.on("change", "select.type", function () {
      e.stopPropagation();
      getUpdatedData($(this), aData);
    });

    // Get price value if updated
    objBootGrid.on("change", "input.price", function () {
      e.stopPropagation();
      getUpdatedData($(this), aData);
    });

    // Get stock value if updated
    objBootGrid.on("change", "input.stock", function () {
      e.stopPropagation();
      getUpdatedData($(this), aData);
    });

    // Get categories value if updated onSelect()
    objBootGrid.on("select2:select", "select.categories", function (e) {
      e.preventDefault();
      getUpdatedData($(this), aData);
    });

    // Get categories value if updated onUnSelect()
    objBootGrid.on("select2:unselect", "select.categories", function (e) {
      e.preventDefault();
      getUpdatedData($(this), aData);
    });

  });
  // GRID ONLOAD EVENT - End

  // ONCLICK EVENT SAVE BUTTON - Start
  $(document).on("click", "#btnSave", function () {
    var params = $.param({"products":aData});
    if(aData.length > 0) {
      //Ajax Call
      callAJAXRequest("/vendor/bulk-edit-products-operations", params);
    }
  });
  // ONCLICK EVENT SAVE BUTTON - End

}); // Document Load - End

// GET UPDATED VALUES OF All EDITABLE FIELDS IF THEY WERE UPDATED - Start
function getUpdatedData($this, aData, sTableSelector) {

  // #Note: If new more columns are added in Grid then, also do code for them in this "getUpdatedData()" function to get updated data.

  let iRowId = +$this.attr("id").split("-")[0];
  let sSku = $this.attr("id").split("-")[2];
  let iStatus = $("#"+iRowId+"-status-"+sSku).val();
  let iType = $("#"+iRowId+"-type-"+sSku).val();
  let iPrice = $("#"+iRowId+"-price-"+sSku).val();
  let iStock = $("#"+iRowId+"-stock-"+sSku).val();
  let sCategories = $("#"+iRowId+"-categories-"+sSku).val();


  let iColumnsLength = $("table#gridBulkEditProducts thead tr th").length;

  if (iRowId != null) {

    let aFieldsData = {id:btoa(iRowId), sku: btoa(sSku)};
    // Check if column is not hidden
    for (let i= 0; i < iColumnsLength; i++){
      let sTHSelector = $("table#gridBulkEditProducts thead tr").children('th')[i];
      let sColumnName = $(sTHSelector).data('column-id');

      if(sColumnName == "status") aFieldsData.status = iStatus;
      else if(sColumnName == "type") aFieldsData.type = iType;
      else if(sColumnName == "price") aFieldsData.price = iPrice;
      else if(sColumnName == "stock") aFieldsData.stock = iStock;
      else if(sColumnName == "categories") aFieldsData.categories = sCategories;
    }

    if(aData.length <= 0){
      //aData.push({id:btoa(iRowId), sku: btoa(sSku), status:iStatus, type:iType, price:iPrice, stock:iStock, categories :sCategories});
      aData.push(aFieldsData);
    }
    else{
      aData.filter(function( objData, key ) {
        if(objData.id == btoa(iRowId)){
          //aData[key] = {id:btoa(iRowId), sku: btoa(sSku), status:iStatus, type:iType, price:iPrice, stock:iStock, categories :sCategories}
          aData[key] = aFieldsData
        }
        else{
          //aData.push({id:btoa(iRowId), sku: btoa(sSku), status:iStatus, type:iType, price:iPrice, stock:iStock, categories :sCategories});
          aData.push(aFieldsData);
        }
      });
    }
    console.log(aData);
  }
}
// GET UPDATED VALUES OF All EDITABLE FIELDS IF THEY WERE UPDATED - End.
