/*createJobType*/
$("#user-add-step-1").validate({// Rules for form validation
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
      },    
      parentName    : {
        required : true
      }, 
      familyHeadName    : {
        required : true
      }, 
       
      dob    : {
        required : true
      }, 
     
      contactNumber    : {
        required : true,
        minlength: 12
      },  
      aadharNumber    : {
        required : true,
        minlength : 14
      }, 
                  frontImage:{
                    required: true,
                    accept:"jpg,png,jpeg,gif"
                } ,   backImage:{
                    required: true,
                    accept:"jpg,png,jpeg,gif"
                } ,
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
          familyHeadName : {
            required : Please_select_your_familyHeadName
          },
          
          dob : {
            required : Please_select_your_date_of_birth
          }, 
          contactNumber : {
            required : Please_select_your_contact_number,
            minlength : Please_enter_at_least_10_digit_phone_number
          }, 
           aadharNumber : {
            required : Please_select_your_aadhar_number,
             minlength : Please_enter_at_least_12_digit_aadhaar_number
          },  
          frontImage:{
          required: Please_select_your_front_image,
          accept: Please_select__image_type,//"Only image type jpg/png/jpeg/gif is allowed"
          }  ,
          backImage:{
          required: Please_select_your_back_image,
          accept: Please_select__image_type//"Only image type jpg/png/jpeg/gif is allowed"
          }  ,

  },
  // Ajax form submition
/*  submitHandler : function(form) {

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
                swal(Good_job,Your_form_submitted_successfully, "success");
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
  },*/
  onfocusout: injectTrim($.validator.defaults.onfocusout),
  // Do not change code below
  errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
  }
});

// Validation
$(function() {
      
  $(document).on('submit', "#user-add-step-1", function (event) {
    toastr.clear();
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type            : "POST",
        url             :  base_url+'apiv1/webapi/'+$(this).attr('action'),
        headers         : { 'authToken': authToken },
        data            : formData, //only input
        processData     : false,
        contentType     : false,
        cache           : false,
        beforeSend      : function () {
          preLoadshow(true);
            $('#submit').prop('disabled', true);
        },
        success         : function (res) {
          preLoadshow(false);
          setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
          if(res.status=='success'){
            toastr.success(res.message, 'Success', {timeOut: 3000});
            setTimeout(function(){ window.location = base_url+'user-step-2'; },3000);
          }else{
            toastr.error(res.message, 'Alert!', {timeOut: 4000});
          }         
        }
    });
  });        //fromsubmit
});
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:base_url+'home/countryToState',
                data:{'country':countryID},
                success:function(html){
                    $('#state').html(html);
                    $("#state option[value='"+localStorage.state+"']").prop('selected', true);
                    //$('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
           // $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    $('#ocountry').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:base_url+'home/countryToState',
                data:{'country':countryID},
                success:function(html){
                    $('#ostate').html(html);
                   // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#ostate').html('<option value="">Select country first</option>');
           // $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    $('#pcountry').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:base_url+'home/countryToState',
                data:{'country':countryID},
                success:function(html){
                    $('#pstate').html(html);
                   // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#pstate').html('<option value="">Select country first</option>');
           // $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
      $("#country").trigger("change");
      $("#pcountry").trigger("change");
      $("#ocountry").trigger("change");
/*    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:base_url+'home/stateToCity',
                data:{'state':stateID},
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });*/
});

//rember me
$(function() {
  if (localStorage.add_chkbx && localStorage.add_chkbx != '') {
    $('#remember_Address').attr('checked', 'checked');
    $('#address').val(localStorage.address);
    $('#city').val(localStorage.city);
    $('#zip_code').val(localStorage.zip_code);
    $('#tehsil').val(localStorage.tehsil);
    $('#district').val(localStorage.district);
  } else {
    $('#remember_Address').removeAttr('checked');
    $('#address').val("");
    $('#city').val("");
    $('#zip_code').val("");
    $('#tehsil').val("");
    $('#district').val("");
  }
  $('#remember_Address').click(function() {
    if ($('#remember_Address').is(':checked')) {

      localStorage.address      = $('#address').val();
      localStorage.city         = $('#city').val();
      localStorage.zip_code     = $('#zip_code').val();
      localStorage.tehsil       = $('#tehsil').val();
      localStorage.district     = $('#district').val();
      localStorage.country      = $('#country').val();
      localStorage.state        = $('#state').val();
      localStorage.add_chkbx    = $('#remember_Address').val();

    } else {
      localStorage.address      =  "";
      localStorage.city         =  "";
      localStorage.zip_code     =  "";
      localStorage.tehsil       =  "";
      localStorage.district     =  "";
      localStorage.country      =  "";
      localStorage.state        =  "";
      localStorage.add_chkbx    =  "";
    }
  });
    $('#Same_AddressP').click(function() {
    if ($('#Same_AddressP').is(':checked')) {

          $('#paddress').val($('#address').val());
          $('#pcity').val($('#city').val());
          $('#pzip_code').val($('#zip_code').val());
          $('#ptehsil').val($('#tehsil').val());
          $('#pdistrict').val($('#district').val());
          $("#pstate option[value='"+($('#state').val())+"']").prop('selected', true);
    } else {
    //gfgg
    }
  });

  $('#Same_Address').click(function() {
    if ($('#Same_Address').is(':checked')) {
          $('#oaddress').val($('#paddress').val());
          $('#ocity').val($('#pcity').val());
          $('#ozip_code').val($('#pzip_code').val());
          $('#otehsil').val($('#ptehsil').val());
          $('#odistrict').val($('#pdistrict').val());
          $("#ostate option[value='"+($('#pstate').val())+"']").prop('selected', true);
    } else {
      //gfgg
    }
  });

    
});
//rember me

function professionCheck(e){
    var expression = $(e).val();
    switch(expression) {
    case 'house wife':
        $("#offAddress").css("display","none");
    break;
    case 'student':
        $("#offAddress").css("display","none");
    break;
    case 'retired':
        $("#offAddress").css("display","none");
    break;
    
    default:
        $("#offAddress").css("display","block");
    } 

}

$("#user-add-step-2").validate({ // Rules for form validation
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
        gender    : {
          required : true
        },    
        maritalStatus    : {
          required : true
        },
        unionName    : {
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
     
          gender : {
            required : Please_select_your_gender
          }, 
          maritalStatus : {
            required : Please_select_your_marital_status
          }, 
          unionName : {
            required : Please_select_your_unionName
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
    var url         =  base_url+'apiv1/webapi/'+$(form).attr('action');
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
                  window.location = base_url+'user-step-3';
                },3000);
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

$("#user-add-step-3").validate({ // Rules for form validation
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
        userId    : {
          required : true
        },    
     
        
    },
   
  // Ajax form submition
  submitHandler : function(form) {
    var method      =  "POST";
    var post_data   = $(form).serialize();
    var url         =  base_url+'apiv1/webapi/'+$(form).attr('action');
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
                  swal(Good_job,Your_form_submitted_successfully, "success");
                setTimeout(function(){ 
                  // window.location.reload();
                    window.location = base_url;
                },3000);
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
