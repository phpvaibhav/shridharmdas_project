/*createJobType*/
$("#otpDivId").css("display", "none");
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
      fullName    : {
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
      otpnumber    : {
        required : true,
        minlength: 10
      },  
       unionName    : {
          required : true
        },
        otherUnionName    : {
          required : true
        },
           gender    : {
          required : true
        },    
        maritalStatus    : {
          required : true
        },
      
         profession    : {
          required : true
        },
          address    : {
          required : true
        },  
        city    : {
          required : true
        },  
         postName    : {
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
        ppostName    : {
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
        unionName : {
            required : Please_select_your_unionName
          },
   
          otherUnionName : {
            required : This_option_field_is_required
          }, 
      fullName : {
            required : Please_select_your_full_name
          },
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
          otpnumber : {
            required : 'Please enter  OTP number',
            minlength : 'Please enter 4 OTP number'
          }, 
          gender : {
            required : Please_select_your_gender
          }, 
          maritalStatus : {
            required : Please_select_your_marital_status
          }, 
          unionName : {
            required : Please_select_your_unionName
          },
          profession : {
            required : Please_select_your_Occupation
          },
           
          otherUnionName : {
            required : This_option_field_is_required
          }, 
        subProfession : {
            required : This_option_field_is_required
          }, 
         otherProfession : {
            required : This_option_field_is_required
          }, 
        
          address : {
            required : Please_select_your_address
          }, 
          postName : {
            required : Please_enter_your_post_name
          }, 
            ppostName : {
            required : Please_enter_your_post_name
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
          
          aadharNumber : {
            required : Please_select_your_aadhar_number,
            minlength : Please_enter_at_least_12_digit_aadhaar_number,
            checkAadharNumber : This_aadhar_number_is_already_taken
          },  
          frontImage:{
            required: Please_select_your_front_image,
          accept: Please_select__image_type,//"Only image type jpg/png/jpeg/gif is allowed"
          },
           identityImage:{
            required: Please_select_your_Identity_image,
          accept: Please_select__image_type,//"Only image type jpg/png/jpeg/gif is allowed"
          },
          
          backImage:{
            required: Please_select_your_back_image,
            accept: Please_select__image_type//"Only image type jpg/png/jpeg/gif is allowed"
          }  ,

  },
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
    /*remeber*/
              if ($('#remember_Address').is(':checked')) {

      localStorage.address      = $('#address').val();
      localStorage.city         = $('#city').val();
      localStorage.postName     = $('#postName').val();
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
      localStorage.postName        =  "";
      localStorage.add_chkbx    =  "";
    }
        if ($('#remFH').is(':checked')) {

      localStorage.familyHeadName      = $('#familyHeadName').val();
      localStorage.remFH    = $('#remFH').val();
    
    } else {
      localStorage.familyHeadName      =  "";
      localStorage.remFH    = "";
     
    }
    if($('[name="religiousKnowledge[]"]:checked').length > 0){
       $('#check-d-error').text('');
    }else{

      alert(Please_select_your_religious_Knowledge);
      $('#check-d-error').text(Please_select_your_religious_Knowledge);
       return false;
    }
    /*remeber*/
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
               
 swal({
  title: Good_job,
  text: Your_form_submitted_successfully,
  type: "success",
  showCancelButton: false,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Ok",
  //cancelButtonText: "No, cancel please!",
  closeOnConfirm: false,
  closeOnCancel: false,
  allowOutsideClick: false
},
function(isConfirm){
  if (isConfirm) {
     window.location = base_url;      // submitting the form when user press yes
  } else {
   // swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});

              }else{
                toastr.error(res.message, 'Alert!', {timeOut: 4000});
              }
     
        /*  preLoadshow(false);
          setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
          if(res.status=='success'){
            toastr.success(res.message, 'Success', {timeOut: 3000});
            setTimeout(function(){ window.location = base_url+'user-step-2'; },3000);
          }else{
            toastr.error(res.message, 'Alert!', {timeOut: 4000});
          }         */
        }
    });
  });        //fromsubmit
});

