$("#pageAddUpdate").validate({// Rules for form validation
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
    title : {
      required : true
    }, pageUrl : {
      required : true
    },
  description : {
      required : true
    },
  
   

  },
  // Messages for form validation
  messages : {
    title : {
      required : 'Please enter your title'
    }, pageUrl : {
      required : 'Please enter your Page Type'
    },
    description : {
      required : 'Please enter your description',

    }
  },
  // Ajax form submition
  submitHandler : function(form) {
    toastr.clear();
       $('#submit').prop('disabled', true);
      $.ajax({
        type: "POST",
        url: base_url+'adminapi/'+$(form).attr('action'),
        headers: { 'authToken':authToken},
        data: $(form).serialize(),
        cache: false,
        beforeSend: function() {
          preLoadshow(true);
          $('#submit').prop('disabled', true);  
        },     
        success: function (res) {
          preLoadshow(false);
          setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
          if(res.status=='success'){
            toastr.success(res.message, 'Success', {timeOut: 3000});
           // setTimeout(function(){window.location.reload(); },4000);
            setTimeout(function(){window.location = base_url+'custom-pages'; },4000);
          }else{
            toastr.error(res.message, 'Alert!', {timeOut: 4000});
          }
        }
      });
     return false; // required to block normal submit since you used ajax
  },
  // Do not change code below
  errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
  }
});
  $(document).ready(function(){

         
$('.note_description').summernote({
   height: 200,
 
  placeholder: 'Description',
  callbacks: {
                onChange: function (contents, $editable) {
                    $(this).val(contents);
                }
            }
});

       });