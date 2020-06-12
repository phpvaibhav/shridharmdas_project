//# Custom Method 

function checkExcel() {
    
var file=$('#excelFile').val();

if (!(/\.(xlsx|xls|xlsm)$/i).test(file)) {
     toastr.error('Please upload valid excel file .xlsx, .xlsm, .xls only.', 'Alert!', {timeOut: 4000});
   // alert('Please upload valid excel file .xlsx, .xlsm, .xls only.');
    $('#excelFile').val('');
}
}
///#  Another Way to validate 

         // update profile
$("#excel-import-form").validate({

    rules: {
        excelFile: {
            required: true,
            extension: "xlsx|xls|xlsm"
        }
    },
    messages: {
        excelFile: {
            required: "import excel file required",
            extension: "Please upload valid file formats .xlsx, .xlsm, .xls only."
        }
    },
          // Ajax form submition
         /* submitHandler : function(form) {
           
             return false; // required to block normal submit since you used ajax
          },
*/
          // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent().parent());
          }
        });
        // update profile    
///#  Another Way to validate 

// Validation
$(function() {
      
  $(document).on('submit', "#excel-import-form", function (event) {
    toastr.clear();
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type            : "POST",
        url             : base_url+$(this).attr('action'),
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
          if(res.status==1){
            toastr.success(res.message, 'Success', {timeOut: 3000});
            setTimeout(function(){ window.location = base_url+'users'; },4000);
          }else{
            toastr.error(res.message, 'Alert!', {timeOut: 4000});
          }         
        }
    });
  });        //fromsubmit
});