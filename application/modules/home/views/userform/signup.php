 <div class="container">
    <div class="row no-gutter">
      <div class="col-md-12">
        <div class="login py-5">
            <div class="row">
              <div class="col-md-6 offset-col-6 mx-auto d-block login-page">
                <div class="login-page">
                    <h4 class="title"><?= lang('User_Form'); ?></h4>
                    <p class="sub_title text-center"><!-- Already have an account? --> 
                    	<a class="color-litegreen" href="javascript:void(0);" type="button"  data-toggle="modal" data-target=".bd-example-modal-lg">फॉर्म को भरने हेतु निर्देश</a></p>
                </div>
                
                <form id="user-add-form" method="post" class="login-form-t" novalidate="novalidate" action="users/add" novalidate="novalidate" autocomplete="off">
                  <div class="form-label-group">
                    <label for="firstName"><?= lang('First_name'); ?></label>
                    <input type="text" id="firstName" class="form-control" placeholder="<?= lang('First_name'); ?>"  name="firstName">
                  </div>
                  <div class="form-label-group">
                    <label for="lastName"><?= lang('Last_name'); ?></label>
                    <input type="text" id="lastName" class="form-control" placeholder="<?= lang('Last_name'); ?>"  name="lastName">
                  </div>
                  <div class="form-label-group">
                    <label for="contactNumber"><?= lang('Phone'); ?></label>
                    <input type="text" id="contactNumber" class="form-control" placeholder="<?= lang('Phone'); ?>"  name="contactNumber"  data-mask="999 999 9999">
                  </div>
                  <div class="form-label-group">
                    <label for="aadharNumber"><?= lang('Aadhar_number'); ?></label>
                    <input type="text" id="aadharNumber" class="form-control" placeholder="<?= lang('Aadhar_number'); ?>"  name="aadharNumber"  data-mask="9999-9999-9999">
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
                  <button class="btn btn-outline btn-lg btn-block tl-btn-round-2 text-uppercase font-weight-bold mb-2" type="submit">Register</button>

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