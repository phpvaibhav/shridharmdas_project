  <footer id="footer">
   

    <!-- Footer-Bottom -->
    <div class="footer_bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 align-self-center">
            <p class="mb-0">&copy; <?= date('Y');?> .All Rights Reserved</p>
            <p class="mb-0">Developed by: <a target="_blank" href="https://outthinkcoders.com/" style="color: white;">Outthinkcoders.com</a></p>
          </div>
         
          <div class="col-lg-8 align-self-center">
            <div class="footer_links">
              <a href="<?= base_url(); ?>">Home</a>
              <a href="<?= base_url(); ?>user-form">User Form</a>
              <a href="<?= base_url(); ?>about-us">About Us</a>
              <a href="<?= base_url(); ?>contact-us">Contact</a> 
              <a href="<?= base_url(); ?>term-conditions">Term Conditions</a> 
              <a href="<?= base_url(); ?>privacy-policy">Privacy Policy</a> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Footer-Bottom -->
  </footer>
  <!-- /Footer -->

<div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          <?php if($this->session->userdata('site_lang')=='hindi'){ ?>
          श्री धर्मदास गण जनगणना फॉर्म को भरने हेतु निर्देश 
          <?php }else{ ?>
          Instructions for filling the Shree Dharmadas Gan census form
           <?php }?>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h5>
        
      </div>
      <div class="modal-body scrollbar-model">
        <div style="font-size: 18px;font-weight: bold; padding-left:20px;">
           <?php if($this->session->userdata('site_lang')=='hindi'){ ?>
            <p> 1 ) इस फॉर्म को आप हिन्दी या अंग्रेजी भाषा मैं देख सकते है, भाषा चुनने के लिए हिन्दी या इंग्लिश के आगे दिए बटन पर क्लिक कर्रे । </p><p>

2) नाम वाले कॉलम मैं अपना पूरा नाम लिखे , नाम लिखते समय पहले अपना नाम एवं बाद मे सरनेम लिखे ।</p><p>

3) जन्म तारीख डालते समय सबसे पहले वर्ष , फिर महिना, फिर तारीख चुने ।</p><p>

4) अपने पति/पिता का पूरा नाम लिखे ।</p><p>

5) अपने परिवार के मुखिया का पूरा नाम लिखे । अगर आप अपने घरवालों का फॉर्म भी भर रहे है एवं घर के मुखिया का नाम वही रहेगा तो आप मुखिया का नाम याद रखे बटन पर क्लिक कर्रे जिससे अगला फॉर्म भरते समय वो नाम खुदसे आ जाए ।</p><p>