//rember me
$(function() {
  if (localStorage.add_chkbx && localStorage.add_chkbx != '') {
    $('#remember_Address').attr('checked', 'checked');
    $('#address').val(localStorage.address);
    //$('#postName').val(localStorage.postName);
    $('#city').val(localStorage.city);
    $('#zip_code').val(localStorage.zip_code);
    $('#tehsil').val(localStorage.tehsil);
    $('#district').val(localStorage.district);
    $('#country').val(localStorage.country);
    $('#state').val(localStorage.state);
    $("#zip_code").trigger("keyup");
    setTimeout(function(){$("#postName option[value='"+localStorage.postName+"']").prop('selected', true);
$(".form-control").trigger("blur");
     },3000);
  } else {
    $('#remember_Address').removeAttr('checked');
    $('#address').val("");
    $('#postName').val("");
    $('#city').val("");
    $('#zip_code').val("");
    $('#tehsil').val("");
    $('#district').val("");
    $('#country').val("");
    $('#state').val("");
  }
 
  
  $('#remember_Address').click(function() {
    if ($('#remember_Address').is(':checked')) {

      localStorage.address      = $('#address').val();
      localStorage.city         = $('#city').val();
      localStorage.postName     = $('#postName').val();
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
      localStorage.postName     =  "";
      localStorage.add_chkbx    =  "";
    }
  });

  $('#remFH').click(function() {
    if ($('#remFH').is(':checked')) {

      localStorage.familyHeadName      = $('#familyHeadName').val();
      localStorage.remFH    = $('#remFH').val();
    
    } else {
      localStorage.familyHeadName      =  "";
      localStorage.remFH    = "";
     
    }
  });
    if (localStorage.remFH && localStorage.remFH != '') {
    $('#remFH').attr('checked', 'checked');
   $('#familyHeadName').val(localStorage.familyHeadName);
  } else {
    $('#remFH').removeAttr('checked');
    $('#familyHeadName').val("");
   
  }

  
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
          setTimeout(function(){$("#ppostName option[value='"+($('#postName').val())+"']").prop('selected', true); 
  $(".form-control").trigger("blur");
        },3000);
          
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
          $('#ocountry').val($('#pcountry').val());
          $('#ostate').val($('#pstate').val());
          $("#ozip_code").trigger("keyup");
          setTimeout(function(){
            $("#opostName option[value='"+($('#ppostName').val())+"']").prop('selected', true);
            //$("#ppostName option[value='"+($('#postName').val())+"']").prop('selected', true);
            $(".form-control").trigger("blur");
                       },3000);
           
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
       // $("#offAddress").css("display","none");
    break;
    case 'student':
       // $("#offAddress").css("display","none");
    break;
    case 'retired':
       // $("#offAddress").css("display","none");
    break;
    
    default:
       // $("#offAddress").css("display","block");
    } 

}

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
                    $('.add_'+tag).html('<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>');
                      // Show image container
                    //  $("#loader").show();
                  },
                  success: function(result){
                      $('.add_'+tag).html('');
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
                        $(".form-control").trigger("blur"); 
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

function sendOtpToMobile(){
   $("#Resendotp").css("display", "none");
  var method      =  "POST";
    var post_data   = {'contactNumber':$('#contactNumber').val(),'countrycode':$('#countrycode').val()};
    var url         =  base_url+'apiv1/webapi/smsSentOtp';
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
             // preLoadshow(true);
              $('.mob_otp').html('<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>');
             $('#contactNumber').prop('disabled',true);
              $('#submit').prop('disabled', true);  
            },     
            success         : function (res) {
              $('.mob_otp').html('');
               $('#contactNumber').prop('disabled',false);
              //preLoadshow(false);
             // $('#contactNumber').prop('readonly',false);
            // 
              setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
              if(res.status=='success'){
                $("#otpDivId").css("display", "block");
                $("#Resendotp").css("display", "none");
                timerCount();
                toastr.success(res.message, 'Success', {timeOut: 3000});
              }else{
                $('#contactNumber').prop('disabled',false);
                $('#contactNumber').prop('readonly',false);
                toastr.error(res.message, 'Alert!', {timeOut: 4000});
              }
            }
          });
    return false; // required to block normal submit since you used ajax

}//End FUnction

