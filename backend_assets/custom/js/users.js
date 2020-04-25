/*createJobType*/
$("#user-add-form").validate({// Rules for form validation
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
/*    rules : {
      firstName    : {
        required : true
      }, 
      lastName    : {
        required : true
      },  
      dob    : {
        required : true
      }, 
      gender    : {
        required : true
      },  
      contactNumber    : {
        required : true
      },  
      aadharNumber    : {
        required : true
      }, 
      address    : {
        required : true
      },
    },
    // Messages for form validation
    messages : {
      firstname : {
            required : 'Please select your first name'
          },
          lastname : {
            required : 'Please select your last name'
          },
          dob : {
            required : 'Please select your date of birth'
          }, 
          gender : {
            required : 'Please select your gender'
          }, 
          contactNumber : {
            required : 'Please select your contact number'
          }, 
           aadharNumber : {
            required : 'Please select your aadhar number'
          },  
          address : {
            required : 'Please select your address'
          },
  },*/
      rules : {
      firstName    : {
        required : true
      }, 
      lastName    : {
        required : true
      },    parentName    : {
        required : true
      },  
      dob    : {
        required : true
      }, 
      gender    : {
        required : true
      },    
      maritalStatus    : {
        required : true
      },  
      contactNumber    : {
        required : true
      },  
     aadharNumber    : {
       required : true
     }, 
      address    : {
        required : true
      },  
      city    : {
        required : true
      },  
      zip_code    : {
        required : true
      },  
      tehsil    : {
        required : true
      },  
      district    : {
        required : true
      },
    },
    // Messages for form validation
    messages : {
      firstName : {
            required : Please_select_your_first_name
          },
          lastName : {
            required : Please_select_your_last_name
          }, 
          parentName : {
            required : Please_select_your_father_name_husband_name
          },
          dob : {
            required : Please_select_your_date_of_birth
          }, 
          gender : {
            required : Please_select_your_gender
          }, maritalStatus : {
            required : Please_select_your_marital_status
          }, 
          contactNumber : {
            required : Please_select_your_contact_number
          }, 
           aadharNumber : {
            required : Please_select_your_aadhar_number
          },  
          address : {
            required : Please_select_your_address
          },  
          city : {
            required : Please_select_your_city
          }, 
          zip_code : {
            required : Please_select_your_zip_code
          },
           tehsil : {
            required : Please_select_your_tehsil
          },
           district : {
            required : Please_select_your_district
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
                 // window.location.reload();
                 window.location = base_url+'users';
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
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:base_url+'home/countryToState',
                data:{'country':countryID},
                success:function(html){
                    $('#state').html(html);
                    $("#state option[value='"+localStorage.state+"']").prop('selected', true);
                    //$('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
           // $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    $('#ocountry').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:base_url+'home/countryToState',
                data:{'country':countryID},
                success:function(html){
                    $('#ostate').html(html);
                   // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#ostate').html('<option value="">Select country first</option>');
           // $('#city').html('<option value="">Select state first</option>'); 
        }
    });
      $("#country").trigger("change");
      $("#ocountry").trigger("change");
/*    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:base_url+'home/stateToCity',
                data:{'state':stateID},
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });*/
});

//rember me
$(function() {
  if (localStorage.add_chkbx && localStorage.add_chkbx != '') {
    $('#remember_Address').attr('checked', 'checked');
    $('#address').val(localStorage.address);
    $('#city').val(localStorage.city);
    $('#zip_code').val(localStorage.zip_code);
    $('#tehsil').val(localStorage.tehsil);
    $('#district').val(localStorage.district);
  } else {
    $('#remember_Address').removeAttr('checked');
    $('#address').val("");
    $('#city').val("");
    $('#zip_code').val("");
    $('#tehsil').val("");
    $('#district').val("");
  }
  $('#remember_Address').click(function() {
    if ($('#remember_Address').is(':checked')) {

      localStorage.address  = $('#address').val();
      localStorage.city     = $('#city').val();
      localStorage.zip_code     = $('#zip_code').val();
      localStorage.tehsil     = $('#tehsil').val();
      localStorage.district     = $('#district').val();
      localStorage.country     = $('#country').val();
      localStorage.state     = $('#state').val();
      localStorage.add_chkbx    = $('#remember_Address').val();

    } else {
      localStorage.address  = "";
      localStorage.city     =  "";
      localStorage.zip_code     =  "";
      localStorage.tehsil     =  "";
      localStorage.district     = "";
      localStorage.country     =  "";
      localStorage.state     =  "";
      localStorage.add_chkbx    =  "";
    }
  });
    $('#Same_Address').click(function() {
    if ($('#Same_Address').is(':checked')) {

          $('#oaddress').val($('#address').val());
          $('#ocity').val($('#city').val());
          $('#ozip_code').val($('#zip_code').val());
          $('#otehsil').val($('#tehsil').val());
          $('#odistrict').val($('#district').val());
          $("#ostate option[value='"+($('#state').val())+"']").prop('selected', true);
    } else {
    //gfgg
    }
  });    
    $('#Same_AddressA').click(function() {
    if ($('#Same_AddressA').is(':checked')) {

          $('#oaddressu').val($('#addressu').val());
          $('#ocityu').val($('#cityu').val());
          $('#ozip_codeu').val($('#zip_codeu').val());
          $('#otehsilu').val($('#tehsilu').val());
          $('#odistrictu').val($('#districtu').val());
          $("#ostateu option[value='"+($('#stateu').val())+"']").prop('selected', true);
    } else {
    //gfgg
    }
  });
});
//rember me


//Update
/*createJobType*/
$("#user-update-form").validate({// Rules for form validation
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
      firstName    : {
        required : true
      }, 
      lastName    : {
        required : true
      },    parentName    : {
        required : true
      },  
      dob    : {
        required : true
      }, 
      gender    : {
        required : true
      },    
      maritalStatus    : {
        required : true
      },  
      contactNumber    : {
        required : true
      },  
     aadharNumber    : {
       required : true
     }
    },
    // Messages for form validation
    messages : {
      firstName : {
            required : Please_select_your_first_name
          },
          lastName : {
            required : Please_select_your_last_name
          }, 
          parentName : {
            required : Please_select_your_father_name_husband_name
          },
          dob : {
            required : Please_select_your_date_of_birth
          }, 
          gender : {
            required : Please_select_your_gender
          }, maritalStatus : {
            required : Please_select_your_marital_status
          }, 
          contactNumber : {
            required : Please_select_your_contact_number
          }, 
           aadharNumber : {
            required : Please_select_your_aadhar_number
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
                // window.location = base_url+'users';
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


//Address 
$(document).ready(function(){
    $('#countryu').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:base_url+'home/countryToState',
                data:{'country':countryID},
                success:function(html){
                    $('#stateu').html(html);
                    $("#stateu option[value='"+$('#st').val()+"']").prop('selected', true);
                    //$('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#stateu').html('<option value="">Select country first</option>');
           // $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    $('#ocountryu').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:base_url+'home/countryToState',
                data:{'country':countryID},
                success:function(html){
                    $('#ostateu').html(html);
                      $("#ostateu option[value='"+$('#ost').val()+"']").prop('selected', true);
                   // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#ostateu').html('<option value="">Select country first</option>');
           // $('#city').html('<option value="">Select state first</option>'); 
        }
    });
      $("#countryu").trigger("change");
      $("#ocountryu").trigger("change");
/*    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:base_url+'home/stateToCity',
                data:{'state':stateID},
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });*/
});
//Address 


$("#user-address-form").validate({// Rules for form validation
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
    
      address    : {
        required : true
      },  
      city    : {
        required : true
      },  
      zip_code    : {
        required : true
      },  
      tehsil    : {
        required : true
      },  
      district    : {
        required : true
      },
    },
    // Messages for form validation
    messages : {
 
          address : {
            required : Please_select_your_address
          },  
          city : {
            required : Please_select_your_city
          }, 
          zip_code : {
            required : Please_select_your_zip_code
          },
           tehsil : {
            required : Please_select_your_tehsil
          },
           district : {
            required : Please_select_your_district
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
    $('#submitA').prop('disabled', true);
    $.ajax({
            type            : method,
            url             : url,
            headers         : headerData,
            data            : post_data,
            cache           : false,
            beforeSend      : function() {
              preLoadshow(true);
              $('#submitA').prop('disabled', true);  
            },     
            success         : function (res) {
              preLoadshow(false);
              setTimeout(function(){  $('#submitA').prop('disabled', false); },4000);
              if(res.status=='success'){
                toastr.success(res.message, 'Success', {timeOut: 3000});
                setTimeout(function(){ 
                  window.location.reload();
                /// window.location = base_url+'users';
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
