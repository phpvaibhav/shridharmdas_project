
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
      },    maritalStatus    : {
        required : true
      },  
      contactNumber    : {
        required : true
      },  
     // aadharNumber    : {
      //  required : true
     // }, 
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
          parentName : {
            required : 'Please select your father name/ husband name'
          },
          dob : {
            required : 'Please select your date of birth'
          }, 
          gender : {
            required : 'Please select your gender'
          }, maritalStatus : {
            required : 'Please select your marital status'
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
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
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
    });
});