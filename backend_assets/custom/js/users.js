/*createJobType*/
$("#user-add-form").validate({// Rules for form validation
    errorClass    : errorClass,
    errorElement  : errorElement,
    highlight: function(element) {
      $(element).parent().removeClass('state-success').addClass("state-error");
      $(element).removeClass('valid');
    },
    unhighlight: function(element) {
      $(element).parent().removeClass("state-error").addClass('state-success');
      $(element).addClass('valid');
    },
/*    rules : {
      firstName    : {
        required : true
      }, 
      lastName    : {
        required : true
      },  
      dob    : {
        required : true
      }, 
      gender    : {
        required : true
      },  
      contactNumber    : {
        required : true
      },  
      aadharNumber    : {
        required : true
      }, 
      address    : {
        required : true
      },
    },
    // Messages for form validation
    messages : {
      firstname : {
            required : 'Please select your first name'
          },
          lastname : {
            required : 'Please select your last name'
          },
          dob : {
            required : 'Please select your date of birth'
          }, 
          gender : {
            required : 'Please select your gender'
          }, 
          contactNumber : {
            required : 'Please select your contact number'
          }, 
           aadharNumber : {
            required : 'Please select your aadhar number'
          },  
          address : {
            required : 'Please select your address'
          },
  },*/
      rules : {
      firstName    : {
        required : true
      }, 
      lastName    : {
        required : true
      },    parentName    : {
        required : true
      },  
      dob    : {
        required : true
      }, 
      gender    : {
        required : true
      },    
      maritalStatus    : {
        required : true
      },  
      contactNumber    : {
        required : true
      },  
     aadharNumber    : {
       required : true
     }, 
      address    : {
        required : true
      },  
      city    : {
        required : true
      },  
      zip_code    : {
        required : true
      },  
      tehsil    : {
        required : true
      },  
      district    : {
        required : true
      },
    },
    // Messages for form validation
    messages : {
      firstName : {
            required : Please_select_your_first_name
          },
          lastName : {
            required : Please_select_your_last_name
          }, 
          parentName : {
            required : Please_select_your_father_name_husband_name
          },
          dob : {
            required : Please_select_your_date_of_birth
          }, 
          gender : {
            required : Please_select_your_gender
          }, maritalStatus : {
            required : Please_select_your_marital_status
          }, 
          contactNumber : {
            required : Please_select_your_contact_number
          }, 
           aadharNumber : {
            required : Please_select_your_aadhar_number
          },  
          address : {
            required : Please_select_your_address
          },  
          city : {
            required : Please_select_your_city
          }, 
          zip_code : {
            required : Please_select_your_zip_code
          },
           tehsil : {
            required : Please_select_your_tehsil
          },
           district : {
            required : Please_select_your_district
          },
          
  },
  // Ajax form submition
  submitHandler : function(form) {
    var method      =  "POST";
    var post_data   = $(form).serialize();
    var url         =  base_url+'adminapi/'+$(form).attr('action');
    var header      = true;
    var headerData  = {} ;
    if(header){
     var headerData = { 'authToken':authToken} ; 
    }
    toastr.clear();
    $('#submit').prop('disabled', true);
    $.ajax({
            type            : method,
            url             : url,
            headers         : headerData,
            data            : post_data,
            cache           : false,
            beforeSend      : function() {
              preLoadshow(true);
              $('#submit').prop('disabled', true);  
            },     
            success         : function (res) {
              preLoadshow(false);
              setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
              if(res.status=='success'){
                toastr.success(res.message, 'Success', {timeOut: 3000});
                setTimeout(function(){ 
                 // window.location.reload();
                 window.location = base_url+'users';
                },4000);
              }else{
                toastr.error(res.message, 'Alert!', {timeOut: 4000});
              }
            }
          });
    return false; // required to block normal submit since you used ajax
  },
  onfocusout: injectTrim($.validator.defaults.onfocusout),
  // Do not change code below
  errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
  }
});