/**
 *  Page auth register multi-steps
 */

'use strict';

// free package
function reply_click(clicked_id)
  {

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
       var data = $("#multiStepsForm").serialize();

       $.ajax({
        type:'POST',
        url:"ajaxRequest1",
        data:{data:data},
        success: function(data) {
          if(data.success == true ){

         // Set the options that I want
              
                  toastr.warning("Email Aready Exist");
                      } else {
                        window.location.href = "partner-confirmation?id="+data.id;

                      };

                      },
                    error: function(data){

        },
     });


  }


var total=0;
var tot1=0;
var tot2=0;
// package price


$('input[name=package_duration]').add('.checkbox').on('click', some_function);

function some_function() {
var v = $('input[name="package_duration"]:checked').val();
var strarray = v.split(',');
var s = strarray[1];
  var tempsum=0;
  $('.checkbox').filter(":checked").each(function() {

      //sum of all price values of this into price
      tempsum +=  parseFloat($(this).attr('data-price'))

  });

  $('#price').text("€"+tempsum);
  $("#package_price").text("€"+s);
  total=parseFloat(s)+parseFloat(tempsum)+50;
  $("p.total").text("€"+total);
    $(".amount").val(total);
}



// Select2 (jquery)
$(function () {
  var select2 = $('.select2');

  // select2
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        placeholder: 'Select an country',
        dropdownParent: $this.parent()
      });
    });
  }
});

