 <div class="container">
    <div class="row no-gutter">
      <div class="col-md-12">
        <div class="login py-5">
            <div class="row">
              <div class="col-md-8 offset-col-2 mx-auto d-block login-page">
                <div class="login-page">
                    <h4 class="title"><?= lang('User_Form'); ?></h4>
                    <p class="sub_title text-center"><!-- Already have an account? --> 
                    	<a class="color-litegreen" href="javascript:void(0);" type="button"  data-toggle="modal" data-target=".bd-example-modal-lg">फॉर्म को भरने हेतु निर्देश</a></p>
                </div>
                
                <form id="user-add-form" method="post" class="login-form-t" novalidate="novalidate" action="users/add" novalidate="novalidate" autocomplete="off">
                  <div class="row">
                      <div class="col-md-12">
                          <header>
                          <b><?= lang('basic_Information'); ?></b>
                          <input type="hidden" name="id" value="0">

                          </header>
                          <hr>
                      </div>
                      <div class="col-md-6">
                            <div class="form-label-group">
                              <label for="parentName"><?= lang('parentName'); ?></label>
                              <input type="text" id="parentName" class="form-control" placeholder="<?= lang('parentName'); ?>"  name="parentName">
                            </div>
                      </div>
                      <div class="col-md-6">
                            <div class="form-label-group">
                              <label for="dob"><?= lang('dob'); ?></label>
                              <input type="text" id="dob" class="form-control" placeholder="<?= lang('dob'); ?>"  name="dob" readonly="">
                            </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="email"><?= lang('email'); ?></label>
                            <input type="email" id="email" class="form-control" placeholder="<?= lang('email'); ?>"  name="email" >
                          </div>
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
                          
                           <input type="text" name="education" class="form-control" id="education" placeholder="<?= lang('Education'); ?>">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="profession"><?= lang('Profession'); ?></label>

                              <select name="profession" class="form-control">
                              <option value="" selected="" disabled=""><?= lang('Profession'); ?></option>
                              <option value="job">Job</option>
                              <option value="business">Business</option>
                              <option value="house wife">House wife</option>
                              <option value="student">Student</option>
                              <option value="student">Retired</option>
                              <option value="other">Other</option>
                              </select>
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
                            <label for="address"><?= lang('address'); ?></label>
                          
                           <input type="text" name="address" class="form-control" id="address" placeholder="<?= lang('Address'); ?>">
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
                            <label for="zip_code"><?= lang('zip_code'); ?></label>
                          
                           <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="<?= lang('zip_code'); ?>" class="number-only">
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
                            <label for="country"><?= lang('Country'); ?></label>
                          
                              <select name="country"  class="form-control" id="country">
                              <option value="0" selected="" disabled=""><?= lang('Country'); ?></option>
                              <?php if(!empty($countries)):
                              foreach ($countries as $k => $country) {?>
                              <option value="<?=  $country->country_name; ?>" <?=  ($country->country_id==100)?  "selected='selected'" :""; ?> ><?=  $country->country_name; ?></option>
                              <?php } endif; ?>

                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="state"><?= lang('State'); ?></label>
                          
                              <select  class="form-control" name="state" id="state">
                              <option value="0" selected="" disabled=""><?= lang('State'); ?></option>

                              </select>
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
                        <section class="col col-8">
                        <b><?= lang('permanent_address'); ?></b>
                        </section>  
                        <section class="col col-4">
                           <div class="form-label-group pull-right">

                              <input type="checkbox"  id="Same_AddressP" name="remember">  <label for="Same_AddressP">Same as above</label>
                          </div>
                       
                        </section>
                        </div>
                          <hr>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="paddress"><?= lang('address'); ?></label>
                          
                           <input type="text" name="paddress" class="form-control" id="paddress" placeholder="<?= lang('Address'); ?>">
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
                            <label for="pzip_code"><?= lang('zip_code'); ?></label>
                          
                           <input type="text" class="form-control" name="pzip_code" id="pzip_code" placeholder="<?= lang('zip_code'); ?>" class="number-only">
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
                            <label for="pcountry"><?= lang('Country'); ?></label>
                          
                              <select name="pcountry"  class="form-control" id="pcountry">
                              <option value="0" selected="" disabled=""><?= lang('Country'); ?></option>
                              <?php if(!empty($countries)):
                              foreach ($countries as $k => $country) {?>
                              <option value="<?=  $country->country_name; ?>" <?=  ($country->country_id==100)?  "selected='selected'" :""; ?> ><?=  $country->country_name; ?></option>
                              <?php } endif; ?>

                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="pstate"><?= lang('State'); ?></label>
                          
                              <select  class="form-control" name="pstate" id="pstate">
                              <option value="0" selected="" disabled=""><?= lang('State'); ?></option>

                              </select>
                          </div>
                      </div>

                    
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                        <section class="col col-8">
                        <?= lang('office_address'); ?>
                        </section>  
                        <section class="col col-4">
                           <div class="form-label-group pull-right">

                              <input type="checkbox"  id="Same_Address" name="remember">  <label for="Same_Address">Same as above</label>
                          </div>
                       
                        </section>
                        </div>
                          <hr>
                      </div>
                      <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="oaddress"><?= lang('address'); ?></label>
                          
                           <input type="text" name="oaddress" class="form-control" id="oaddress" placeholder="<?= lang('Address'); ?>">
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
                            <label for="ozip_code"><?= lang('zip_code'); ?></label>
                          
                           <input type="text" class="form-control" name="ozip_code" id="ozip_code" placeholder="<?= lang('zip_code'); ?>" class="number-only">
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
                            <label for="ocountry"><?= lang('Country'); ?></label>
                          
                              <select name="ocountry"  class="form-control" id="ocountry">
                              <option value="0" selected="" disabled=""><?= lang('Country'); ?></option>
                              <?php if(!empty($countries)):
                              foreach ($countries as $k => $country) {?>
                              <option value="<?=  $country->country_name; ?>" <?=  ($country->country_id==100)?  "selected='selected'" :""; ?> ><?=  $country->country_name; ?></option>
                              <?php } endif; ?>

                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="ostate"><?= lang('State'); ?></label>
                          
                              <select  class="form-control" name="ostate" id="ostate">
                              <option value="0" selected="" disabled=""><?= lang('State'); ?></option>

                              </select>
                          </div>
                      </div>

                    
                  </div>
                 

                
                  <button class="btn btn-outline  btn-block tl-btn-round-2 text-uppercase font-weight-bold mb-2" type="submit"> <?= lang('Submit'); ?></button>

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
  function injectTrim(handler) {
  return function (element, event) {
    if (element.tagName === "TEXTAREA" || (element.tagName === "INPUT" 
                                       && element.type !== "password")) {
      element.value = $.trim(element.value);
    }
    return handler.call(this, element, event);
  };
}
</script>


