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




//Update
/*createJobType*/
$("#user-update-form").validate({// Rules for form validation
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
     }
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
                  window.location.reload();
                // window.location = base_url+'users';
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




$("#user-address-form").validate({// Rules for form validation
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

      rules : {
    
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
        paddress    : {
          required : true
        },  
        pcity    : {
          required : true
        },  
        pzip_code    : {
          required : true
        },  
        ptehsil    : {
          required : true
        },  
        pdistrict    : {
          required : true
        },
    },
    // Messages for form validation
    messages : {
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

                  
          paddress : {
            required : Please_select_your_address
          },  
          pcity : {
            required : Please_select_your_city
          }, 
          pzip_code : {
            required : Please_select_your_zip_code
          },
          ptehsil : {
            required : Please_select_your_tehsil
          },
          pdistrict : {
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
    $('#submitA').prop('disabled', true);
    $.ajax({
            type            : method,
            url             : url,
            headers         : headerData,
            data            : post_data,
            cache           : false,
            beforeSend      : function() {
              preLoadshow(true);
              $('#submitA').prop('disabled', true);  
            },     
            success         : function (res) {
              preLoadshow(false);
              setTimeout(function(){  $('#submitA').prop('disabled', false); },4000);
              if(res.status=='success'){
                toastr.success(res.message, 'Success', {timeOut: 3000});
                setTimeout(function(){ 
                  window.location.reload();
                /// window.location = base_url+'users';
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

function zipCodetoData(e){
    var value = $(e).val();
    if(value.length==6){
         var tag = $(e).data('set');
      var postName  = '#'+tag+'postName';
      var city      = '#'+tag+'city';
      var tehsil      = '#'+tag+'tehsil';
      var district      = '#'+tag+'district';
      var state      = '#'+tag+'state';
      var country      = '#'+tag+'country';
     // alert(postName +' '+city+' '+tehsil+' '+district+' '+state);
        /*set*/
        $.ajax({
                  url: base_url+'home/pincodeajax',
                  cache: false,
                  data: {'pinCode':value},
                  type: "POST",
                  beforeSend: function(){
                      // Show image container
                    //  $("#loader").show();
                  },
                  success: function(result){
                    if(result.status){
                        //  $('#pinCodeRes0').empty().append(result.res0);
                        $(postName).empty().append(result.res1);
                        // $('#pinCodeRes2').empty().append(result.res2);
                        $(tehsil).empty().val(result.res3);
                        $(city).empty().val(result.res3);
                        $(district).empty().val(result.res4);
                        $(state).empty().val(result.res5);
                        $(country).empty().val('India');
                        if(tag=='p'){
                          $("#ppostName option[value='"+($('#postName').val())+"']").prop('selected', true);
                        }
                        if(tag=='o'){
                          $("#opostName option[value='"+($('#ppostName').val())+"']").prop('selected', true);
                        } 
                       /* if(tag=='o'){
                          setTimeout(function(){$("#postName option[value='"+localStorage.postName+"']").prop('selected', true); },3000);
                        }*/

                    }else{
                     //   toastr.error(result.resx, 'Alert!', {timeOut: 4000});
                    }
                   
                  },
                  complete:function(result){
                      // Hide image container
                    //  $("#loader").hide();
                  },
                  error: function(result) {
                      console.log(result);
                  }
              });
        /*set*/
    }//End if
}//End FUnction
    $('#Same_AddressP').click(function() {
    if ($('#Same_AddressP').is(':checked')) {

          $('#paddress').val($('#address').val());
          $('#pcity').val($('#city').val());
          $('#pzip_code').val($('#zip_code').val());
          $('#ptehsil').val($('#tehsil').val());
          $('#pcountry').val($('#country').val());
          $('#pstate').val($('#state').val());
          $('#pdistrict').val($('#district').val());

          $("#pzip_code").trigger("keyup");
          setTimeout(function(){$("#ppostName option[value='"+($('#postName').val())+"']").prop('selected', true); },3000);
          
    } else {
    //gfgg
    }
  });
$(document).ready(function(){
        
    $("#zip_code").trigger("keyup");
    $("#pzip_code").trigger("keyup");
        
});


/*****************************************/
$("#user-image-form").validate({// Rules for form validation
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
    rules : {

      identityImage:{
        required: true,
        accept:"jpg,png,jpeg,gif,pdf"
      } ,  
   
    },
    // Messages for form validation
    messages : {

           identityImage:{
            required: Please_select_your_Identity_image,
          accept: Please_select__image_type,//"Only image type jpg/png/jpeg/gif is allowed"
          },
          
        

  },
  // Ajax form submition
/*  submitHandler : function(form) {

    return false; // required to block normal submit since you used ajax
  },*/
  onfocusout: injectTrim($.validator.defaults.onfocusout),
  // Do not change code below
  errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
  }
});
// Validation
$(function() {
      
  $(document).on('submit', "#user-image-form", function (event) {
    toastr.clear();
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type            : "POST",
        url             :  base_url+'adminapi/'+$(this).attr('action'),
        headers         : { 'authToken': authToken },
        data            : formData, //only input
        processData     : false,
        contentType     : false,
        cache           : false,
        beforeSend      : function () {
          preLoadshow(true);
            $('#submitI').prop('disabled', true);
        },
        success         : function (res) {
          preLoadshow(false);
          setTimeout(function(){  $('#submitI').prop('disabled', false); },4000);
          if(res.status=='success'){
            toastr.success(res.message, 'Success', {timeOut: 3000});
            setTimeout(function(){ window.location.reload(); },3000);
          }else{
            toastr.error(res.message, 'Alert!', {timeOut: 4000});
          }         
        }
    });
  });        //fromsubmit
});

/*****************************************/