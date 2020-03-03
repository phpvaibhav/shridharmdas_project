//sign up
$("#customerAddUpdate").validate({// Rules for form validation
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
    address : {
      required : true,
    },
    latitude : {
      required : true,
    },
    longitude : {
      required : true,
    }, 
    address1 : {
      required : true,
    },
    latitude1 : {
      required : true,
    },
    longitude1 : {
      required : true,
    },
  },
  // Messages for form validation
  messages : {
    fullName : {
      required : 'Please enter your customer name'
    },
    email : {
      required  : 'Please enter your email address',
      email     : 'Please enter a valid email address'
    },
    contactNumber : {
      required  : 'Please enter your contact number'
    },
    password : {
      required : 'Please enter your password'
    },
    address : {
      required : 'Please enter your address'
    },
    address1 : {
      required : 'Please enter your billing address'
    }
  },
  // Ajax form submition
  submitHandler : function(form) {
    toastr.clear();
    $('#submit').prop('disabled', true);
    $.ajax({
      type    : "POST",
      url     : base_url+'adminapi/'+$(form).attr('action'),
      headers : { 'authToken':authToken},
      data    : $(form).serialize(),
      cache   : false,
      beforeSend: function() {
        preLoadshow(true);
        $('#submit').prop('disabled', true);  
      },     
      success : function (res) {
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
});
/*listing customer_list */
var customer_list = $('#customer_list').DataTable({ 
                      "processing"    : true, //Feature control the processing indicator.
                      "serverSide"    : true, //Feature control DataTables' servermside processing mode.
                      "order"         : [], //Initial no order.
                      "lengthChange"  : false,
                      "oLanguage"     : {
                          "sEmptyTable" : '<center>No customer found</center>',
                          "sSearch"     : '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
                      },
                      "oLanguage": {
                        "sZeroRecords"  : '<center>No customer found</center>',
                        "sSearch"       : '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
                      },
                      initComplete: function () {
                        $('.dataTables_filter input[type="search"]').css({ 'height': '32px'});
                      },
                      // Load data for the table's content from an Ajax source
                      "ajax": {
                          "url"       : base_url+"adminapi/customers/customerList",
                          "type"      : "POST",
                          "dataType"  : "json",
                          "headers"   : { 'authToken':authToken},
                          "dataSrc"   : function (jsonData) {
                            return jsonData.data;
                          }
                      },
                      //Set column definition initialisation properties.
                      "columnDefs": [
                        { orderable   : false, targets: -1 },      
                      ]
                    });
/*listing customer_list*/
//customer status      
function customerStatus(e){
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
              type      : "POST",
              url       : base_url+'adminapi/customers/customerStatus',
              data      : {use:$(e).data('useid') },
              headers   : { 'authToken':authToken},
              cache     : false,
              beforeSend: function() {
                preLoadshow(true);
              },     
              success   : function (res) {
                preLoadshow(false);
                if(res.status=='success'){
                  toastr.success(res.message, 'Success', {timeOut: 3000});
                  //  swal("Success", "Your process  has been successfully done.", "success");
                  $('#customer_list').DataTable().ajax.reload();
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
//customer Credit hold
function creditHoldStatus(e){
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
              url         : base_url+'adminapi/customers/creditHoldStatus',
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
                    setTimeout(function(){ window.location.reload(); },3000);
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
//customer Delete
function customerDelete(e){
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
          $(e).prop('disabled', true);
          /*ajax*/
          $.ajax({
                  type      : "POST",
                  url       : base_url+'adminapi/customers/customerDelete',
                  data      : {use:$(e).data('useid') },
                  headers   : { 'authToken':authToken},
                  cache     : false,
                  beforeSend: function() {
                    preLoadshow(true);
                  },     
                  success   : function (res) {
                    preLoadshow(false);
                    $(e).prop('disabled', false);
                    if(res.status=='success'){
                      toastr.success(res.message, 'Success', {timeOut: 3000});
                      //  swal("Success", "Your process  has been successfully done.", "success");
                      setTimeout(function(){  window.location = base_url+'customers'; },3000);
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
/*listing job */
var customerjob_list = $('#customnerjobList').DataTable({ 
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
                  "url"     : base_url+"adminapi/jobs/customnerjobList",
                  "type"    : "POST",
                  "dataType": "json",
                  "headers" : { 'authToken':authToken},
                  "data"    : { 'id':$('#customnerjobList').data('id')},
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