function ResendOtpToMobile(){
   $("#Resendotp").css("display", "none");
    var method      =  "POST";
    var post_data   = {'contactNumber':$('#contactNumber').val(),'countrycode':$('#countrycode').val()};
    var url         =  base_url+'apiv1/webapi/smsSentReOtp';
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
             // preLoadshow(true);
               $('.mob_reotp').html('<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>');
             $('#contactNumber').prop('disabled',true);
              $('#submit').prop('disabled', true);  
            },     
            success         : function (res) {
              //preLoadshow(false);
              $('.mob_reotp').html('');
              $('#contactNumber').prop('readonly',false);
              $('#contactNumber').prop('disabled',false);
              setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
              if(res.status=='success'){
                $("#otpDivId").css("display", "block");
                $("#Resendotp").css("display", "none");
                timerCount();
                toastr.success(res.message, 'Success', {timeOut: 3000});
              }else{
                $('#contactNumber').prop('disabled',false);
                $('#contactNumber').prop('readonly',false);
                toastr.error(res.message, 'Alert!', {timeOut: 4000});
              }
            }
          });
    return false; // required to block normal submit since you used ajax

}//End FUnction

function verifyOtpNumber(){
  var method      =  "POST";
    var post_data   = {'contactNumber':$('#contactNumber').val(),'otpnumber':$('#otpnumber').val(),'countrycode':$('#countrycode').val()};
    var url         =  base_url+'apiv1/webapi/verifyOtpCode';
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
             // preLoadshow(true);
              $('.mob_reotp').html('<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>');
              $('#submit').prop('disabled', true);  
            },     
            success         : function (res) {
               $('.mob_reotp').html('');
              //preLoadshow(false);
              $('#submit').prop('disabled', false);
             // setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
              if(res.status=='success'){
                $('#mobileVerify').val(1);
                 $(".otpTodisplay").css("display", "block");
                $('#submit').prop('disabled', false);
                $('#contactNumber').prop('readonly',true);
                $('#otpnumber').prop('readonly',true);
                $("#Resendotp").css("display", "none");
               
                 $('#contactNumber').prop('disabled',false);
                 $(".countdown").css("display", "none");
                toastr.success(res.message, 'Success', {timeOut: 3000});
              }else{
                $(".otpTodisplay").css("display","none");
                $('#submit').prop('disabled', true);
                $('#mobileVerify').val(0);
                $('#otpnumber').val('');
                toastr.error(res.message, 'Alert!', {timeOut: 4000});
              }
            }
          });
    return false; // required to block normal submit since you used ajax

}//End FUnction

function checkNumber(){
    var value = $('#contactNumber').val();
    if(value.length==12){
      if($('#mobileVerify').val()==0){
       // $('#contactNumber').prop('readonly',true);
        
        $('#disabled').prop('disabled',true);
         stopInterval();
        sendOtpToMobile();
      }
    }
}

function checkReNumber(){
    var value = $('#contactNumber').val();
    if(value.length==12){
      if($('#mobileVerify').val()==0){
        $('#contactNumber').prop('readonly',true);
        $('#disabled').prop('disabled',true);
        ResendOtpToMobile();
      }
    }
}
$("#countrycode").change(function(){
  checkNumber();
});

