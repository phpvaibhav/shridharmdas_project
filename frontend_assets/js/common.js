
var base_url  = $('body').data('base-url'); // Base url
var authToken = $('body').data('auth-url'); // Base url
var errorClass    = 'invalid';
var errorElement  = 'em';

function preLoadshow(x){
  if(x){
    $('#pre-load-dailog').css("display", "block");;
  }else{
    $('#pre-load-dailog').css("display", "none");;
  }
}
// A $( document ).ready() block.
preLoadshow(true);
/*$( document ).ready(function() {
 
});*/
$(window).load(function() {
     preLoadshow(false);
});
toastr.options = {
  closeButton: true,
  progressBar: true,
  showMethod: 'slideDown',
  timeOut: 3000
};
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
                                       && element.type !== "password" && element.type !== "file")) {
      element.value = $.trim(element.value);
    }
    return handler.call(this, element, event);
  };
}
//loader manage
//number check 

$(".number-only").keypress(function(e) {

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
   defaultDate: '01-01-2000',
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


 
function ResizeImage(idname,isrc) {
var filesToUpload = document.getElementById(idname).files;
var file = filesToUpload[0];
 
// Create an image
var img = document.createElement("img");
// Create a file reader
var reader = new FileReader();
// Set the image once loaded into file reader
reader.onload = function(e) {
//img.src = e.target.result;
 
var img = new Image();
 
img.src = this.result;
 
setTimeout(function(){
var canvas = document.createElement("canvas");
 
var MAX_WIDTH = 640;
var MAX_HEIGHT = 360;
var width = img.width;
var height = img.height;
 
if (width > height) {
if (width > MAX_WIDTH) {
height *= MAX_WIDTH / width;
width = MAX_WIDTH;
}
} else {
if (height > MAX_HEIGHT) {
width *= MAX_HEIGHT / height;
height = MAX_HEIGHT;
}
}
canvas.width = width;
canvas.height = height;
var ctx = canvas.getContext("2d");
ctx.drawImage(img, 0, 0, width, height);
var dataurl = canvas.toDataURL("image/jpeg");
document.getElementById(isrc).src = dataurl;
},100);
}
// Load files into file reader
reader.readAsDataURL(file);
}
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});


function compress(e,i) {
    const width = 640;
    const height = 360;
    const fileName = e.target.files[0].name;
    const reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = event => {
        const img = new Image();
        img.src = event.target.result;
        img.onload = () => {
                const elem = document.createElement('canvas');
                elem.width = width;
                elem.height = height;
                const ctx = elem.getContext('2d');
                // img.width and img.height will contain the original dimensions
                ctx.drawImage(img, 0, 0, width, height);
                ctx.canvas.toBlob((blob) => {
                    const file = new File([blob], fileName, {
                        type: 'image/jpeg',
                        lastModified: Date.now()
                    });
                }, 'image/jpeg', 1);
             // var dataurl = ctx.toDataURL("image/jpeg");
            //  document.getElementById('blah_'+i).src = event.target.result;
               $('#blah_'+i).attr('src', event.target.result);
            },

            reader.onerror = error => console.log(error);
    };
}
/*document.getElementById("frontImage").addEventListener("change", function (event) {
   var i= $(this).data('id');
  compress(event,i);
});
document.getElementById("backImage").addEventListener("change", function (event) {
   var i= $(this).data('id');
  compress(event,i);
});
*/