6)श्री संघ के नाम वाले कॉलम मे आप जहाँ रहते ही उस श्री संघ के शहर का नाम डाले | अगर आपके श्री संघ का नाम लिस्ट मैं नहीं है तो आप otherऑप्शन को सर्च करे एवं उसपर क्लिक करे , आप अपने श्री संघ का नाम डाल सकेंगे ।
</p><p>
7) अपना 10 अंकों का मोबाईल नंबर डाले, मोबाईल नंबर डालने के बाद जैसे ही आप बाहर क्लिक करेंगे आपके मोबाईल नंबर पर 60 सेकंड के अंदर एक OTP आएगा उसको OTP वाले कॉलम मे डाले ।
</p><p>
8)अगर 60 सेकंड मैं OTP आपके मोबाईल पर नहीं आता हे तो पहले अपना मोबाईल नंबर फिरसे चेक करे की वो सही हे या नहीं, अगर वो सही नहीं हो तो Resend OTP ऑप्शन पर क्लिक करे।
</p><p>
9) सही OTP डालने पर सिस्टम आपका मोबाईल नंबर verify करने का मैसेज देगा।
</p><p>
10) अगर आपके परिवार मे किसी सदस्य के पास मोबाईल नंबर ना हो तो आप अपना या अपने परिवार के किसी अन्य सदस्य का मोबाईल नंबर डाल सकते हे मगर वो मोबाईल नंबर किसका हे जैसे की father,son या किसी और परिवारजन का तो उसका संबंध कॉलम मे से देखकर डाले।
</p><p>
11)अपना रक्त समूह अगर आपको पता हो तो अपना रक्त समूह डाले ।
</p><p>
12) जहाँ तक आपने  शिक्षा ग्रहण करी है उस ऑप्शन को सिलेक्ट कर्रे ।
</p><p>
13) धार्मिक ज्ञान मे जो जो चीज़े आपको आती हे आप उन चीजों को टिक कर सकते है जैसे की सामयिक, प्रतिकमन।
</p><p>
14) वर्तमान घर का पता वाले कॉलम मे आप वर्तमान मे जहाँ रह रहे है उसका सम्पूर्ण पता डाले |
</p><p>
15) पता डालते समय सबसे पहले अपना पिन कोड डाले, पिन कोड से संबंधित जानकारी फॉर्म मे खुदबखुद भर जाएगी जैसे पिन कोड से जुड़े शहर/कस्बे का नाम, तहसील/सब-जिले का नाम, जिले का नाम, राज्य का नाम, देश का नाम , आपको सिर्फ घर का क्रमांक , रास्ते या सोसाइटी का नाम डालना रहेगा ।</p><p>
16) अगर आपका वर्तमान घर का पता एवं स्थायी पता एक ही है तो same as above ऑप्शन पर क्लिक करे जिससे पता अपने आप कॉपी हो जाएगा ।
</p><p>
17) अपने परिवार के दूसरे सदस्य का फॉर्म भरते समय आपको अपने फॉर्म मे भरा हुआ अड्रेस ही रखना हो तो अपना फॉर्म भरते समय Remember address ऑप्शन पर क्लिक करे ।
</p><p>
18) सारी जानकारी डालने के बाद एक बार फॉर्म को चेक करले की सारी इनफार्मेशन आपकी जानकारी के हिसाब से सही है या नहीं, अगर सब सही है तो फॉर्म सबमिट करे।</p>
       <!--    <p>1) यह फॉर्म दो भागों मे भागित हे एवं आपको दोनों भाग या स्टेप्स पूर्ण रूप से भरने हे।</p><p>2) इस फॉर्म को आप हिन्दी या अंग्रेजी भाषा मैं देख सकते है, भाषा चुनने के लिए हिन्दी या इंग्लिश के आगे दिए बटन पर क्लिक कर्रे ।</p><p>3) नाम वाले कॉलम मैं अपना पूरा नाम लिखे , नाम लिखते समय पहले अपना नाम एवं बाद मे सरनेम लिखे ।</p><p>4) जन्म तारीख डालते समय सबसे पहले वर्ष , फिर महिना, फिर तारीख चुने ।</p><p>5) अपने पति/पिता का पूरा नाम लिखे ।</p><p>6) अपने परिवार के मुखिया का पूरा नाम लिखे ।</p><p>7) अपना 10 अंकों का मोबाईल नंबर डाले, मोबाईल नंबर डालने के बाद जैसे ही आप बाहर क्लिक करेंगे आपके मोबाईल नंबर पर 60 सेकंड के अंदर एक OTP आएगा उसको OTP वाले कॉलम मे डाले ।</p><p>8)अगर 60 सेकंड मैं OTP आपके मोबाईल पर नहीं आता हे तो पहले अपना मोबाईल नंबर फिरसे चेक करे की वो सही हे या नहीं, अगर वो सही नहीं हो तो Resend OTP ऑप्शन पर क्लिक करे।</p><p>9) सही OTP डालने पर सिस्टम आपका मोबाईल नंबर verify करने का मैसेज देगा।</p><p>10) अगर आपके परिवार मे किसी सदस्य के पास मोबाईल नंबर ना हो तो आप अपना या अपने परिवार के किसी अन्य सदस्य का मोबाईल नंबर डाल सकते हे मगर वो मोबाईल नंबर किसका हे जैसे की father,son या किसी और परिवारजन का तो उसका संबंध कॉलम मे से देखकर डाले।</p><p>11)अपनी पहचान क लिए जो भी फोटो या इमेज आप अपलोड करने वाले है जैसे की आधार  कार्ड,  Pan कार्ड, वोटर  id, पासपोर्ट,  इंसमे से किसी एक को चुने ।</p><p>12) अपने पहचान पत्र की फोटो डाले । </p><p>13) सारी फर्स्ट स्टेप की जानकारी डालने के बाद एक बार फॉर्म को चेक करले की सारी इनफार्मेशन आपकी जानकारी के हिसाब से सही है या नहीं, अगर सब सही है तो next पर क्लिक करे ।</p><p>14)Next पर क्लिक करने आपका फॉर्म लोडिंग होगा और पहली स्टेप की इनफार्मेशन सेव होगी जिसमे 1 से 2 मिनट का समय लग सकता हे, लोड होना का समय आपकी इमेज की साइज़ और आपके इंटरनेट कनेक्शन की स्पीड पर निर्भर करता हे । इसलिए आप परेशान ना हो एवं कुछ समय इंतज़ार कर्रे जब तक वो नेक्स्ट स्टेप पर आपको नहीं ले जाए।</p><p>15) श्री संघ के नाम वाले कॉलम मे आप जहाँ रहते ही उस श्री संघ के शहर का नाम डाले | अगर आपके श्री संघ का नाम लिस्ट मैं नहीं है तो आप otherऑप्शन को सर्च करे एवं उसपर क्लिक करे , आप अपने श्री संघ का नाम डाल सकेंगे ।</p><p>16) धार्मिक ज्ञान मे जो जो चीज़े आपको आती हे आप उन चीजों को टिक कर सकते है जैसे की सामयिक, प्रतिकमन।</p><p>17) वर्तमान घर का पता वाले कॉलम मे आप वर्तमान मे जहाँ रह रहे है उसका सम्पूर्ण पता डाले |</p><p>18) पता डालते समय सबसे पहले अपना पिन कोड डाले, पिन कोड से संबंधित जानकारी फॉर्म मे खुदबखुद भर जाएगी जैसे पिन कोड से जुड़े शहर/कस्बे का नाम, तहसील/सब-जिले का नाम, जिले का नाम, राज्य का नाम, देश का नाम , आपको सिर्फ घर का क्रमांक , रास्ते या सोसाइटी का नाम डालना रहेगा ।</p><p>19) अगर आपका वर्तमान घर का पता एवं स्थायी पता एक ही है तो same as above ऑप्शन पर क्लिक करे जिससे पता अपने आप कॉपी हो जाएगा ।</p><p>20) अपने परिवार के दूसरे सदस्य का फॉर्म भरते समय आपको अपने फॉर्म मे भरा हुआ अड्रेस ही रखना हो तो अपना फॉर्म भरते समय Remember address ऑप्शन पर क्लिक करे ।</p><p>21) सारी सेकंड स्टेप की जानकारी डालने के बाद एक बार फॉर्म को चेक करले की सारी इनफार्मेशन आपकी जानकारी के हिसाब से सही है या नहीं, अगर सब सही है तो फॉर्म सबमिट करे </p> -->
