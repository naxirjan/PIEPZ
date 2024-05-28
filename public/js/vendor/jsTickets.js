// Document Load - Start
$(document).ready(function () {

  /*  = = = = = VENDOR TICKETS - START = = = = = */

  /*Initiaze BootGrid - Start*/
  var sVendorTicketsGridId, sVendorTicketsGridSelector, objVendorTicketsParams, iVendorTicketsSelectedRows;
  sVendorTicketsGridId = "gridVendorTickets";
  sVendorTicketsGridSelector = "#" + sVendorTicketsGridId;
  objVendorTicketsParams = {sGridId: sVendorTicketsGridId, sModuleName: 'tickets', bSelection: false, bMultiSelect: false};
  var objGridVendorTickets = showBootGrid(objVendorTicketsParams);
  /*Initiaze BootGrid - End*/

  /* = = = = = VENDOR TICKETS - END = = = = = */

});
// Document Load - End

