/// Create job 
function getMsgboundary(){
  var msg   = 'Please select geo fencing area';
  toastr.error(msg, 'Alert!', {timeOut: 3000});
  return msg;
}
$("#createJob").validate({// Rules for form validation
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
    jobName : {
      required : true
    },
    jobTypeId : {
      required : true
    }, 
    driverId : {
      required : true
    },
    customerId : {
      required : true
    }, 
    startDate : {
      required : true
    },
    startTime : {
      required : true
    },
    address : {
      required : true
    },
    boundary: { 
      required: '#geoFencing1[value="1"]:checked'
    } 
  },
  // Messages for form validation
  messages : {
      jobName : {
        required : 'Please enter your job name'
      },
      jobTypeId : {
        required : 'Please enter your job type',
      },
      driverId : {
        required : 'Please enter your driver name',
      },
      customerId : {
        required : 'Please enter your customer name',
      },
      startDate : {
        required : 'Please enter your Creation date',
      },
      startTime : {
        required : 'Please enter your Creation time',
      },
      address : {
        required : 'Please enter your address',
      },
      boundary : {
        required: function () {
          toastr.error('Please select geo fencing area', 'Alert!', {timeOut: 3000});
        },
      }
    },
    // Ajax form submition
    submitHandler : function(form) {
        toastr.clear();
        $('#submit').prop('disabled', true);
        $.ajax({
            type          : "POST",
            url           : base_url+'adminapi/'+$(form).attr('action'),
            headers       : { 'authToken':authToken},
            data          : $(form).serialize(),
            cache         : false,
            beforeSend    : function() {
              preLoadshow(true);
              $('#submit').prop('disabled', true);  
            },     
            success       : function (res) {
              preLoadshow(false);
              setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
              if(res.status=='success'){
                toastr.success(res.message, 'Success', {timeOut: 3000});
             //   setTimeout(function(){window.location.reload(); },4000);
                setTimeout(function(){ window.location = base_url+'jobs';; },4000);
              }else{
                toastr.error(res.message, 'Alert!', {timeOut: 4000});
              }
            }
        });
        return false; // required to block normal submit since you used ajax
      },
      onfocusout     : injectTrim($.validator.defaults.onfocusout),
      // Do not change code below
      errorPlacement : function(error, element) {
        error.insertAfter(element.parent());
      }
    });
/*listing job */
var job_list = $('#job_list').DataTable({ 
                "processing"  : true, //Feature control the processing indicator.
                "serverSide"  : true, //Feature control DataTables' servermside processing mode.
                "order"       : [], //Initial no order.
                "lengthChange": false,
                "oLanguage"   : {
                  "sEmptyTable" : '<center>No job found</center>',
                  "sSearch"     : '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
                },
                "oLanguage"   : {
                  "sZeroRecords"  : '<center>No job found</center>',
                  "sSearch"       : '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
                },
                initComplete  : function () {
                  $('.dataTables_filter input[type="search"]').css({ 'height': '32px'});
                },
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url"         : base_url+"adminapi/jobs/jobList",
                    "type"        : "POST",
                    "dataType"    : "json",
                    "headers"     : { 'authToken':authToken},
                    "dataSrc"     : function (jsonData) {
                      return jsonData.data;
                    }
                },
                //Set column definition initialisation properties.
                "columnDefs": [
                  { orderable: false, targets: -1 },    
                ]
              });
//job status      
function jobStatus(e){
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
              url           : base_url+'adminapi/jobs/jobStatus',
              data          : {use:$(e).data('useid'), status:$(e).data('status') },
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
                  setTimeout(function(){window.location.reload(); },2000);
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
//job status      
function jobDelete(e){
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
              type            : "POST",
              url             : base_url+'adminapi/jobs/jobDelete',
              data            : {use:$(e).data('useid')},
              headers         : { 'authToken':authToken},
              cache           : false,
              beforeSend      : function() {
                preLoadshow(true);
              },     
              success         : function (res) {
                preLoadshow(false);
                if(res.status=='success'){  
                  toastr.success(res.message, 'Success', {timeOut: 3000});
                  //  swal("Success", "Your process  has been successfully done.", "success");
                  setTimeout(function(){  window.location = base_url+'jobs'; },3000);
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
$(".queDataHideShow").hide();
function getQuestions(e){
  var jobTypeId = $(e).val();
  /*ajax*/
  $.ajax({
          type          : "POST",
          url           : base_url+'adminapi/jobtype/getQuestions',
          data          : {   
                            jobTypeId     : jobTypeId,
                            question      : question,
                            pendingJob    : pendingJob
                          },
          headers       : { 'authToken':authToken},
          cache         : false,
          beforeSend    : function() {
            preLoadshow(true);
          },     
          success       : function (res) {
            preLoadshow(false);
            if(res.status=='success'){
              console.log(res.data);
              $(".queDataHideShow").show();
              $("#showQue").html(res.data);
                funcheck();
            }else{
              $(".queDataHideShow").hide();
              $("#showQue").html(res.data);
            }
          }
        });
        /*ajax*/
}//end function 
$(document).ready(function(){
  $('#select_questionAll').on('click',function(){
    if(this.checked){
      $('.checkbox_question').each(function(){
        this.checked = true;
      });
    }else{
      $('.checkbox_question').each(function(){
        this.checked = false;
      });
    }
  });   
});
function funcheck(){
  //alert($('.checkbox_question:checked').length +"=="+ $('.checkbox_question').length);
  if($('.checkbox_question:checked').length == $('.checkbox_question').length){
    $('#select_questionAll').prop('checked',true);
  }else{
    $('#select_questionAll').prop('checked',false);
  }
}