<?php }else{ ?>
<p>
  1) You can see this form in Hindi or English language, click on the button next to Hindi or English to choose the language.</p><p>

2) Write your full name in the column named, first write your name and later surname while writing the name.</p><p>

3) When entering the date of birth, first select the year, then the month, then the date.</p><p>

4) Write the full name of your Husband or Father.</p><p>

5) Write the full name of the head of your family. If you are filling form of other family members and the family head name is same then you can choose Remember Family head name.</p><p>

6) In the column named after Shree Sangh, place the name of the city of Shri Sangh wherever you live. If your Shree Sangh's name is not in the list, then please search for other option in the list and click on it, you will be able to enter your Shree Sangh's name.</p><p>

7) Enter your 10 digit mobile number, after entering the mobile number, as soon as you click outside, an OTP will come to your mobile number within 60 seconds and put it in the OTP column.
</p><p>
8) If OTP does not come on your mobile in 60 seconds then first check your mobile number again to see if it is correct or not, if it is not right, click on Resend OTP option.
</p><p>
9) On entering the correct OTP, the system will give a message to verify your mobile number.
</p><p>
10) If a member does not have a mobile number in your family, then you can enter the mobile number of yourself or any other member of your family, but do mention the relation in the column ahead.
</p><p>
11) If you know your blood group then enter your blood group.</p><p>

