 <div class="container">
    <div class="row no-gutter">
      <!-- lang -->
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
      <div class="col-md-6 text-right">
         <div class="row">
              <div class="col-md-9 col-lg-10 lang-panding">
                <form id="my_radio_box">
                <div class="radio d-inline mr-4">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="<?php echo base_url().'home/switchLang/hindi/'.encoding(current_url()); ?>"<?= ($this->session->userdata('site_lang')=='hindi') ?"checked='checked'":""; ?> data-url="<?php echo base_url().'home/switchLang/hindi/'.encoding(current_url()); ?>">
                  <label for="inlineRadio1">Hindi</label>
                </div>
                <div class="radio d-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="<?php echo base_url().'home/switchLang/english/'.encoding(current_url()); ?>" <?= ($this->session->userdata('site_lang')=='english') ?"checked='checked'":""; ?>  data-url="<?php echo base_url().'home/switchLang/english/'.encoding(current_url()); ?>" >
                  <label for="inlineRadio2">English</label>
                </div>
              </form>
              </div>
            </div>
      </div>
      <!-- lang -->
      <div class="col-md-12">
        <div class="login py-5">
       <!--     <a href="javascript:void(0);" onclick="TestSwl();">Test check</a> -->
            <div class="row">
              <div class="col-md-8 offset-col-4 mx-auto d-block login-page">
                <div class="login-page">
                   <!--  <p class="sub_title"><b>Note:</b> जनगणना  भरने  के लिए   दिए हुई है|</p> -->
                    <h4 class="title text-center"><?= lang('User_Form'); ?></h4>
                    
                    <p class="sub_title text-center"><!-- Already have an account? --> 
                      <?php if($this->session->userdata('site_lang')=='hindi'){ ?>
                       
                    	<a class="color-litegreen color-nirdes" href="javascript:void(0);" type="button"  data-toggle="modal" data-target=".bd-example-modal-lg" style="font-weight: 700;color: blue;">फॉर्म को भरने हेतु निर्देश </a>
                    <?php }else{ ?>
             
                      <a class="color-litegreen color-nirdes" href="javascript:void(0);" type="button"  data-toggle="modal" data-target=".bd-example-modal-lg" style="font-weight: 700;color: blue;">Instructions for filling the form </a>
                       <?php }?>

                    </p>
                </div>
               
               
                <form id="user-add-step-1" method="post" class="login-form-t" novalidate="novalidate" action="userStep1" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
                <div class="row" >
                  <div class="col-md-12">
                          <header>
                          <b><?= lang('basic_Information'); ?></b>
                        
                          </header>
                          <hr>
                      </div>
                  <div class="col-md-12">
                      <div class="form-label-group">
                        <label for="fullName"><?= lang('Full_name').'('.lang('Write_full_name').')'; ?><span>*</span></label>
                        <input type="text" id="fullName" class="form-control" placeholder="<?= lang('First_write_your_name_then_your_surname'); ?>"  name="fullName" maxlength="30" size="30">
                      </div>
                  </div>
             
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
                             <input type="checkbox"  id="remFH" name="rememberFH" value="FH" >  <label for="remFH">Remember <?= lang('familyHeadName'); ?></label>
                    </div>
                                         <div class="col-md-6">
                         <div class="form-label-group">
                           
                              <label for="unionName"><?= lang('Union').' '.lang('Name'); ?><span>*</span></label>
                              <select name="unionName"  class="form-control js-example-basic-single "  id="unionName"  >
                              <?php if(!empty($unionList)):?>
                               <option value="" selected="" disabled=""><?= lang('Union').' '.lang('Name'); ?></option>
                             <?php foreach ($unionList as $kc => $union) { ?>
                                <option value="<?= $union->sanghId; ?>" data-sanghname="<?=  $union->name; ?>" ><?=  $union->name; ?></option>
                              <?php } endif; ?>

                              </select>
                              <small>अगर आपके श्री संघ का नाम लिस्ट मैं नहीं है तो आप  other ऑप्शन को सर्च करे  एवं उसपर क्लिक करे , आप अपने श्री संघ का नाम डाल सकेंगे । </small>
                          </div>
                      </div>
                      <div class="col-md-6 otherUnionName" style="display: none">
                 
                    <div class="form-label-group">
                      <label for="otherUnionName"><?= lang('otherUnionName'); ?><span>*</span> </label>
                      <input type="text" id="otherUnionName" class="form-control" placeholder="<?= lang('otherUnionName'); ?>"  name="otherUnionName">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-12">
                         <label for="contactNumber"><?= lang('Phone'); ?><span>*</span> <span class="mob_otp"></span></label>
                      </div>
                   
                      <div class="col-md-12">
                          <div class="form-label-group">
                         <input type="hidden"  name="countrycode"  class="form-control" id="countrycode" value="+91">
                          <input type="text" id="contactNumber" class="form-control" placeholder="<?= lang('Phone'); ?>"  name="contactNumber" onkeyup="checkNumber();"   data-mask="999 999 9999" >
                        </div>
                      </div>
                    </div>
                      
                  </div>
                  <div class="col-md-6" id="otpDivId">
                         <div class="row">
                              <div class="col-md-12">
                                 <label for="contactNumber">
                                    OTP<span>*</span> <span class="mob_reotp"></span>
                                  <input type="hidden" id="mobileVerify" name="mobileVerify" value="0">
                                 </label>
                              </div>
                      
                              <div class="col-md-12">
                                 <div class="form-label-group">
                                    <input type="text" class="form-control" id="otpnumber" required="" placeholder="Enter OTP" name="otpnumber" data-mask="9  9  9  9" onkeyup="checkOtp(this);" >
                                    <p class="countdown"></p>
                                    <p id="Resendotp" class="text-right">
                                    <a href="javascript:void(0);" onclick="checkReNumber();">Resend OTP</a>
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


                </div>

                <div class="otpTodisplay" style="display: none">
                <div class="row">
                   <div class="col-md-12">
                          <header>
                          <b><?= lang('other_Information'); ?></b>
                        
                          </header>
                          <hr>
                      </div>


                     <div class="col-md-6">
                          <div class="form-label-group">
                              <label for="gender"><?= lang('Select_Gender'); ?><span>*</span></label>

                              <select name="gender" class="form-control" id="gender">
                              <option value="" selected="" disabled=""><?= lang('Select_Gender'); ?></option>
                              <option value="Male"><?= lang('Male');?></option>
                              <option value="Female"><?= lang('Female');?></option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="maritalStatus"><?= lang('Marital_Status'); ?><span>*</span></label>
                          
                            <select name="maritalStatus" class="form-control" id="maritalStatus">
                            <option value="" selected="" disabled=""><?= lang('Marital_Status'); ?></option>
                            <option value="Married"><?= lang('married');?></option>
                            <option value="Unmarried"><?= lang('unmarried');?></option>
                            <option value="Divorced"><?= lang('divorced');?></option>
                            <option value="Other"><?= lang('other');?></option>
                            </select>
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
                            <option value="Unknown">Unknown</option>
                          
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
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="profession"><?= lang('Profession'); ?><span>*</span></label>
                              <select name="profession" class="form-control" onchange="professionCheck(this);">
                                <option value="" selected="" disabled=""><?= lang('Profession'); ?></option>
                                <option value="profession">Profession</option>
                                <option value="job">Job</option>
                                <option value="business">Business</option>
                                <option value="house wife">House wife</option>
                                <option value="student">Student</option>
                                <option value="retired">Retired</option>
                                <option value="other">Other</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6" id="subProfessionA" style="display: none">
                          <div class="subProfessionA"></div>
                        
                      </div>
                      <div class="col-md-6" id="otherProfessionA" style="display: none">
                          <div class="otherProfessionA"></div>
                        
                      </div>

                      <div class="col-md-12">
                          <div class="form-label-group" id="idhhhh">
                            <label><?= lang('Religious_knowledge'); ?><span>*</span></label>

                              <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input limitCheckBox" value="णमोकार मंत्र एवं  प्राथमिक ज्ञान" id="customCheck1" name="religiousKnowledge[]" data-limit="1" checked="checked">
                                <label class="custom-control-label" for="customCheck1" >णमोकार मंत्र एवं  प्राथमिक ज्ञान</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input limitCheckBox" value="सामयिक" name="religiousKnowledge[]" id="customCheck2" data-limit="2">
                                <label class="custom-control-label" for="customCheck2" >सामयिक</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input limitCheckBox" value="प्रतिक्रमण" name="religiousKnowledge[]" id="customCheck3" data-limit="3">
                                <label class="custom-control-label" for="customCheck3" >प्रतिक्रमण </label>
                              </div>
                              <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input limitCheckBox" value="थोकड़ो का ज्ञान" name="religiousKnowledge[]" id="customCheck4" data-limit="4">
                                <label class="custom-control-label" for="customCheck4" >थोकड़ो का ज्ञान</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input limitCheckBox" value="स्वाध्याय का ज्ञान" name="religiousKnowledge[]" id="customCheck5" data-limit="5">
                                <label class="custom-control-label" for="customCheck5" >स्वाध्याय का ज्ञान</label>
                              </div>

                          </div>
                          <span id="check-d-error" for="idhhhh" class="invalid"></span>
                      </div>
                </div>
                </div>
                <div class="otpTodisplay" style="display: none">
                <div class="row" >
                      <div class="col-md-12">
                          <header>
                          <b><?= lang('home_address'); ?> <span class="add_"></span></b>
                          </header>
                          <hr>
                      </div>
                       <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="zip_code"><?= lang('zip_code'); ?><span>*</span></label>
                          
                           <input type="text" class="form-control number-only" name="zip_code" maxlength="6" size="6" id="zip_code" placeholder="<?= lang('zip_code'); ?>" onkeyup="zipCodetoData(this);" data-set="";   >
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="address"><?= lang('Address'); ?><span>*</span></label>
                          
                           <input type="text" name="address" class="form-control" id="address" placeholder="<?= lang('Address'); ?>" maxlength="100" size="100" >
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="postName"><?= lang('postName'); ?><span>*</span></label>
                            <select  class="form-control" name="postName" id="postName">
                              <option value="0" selected="" disabled=""><?= lang('postName'); ?></option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="city"><?= lang('City'); ?><span>*</span></label>
                          
                           <input type="text" class="form-control" name="city" id="city" placeholder="<?= lang('City'); ?>" maxlength="30" size="30">
                          </div>
                      </div>
                   
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="tehsil"><?= lang('Tehsil'); ?><span>*</span></label>
                          
                           <input type="text" class="form-control" name="tehsil" id="tehsil" placeholder="<?= lang('Tehsil'); ?>" maxlength="30" size="30">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="district"><?= lang('District'); ?><span>*</span></label>
                          
                           <input type="text" class="form-control" name="district" id="district" placeholder="<?= lang('District'); ?>" maxlength="30" size="30">
                          </div>
                      </div>
                       <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="state"><?= lang('State'); ?><span>*</span></label>
                              <input type="text" class="form-control" name="state" id="state" placeholder="<?= lang('State'); ?>" maxlength="30" size="30">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="country"><?= lang('Country'); ?><span>*</span></label>
                          
                           <input type="text" class="form-control" name="country"  id="country" placeholder="<?= lang('Country'); ?>" value="India" maxlength="30" size="30">
                             
                          </div>
                      </div>
                     
                      <div class="col-md-6">
                          <div class="form-label-group">

                              <input type="checkbox" id="remember_Address" name="rememberAddress">  <label for="remember_Address">Remember address</label>
                          </div>
                      </div>
   
                  </div>
                  </div>
                 
                  <div class="otpTodisplay" style="display: none">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                        <section class="col col-6">
                        <b><?= lang('permanent_address'); ?> <span class="add_p"></span></b>
                        </section>  
                        <section class="col col-6">
                           <div class="form-label-group pull-right">

                              <input type="checkbox"  id="Same_AddressP" name="remember">  <label for="Same_AddressP">Same as above</label>
                          </div>
                       
                        </section>
                        </div>
                          <hr>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="pzip_code"><?= lang('zip_code'); ?><span>*</span></label>
                          
                           <input type="text" class="form-control number-only" name="pzip_code" id="pzip_code"  maxlength="6" size="6" placeholder="<?= lang('zip_code'); ?>" onkeyup="zipCodetoData(this);" data-set="p";  >
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="paddress"><?= lang('Address'); ?><span>*</span></label>
                          
                           <input type="text" name="paddress" class="form-control" id="paddress" placeholder="<?= lang('Address'); ?>" maxlength="100" size="100">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="ppostName"><?= lang('postName'); ?><span>*</span></label>
                            <select  class="form-control" name="ppostName" id="ppostName">
                              <option value="" selected="" disabled=""><?= lang('postName'); ?></option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="pcity"><?= lang('City'); ?><span>*</span></label>
                          
                           <input type="text" class="form-control" name="pcity" id="pcity" placeholder="<?= lang('City'); ?>" maxlength="30" size="30">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="ptehsil"><?= lang('Tehsil'); ?><span>*</span></label>
                          
                           <input type="text" class="form-control" name="ptehsil" id="ptehsil" placeholder="<?= lang('Tehsil'); ?>" maxlength="30" size="30" >
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="pdistrict"><?= lang('District'); ?><span>*</span></label>
                            <input type="text" class="form-control" name="pdistrict" id="pdistrict" placeholder="<?= lang('District'); ?>" maxlength="30" size="30" >
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="state"><?= lang('State'); ?><span>*</span></label>
                            <input type="text" class="form-control" name="pstate" id="pstate" placeholder="<?= lang('State'); ?>" maxlength="30" size="30" >
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="country"><?= lang('Country'); ?><span>*</span></label>
                            <input type="text" class="form-control" name="pcountry"  id="pcountry" placeholder="<?= lang('Country'); ?>" value="India" maxlength="30" size="30">

                          </div>
                      </div>

                  </div>
                  </div>

                 
