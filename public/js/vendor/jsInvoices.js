// Document Load - Start
$(document).ready(function () {

  /*  = = = = = ALL INVOICES - START = = = = = */

  /*Initiaze BootGrid - Start*/
  var sAllInvoicesGridId, sAllInvoicesGridSelector, objAllInvoicesParams, iAllInvoicesSelectedRows;
  sAllInvoicesGridId = "gridInvoices";
  sAllInvoicesGridSelector = "#" + sAllInvoicesGridId;
  objAllInvoicesParams = {sGridId: sAllInvoicesGridId, sModuleName: 'invoices', bSelection: false, bMultiSelect: false};
  var objGridAllInvoices = showBootGrid(objAllInvoicesParams);
  /*Initiaze BootGrid - End*/

  /* = = = = = ALL INVOICES - END = = = = = */

});
// Document Load - End