12) As far as you have studied, select that option.</p><p>

13) You can tick those things which come to knows in religious knowledge, such as the Samayik, Partikaman etc.</p><p>

14) In the column containing the address of the current house, enter the complete address of where you are currently living.</p><p>
15) While entering the address, first enter your PIN code, the information related to the PIN code will be filled in the form itself such as the name of the town / town associated with the PIN code, name of the tehsil / sub-district, name of the district, name of the state, country. You just have to enter the house number, street or society name.</p><p>

16) If your current address and permanent address are the same, then click on the same as above option which will automatically copy the address.</p><p>

17) While filling the form of another member of your family, if you want to keep the address filled in your form, then click on the Remember address option while filling your form.
</p><p>
18) After entering all the information, check the form once, whether all the information your filled is correct or not, if all information is correct then submit the form.
</p>

  <?php } ?>
        </div>
        <!--  <ul style="font-size: 18px;font-weight: bold; padding-left:20px;">
           <li>परिवार गुरु आमना कालम में परिवार के मुखिया की धर्मदास संप्रदाय के जिस संत में मान्यता हो वह नाम लिखें|</li>
           <li>श्री संघ के नाम वाले कॉलम मे आप जहाँ रहते ही उस श्री संघ व शहर का नाम |</li>
           <li>घर का पता वाले कॉलम मे आप वर्तमान मे जहा रह रहे है उसका सम्पूर्ण पता |</li>
           <li>कार्यालय प्रतिष्ठान वाले कॉलम मे जिस कंपनी मे आपकी जॉब हो या आपका व्यापार हो उसका नाम व पूर्ण पता लिखे|</li>
           <li>नाम वाले कॉलम मे अपना नाम व उपनाम वाले कॉलम मे अपनी सरनेम लिखे |</li>
           <li>श्री संघ या संगठन वाले कॉलम मे यदि आपके पास कोई स्थानीय संघ ,धर्मदास गण परिषद ,युवा संगठन , श्राविका संगठन, नवयुवक मण्डल, बालिका मण्डल मे कोई पद हो तो उसका उल्लेख करे |अगर आपके श्री संघ का नाम लिस्ट मैं नहीं है तो आप  other ऑप्शन को सर्च करे  एवं उसपर क्लिक करे , आप अपने श्री संघ का नाम डाल सकेंगे । </li>
           <li>आपके पहला फॉर्म submit होने पर दूसरा फॉर्म स्वतः जनरेट हो जाएगा आप अपने परिवार के दूसरे सदस्य का फॉर्म submit कर सकते है उसमे आपको पता और कार्यालय यदि एक ही है तो दूसरा भरने की जरूरत नहीं है, आप same as above पर क्लिक करे |</li>
           <li>अपने परिवार के दूसरे सदस्य का फॉर्म भरते समय आपको अपने फॉर्म मैं भरा हुआ अड्रेस ही रखना हो तो अपना फॉर्म भरते समय remember address ऑप्शन पर क्लिक करे ।</li>
           <li>इस फ़ॉर्म मे अनिवार्य रूप से नाम , उपनाम , पिता/पति का नाम , जन्म तारीख यदि याद ना हों तो 1 जनवरी जिस वर्ष मे आपका जन्म हुआ हो वह डाल देवे , मोबाईल नंबर , लिंग , वैवाहिक स्थिति यह सभी कॉलम को भरना |</li>

         </ul> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline btn-block tl-btn-round-2 text-uppercase font-weight-bold mb-2" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <?php 

        $frontend_assets =  base_url().'frontend_assets/';
        $backend_assets  =  base_url().'backend_assets/';

 ?>
 <script type="text/javascript">
  var Please_select_your_full_name              = "<?= lang('Please_select_your_full_name');?>";
  var Please_select_your_first_name              =  "<?= lang('Please_select_your_first_name');?>";
  var Please_select_your_last_name             = "<?= lang('Please_select_your_last_name');?>";
  var Please_select_your_father_name_husband_name = "<?= lang('Please_select_your_father_name_husband_name');?>";
  var Please_select_your_date_of_birth            ="<?= lang('Please_select_your_date_of_birth');?>";
  var Please_select_your_gender                   = "<?= lang('Please_select_your_gender');?>";
  var Please_select_your_marital_status           = "<?= lang('Please_select_your_marital_status');?>";
  var Please_select_your_contact_number           = "<?= lang('Please_select_your_contact_number');?>";
  var Please_select_your_aadhar_number            = "<?= lang('Please_select_your_aadhar_number');?>";
  var Please_select_your_address                  = "<?= lang('Please_select_your_address');?>";
  var Please_select_your_city                     = "<?= lang('Please_select_your_city');?>";
  var Please_select_your_zip_code                 = "<?= lang('Please_select_your_zip_code');?>";
  var Please_select_your_tehsil                   = "<?= lang('Please_select_your_tehsil');?>";
  var Please_select_your_district                 = "<?= lang('Please_select_your_district');?>";
  var Good_job                                    = "<?= lang('Good_job');?>";
  var Your_form_submitted_successfully            = "<?= lang('Your_form_submitted_successfully');?>";
  var Please_select_your_front_image              = "<?= lang('Please_select_your_front_image');?>";
  var Please_select_your_back_image               = "<?= lang('Please_select_your_back_image');?>";
  var Please_select__image_type                   = "<?= lang('Please_select__image_type');?>";
  var Please_select_your_familyHeadName           = "<?= lang('Please_select_your_familyHeadName');?>";
  var Please_enter_at_least_12_digit_aadhaar_number = "<?= lang('Please_enter_at_least_12_digit_aadhaar_number');?>";
  var Please_enter_at_least_10_digit_phone_number   = "<?= lang('Please_enter_at_least_10_digit_phone_number');?>";
  var Please_select_your_unionName                  = "<?= lang('Please_select_your_unionName');?>";
  var This_option_field_is_required                 = "<?= lang('This_option_field_is_required');?>";
  var This_aadhar_number_is_already_taken                 = "<?= lang('This_aadhar_number_is_already_taken');?>";
  var Please_select_your_Occupation ="<?= lang('Please_select_your_Occupation');?>";
