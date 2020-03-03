/*******************************************************************************/
/*listing driver_list */
var driver_list = $('#driver_list').DataTable({ 
                  "processing"  : true, //Feature control the processing indicator.
                  "serverSide"  : true, //Feature control DataTables' servermside processing mode.
                  "order"       : [], //Initial no order.
                  "lengthChange": false,
                  "oLanguage"   : {
                    "sEmptyTable" : '<center>No driver found</center>',
                    "sSearch"     : '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
                  },
                  "oLanguage"   : {
                    "sZeroRecords": '<center>No driver found</center>',
                    "sSearch"     : '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
                  },
                  initComplete  : function () {
                    $('.dataTables_filter input[type="search"]').css({ 'height': '32px'});
                  },   
                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url"       : base_url+"adminapi/drivers/driverList",
                      "type"      : "POST",
                      "dataType"  : "json",
                      "headers"   : { 'authToken':authToken},
                      "dataSrc"   : function (jsonData) {
                        return jsonData.data;
                      }
                  },
                //Set column definition initialisation properties.
                "columnDefs": [
                    { orderable: false, targets: -1 },     
                ]
              });
/*listing driver_list*/
//driver Add 
$("#driverAddUpdate").validate({// Rules for form validation
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
    fullName : {
      required : true
    },
    email : {
      required  : true,
      email     : true
    },
    contactNumber : {
      required : true,
    },
    password : {
      required  : true,
      minlength : 3,
      maxlength : 20
    }, 
    dob : {
      required : true,
    }, 
    doh : {
      required : true,
    }, 
    licenseNumber : {
      required : true,
    }, 
    expiryDate : {
      required : true,
    }, 
    emergencyPersonName : {
      required : true,
    },
    emergencyPersonNumber : {
      required : true,
    }, 
    address : {
      required : true,
    },
    latitude : {
      required : true,
    },
    longitude : {
      required : true,
    }
  },
  // Messages for form validation
  messages : {
    fullName : {
      required : 'Please enter your driver name'
    },
    email : {
      required : 'Please enter your email address',
      email    : 'Please enter a valid email address'
    },
    contactNumber : {
      required : 'Please enter your contact number'
    },
    password : {
      required : 'Please enter your password'
    },
    dob : {
      required : 'Please enter your date of birth'
    },
    doh : {
      required : 'Please enter your date of hire'
    },
    licenseNumber : {
      required : 'Please enter your driver license number'
    },
    expiryDate : {
      required : 'Please enter your driver license number expiration date'
    }, 
    emergencyPersonName : {
      required : 'Please enter your emergency contact person name'
    },
    emergencyPersonNumber : {
      required : 'Please enter your emergency contact person number'
    },
    address : {
      required : 'Please enter your address'
    }  
  },
  onfocusout: injectTrim($.validator.defaults.onfocusout),
  // Do not change code below
  errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
  }
});
// Validation
$(function() {   
  $(document).on('submit', "#driverAddUpdate", function (event) {
    toastr.clear();
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type            : "POST",
        url             : base_url+'adminapi/'+$(this).attr('action'),
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
});
//customer status      
function driverStatus(e){
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
              type        : "POST",
              url         : base_url+'adminapi/drivers/driverStatus',
              data        : {use:$(e).data('useid') },
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
                  $('#driver_list').DataTable().ajax.reload();
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
//driver Delete
function driverDelete(e){
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
              url         : base_url+'adminapi/drivers/driverDelete',
              data        : {use:$(e).data('useid') },
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
                  setTimeout(function(){  window.location = base_url+'drivers'; },3000);
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
var driverjobList = $('#driverjobList').DataTable({ 
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
                      "url"         : base_url+"adminapi/jobs/driverjobList",
                      "type"        : "POST",
                      "dataType"    : "json",
                      "headers"     : { 'authToken':authToken},
                      "data"        : { 'id':$('#driverjobList').data('id')},
                      "dataSrc"     : function (jsonData) {
                        return jsonData.data;
                      }
                    },
                    //Set column definition initialisation properties.
                    "columnDefs": [
                      { orderable   : false, 
                        targets     : -1 
                      }, 
                    ]
                });
/*listing customer_list*/