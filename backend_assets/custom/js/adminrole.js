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
      fullName    : {
        required : true
      }, 
      email   : {
        required  : true,
        email     : true
      },
      password : {
        required  : true,
        minlength : 3,
        maxlength : 20
      },
      passwordConfirm : {
        required  : true,
        minlength : 3,
        maxlength : 20,
        equalTo   : '#password'
      },
      roleId    : {
        required : true
      }, 
      sanghId    : {
        required : true
      }, 
    },
    // Messages for form validation
    messages : {
      fullName : {
        required : 'Please enter your full name'
      },
      email : {
        required  : 'Please enter email address',
        email     : 'Please enter a valid email address'
      },
      password : {
        required  : 'Please enter your password'
      },
      passwordConfirm : {
        required  : 'Please re-enter your password',
        equalTo   : 'Please enter the same password as above'
      },
      roleId : {
        required : 'Please select your role'
      },

      sanghId : {
        required : 'Please select your sangh name'
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
                 window.location = base_url+'sub-admin';
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
function sanghIdCheck(e){
   var role = $(e).val();
  $("#sanghId").val(null).trigger('change');
  
   if(role==2){
     $(".sanghIdCheck").css("display", "block");

  }else{
     $(".sanghIdCheck").css("display", "none");
  }
}