var Please_select_your_religious_Knowledge ="<?= lang('Please_select_your_religious_Knowledge');?>";
var Please_select_your_Identity_image ="<?= lang('Please_select_your_Identity_image');?>";
var Please_enter_your_post_name ="<?= lang('Please_enter_your_post_name');?>";
</script>

	<!-- Scripts -->
	<script src="<?= $frontend_assets; ?>assets/js/jquery.min.js"></script>
	<script src="<?= $frontend_assets; ?>assets/js/bootstrap.min.js"></script>
<?php if(ENVIRONMENT=='production'): ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-164031668-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-164031668-1');
</script>
<?php endif; ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

   <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
   <!-- JQUERY VALIDATE -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
   <!--  <script src="<?php echo $backend_assets; ?>js/plugin/jquery-validate/jquery.validate.min.js"></script> -->
    <!-- JQUERY MASKED INPUT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
	<!--Magnific-Popup-JS-->
	<script src="<?= $frontend_assets; ?>assets/js/jquery.magnific-popup.min.js"></script>
	<!-- Countdown -->
	<script src="<?= $frontend_assets; ?>assets/js/jquery.countdown.min.js"></script>
	<!--Custome-JS-->
	<script src="<?= $frontend_assets; ?>assets/js/interface.js"></script>
	<!--Carousel-JS-->
	<script src="<?= $frontend_assets; ?>assets/js/owl.carousel.min.js"></script>
	<!--ion-range-slider-JS-->
	<script src="<?= $frontend_assets; ?>assets/js/ion.rangeSlider.min.js"></script>
	<!--Audio-JS-->
	<script src="<?= $frontend_assets; ?>assets/js/audio_custome.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  <script src="<?php echo $frontend_assets; ?>js/common.js"></script>
        
  <?php if(!empty($front_scripts)) { load_js($front_scripts);} //load required page scripts ?>
</body>

</html>
