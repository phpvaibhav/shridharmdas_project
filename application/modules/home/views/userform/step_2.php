 <div class="container">
    <div class="row no-gutter">
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
      <div class="col-md-12">
        <div class="login py-5">
            <div class="row">
              <div class="col-md-8 offset-col-2 mx-auto d-block login-page">
                <div class="login-page">
                    <h4 class="title"><?= lang('User_Form'); ?> (Step-2)</h4>
                    <p class="sub_title text-center"><!-- Already have an account? --> 
                    	<a class="color-litegreen" href="javascript:void(0);" type="button"  data-toggle="modal" data-target=".bd-example-modal-lg">फॉर्म को भरने हेतु निर्देश</a></p>
                </div>
                
                <form id="user-add-step-2" method="post" class="login-form-t" novalidate="novalidate" action="userStep2" novalidate="novalidate" autocomplete="off">
                  <div class="row">
                      <div class="col-md-12">
                          <header>
                          <b><?= lang('basic_Information'); ?></b>
                          <input type="hidden" name="userId" value="<?= $userId; ?>">

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
                           
                              <label for="unionName"><?= lang('Union').' '.lang('Name'); ?><span>*</span></label>
                              <select name="unionName"  class="form-control js-example-basic-single "  id="unionName"  >
                              <?php if(!empty($unionList)):
                              foreach ($unionList as $kc => $union) { 
                                
                                ?>
                              <option value="<?= $union; ?>" ><?=  $union; ?></option>
                              <?php } endif; ?>

                              </select>
                              <small>अगर आपके श्री संघ का नाम लिस्ट मैं नहीं है तो आप  other ऑप्शन को सर्च करे  एवं उसपर क्लिक करे , आप अपने श्री संघ का नाम डाल सकेंगे । </small>
                          </div>
                      </div>
                      <div class="col-md-6 otherUnionName" style="display: none">
                 
                    <div class="form-label-group">
                      <label for="otherUnionName"><?= lang('otherUnionName'); ?></label>
                      <input type="text" id="otherUnionName" class="form-control" placeholder="<?= lang('otherUnionName'); ?>"  name="otherUnionName">
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
                                <input type="checkbox" class="custom-control-input limitCheckBox" value="प्रतिक्रमण " name="religiousKnowledge[]" id="customCheck3" data-limit="3">
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
                  <div class="row">
                      <div class="col-md-12">
                          <header>
                          <b><?= lang('home_address'); ?></b>
                          </header>
                          <hr>
                      </div>
                       <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="zip_code"><?= lang('zip_code'); ?><span>*</span></label>
                          
                           <input type="text" class="form-control number-only" name="zip_code" id="zip_code" placeholder="<?= lang('zip_code'); ?>" onkeyup="zipCodetoData(this);" data-set="";   >
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
                 
                  <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                        <section class="col col-6">
                        <b><?= lang('permanent_address'); ?></b>
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
                          
                           <input type="text" class="form-control number-only" name="pzip_code" id="pzip_code" placeholder="<?= lang('zip_code'); ?>" onkeyup="zipCodetoData(this);" data-set="p";  >
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
                  <div class="row" id="offAddress">
                      <div class="col-md-12">
                        <div class="row">
                        <section class="col col-6">
                        <b><?= lang('office_address'); ?></b>
                        </section>  
                        <section class="col col-6">
                           <div class="form-label-group pull-right">

                              <input type="checkbox"  id="Same_Address" name="remember">  <label for="Same_Address">Same as above</label>
                          </div>
                       
                        </section>
                        </div>
                          <hr>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="ozip_code"><?= lang('zip_code'); ?></label>
                          
                           <input type="text" class="form-control number-only" name="ozip_code" id="ozip_code" placeholder="<?= lang('zip_code'); ?>" onkeyup="zipCodetoData(this);" data-set="o";  >
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="oaddress"><?= lang('address'); ?></label>
                          
                           <input type="text" name="oaddress" class="form-control" id="oaddress" placeholder="<?= lang('Address'); ?>" maxlength="100" size="100">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="opostName"><?= lang('postName'); ?></label>
                            <select  class="form-control" name="opostName" id="opostName">
                              <option value="" selected="" disabled=""><?= lang('postName'); ?></option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="ocity"><?= lang('City'); ?></label>
                          
                           <input type="text" class="form-control" name="ocity" id="ocity" placeholder="<?= lang('City'); ?>" maxlength="30" size="30" >
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="tehsil"><?= lang('Tehsil'); ?></label>
                          
                           <input type="text" class="form-control" name="otehsil" id="otehsil" placeholder="<?= lang('Tehsil'); ?>" maxlength="30" size="30" >
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="odistrict"><?= lang('District'); ?></label>
                          
                           <input type="text" class="form-control" name="odistrict" id="odistrict" placeholder="<?= lang('District'); ?>" maxlength="30" size="30" >
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="state"><?= lang('State'); ?></label>
                              <input type="text" class="form-control" name="ostate" id="ostate" placeholder="<?= lang('State'); ?>" maxlength="30" size="30" >
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="country"><?= lang('Country'); ?></label>
                          
                           <input type="text" class="form-control" name="ocountry"  id="ocountry" placeholder="<?= lang('Country'); ?>" value="India" maxlength="30" size="30" >
                             
                          </div>
                      </div>
                  </div>
                 
                  <hr>
                
                  <button class="btn btn-outline  btn-block tl-btn-round-2 text-uppercase font-weight-bold mb-2" id="submit" type="submit"> 
                    Next
                  </button>
<!-- <?= lang('Submit'); ?> -->
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
