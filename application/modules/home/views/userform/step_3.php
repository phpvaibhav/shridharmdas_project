 <div class="container">
    <div class="row no-gutter">
      <div class="col-md-12">
        <div class="login py-5">
            <div class="row">
              <div class="col-md-8 offset-col-2 mx-auto d-block login-page">
                <div class="login-page">
                    <h4 class="title"><?= lang('User_Form'); ?> (Step-3)</h4>
                    <p class="sub_title text-center"><!-- Already have an account? --> 
                    	<a class="color-litegreen" href="javascript:void(0);" type="button"  data-toggle="modal" data-target=".bd-example-modal-lg">फॉर्म को भरने हेतु निर्देश</a></p>
                </div>
                
                <form id="user-add-step-3" method="post" class="login-form-t" novalidate="novalidate" action="userStep3"  novalidate="novalidate" autocomplete="off">
                  <div class="row">
                      <div class="col-md-12">
                          <header>
                          <b><?= lang('other_Information'); ?></b>
                         <input type="hidden" name="userId" value="<?= $userId; ?>">

                          </header>
                          <hr>
                      </div>
                    
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="email"><?= lang('email'); ?></label>
                            <input type="email" id="email" class="form-control" placeholder="<?= lang('email'); ?>"  name="email" >
                          </div>
                      </div>


                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="bloodGroup"><?= lang('blood_group'); ?></label>
                          
                            <select name="bloodGroup" class="form-control" id="bloodGroup">
                            <option value="" selected="" disabled=""><?= lang('blood_group'); ?></option>
                            <option value="A+">A+</option>
                            <option value="O+">O+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="A-">A-</option>
                            <option value="O-">O-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                          
                            </select>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="education"><?= lang('Education'); ?></label>
                          
                          
                            <select id="education" name="education" class="form-control">
                              <option value="" selected="selected"><?= lang('Education'); ?></option>
                              <option value="Upto Higher secondary">Upto Higher secondary</option>
                              <option value="Graduate">Graduate</option>
                              <option value="Post Graduate">Post Graduate</option>
                              <option value="Phd">Phd</option>
                              <option value="Other">Other</option>

                            </select>
                          </div>
                      </div>

                  </div>


                 
                  <hr>
                
                  <button class="btn btn-outline  btn-block tl-btn-round-2 text-uppercase font-weight-bold mb-2" id="submit" type="submit"> <?= lang('Submit'); ?></button>

                  <div class="text-center">
                    <a class="small" href="<?= base_url();  ?>">Go To Home</a>
                  </div>

                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
  var Please_select_your_first_name ="<?= lang('Please_select_your_first_name');?>";
  var Please_select_your_last_name ="<?= lang('Please_select_your_last_name');?>";
  var Please_select_your_father_name_husband_name ="<?= lang('Please_select_your_father_name_husband_name');?>";
  var Please_select_your_date_of_birth ="<?= lang('Please_select_your_date_of_birth');?>";
  var Please_select_your_gender ="<?= lang('Please_select_your_gender');?>";
  var Please_select_your_marital_status ="<?= lang('Please_select_your_marital_status');?>";
  var Please_select_your_contact_number ="<?= lang('Please_select_your_contact_number');?>";
  var Please_select_your_aadhar_number ="<?= lang('Please_select_your_aadhar_number');?>";
  var Please_select_your_address ="<?= lang('Please_select_your_address');?>";
  var Please_select_your_city ="<?= lang('Please_select_your_city');?>";
  var Please_select_your_zip_code ="<?= lang('Please_select_your_zip_code');?>";
  var Please_select_your_tehsil ="<?= lang('Please_select_your_tehsil');?>";
  var Please_select_your_district ="<?= lang('Please_select_your_district');?>";
  var Good_job ="<?= lang('Good_job');?>";
  var Your_form_submitted_successfully ="<?= lang('Your_form_submitted_successfully');?>";
  var Please_select_your_front_image ="<?= lang('Please_select_your_front_image');?>";
  var Please_select_your_back_image ="<?= lang('Please_select_your_back_image');?>";
  var Please_select__image_type ="<?= lang('Please_select__image_type');?>";
    var Please_select_your_familyHeadName ="<?= lang('Please_select_your_familyHeadName');?>";
     var Please_enter_at_least_12_digit_aadhaar_number ="<?= lang('Please_enter_at_least_12_digit_aadhaar_number');?>";
  var Please_enter_at_least_10_digit_phone_number ="<?= lang('Please_enter_at_least_10_digit_phone_number');?>";
  var Please_select_your_unionName ="<?= lang('Please_select_your_unionName');?>";
</script>
