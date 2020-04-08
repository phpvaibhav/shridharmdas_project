var base_url  = $('body').data('base-url'); // Base url
var authToken = $('body').data('auth-url'); // Base url
var errorClass    = 'invalid';
var errorElement  = 'em';
//confirmAction
function confirmAction(e){
   toastr.clear();
  swal({
    title               : "Are you sure?",
    text                : $(e).data('message'),
    type                : "warning",
    showCancelButton    : true,
    confirmButtonClass  : "btn-danger",
    confirmButtonText   : "Yes",
    cancelButtonText    : "No",
    closeOnConfirm      : true,
    closeOnCancel       : true,
    // showLoaderOnConfirm: true
  },
  function(isConfirm) {
    if (isConfirm) {
      /*ajax*/
      $.ajax({
              type          : "POST",
              url           : base_url+$(e).data('url'),
              data          : {id:$(e).data('id')},
              headers       : { 'authToken':authToken},
              cache         : false,
              beforeSend    : function() {
                preLoadshow(true);
              },     
              success       : function (res) {
                preLoadshow(false);
                if(res.status=='success'){
                  toastr.success(res.message, 'Success', {timeOut: 3000});
                   //  swal("Success", "Your process  has been successfully done.", "success");
                   if($(e).data('list')==1){
                      $('.dataTables-example-list').DataTable().ajax.reload();
                   }else{
                      setTimeout(function(){window.location.reload(); },2000);
                   }
                  
                   
                }else{
                  toastr.error(res.message, 'Alert!', {timeOut: 5000});
                }             
              }
            });
      /*ajax*/
    } else {
    //swal("Cancelled", "Your Process has been Cancelled", "error");
    }
  });
}

function injectTrim(handler) {
  return function (element, event) {
    if (element.tagName === "TEXTAREA" || (element.tagName === "INPUT" 
                                       && element.type !== "password")) {
      element.value = $.trim(element.value);
    }
    return handler.call(this, element, event);
  };
}
//loader manage
//number check 
$('.number-only').keypress(function(e) {
  if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;
}).on("cut copy paste",function(e){
  e.preventDefault();
});
$(".floatNumeric").on("keypress keyup blur",function (event) {
  //this.value = this.value.replace(/[^0-9\.]/g,'');
  $(this).val($(this).val().replace(/[^0-9\.]/g,''));
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
});
$(".alfaNumeric").on("keypress keyup blur",function (event) {
  if (this.value.match(/[^a-zA-Z0-9 ]/g)) {
    this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
  }
});
//date  picker manange
$( "#purchaseDate" ).datepicker({  
  dateFormat  : 'mm/dd/yyyy'
});

$("#dob").datepicker({
  dateFormat  : 'dd-mm-yy',
  maxDate     : new Date(),
  changeMonth : true,
  changeYear  : true,
  yearRange   : "-100:+0",
  prevText    : '<i class="fa fa-chevron-left"></i>',
  nextText    : '<i class="fa fa-chevron-right"></i>',
});
$("#CreationDate").datepicker({
  dateFormat  : 'dd-mm-yy',
  minDate     : new Date(),
  //changeMonth : true,
  //changeYear  : true,
  // yearRange   : "-100:+0",
  prevText    : '<i class="fa fa-chevron-left"></i>',
  nextText    : '<i class="fa fa-chevron-right"></i>',
});

function filePreview(input) {
  if (input.files && input.files[0]) {
    var reader    = new FileReader();
    reader.onload = function (e) {
      /*   $('#uploadForm + img').remove();
      $('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');*/
      $('#privew + embed').remove();
      $('#privew + img').remove();
      $('#privew').after('');
      $('#privew').after('<embed src="'+e.target.result+'" width="400" height="300">');
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function readURL(input,i) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah_'+i).attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
