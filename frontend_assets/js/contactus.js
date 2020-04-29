
$("#contactus-form").validate({// Rules for form validation
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
      email : {
      required  : true,
      email     : true
      },
      message : {
      required  : true,       
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
      message : {
      required : 'Please enter your message',

      }, 

  },
  // Ajax form submition
  submitHandler : function(form) {

    var method      =  "POST";
    var post_data   = $(form).serialize();
    var url         =  base_url+'home/'+$(form).attr('action');
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
                //swal(Good_job,Your_form_submitted_successfully, "success");
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