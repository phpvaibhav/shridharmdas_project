 <div class="container">
    <div class="row no-gutter">
      <div class="col-md-12">
        <div class="login py-5">
            <div class="row">
              <div class="col-md-8 offset-col-4 mx-auto d-block login-page">
                <div class="login-page">
                    <h4 class="title"><?= lang('User_Form'); ?> (Step-1)</h4>
                    <p class="sub_title text-center"><!-- Already have an account? --> 
                    	<a class="color-litegreen" href="javascript:void(0);" type="button"  data-toggle="modal" data-target=".bd-example-modal-lg">फॉर्म को भरने हेतु निर्देश </a></p>
                </div>
               
                <form id="user-add-step-preview" method="post" class="login-form-t" novalidate="novalidate" action="userStep1" novalidate="novalidate" autocomplete="off">
                <div class="row" >
                  <div class="col-md-12">
                      <div class="form-label-group">
                        <label for="fullName"><?= lang('First_name').'('.lang('Write_full_name').')'; ?></label>
                        <input type="text" id="fullName" class="form-control" placeholder="<?= lang('First_name'); ?>"  name="fullName" maxlength="30" size="30">
                      </div>
                  </div>
               <!--     <div class="col-md-6">
                      <div class="form-label-group">
                        <label for="firstName"><?= lang('First_name').'('.lang('Write_full_name').')'; ?></label>
                        <input type="text" id="firstName" class="form-control" placeholder="<?= lang('First_name'); ?>"  name="firstName">
                      </div>
                  </div>
                   -->
                <!--   <div class="col-md-6">
                 
                    <div class="form-label-group">
                      <label for="lastName"><?= lang('Last_name'); ?></label>
                      <input type="text" id="lastName" class="form-control" placeholder="<?= lang('Last_name'); ?>"  name="lastName">
                    </div>
                  </div> -->
                  <div class="col-md-6">
                            <div class="form-label-group">
                              <label for="dob"><?= lang('dob'); ?></label>
                              <input type="text" id="dob" class="form-control" placeholder="<?= lang('dob'); ?>"  name="dob" readonly="">
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-label-group">
                              <label for="parentName"><?= lang('parentName').'('.lang('Write_full_name').')'; ?></label>
                              <input type="text" id="parentName" class="form-control" placeholder="<?= lang('parentName'); ?>"  name="parentName" maxlength="30" size="30" >
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-label-group">
                              <label for="familyHeadName"><?= lang('familyHeadName').'('.lang('Write_full_name').')'; ?></label>
                              <input type="text" id="familyHeadName" class="form-control" placeholder="<?= lang('familyHeadName'); ?>"  name="familyHeadName" maxlength="30" size="30" >
                            </div>
                    </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-12">
                         <label for="contactNumber"><?= lang('Phone'); ?></label>
                      </div>
                      <div class="col-md-4">
                         <div class="form-label-group">
                           
                          
                              <select name="countrycode"  class="form-control js-example-basic-single " id="countrycode">
                              <?php if(!empty($countryCodes)):
                              foreach ($countryCodes as $kc => $code) { 
                                
                                ?>
                              <option value="<?= '+'.$code['code']; ?>" <?= ($kc=='IN')?"selected='selected'":""; ?>><?=  "(+".$code["code"].") ".$kc; ?></option>
                              <?php } endif; ?>

                              </select>
                          </div>
                      </div>
                      <div class="col-md-8">
                          <div class="form-label-group">
                         
                          <input type="text" id="contactNumber" class="form-control" placeholder="<?= lang('Phone'); ?>"  name="contactNumber" onkeyup="checkNumber();"   data-mask="999 999 9999">
                        </div>
                      </div>
                    </div>
                      
                  </div>
                  <div class="col-md-6" id="otpDivId">
                         <div class="row">
                              <div class="col-md-12">
                                 <label for="contactNumber">
                                    OTP
                                  <input type="hidden" id="mobileVerify" name="mobileVerify" value="0">
                                 </label>
                              </div>
                      
                              <div class="col-md-12">
                                 <div class="form-label-group">
                                    <input type="text" class="form-control" id="otpnumber" required="" placeholder="Enter OTP" name="otpnumber" data-mask="9  9  9  9" onkeyup="checkOtp(this);" >
                                    <p class="countdown"></p>
                                    <p id="Resendotp" class="text-right">
                                    <a href="javascript:void(0);" onclick="checkReNumber();">Resend OTP</a></span>
                                    </p>
                                      
                                 </div>
                              </div>
                            
                              
                           </div>
                  </div>
                  <div class="col-md-6">
                 
                    <div class="form-label-group">
                      <label for="Whose_contact_number"><?= lang('Whose_contact_number'); ?></label>
                      <select id="Whose_contact_number" name="whose_contact_number" class="form-control">
                        <option value="Self" selected="selected">Self</option>
                        <option value="Husband">Husband</option>
                        <option value="Wife">Wife</option>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Brother">Brother</option>
                        <option value="Sister">Sister</option>
                        <option value="Son">Son</option>
                        <option value="Daughter">Daughter</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                 
                    <div class="form-label-group">
                      <label for="aadharNumber"><?= lang('Aadhar_number'); ?></label>
                      <input type="text" id="aadharNumber" class="form-control" placeholder="<?= lang('Aadhar_number'); ?>"  name="aadharNumber"  data-mask="9999 9999 9999">
                    </div>
                  </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-label-group">
                              <label for="frontImage">Front Aadhar Image</label>
                              <input type="file" class="form-control" id="frontImage"  name="frontImage" data-id="1" onchange="readURL(this,1);" accept="image/*" style="border: 0px solid #ddd;" >
                              </div>
                          </div>
                          <div class="col-md-12">
                                <div class="img-shop-wrapper tl-shop-single">
                                <div class="tl-img-shop">
                                <img src="https://via.placeholder.com/640x360" alt="image" class="mx-auto image-fluid d-block" id="blah_1">
                                </div>
                                </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-label-group">
                              <label for="backImage">Back Aadhar Image</label>
                              <input type="file" class="form-control" id="backImage"  name="backImage"  data-id="2" onchange="readURL(this,2);"  accept="image/*"  style="border: 0px solid #ddd;" >
                              </div>
                              <!-- onchange="ResizeImage('backImage','blah_2');" -->
                          </div>
                          <div class="col-md-12">
                                <div class="img-shop-wrapper tl-shop-single">
                                <div class="tl-img-shop">
                                <img src="https://via.placeholder.com/640x360" alt="image" class="mx-auto image-fluid d-block" id="blah_2">
                                </div>
                                </div>
                          </div>
                      </div>
                    </div>
                    
                </div>



                  

                <!--   <div class="form-label-group">
                    <label for="inputEmail">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Your Email address" required="">
                  </div>

                  <div class="form-label-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                  </div>

                  <div class="form-label-group">
                    <label for="inputPasswordRepeat">Re-type Password</label>
                    <input type="password" id="inputPasswordRepeat" class="form-control" placeholder="Password" required="">
                  </div> -->

              <!--     <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">I Agree With <a href="#">Tearms &amp; Conditions</a></label>
                  </div> -->
                  <button class="btn btn-outline btn-lg btn-block tl-btn-round-2 text-uppercase font-weight-bold mb-2" id="submit" type="submit">Register</button>

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
  var Please_select_your_full_name ="<?= lang('Please_select_your_full_name');?>";
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
  var This_option_field_is_required ="<?= lang('This_option_field_is_required');?>";
</script>