<!--                   <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                        <section class="col col-6">
                        <b><?= lang('office_address'); ?></b>
                        </section>  
                        <section class="col col-6">
                           <div class="form-label-group pull-right">

                              <input type="checkbox"  id="Same_AddressO" name="remember">  <label for="Same_AddressO">Same as above</label>
                          </div>
                       
                        </section>
                        </div>
                          <hr>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="pzip_code"><?= lang('zip_code'); ?><span>*</span></label>
                          
                           <input type="text" class="form-control number-only" name="ozip_code" id="ozip_code"  maxlength="6" size="6" placeholder="<?= lang('zip_code'); ?>" onkeyup="zipCodetoData(this);" data-set="o";  >
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="oaddress"><?= lang('Address'); ?><span>*</span></label>
                          
                           <input type="text" name="oaddress" class="form-control" id="oaddress" placeholder="<?= lang('Address'); ?>" maxlength="100" size="100">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="opostName"><?= lang('postName'); ?><span>*</span></label>
                            <select  class="form-control" name="opostName" id="opostName">
                              <option value="" selected="" disabled=""><?= lang('postName'); ?></option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="ocity"><?= lang('City'); ?><span>*</span></label>
                          
                           <input type="text" class="form-control" name="ocity" id="ocity" placeholder="<?= lang('City'); ?>" maxlength="30" size="30">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="otehsil"><?= lang('Tehsil'); ?><span>*</span></label>
                          
                           <input type="text" class="form-control" name="otehsil" id="otehsil" placeholder="<?= lang('Tehsil'); ?>" maxlength="30" size="30" >
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="odistrict"><?= lang('District'); ?><span>*</span></label>
                            <input type="text" class="form-control" name="odistrict" id="odistrict" placeholder="<?= lang('District'); ?>" maxlength="30" size="30" >
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="ostate"><?= lang('State'); ?><span>*</span></label>
                            <input type="text" class="form-control" name="ostate" id="ostate" placeholder="<?= lang('State'); ?>" maxlength="30" size="30" >
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="ocountry"><?= lang('Country'); ?><span>*</span></label>
                            <input type="text" class="form-control" name="ocountry"  id="ocountry" placeholder="<?= lang('Country'); ?>" value="India" maxlength="30" size="30">

                          </div>
                      </div>

                  </div>
                   -->

                  <button class="btn btn-outline btn-lg btn-block tl-btn-round-2 text-uppercase font-weight-bold mb-2" id="submit" type="submit"> <?= lang('Submit'); ?></button>
<!-- Register -->
                  <div class="text-center">
                  <!--   <a class="small" href="<?= base_url();  ?>">Go To Home</a> -->
                  </div>

                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