function checkOtp(){
    var value = $('#otpnumber').val();
    if(value.length==10){
      verifyOtpNumber();
    }
}
var interval = null;
function timerCount(){

  $('.countdown').html("");
  var timer2 = "0:61";
  
  interval = setInterval(function() {
    if(timer2 == "0:61"){
      $(".countdown").css("display", "block");
    }
    var timer = timer2.split(':');
    //by parsing integer, I avoid all extra string processing
    var minutes = parseInt(timer[0], 10);
    var seconds = parseInt(timer[1], 10);
    --seconds;
    minutes = (seconds < 0) ? --minutes : minutes;
    if (minutes < 0) clearInterval(interval);
    seconds = (seconds < 0) ? 59 : seconds;
    seconds = (seconds < 10) ? '0' + seconds : seconds;
    //minutes = (minutes < 10) ?  minutes : minutes;
    $('.countdown').html(minutes + ':' + seconds);

    timer2 = minutes + ':' + seconds;
    if(seconds=='00'){
       $(".countdown").css("display", "none");
       $("#Resendotp").css("display", "block");
       if($('#mobileVerify').val()==1){
         $("#Resendotp").css("display", "none");
       }
    }
  }, 1000);

}
function stopInterval(){
  clearInterval(interval); // stop the interval
  return true;
}

//otherUnionName
/*function setUnion(e){
  alert("gr");
  if($(e).val()=='OTHER'){
     $(".otherUnionName").css("display", "block");
  }else{
     $(".otherUnionName").css("display", "none");
  }
}*/
$("#unionName").change(function(){
  var sanghname = $('#unionName option:selected').data('sanghname');
 // alert(sanghname);
 swal({
  title: "Are you sure?",
  text: "आपने श्री संघ "+sanghname+" चुना है,यदि  आपने सही श्री संघ सेलेक्ट किया तो Yes बटन क्लिक कर के आगे फॉर्म भरिए|",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  cancelButtonColor: "#DD6B55",
  confirmButtonText: "Yes",
  cancelButtonText: "No",
  closeOnConfirm: true,
  closeOnCancel: true
},
function(isConfirm){
  if (isConfirm) {

  if(sanghname=='OTHER'){
     $(".otherUnionName").css("display", "block");
  }else{
     $(".otherUnionName").css("display", "none");
  }
    //swal("Deleted!", "Your imaginary file has been deleted.", "success");

  } else {
    $("#unionName").val(null).trigger('change');
    $('#unionName option').removeAttr('selected').filter('[value=""]').prop('selected', true);
    //$('#unionName option[value=""]').prop('selected',true);
    //swal("Cancelled", "Your imaginary file is safe :)", "error");
         
  }
});
 // alert(sanghname);
/*
  if(sanghname=='OTHER'){
     $(".otherUnionName").css("display", "block");
  }else{
     $(".otherUnionName").css("display", "none");
  }*/
}); 
function subPro(e){
   $("#otherProfessionA").css("display", "none");
   $('.otherProfessionA').html('<div class="form-label-group"><label for="">Profession Detail</label><input type="text" name="otherProfession"  class="form-control" maxlength="30" size="30"></div>');
  // $("#otherProfessionA").css("display", "block");
   if($(e).val()=='Other'){
    $('.otherProfessionA').html('<div class="form-label-group"><label for="">Profession Detail</label><input type="text" name="otherProfession"placeholder="Please enter profession detail"  class="form-control"></div>');
     $("#otherProfessionA").css("display", "block");
  }else{
    $('.otherProfessionA').html('');
     $("#otherProfessionA").css("display", "none");
  }
}

function subPro1(e){
   $("#otherProfessionA").css("display", "none");
   $('.otherProfessionA').html('');
   $('.otherProfessionA').html('<div class="form-label-group"><label for="">Business Detail</label><input type="text" name="otherProfession"  class="form-control" placeholder="Please enter occupation detail" maxlength="30" size="30"></div>');
  $("#otherProfessionA").css("display", "block");
  /* if($(e).val()=='Other'){
    $('.otherProfessionA').html('<div class="form-label-group"><label for="">Business Detail</label><input type="text" name="otherProfession"  class="form-control"></div>');
     $("#otherProfessionA").css("display", "block");
  }else{
    $('.otherProfessionA').html('');
     $("#otherProfessionA").css("display", "none");
  }*/
}

