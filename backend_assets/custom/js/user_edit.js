
//Update
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

      rules : {
      firstName    : {
        required : true
      },
      actualFirstName    : {
        required : true
      },
      hindiFirstName    : {
        required : true
      },
      
      lastName    : {
        required : true
      },
      actualLastName    : {
        required : true
      },
       hindiLastName    : {
        required : true
      },
          
      parentName    : {
        required : true
      }, 
      actualParentName    : {
        required : true
      }, 
         hindiParentName    : {
        required : true
      }, 
       
      familyHeadName    : {
        required : true
      },
       actualFamilyHeadName    : {
        required : true
      },
       hindiFamilyHeadName    : {
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
        unionName    : {
          required : true
        },
        otherUnionName    : {
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
         actualFirstName : {
            required : Please_select_your_first_name
          },
          hindiFirstName : {
            required : Please_select_your_first_name
          },
          
          lastName : {
            required : Please_select_your_last_name
          }, 
          actualLastName : {
            required : Please_select_your_last_name
          }, 
          hindiLastName : {
            required : Please_select_your_last_name
          }, 
          
          parentName : {
            required : Please_select_your_father_name_husband_name
          },
           actualParentName : {
            required : Please_select_your_father_name_husband_name
          },
           hindiParentName : {
            required : Please_select_your_father_name_husband_name
          },
          
          familyHeadName : {
            required : Please_select_your_familyHeadName
          },
          actualFamilyHeadName : {
            required : Please_select_your_familyHeadName
          },
            hindiFamilyHeadName : {
            required : Please_select_your_familyHeadName
          },
          
          dob : {
            required : Please_select_your_date_of_birth
          }, 
          gender : {
            required : Please_select_your_gender
          },
           maritalStatus : {
            required : Please_select_your_marital_status
          }, 
           unionName : {
            required : Please_select_your_unionName
          },
            otherUnionName : {
            required : This_option_field_is_required
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
$("#unionName").change(function(){
  if($(this).val()=='OTHER'){
     $(".otherUnionName").css("display", "block");
  }else{
     $(".otherUnionName").css("display", "none");
  }
}); 

