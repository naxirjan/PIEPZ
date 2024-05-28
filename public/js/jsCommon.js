
// Define Common Functions Here

function callAJAXRequest(sURL = "", objData = {}, sMethod= 'POST'){

  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: objData,
    url: sURL,
    type: sMethod,
    success: function success(objResponse) {
      if(objResponse.bReturn == true){
        showToaster({}, "success", objResponse.sMessage);
      }
      else if(objResponse.bReturn == false){
        showToaster({}, "warning", objResponse.sMessage);
      }
    },
    error: function error(err) {
      return err;
    }
  });
}


function showAutoClosingSweetAlert(objParams){

  // Setting default values for properties
  let iWidth = 300;
  let iTimer = 2000;
  let bShowCancelButton = false;
  let bShowReverseButtons = false;
  let bShowConfirmButton = false;
  let sIcon = "success";
  let sTitle = "SUCCESS";
  let sText = "Records updated successfully !...";

  // Check if any property assigned new value from function calling
  if(objParams.hasOwnProperty('sIcon')) sIcon = objParams.sIcon;
  if(objParams.hasOwnProperty('sTitle')) sTitle = objParams.sTitle;
  if(objParams.hasOwnProperty('sText')) sText = objParams.sText;
  if(objParams.hasOwnProperty('iTimer')) iTimer = objParams.iTimer;
  if(objParams.hasOwnProperty('bShowCancelButton')) bShowCancelButton = objParams.bShowCancelButton;
  if(objParams.hasOwnProperty('bShowReverseButtons')) bShowReverseButtons = objParams.bShowReverseButtons;
  if(objParams.hasOwnProperty('bShowConfirmButton')) bShowConfirmButton = objParams.bShowConfirmButton;
  if(objParams.hasOwnProperty('iWidth')) iWidth = objParams.iWidth;

  Swal.fire({
    width: iWidth,
    backdrop: false,
    icon: sIcon,
    title: sTitle,
    text: sText,
    timer: iTimer,
    showCancelButton: bShowCancelButton,
    reverseButtons: bShowReverseButtons,
    showConfirmButton: bShowConfirmButton,
  });
}


function showToaster(objOptions, sType, sMessage){

  // Setting default values for properties
  let bCloseButton = true;
  let bNewestOnTop = true;
  let bProgressBar = true;
  let bPreventDuplicates = false;
  let iShowDuration = 500;
  let iHideDuration = 1000;
  let iTimeOut = 5000;
  let iExtendedTimeOut = 5000;
  let sShowEasing = "swing";
  let sHideEasing = "linear";
  let sShowMethod = "fadeIn";
  let sHideMethod = "fadeOut";
  let sPositionClass = "toast-bottom-left";

  // Check if any property assigned new value from function calling
  if(objOptions.hasOwnProperty('bCloseButton')) bCloseButton = objOptions.bCloseButton;
  if(objOptions.hasOwnProperty('bNewestOnTop')) bNewestOnTop = objOptions.bNewestOnTop;
  if(objOptions.hasOwnProperty('bProgressBar')) bProgressBar = objOptions.bProgressBar;
  if(objOptions.hasOwnProperty('bPreventDuplicates')) bPreventDuplicates = objOptions.bPreventDuplicates;
  if(objOptions.hasOwnProperty('iShowDuration')) iShowDuration = objOptions.iShowDuration;
  if(objOptions.hasOwnProperty('iHideDuration')) iHideDuration = objOptions.iHideDuration;
  if(objOptions.hasOwnProperty('iTimeOut')) iTimeOut = objOptions.iTimeOut;
  if(objOptions.hasOwnProperty('iExtendedTimeOut')) iExtendedTimeOut = objOptions.iExtendedTimeOut;
  if(objOptions.hasOwnProperty('sShowEasing')) sShowEasing = objOptions.sShowEasing;
  if(objOptions.hasOwnProperty('sHideEasing')) sHideEasing = objOptions.sHideEasing;
  if(objOptions.hasOwnProperty('sShowMethod')) sShowMethod = objOptions.sShowMethod;
  if(objOptions.hasOwnProperty('sHideMethod')) sHideMethod = objOptions.sHideMethod;
  if(objOptions.hasOwnProperty('sPositionClass')) sPositionClass = objOptions.sPositionClass;

  toastr.options = {
    "closeButton": bCloseButton,
    "newestOnTop": bNewestOnTop,
    "progressBar": bProgressBar,
    "positionClass": sPositionClass,
    "preventDuplicates": bPreventDuplicates,
    "onclick": null,
    "showDuration": iShowDuration,
    "hideDuration": iHideDuration,
    "timeOut": iTimeOut,
    "extendedTimeOut": iExtendedTimeOut,
    "showEasing": sShowEasing,
    "hideEasing": sHideEasing,
    "showMethod": sShowMethod,
    "hideMethod": sHideMethod
  };

  switch (sType){
    case "success":toastr.success(sMessage);break;
    case "warning":toastr.warning(sMessage);break;
  }
}
