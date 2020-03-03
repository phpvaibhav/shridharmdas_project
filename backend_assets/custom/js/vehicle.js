/*******************************************************/
$("#vehicleAddUpdate").validate({// Rules for form validation
  errorClass    : errorClass,
  errorElement  : errorElement,
  highlight     : function(element) {
    $(element).parent().removeClass('state-success').addClass("state-error");
    $(element).removeClass('valid');
  },
  unhighlight   : function(element) {
    $(element).parent().removeClass("state-error").addClass('state-success');
    $(element).addClass('valid');
  },
  rules : {
    year : {
      required : true
    },
    model : {
      required : true
    },
    plate : {
      required : true
    },
    vin : {
      required : true
    },
    manufacturer : {
      required : true
    },
    color : {
      required : true
    },
    state : {
      required : true
    }
  },
  // Messages for form validation
  messages : {
    year : {
      required : 'Please enter vehicle year'
    },
    model : {
      required : 'Please enter vehicle model'
    },
    plate : {
      required : 'Please enter vehicle plate'
    },
    vin : {
      required : 'Please enter vehicle vin'
    }, 
    manufacturer : {
      required : 'Please enter vehicle manufacturer'
    },
    color : {
      required : 'Please enter vehicle color'
    },
    state : {
      required : 'Please enter vehicle state'
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
          setTimeout(function(){window.location.reload(); },4000);
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
});//end validation
/*listing vehilce_list */
var vehilce_list = $('#vehilce_list').DataTable({ 
                    "processing"  : true, //Feature control the processing indicator.
                    "serverSide"  : true, //Feature control DataTables' servermside processing mode.
                    "order"       : [], //Initial no order.
                    "lengthChange": false,
                    "oLanguage"   : {
                      "sEmptyTable" : '<center>No vehilce found</center>',
                      "sSearch"     : '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
                    },
                    "oLanguage"   : {
                      "sZeroRecords"  : '<center>No vehilce found</center>',
                      "sSearch"       : '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
                    },
                    initComplete  : function () {
                      $('.dataTables_filter input[type="search"]').css({ 'height': '32px'});
                    },
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                      "url"       : base_url+"adminapi/vehicles/vehilceList",
                      "type"      : "POST",
                      "dataType"  : "json",
                      "headers"   : { 'authToken':authToken},
                      "dataSrc"   : function (jsonData) {
                          return jsonData.data;
                      }
                    },
                    //Set column definition initialisation properties.
                    "columnDefs": [
                      { orderable : false, 
                        targets   : -1 
                      },              
                    ]
                  });
/*listing vehilce_list*/
function vehilceStatus(e){
   toastr.clear();
  swal({
    title               : "Are you sure?",
    text                :  $(e).data('message'),
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
              type        : "POST",
              url         : base_url+'adminapi/vehicles/vehilceStatus',
              data        : { use:$(e).data('useid') },
              headers     : { 'authToken':authToken},
              cache       : false,
              beforeSend  : function() {
                preLoadshow(true);
              },     
              success     : function (res) {
                preLoadshow(false);
                if(res.status=='success'){ 
                  toastr.success(res.message, 'Success', {timeOut: 3000});
                  //  swal("Success", "Your process  has been successfully done.", "success");
                  $('#vehilce_list').DataTable().ajax.reload();
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
}//end status
//vehicleDelete Delete
function vehicleDelete(e){
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
      $(e).prop('disabled', true);
      /*ajax*/
      $.ajax({
              type        : "POST",
              url         : base_url+'adminapi/vehicles/vehicleDelete',
              data        : {use:$(e).data('useid') },
              headers     : { 'authToken':authToken },
              cache       : false,
              beforeSend  : function() {
                preLoadshow(true);
              },     
              success     : function (res) {
                preLoadshow(false);
                $(e).prop('disabled', false);
                if(res.status=='success'){ 
                  toastr.success(res.message, 'Success', {timeOut: 3000});
                  //  swal("Success", "Your process  has been successfully done.", "success");
                  setTimeout(function(){  window.location = base_url+'vehicles'; },3000);
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
}// end delete
//Assign Driver
//sign up
$("#vehicleAssignDriver").validate({// Rules for form validation
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
    driverId : {
      required : true
    },
    assignDate : {
      required : true,
    }
  },
  // Messages for form validation
  messages : {
    driverId : {
      required : 'Please enter driver'
    },
    assignDate : {
      required : 'Please enter  assign date', 
    }
  },
  // Ajax form submition
  submitHandler : function(form) {
    toastr.clear();
    $('#submitA').prop('disabled', true);
    $.ajax({
            type          : "POST",
            url           : base_url+'adminapi/'+$(form).attr('action'),
            headers       : { 'authToken':authToken},
            data          : $(form).serialize(),
            cache         : false,
            beforeSend    : function() {
              preLoadshow(true);
              $('#submitA').prop('disabled', true);  
            },     
            success       : function (res) {
              preLoadshow(false);
              setTimeout(function(){  $('#submitA').prop('disabled', false); },4000);
              if(res.status=='success'){
                toastr.success(res.message, 'Success', {timeOut: 3000});
                setTimeout(function(){window.location.reload(); },4000);
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
});//form validater
//driver Add
$("#addHistoryA").validate({// Rules for form validation
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
    date : {
      required : true
    },
    type : {
      required : true
    },
    attachment : {
      //required : true
        required: {
                depends: function(element) {
                  return (($('#historyId').val() == '' || 
                $('#historyId').val() == '0'));
                }
              }
    }
  },
  // Messages for form validation
  messages : {
    type : {
      required : 'Please enter your type'
    },
    date : {
      required : 'Please enter your date'
    },
    attachment : {
      required : 'Please enter your attachment'
    } 
  },
   onfocusout: injectTrim($.validator.defaults.onfocusout),
  // Do not change code below
  errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
  }
});
$(function() {  
  $(document).on('submit', "#addHistoryA", function (event) {
    toastr.clear();
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
            type        : "POST",
            url         : base_url+'adminapi/'+$(this).attr('action'),
            headers     : { 'authToken': authToken },
            data        : formData, //only input
            processData : false,
            contentType : false,
            cache       : false,
            beforeSend  : function () {
              preLoadshow(true);
              $('#submiH').prop('disabled', true);
            },
            success     : function (res) {
              preLoadshow(false);
              setTimeout(function(){  $('#submitH').prop('disabled', false); },4000);
              if(res.status=='success'){
                toastr.success(res.message, 'Success', {timeOut: 3000});
                setTimeout(function(){window.location.reload(); },4000);
              }else{
                toastr.error(res.message, 'Alert!', {timeOut: 4000});
              }
            }
          });
  });
  //fromsubmit
});//end history
/*listing vehilceHistory_list */
var vehilce_list = $('#vehilceHistory_list').DataTable({ 
                    "processing"    : true, //Feature control the processing indicator.
                    "serverSide"    : true, //Feature control DataTables' servermside processing mode.
                    "order"         : [], //Initial no order.
                    "lengthChange"  : false,
                    "oLanguage"     : {
                      "sEmptyTable" : '<center>No history found</center>',
                      "sSearch"     : '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
                    },
                    "oLanguage"     : {
                      "sZeroRecords"  : '<center>No history found</center>',
                      "sSearch"       : '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
                    },
                    initComplete: function () {
                      $('.dataTables_filter input[type="search"]').css({ 'height': '32px'});
                    },
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                      "url"     : base_url+"adminapi/vehicles/vehilceHistoryList",
                      "type"    : "POST",
                      "dataType": "json",
                      //"data" : {vid: $('#v_detail').data('vid')}.
                      "data"    : { 
                                    'vid':$('#v_detail').data('vid')
                                  },
                      "headers" : { 
                                    'authToken':authToken
                                  },
                      "dataSrc" : function (jsonData) {
                        return jsonData.data;
                      }
                    },
                    //Set column definition initialisation properties.
                    "columnDefs": [
                        { 
                          orderable : false, 
                          targets   : -1 
                        },     
                    ]
                  });
/*listing vehilceHistory_list*/
//vehilceHistoryDelete Delete
function vehilceHistoryDelete(e){
  toastr.clear();
  swal({
    title             : "Are you sure?",
    text              : $(e).data('message'),
    type              : "warning",
    showCancelButton  : true,
    confirmButtonClass: "btn-danger",
    confirmButtonText : "Yes",
    cancelButtonText  : "No",
    closeOnConfirm    : true,
    closeOnCancel     : true,
    // showLoaderOnConfirm: true
  },
  function(isConfirm) {
    if (isConfirm) {
      $(e).prop('disabled', true);
      /*ajax*/
      $.ajax({
              type        : "POST",
              url         : base_url+'adminapi/vehicles/vehilceHistoryDelete',
              data        : {use:$(e).data('vhid') },
              headers     : { 'authToken':authToken},
              cache       : false,
              beforeSend  : function() {
                preLoadshow(true);
              },     
              success     : function (res) {
                preLoadshow(false);
                $(e).prop('disabled', false);
                if(res.status=='success'){    
                  toastr.success(res.message, 'Success', {timeOut: 3000});
                  //  swal("Success", "Your process  has been successfully done.", "success");
                  setTimeout(function(){window.location.reload(); },3000);
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
}//end history delete
/*histroy update*/
function openHistory(){
  $('#addHistoryA').trigger("reset");
  $('#addHistoryA select').trigger("change");
  $('#privew + embed').remove();
  $('#privew + img').remove();
  $('#privew').after('');
  $('#vhtype option[value=0]').attr('selected','selected');
  $('#historyId').val(0);
  $('#hvehicleId').val($('#v_detail').data('vid'));
  $('#addHistory').modal('show');
}//End open history
function editHistory(e){
  var historyId   = $(e).data('hid');
  var vjobTypeId  = $(e).data('typeid');
  var date        = $(e).data('dateid');
  var attachment  = $(e).data('attachmentid');
  var filetype    = $(e).data('filetypeid');
  $('#vhtype option[value='+vjobTypeId+']').attr('selected','selected');
  $('#hdate').val(date);
  $('#hAttachment').val(attachment);
  $('#historyId').val(historyId);
  $('#privew + embed').remove();
  $('#privew + img').remove();
  $('#privew').after('');
  if(filetype=='image'){
    $('#privew').after('<img src="'+attachment+'" width="400" height="300">');
  }else{
    $('#privew').after('<img src="'+base_url+'backend_assets/img/attachment/attachment.jpeg" width="400" height="300">');
  }  
  $('#addHistory').modal('show');  
}//end edit history function