$(document).ready(function(){
    $('#checkbox_select_all').on('click',function(){
        if(this.checked){
            $('.check-Add-check').each(function(){
                this.checked = true;
            });
        }else{
             $('.check-Add-check').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.check-Add-check').on('click',function(){
        if($('.check-Add-check:checked').length == $('.check-Add-check').length){
            $('#checkbox_select_all').prop('checked',true);
        }else{
            $('#checkbox_select_all').prop('checked',false);
        }
    });

    ////$('.check-Add-check').trigger('click');
      if($('.check-Add-check:checked').length == $('.check-Add-check').length){
            $('#checkbox_select_all').prop('checked',true);
        }else{
            $('#checkbox_select_all').prop('checked',false);
        }
    ////$('.check-Add-check').trigger('click');
});

/*createJobType*/
$("#smart-form-add-data").validate({// Rules for form validation
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
    roleId    : {
      required : true
    }, 
   
    },
    // Messages for form validation
    messages : {
      roleId : {
            required : 'Please enter your role Id'
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
