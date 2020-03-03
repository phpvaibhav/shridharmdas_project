/*listing job */
var jobtype_list = $('#jobtype_list').DataTable({ 
                    "processing"  : true, //Feature control the processing indicator.
                    "serverSide"  : true, //Feature control DataTables' servermside processing mode.
                    "order"       : [], //Initial no order.
                    "lengthChange": false,
                    "oLanguage"   : {
                      "sEmptyTable" : '<center>No job type found</center>',
                      "sSearch"     : '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
                    },
                    "oLanguage": {
                      "sZeroRecords"  : '<center>No job type found</center>',
                      "sSearch"       : '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
                    },
                    initComplete      : function () {
                      $('.dataTables_filter input[type="search"]').css({ 'height': '32px'});
                    },
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url"     : base_url+"adminapi/jobtype/jobtypeList",
                        "type"    : "POST",
                        "dataType": "json",
                        "headers" : { 'authToken':authToken},
                        "dataSrc" : function (jsonData) {
                          return jsonData.data;
                        }
                    },
                    //Set column definition initialisation properties.
                    "columnDefs": [
                      { orderable: false, targets: -1 },    
                    ]
                  });
        /*listing customer_list*/
//job status      
function jobTypeStatus(e){
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
              url           : base_url+'adminapi/jobtype/jobTypeStatus',
              data          : {   
                                use     : $(e).data('useid'),
                                status  : $(e).data('status') 
                              },
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
/***************************************************/
$(document).ready(function(){
 // Add new element
  $(".addPro").click(function(){
    // Finding total number of elements added
    var total_element = Number($(".elementPro").length);
    // last <div> with element class id
    var lastid        = $(".elementPro:last").attr("id");
    var split_id      = lastid.split("_");
    var nextindex     = Number(split_id[1]) + 1;
    var max           = 20;
    // Check total number elements
    if(total_element < max){
      // Adding new div container after last occurance of element class
      $(".elementPro:last").after('<div class="col-md-12 col-sm-12 col-lg-12 elementPro" id="divPro_'+ nextindex +'"></div>');
      $("#divPro_" + nextindex).append('<section class="col col-md-12"><label class="label"><strong>Question-'+ nextindex +'</strong><a href="javascript:void(0);" id="remove_' + nextindex + '" class="btn btn-default btn-circle btn-danger pull-right removePro"><i class="fa fa-times" aria-hidden="true"></i></a></label></section><section class="col col-md-12"><label class="label">Question<span class="error">*</span></label><label class="textarea"><textarea name="question_'+nextindex+'" placeholder="Question" maxlength="700" class="questionClass"></textarea><input type="hidden" name="questionId_' + nextindex + '" value="0"></label></section><section class="col col-md-12"><label class="select"><select name="questionType_'+nextindex+'" class="questionType'+nextindex+'" onchange="questionOpt(this)" id="que_' + nextindex + '"><option value="text" selected="">Text/Comment</option><option value="radio">Radio</option><option value="checkbox">Checkbox</option></select><i></i></label></section><section class="col col-md-12" id="questionOptions_' + nextindex + '"></section>');
    }else{
      toastr.error('Jobtype question max limit is 20.', 'Alert!', {timeOut: 4000});
    }
 });
 // Remove element
 $('.serviceContainer').on('click','.removePro',function(){
    var id          = this.id;
    var split_id    = id.split("_");
    var deleteindex = split_id[1];
    // Remove <div> with id
    $("#divPro_" + deleteindex).remove();
 }); 
  //change  
});
function questionOpt(e){
    var id          = e.id;
    var split_id_o  = id.split("_");
    var index_id    = split_id_o[1];
    $('#questionOptions_'+index_id).html("");
    var textCode    = '<div class="row"><section class="col col-6"><label class="input"><input type="text" name="option_'+index_id+'" placeholder="option"  maxlength="20" size="20" class="questionOptionClass"></label></section><section class="col col-6"><label class="input"><input type="text" name="option_1_'+index_id+'" placeholder="option"  maxlength="20" size="20" class="questionOptionClass"></label></section></div>';
    var val         =  e.value;
    switch(val) {
      case 'radio':
        $('#questionOptions_'+index_id).html(textCode);
      break;
      case 'checkbox':
        $('#questionOptions_'+index_id).html(textCode);
      break;
      default:
         $('#questionOptions_'+index_id).html("");
    }
}
/*createJobType*/
$("#createJobType").validate({// Rules for form validation
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
      jobType    : {
        required : true
      }
    },
    // Messages for form validation
    messages : {
      jobType     : {
        required  : 'Please enter your job type'
      }
  },
  // Ajax form submition
  submitHandler : function(form) {
    toastr.clear();
    var total_element = $(".elementPro").length;
    $('#total_element').val(total_element);
    $('#submit').prop('disabled', true);
    $.ajax({
            type            : "POST",
            url             : base_url+'adminapi/'+$(form).attr('action'),
            headers         : { 'authToken':authToken},
            data            : $(form).serialize(),
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
                setTimeout(function(){ window.location = base_url+'jobtype'; },4000);
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
jQuery.validator.addClassRules('questionClass', {
  required: true /*,
        other rules */
});
jQuery.validator.addClassRules('questionOptionClass', {
  required: true /*,
              other rules */
});   
/*createJobType*/
function jobTypeDelete(e){
   toastr.clear();
  swal({
      title                 : "Are you sure?",
      text                  :  $(e).data('message'),
      type                  : "warning",
      showCancelButton      : true,
      confirmButtonClass    : "btn-danger",
      confirmButtonText     : "Yes",
      cancelButtonText      : "No",
      closeOnConfirm        : true,
      closeOnCancel         : true,  
   // showLoaderOnConfirm: true
  },
  function(isConfirm) {
    if (isConfirm) {
      /*ajax*/
      $.ajax({
              type          : "POST",
              url           : base_url+'adminapi/jobtype/jobTypeDelete',
              data          : {use:$(e).data('useid')},
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
                  setTimeout(function(){  window.location = base_url+'jobtype'; },3000);
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