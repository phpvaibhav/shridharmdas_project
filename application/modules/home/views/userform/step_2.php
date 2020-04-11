 <div class="container">
    <div class="row no-gutter">
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
                              <label for="gender"><?= lang('Select_Gender'); ?></label>

                              <select name="gender" class="form-control" id="gender">
                              <option value="" selected="" disabled=""><?= lang('Select_Gender'); ?></option>
                              <option value="Male"><?= lang('Male');?></option>
                              <option value="Female"><?= lang('Female');?></option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="maritalStatus"><?= lang('Marital_Status'); ?></label>
                          
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
                           
                              <label for="unionName"><?= lang('Union').' '.lang('Name'); ?></label>
                              <select name="unionName"  class="form-control js-example-basic-single " id="unionName">
                              <?php if(!empty($unionList)):
                              foreach ($unionList as $kc => $union) { 
                                
                                ?>
                              <option value="<?= $union; ?>" ><?=  $union; ?></option>
                              <?php } endif; ?>

                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="profession"><?= lang('Profession'); ?></label>

                              <select name="profession" class="form-control" onchange="professionCheck(this);">
                              <option value="" selected="" disabled=""><?= lang('Profession'); ?></option>
                              <option value="job">Job</option>
                              <option value="business">Business</option>
                              <option value="house wife">House wife</option>
                              <option value="student">Student</option>
                              <option value="retired">Retired</option>
                              <option value="other">Other</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label><?= lang('Religious_knowledge'); ?></label>

                              <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input limitCheckBox" value="णमोकार मंत्र एवं  प्राथमिक ज्ञान" id="customCheck1" name="religiousKnowledge[]" data-limit="1">
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
                            <label for="zip_code"><?= lang('zip_code'); ?></label>
                          
                           <input type="text" class="form-control number-only" name="zip_code" id="zip_code" placeholder="<?= lang('zip_code'); ?>" onkeyup="zipCodetoData(this);" data-set="";   >
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="address"><?= lang('Address'); ?></label>
                          
                           <input type="text" name="address" class="form-control" id="address" placeholder="<?= lang('Address'); ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="postName"><?= lang('postName'); ?></label>
                            <select  class="form-control" name="postName" id="postName">
                              <option value="0" selected="" disabled=""><?= lang('postName'); ?></option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="city"><?= lang('City'); ?></label>
                          
                           <input type="text" class="form-control" name="city" id="city" placeholder="<?= lang('City'); ?>">
                          </div>
                      </div>
                   
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="tehsil"><?= lang('Tehsil'); ?></label>
                          
                           <input type="text" class="form-control" name="tehsil" id="tehsil" placeholder="<?= lang('Tehsil'); ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="district"><?= lang('District'); ?></label>
                          
                           <input type="text" class="form-control" name="district" id="district" placeholder="<?= lang('District'); ?>">
                          </div>
                      </div>
                       <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="state"><?= lang('State'); ?></label>
                              <input type="text" class="form-control" name="state" id="state" placeholder="<?= lang('State'); ?>">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="country"><?= lang('Country'); ?></label>
                          
                           <input type="text" class="form-control" name="country"  id="country" placeholder="<?= lang('Country'); ?>" value="India">
                             
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
                            <label for="pzip_code"><?= lang('zip_code'); ?></label>
                          
                           <input type="text" class="form-control number-only" name="pzip_code" id="pzip_code" placeholder="<?= lang('zip_code'); ?>" onkeyup="zipCodetoData(this);" data-set="p";  >
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="paddress"><?= lang('Address'); ?></label>
                          
                           <input type="text" name="paddress" class="form-control" id="paddress" placeholder="<?= lang('Address'); ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="ppostName"><?= lang('postName'); ?></label>
                            <select  class="form-control" name="ppostName" id="ppostName">
                              <option value="" selected="" disabled=""><?= lang('postName'); ?></option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="pcity"><?= lang('City'); ?></label>
                          
                           <input type="text" class="form-control" name="pcity" id="pcity" placeholder="<?= lang('City'); ?>">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="ptehsil"><?= lang('Tehsil'); ?></label>
                          
                           <input type="text" class="form-control" name="ptehsil" id="ptehsil" placeholder="<?= lang('Tehsil'); ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="pdistrict"><?= lang('District'); ?></label>
                          
                           <input type="text" class="form-control" name="pdistrict" id="pdistrict" placeholder="<?= lang('District'); ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="state"><?= lang('State'); ?></label>
                              <input type="text" class="form-control" name="pstate" id="pstate" placeholder="<?= lang('State'); ?>">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="country"><?= lang('Country'); ?></label>
                          
                           <input type="text" class="form-control" name="pcountry"  id="pcountry" placeholder="<?= lang('Country'); ?>" value="India">
                             
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
                          
                           <input type="text" class="form-control number-only" name="ozip_code" id="ozip_code" placeholder="<?= lang('zip_code'); ?>" onkeyup="zipCodetoData(this);" data-set="p"; >
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="oaddress"><?= lang('address'); ?></label>
                          
                           <input type="text" name="oaddress" class="form-control" id="oaddress" placeholder="<?= lang('Address'); ?>">
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
                          
                           <input type="text" class="form-control" name="ocity" id="ocity" placeholder="<?= lang('City'); ?>">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="tehsil"><?= lang('Tehsil'); ?></label>
                          
                           <input type="text" class="form-control" name="otehsil" id="otehsil" placeholder="<?= lang('Tehsil'); ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="odistrict"><?= lang('District'); ?></label>
                          
                           <input type="text" class="form-control" name="odistrict" id="odistrict" placeholder="<?= lang('District'); ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="state"><?= lang('State'); ?></label>
                              <input type="text" class="form-control" name="ostate" id="ostate" placeholder="<?= lang('State'); ?>">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="country"><?= lang('Country'); ?></label>
                          
                           <input type="text" class="form-control" name="ocountry"  id="ocountry" placeholder="<?= lang('Country'); ?>" value="India">
                             
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