function professionCheck(e){
    var expression = $(e).val();
    $("#offAddress").css("display","block");
    $("#subProfessionA").css("display","none");
    $('.subProfessionA').html('');
    $('.otherProfessionA').html('');
    switch(expression) {
    case 'profession':
      var html = '<div class="form-label-group"><label for="vyaparSub">Profession Type</label><select name="subProfession" id="subProfession" onchange="subPro(this);" class="form-control subProfession"><option value="">Select Profession</option><option value="Lawyers">Lawyers</option><option value="Doctors">Doctors</option><option value="IT professional">IT professional</option><option value="CA">CA</option><option value="Other">Other</option></select></div>';
        $('.subProfessionA').html(html);
        $("#subProfessionA").css("display","block");
    break;
    case 'business':
      var html = '<div class="form-label-group"><label for="vyaparSub">Business Type</label><select name="subProfession" onchange="subPro1(this);" class="form-control subProfession" id="subProfession"><option value="">Select Business</option><option value="Retail">Retail</option><option value="Wholesale">Wholesale</option><option value="Trading">Trading</option><option value="Manufacturing">Manufacturing</option><option value="Other">Other</option></select></div>';
        $('.subProfessionA').html(html);
        $("#subProfessionA").css("display","block");
    break;
    case 'job':
      var html = '<div class="form-label-group"><label for="">Job Type</label><input type="text" name="subProfession"  class="form-control" maxlength="30" size="30"></div>';
        $('.subProfessionA').html(html);
        $("#subProfessionA").css("display","block");
    break;

    case 'other':
      var html = '<div class="form-label-group"><label for="">Occupation Detail</label><input type="text" name="subProfession"  class="form-control" maxlength="30" size="30"></div>';
        $('.subProfessionA').html(html);
        $("#subProfessionA").css("display","block");
    break;
    
    
    case 'house wife':
       // $("#offAddress").css("display","none");
    break;
    
    case 'student':
       // $("#offAddress").css("display","none");
    break;
    case 'retired':

      //  $("#offAddress").css("display","none");
    break;
    
    default:
      /*  var html = '<div class="form-label-group"><label for="">Occupation Detail</label><input type="text" name="subProfession"  class="form-control" maxlength="30" size="30"></div>';
        $('.subProfessionA').html(html);
        $("#subProfessionA").css("display","block");
        $("#offAddress").css("display","block");*/
    } 

}
$("#subProfession").change(function(){
 // alert("FDSf");
  if($(this).val()=='Other'){
    $('.otherProfessionA').html('<div class="form-label-group"><label for="">Other Profession</label><input type="text" name="otherProfession"  class="form-control"></div>');
     $("#otherProfessionA").css("display", "block");
  }else{
    $('.otherProfessionA').html('');
     $("#otherProfessionA").css("display", "none");
  }
}); 
$().ready(function() {

    $.validator.addMethod("checkAadharNumber", 
        function(value, element) {
            var result = false;
            $.ajax({
                type:"POST",
                async: false,
                url:  base_url+'apiv1/webapi/checkAadharNumber', // script to validate in server side
                data: {aadharNumber: value},
                success: function(data) {
                  console.log(data);
                    result = (data.status) ? true : false;
                }
            });
            // return true if username is exist in database
            return result; 
        }, 
        //This_aadhar_number_is_already_taken
    );

});   

/*
function checkLang(e){
      var url = $(e).data('url');

      var radioValue = $("input[name='inlineRadioOptions']:checked").val();

      if(radioValue){

        window.location = url;

      }
}*/
$(document).ready(function(){
        
    $('#my_radio_box').change(function(){

    selected_value = $("input[name='inlineRadioOptions']:checked").val();
    //alert(selected_value);
     window.location = selected_value;
    //
    });
        
});
