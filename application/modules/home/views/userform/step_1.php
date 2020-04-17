 <div class="container">
    <div class="row no-gutter">
      <!-- lang -->
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
      <div class="col-md-6 text-right">
         <div class="row">
            
              <div class="col-md-9 col-lg-10 lang-panding">
                <div class="radio d-inline mr-4">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="hindi"<?= ($this->session->userdata('site_lang')=='hindi') ?"checked='checked'":""; ?> data-url="<?php echo base_url().'home/switchLang/hindi/'.encoding(current_url()); ?>" onclick="checkLang(this);">
                  <label for="inlineRadio1">Hindi</label>
                </div>
                <div class="radio d-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="english" <?= ($this->session->userdata('site_lang')=='english') ?"checked='checked'":""; ?>  data-url="<?php echo base_url().'home/switchLang/english/'.encoding(current_url()); ?>" onclick="checkLang(this);">
                  <label for="inlineRadio2">English</label>
                </div>
              </div>
            </div>

          <!--   <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="hindi"<?= ($this->session->userdata('site_lang')=='hindi') ?"checked='checked'":""; ?> data-url="<?php echo base_url().'home/switchLang/hindi/'.encoding(current_url()); ?>" onclick="checkLang(this);" >
            <label class="form-check-label" for="inlineRadio1">Hindi</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="english" <?= ($this->session->userdata('site_lang')=='english') ?"checked='checked'":""; ?>  data-url="<?php echo base_url().'home/switchLang/english/'.encoding(current_url()); ?>" onclick="checkLang(this);">
            <label class="form-check-label" for="inlineRadio2">English</label>
            </div> -->
      </div>
      <!-- lang -->
      <div class="col-md-12">
        <div class="login py-5">
            <div class="row">
              <div class="col-md-8 offset-col-4 mx-auto d-block login-page">
                <div class="login-page">
                    <h4 class="title"><?= lang('User_Form'); ?> (Step-1)</h4>
                    <p class="sub_title text-center"><!-- Already have an account? --> 
                      <?php if($this->session->userdata('site_lang')=='hindi'){ ?>
                    	<a class="color-litegreen" href="javascript:void(0);" type="button"  data-toggle="modal" data-target=".bd-example-modal-lg">फॉर्म को भरने हेतु निर्देश </a>
                    <?php }else{ ?>
                      <a class="color-litegreen" href="javascript:void(0);" type="button"  data-toggle="modal" data-target=".bd-example-modal-lg">Instructions for filling the form </a>
                       <?php }?>

                    </p>
                </div>
               
                <form id="user-add-step-1" method="post" class="login-form-t" novalidate="novalidate" action="userStep1" novalidate="novalidate" autocomplete="off">
                <div class="row" >
                  <div class="col-md-12">
                      <div class="form-label-group">
                        <label for="fullName"><?= lang('First_name').'('.lang('Write_full_name').')'; ?><span>*</span></label>
                        <input type="text" id="fullName" class="form-control" placeholder="<?= lang('First_write_your_name_then_your_surname'); ?>"  name="fullName" maxlength="30" size="30">
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
                              <label for="dob"><?= lang('dob'); ?><span>*</span></label>
                              <input type="text" id="dob" class="form-control" placeholder="<?= lang('dob'); ?>"  name="dob" readonly="">
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-label-group">
                              <label for="parentName"><?= lang('parentName').'('.lang('Write_full_name').')'; ?><span>*</span></label>
                              <input type="text" id="parentName" class="form-control" placeholder="<?= lang('parentName'); ?>"  name="parentName" maxlength="30" size="30" >
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-label-group">
                              <label for="familyHeadName"><?= lang('familyHeadName').'('.lang('Write_full_name').')'; ?><span>*</span></label>
                              <input type="text" id="familyHeadName" class="form-control" placeholder="<?= lang('familyHeadName'); ?>"  name="familyHeadName" maxlength="30" size="30" >
                            </div>
                    </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-12">
                         <label for="contactNumber"><?= lang('Phone'); ?><span>*</span></label>
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
                         
                          <input type="text" id="contactNumber" class="form-control" placeholder="<?= lang('Phone'); ?>"  name="contactNumber" onkeyup="checkNumber();"   data-mask="999 999 9999" >
                        </div>
                      </div>
                    </div>
                      
                  </div>
                  <div class="col-md-6" id="otpDivId">
                         <div class="row">
                              <div class="col-md-12">
                                 <label for="contactNumber">
                                    OTP<span>*</span>
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
                      <label for="aadharNumber"><?= lang('Aadhar_number'); ?><span>*</span></label>
                    <!--   <input type="text" id="aadharNumber" class="form-control" placeholder="<?= lang('Aadhar_number'); ?>"  name="aadharNumber"  data-mask="9999 9999 9999">   -->
                    <input type="text" id="aadharNumber" class="form-control number-only" placeholder="<?= lang('Aadhar_number'); ?>"  name="aadharNumber" maxlength="12" size="12" >
                    </div>
                  </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-label-group">
                              <label for="frontImage">Front Aadhar Image<span>*</span></label>
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
                  <!--   <div class="col-md-6">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-label-group">
                              <label for="backImage">Back Aadhar Image<span>*</span></label>
                              <input type="file" class="form-control" id="backImage"  name="backImage"  data-id="2" onchange="readURL(this,2);"  accept="image/*"  style="border: 0px solid #ddd;" >
                              </div>
                             
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
                     -->
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
                  <button class="btn btn-outline btn-lg btn-block tl-btn-round-2 text-uppercase font-weight-bold mb-2" id="submit" type="submit">Next</button>
<!-- Register -->
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

