<!-- Footer -->
 <?php $frontend_assets =  base_url().'frontend_assets/';?>
	<footer id="footer">
		<!-- Footer-Top -->
		<div class="footer_top primary-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-4 top_widget">
						<div class="footer_logo">
							<a href="#"><img src="https://via.placeholder.com/110x46" alt="image"></a>
						</div>
					</div>
					<div class="col-md-4 top_widget">
					<!-- 	<div class="newsletter">
							<form>
								<div class="email_input">
									<input type="email" placeholder="Email address">
								</div>
								<button type="submit">Submit <i class="fa fa-caret-right"></i></button>
							</form>
						</div> -->
					</div>
					<div class="col-md-4 top_widget">
					<!-- 	<div class="follow_us">
							<ul class="text-custom-align-right">
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div> -->
					</div>
				</div>
			</div>
		</div>
		<!-- /Footer-Top -->

		<!-- Footer-Widgets -->
		<div class="container">
			<div class="row">
				<div class="col-md-4 footer_widget">
					<div class="widget_inner">
						<h5>Contact Us</h5>
						<p>4873 New York,47</p>
						<p>E: <a href="email@email.com">email@email.com</a></p>
						<p>P: +011 4532 5698 303</p>
					</div>
				</div>
				<div class="col-md-4 footer_widget">
					<div class="widget_inner">
						<div class="video_post">
							<div class="exp-vido-icon">
								<div class="video_post_icon">
									<a class="popup-youtube" href="https://www.youtube.com/watch?v=AdZrEIo6UYU" tabindex="0"><i class="fa fa-play"></i></a>
								</div>
							</div>
							<img src="https://via.placeholder.com/510x240" alt="image" class="mx-auto image-fluid d-block">
						</div>
					</div>
				</div>
				<div class="col-md-4 footer_widget">
<!-- 					<div class="widget_inner">
						<h5>Useful Links</h5>
						<div class="footer_nav">
							<ul>
								<li><a href="#">FAQ</a></li>
								<li><a href="#">Account</a></li>
								<li><a href="#">Privacy</a></li>
								<li><a href="#">Cart</a></li>
								<li><a href="#">Terms</a></li>
								<li><a href="#">Checkout</a></li>
							</ul>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<!-- /Footer-Widgets -->

		<!-- Footer-Bottom -->
		<div class="footer_bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 align-self-center">
						<p class="mb-0">&copy; <?= date('Y');?> .All Rights Reserved</p>
					</div>
					<div class="col-lg-4 align-self-center">
						<div id="back-top" class="back-top">
							<a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a>
						</div>
					</div>
					<div class="col-lg-4 align-self-center">
						<div class="footer_links">
							<a href="<?= base_url(); ?>">Home</a>
							<a href="<?= base_url(); ?>about-us">About Us</a>
							<a href="<?= base_url(); ?>user-form">User Form</a>
							<a href="<?= base_url(); ?>contact-us">Contact</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Footer-Bottom -->
	</footer>
	<!-- /Footer -->

	<!-- PDF modal -->
<div class="modal fade video-modal" id="pdfmodal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <!-- Modal Header -->                
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->                
            <div class="modal-body no-padding">                  
            	
            	<div class="download">
            		<h5>Shinto — “The Way Of The Kami”</h5>
            		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            		<div class="icon-block">
            		<a href="#">
            			Download
                        <i class="fas fa-file-download"></i>
            		</a>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>

<!-- Share modal -->
<div class="modal fade video-modal" id="sharemodal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <!-- Modal Header -->                
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->                
            <div class="modal-body no-padding">                  
            	<div class="share-icons">
            		<h5>Share the Message by 'Mabuchi'</h5>
            		
            		<ul>
						<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li><a href="#"><i class="fab fa-youtube"></i></a></li>
						<li><a href="#"><i class="fab fa-instagram"></i></a></li>
					</ul>
            	</div>               
            </div>
        </div>
    </div>
</div>

<!-- Audio modal -->
<div class="modal fade video-modal" id="audiomodal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <!-- Modal Header -->                
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->                
            <div class="modal-body no-padding">                  
            	<div class="preach-audio">
            		<h5>Listen The 'Preach'</h5>
            		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            		<div class="audio-player">
								<div id="play-btn">
									<i class="fa fa-play"> </i>
									<i class="fa fa-pause"></i>
								</div>
								<div class="audio-wrapper" id="player-container">
									<audio id="player" ontimeupdate="initProgressBar()">
									</audio>
								</div>
								<div class="player-controls scrubber">
									<small class="end-time">5:44</small>
									<span id="seekObjContainer"> <progress id="seekObj" value="0" max="1"></progress> </span>
									<i class="fa fa-volume-up"></i>
								</div>
								<div class="next_prev">
									<i class="fa fa-angle-left"></i>
									<i class="fa fa-angle-right"></i>
								</div>
							</div>
            	</div>               
            </div>
        </div>
    </div>
</div>
	<!-- Scripts -->
	<script src="<?= $frontend_assets; ?>assets/js/jquery.min.js"></script>
	<script src="<?= $frontend_assets; ?>assets/js/bootstrap.min.js"></script>
	<!--Magnific-Popup-JS-->
	<script src="<?= $frontend_assets; ?>assets/js/jquery.magnific-popup.min.js"></script>
	<!-- Countdown -->
	<script src="<?= $frontend_assets; ?>assets/js/jquery.countdown.min.js"></script>
	<!--Custome-JS-->
	<script src="<?= $frontend_assets; ?>assets/js/interface.js"></script>
	<!--Carousel-JS-->
	<script src="<?= $frontend_assets; ?>assets/js/owl.carousel.min.js"></script>
	<!--Audio-JS-->
	<script src="<?= $frontend_assets; ?>assets/js/slick.min.js"></script>
	<!--ion-range-slider-JS-->
	<script src="<?= $frontend_assets; ?>assets/js/ion.rangeSlider.min.js"></script>
	<!--Audio-JS-->
	<script src="<?= $frontend_assets; ?>assets/js/audio_custome.js"></script>
</body>

</html>
