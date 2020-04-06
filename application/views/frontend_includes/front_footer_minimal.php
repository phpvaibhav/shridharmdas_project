
 <?php $frontend_assets =  base_url().'frontend_assets/';
$backend_assets =  base_url().'backend_assets/';

 ?>
	<!-- Scripts -->
	<script src="<?= $frontend_assets; ?>assets/js/jquery.min.js"></script>
	<script src="<?= $frontend_assets; ?>assets/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   <!-- JQUERY VALIDATE -->
    
    <script src="<?php echo $backend_assets; ?>js/plugin/jquery-validate/jquery.validate.min.js"></script>
    <!-- JQUERY MASKED INPUT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
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

     
      <script src="<?php echo $backend_assets; ?>custom/js/common.js"></script>
 		<script type="text/javascript">
 			$("#dob").datepicker({
  dateFormat  : 'dd-mm-yy',
  maxDate     : new Date(),
  changeMonth : true,
  changeYear  : true,
  yearRange   : "-100:+0",
  prevText    : '<i class="fa fa-chevron-left"></i>',
  nextText    : '<i class="fa fa-chevron-right"></i>',
});
 		</script>
        
    <?php if(!empty($front_scripts)) { load_js($front_scripts);} //load required page scripts ?>
</body>

</html>