// Multi Steps Validation
// --------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    const stepsValidation = document.querySelector('#multiStepsValidation');
    if (typeof stepsValidation !== undefined && stepsValidation !== null) {
      // Multi Steps form
      const stepsValidationForm = stepsValidation.querySelector('#multiStepsForm');
      // Form steps
      const stepsValidationFormStep1 = stepsValidationForm.querySelector('#accountDetailsValidation');
      const stepsValidationFormStep2 = stepsValidationForm.querySelector('#package');

      const stepsValidationFormStep3 = stepsValidationForm.querySelector('#personalInfoValidation');
      const stepsValidationFormStep4 = stepsValidationForm.querySelector('#billingLinksValidation');

      // Multi steps next prev button
      const stepsValidationNext = [].slice.call(stepsValidationForm.querySelectorAll('.btn-next'));
      const stepsValidationPrev = [].slice.call(stepsValidationForm.querySelectorAll('.btn-prev'));

      const multiStepsExDate = document.querySelector('.multi-steps-exp-date'),
        multiStepsCvv = document.querySelector('.multi-steps-cvv'),
        multiStepsMobile = document.querySelector('.multi-steps-mobile'),
        multiStepsPincode = document.querySelector('.multi-steps-pincode'),
        multiStepsCard = document.querySelector('.multi-steps-card');

      // Expiry Date Mask
      if (multiStepsExDate) {
        new Cleave(multiStepsExDate, {
          date: true,
          delimiter: '/',
          datePattern: ['m', 'y']
        });
      }

      // CVV
      if (multiStepsCvv) {
        new Cleave(multiStepsCvv, {
          numeral: true,
          numeralPositiveOnly: true
        });
      }

      // Mobile
      if (multiStepsMobile) {
        new Cleave(multiStepsMobile, {
          phone: true,
          phoneRegionCode: 'US'
        });
      }

      // Pincode
      if (multiStepsPincode) {
        new Cleave(multiStepsPincode, {
          delimiter: '',
          numeral: true
        });
      }

      // Credit Card
      if (multiStepsCard) {
        new Cleave(multiStepsCard, {
          creditCard: true,
          onCreditCardTypeChanged: function (type) {
            if (type != '' && type != 'unknown') {
              document.querySelector('.card-type').innerHTML =
                '<img src="' + assetsPath + 'img/icons/payments/' + type + '-cc.png" height="28"/>';
            } else {
              document.querySelector('.card-type').innerHTML = '';
            }
          }
        });
      }

      let validationStepper = new Stepper(stepsValidation, {
        linear: true
      });

      // Account details
      const multiSteps1 = FormValidation.formValidation(stepsValidationFormStep1, {


        fields: {
          companyName: {
            validators: {
              notEmpty: {
                message: 'Please enter company name'
              }
            }
          },
          firstName: {
            validators: {
              notEmpty: {
                message: 'Please enter first name'
              }
            }
          },
          lastName: {
            validators: {
              notEmpty: {
                message: 'Please enter last name'
              }
            }
          },
          address: {
            validators: {
              notEmpty: {
                message: 'Please enter your address'
              }
            }
          },
          cocnumber: {
            validators: {
              notEmpty: {
                message: 'Please enter  C.O.C Number'
              },
              stringLength: {
                min: 8,
                max: 30,
                message: 'The C.O.C must be 8 and less than 30 characters long'
              },
            }
          },
          taxnumber: {
            validators: {
              notEmpty: {
                message: 'Please enter Tax Number'
              },
              stringLength: {
                min: 9,
                max: 30,
                message: 'The tx must be 9 and less than 30 characters long'
              },
               regexp: {
                regexp: /^[A-Za-z]{2}/,
                message: 'The tx can consist of alphabetical 2 alphabets like NL/DE/FR then numbers'
              }
            }
          },
          zip: {
            validators: {
              notEmpty: {
                message: 'Please enter zip'
              }
            }
          },
          email: {
            validators: {
              notEmpty: {
                message: 'Please enter email address'
              },
              emailAddress: {
                message: 'The value is not a valid email address'
              }
            }
          },
          password: {
            validators: {
              notEmpty: {
                message: 'Please enter password'
              }
            }
          },
          multiStepsPass: {
            validators: {
              notEmpty: {
                message: 'Please enter password'
              }
            }
          },
          multiStepsConfirmPass: {
            validators: {
              notEmpty: {
                message: 'Confirm Password is required'
              },
              identical: {
                compare: function () {
                  return stepsValidationFormStep1.querySelector('[name="multiStepsPass"]').value;
                },
                message: 'The password and its confirm are not the same'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
             eleInvalidClass: '',
            eleValidClass: '',
            rowSelector: function (field, ele) {
              // field is the field name
              // ele is the field element
              switch (field) {

                case 'address':
                  return '.col-md-12';
                default:
                  return '.col-sm-6';
              }
            }

          }),
          autoFocus: new FormValidation.plugins.AutoFocus(),
          submitButton: new FormValidation.plugins.SubmitButton()
        },
        init: instance => {
          instance.on('plugins.message.placed', function (e) {
            if (e.element.parentElement.classList.contains('input-group')) {
              e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
            }
          });
        }
      }).on('core.form.valid', function () {
        // Jump to the next step when all fields in the current step are valid
        validationStepper.next();
      });


       // package details
       const multiSteps2 = FormValidation.formValidation(stepsValidationFormStep2, {
        fields: {
          package_duration: {
            validators: {
              notEmpty: {
                message: 'Please select atleast 1 package'
              }
            }
          },
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            // eleInvalidClass: '',
            eleValidClass: '',
            rowSelector: '.col-md-12'
          }),
          autoFocus: new FormValidation.plugins.AutoFocus(),
          submitButton: new FormValidation.plugins.SubmitButton()
        },
        init: instance => {
          instance.on('plugins.message.placed', function (e) {
            if (e.element.parentElement.classList.contains('input-group')) {
              e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
            }
          });
        }
      }).on('core.form.valid', function () {
        // Jump to the next step when all fields in the current step are valid
        validationStepper.next();
      });

      // Personal info
      const multiSteps3 = FormValidation.formValidation(stepsValidationFormStep3, {
        fields: {


        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            // eleInvalidClass: '',
            eleValidClass: '',
            rowSelector: function (field, ele) {
              // field is the field name
              // ele is the field element
              switch (field) {
                case 'multiStepsFirstName':
                  return '.col-sm-6';
                case 'address':
                  return '.col-md-12';
                default:
                  return '.row';
              }
            }
          }),
          autoFocus: new FormValidation.plugins.AutoFocus(),
          submitButton: new FormValidation.plugins.SubmitButton()
        }
      }).on('core.form.valid', function () {
        // Jump to the next step when all fields in the current step are valid
        validationStepper.next();
      });

      // Social links
      const multiSteps4 = FormValidation.formValidation(stepsValidationFormStep4, {
        fields: {
          multiStepsCard: {
            validators: {
              notEmpty: {
                message: 'Please enter card number'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            // eleInvalidClass: '',
            eleValidClass: '',
            rowSelector: function (field, ele) {
              // field is the field name
              // ele is the field element
              switch (field) {
                case 'multiStepsCard':
                  return '.col-md-12';

                default:
                  return '.col-sm-6';
              }
            }
          }),
          autoFocus: new FormValidation.plugins.AutoFocus(),
          submitButton: new FormValidation.plugins.SubmitButton()
        },
        init: instance => {
          instance.on('plugins.message.placed', function (e) {
            if (e.element.parentElement.classList.contains('input-group')) {
              e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
            }
          });
        }
      }).on('core.form.valid', function () {
        // You can submit the form
        // stepsValidationForm.submit()
        // or send the form data to server via an Ajax request
        // To make the demo simple, I just placed an alert


        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
         var data = $("#multiStepsForm").serialize();

        $.ajax({
           type:'POST',
           url:"ajaxRequest",
           data:{data:data},
           success: function(data) {
            if(data.success == true ){

              // Set the options that I want
                     toastr.options = {
                       "closeButton": true,
                       "newestOnTop": false,
                       "progressBar": true,
                       "positionClass": "toast-top-right",
                       "preventDuplicates": false,
                       "onclick": null,
                       "showDuration": "300",
                       "hideDuration": "1000",
                       "timeOut": "5000",
                       "extendedTimeOut": "1000",
                       "showEasing": "swing",
                       "hideEasing": "linear",
                       "showMethod": "fadeIn",
                       "hideMethod": "fadeOut"
                     }
                       toastr.warning("Email Aready Exist");
                           } else {
                            window.location.href = "payment?total="+total+"&id="+data.id;

                           };
             },
           error: function(data){
             toastr.warning("Try again");
         },
        });
      });

      stepsValidationNext.forEach(item => {
        item.addEventListener('click', event => {
          window.scrollTo(0, 0);

          // When click the Next button, we will validate the current step
          switch (validationStepper._currentIndex) {
            case 0:
              multiSteps1.validate();
              break;

            case 1:
              multiSteps2.validate();
              break;

            case 2:
              multiSteps3.validate();
              break;

              case 3:
              multiSteps4.validate();
              break;

            default:
              break;
          }
        });
      });

      stepsValidationPrev.forEach(item => {
        item.addEventListener('click', event => {
          window.scrollTo(0, 0);

          switch (validationStepper._currentIndex) {
            case 3:
              validationStepper.previous();
              break;

            case 2:
              validationStepper.previous();
              break;

            case 1:
              validationStepper.previous();
              break;

            case 0:

            default:
              break;
          }
        });
      });
    }
  })();
});
