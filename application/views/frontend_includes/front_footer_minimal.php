

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
 <?php $frontend_assets =  base_url().'frontend_assets/';
$backend_assets =  base_url().'backend_assets/';

 ?>
	<!-- Scripts -->
	<script src="<?= $frontend_assets; ?>assets/js/jquery.min.js"></script>
	<script src="<?= $frontend_assets; ?>assets/js/bootstrap.min.js"></script>
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