<div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">श्री धर्मदास गण जनगणना फॉर्म को भरने हेतु निर्देश <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h5>
        
      </div>
      <div class="modal-body scrollbar-model">
         <ul style="font-size: 18px;font-weight: bold; padding-left:20px;">
           <li>परिवार गुरु आमना कालम में परिवार के मुखिया की धर्मदास संप्रदाय के जिस संत में मान्यता हो वह नाम लिखें|</li>
           <li>श्री संघ के नाम वाले कॉलम मे आप जहाँ रहते ही उस श्री संघ व शहर का नाम |</li>
           <li>घर का पता वाले कॉलम मे आप वर्तमान मे जहा रह रहे है उसका सम्पूर्ण पता |</li>
           <li>कार्यालय प्रतिष्ठान वाले कॉलम मे जिस कंपनी मे आपकी जॉब हो या आपका व्यापार हो उसका नाम व पूर्ण पता लिखे|</li>
           <li>नाम वाले कॉलम मे अपना नाम व उपनाम वाले कॉलम मे अपनी सरनेम लिखे |</li>
           <li>श्री संघ या संगठन वाले कॉलम मे यदि आपके पास कोई स्थानीय संघ ,धर्मदास गण परिषद ,युवा संगठन , श्राविका संगठन, नवयुवक मण्डल, बालिका मण्डल मे कोई पद हो तो उसका उल्लेख करे |</li>
           <li>आपके पहला फॉर्म submit होने पर दूसरा फॉर्म स्वतः जनरेट हो जाएगा आप अपने परिवार के दूसरे सदस्य का फॉर्म submit कर सकते है उसमे आपको पता और कार्यालय यदि एक ही है तो दूसरा भरने की जरूरत नहीं है, आप same as above पर क्लिक करे |</li>
           <li>अपने परिवार के दूसरे सदस्य का फॉर्म भरते समय आपको अपने फॉर्म मैं भरा हुआ अड्रेस ही रखना हो तो अपना फॉर्म भरते समय remember address ऑप्शन पर क्लिक करे ।</li>
           <li>इस फ़ॉर्म मे अनिवार्य रूप से नाम , उपनाम , पिता/पति का नाम , जन्म तारीख यदि याद ना हों तो 1 जनवरी जिस वर्ष मे आपका जन्म हुआ हो वह डाल देवे , मोबाईल नंबर , लिंग , वैवाहिक स्थिति यह सभी कॉलम को भरना |</li>

         </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline btn-block tl-btn-round-2 text-uppercase font-weight-bold mb-2" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>