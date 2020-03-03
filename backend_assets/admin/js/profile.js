// Change Password
// Validation
$("#smart-form-changepass").validate({
  // Rules for form validation
  rules : {
            password : {
              required  : true,
              minlength : 3,
              maxlength : 20
            }, 
            npassword : {
              required  : true,
              minlength : 3,
              maxlength : 20
            },
            rnpassword : {
              required  : true,
              minlength : 3,
              maxlength : 20,
              equalTo   : '#npassword'
            }, 
          },
          // Messages for form validation
          messages : {
            
            password : {
              required  : Please_enter_your_current_password
            },
            npassword : {
              required  : Please_enter_your_new_password
            },
            rnpassword  : {
                required  : Please_re_enter_your_password,
                equalTo   : Please_enter_the_same_password_as_above
            }
         
          },

          // Ajax form submition
          submitHandler : function(form) {
            toastr.clear();
            $('#submit').prop('disabled', true);
            $.ajax({
              type        : "POST",
              url         : base_url+'apiv1/adminProfile/'+$(form).attr('action'),
              headers     : { 'authToken':authToken},
              data        : $(form).serialize(),
              cache       : false,
              beforeSend  : function() {
                preLoadshow(true);
                $('#submit').prop('disabled', true);  
              },     
              success     : function (res) {
                preLoadshow(false);
                setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
                if(res.status=='success'){
                  toastr.success(res.message, 'Success', {timeOut: 3000});
                  setTimeout(function(){ window.location = base_url+'dashboard'; },4000);
                  //window.location = base_url+'admin/dashboard';
                }else{
                  toastr.error(res.message, 'Alert!', {timeOut: 4000});
                }
                //$('#submit').prop('disabled', false);  
              }
             });
             return false; // required to block normal submit since you used ajax
          },
          // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
          }
        });
        // Change Password

         // update profile
        $("#smart-form-updateuser").validate({

          // Rules for form validation
          rules : {
            fullName : {
              required  : true
            },
            email : {
              required  : true,
              email     : true
            },
            contact : {
              required  : true,       
            },
          },

          // Messages for form validation
          messages : {
            fullName : {
              required : Please_enter_your_full_name
            },
            email : {
              required  : Please_enter_email_address,
              email     : Please_enter_a_valid_email_address
            },
            contact : {
              required : Please_enter_your_contact_number,
            
            }, 
          },
          // Ajax form submition
         /* submitHandler : function(form) {
           
             return false; // required to block normal submit since you used ajax
          },
*/
          // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
          }
        });
        // update profile                         
// Validation
$(function() {
      
  $(document).on('submit', "#smart-form-updateuser", function (event) {
    toastr.clear();
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type            : "POST",
        url             : base_url+'apiv1/adminProfile/'+$(this).attr('action'),
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
            setTimeout(function(){ window.location = base_url+'profile/'+res.url; },4000);
          }else{
            toastr.error(res.message, 'Alert!', {timeOut: 4000});
          }         
        }
    });
  });        //fromsubmit
});