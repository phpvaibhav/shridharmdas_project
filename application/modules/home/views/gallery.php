        <style type="text/css">
          
            .demo-gallery > ul {
              margin-bottom: 0;
            }
            .demo-gallery > ul > li {
                float: left;
                margin-bottom: 15px;
                margin-right: 20px;
                width: 200px;
            }
            .demo-gallery > ul > li a {
              border: 3px solid #FFF;
              border-radius: 3px;
              display: block;
              overflow: hidden;
              position: relative;
              float: left;
            }
            .demo-gallery > ul > li a > img {
              -webkit-transition: -webkit-transform 0.15s ease 0s;
              -moz-transition: -moz-transform 0.15s ease 0s;
              -o-transition: -o-transform 0.15s ease 0s;
              transition: transform 0.15s ease 0s;
              -webkit-transform: scale3d(1, 1, 1);
              transform: scale3d(1, 1, 1);
              height: 100%;
              width: 100%;
            }
            .demo-gallery > ul > li a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster > img {
              opacity: 1;
            }
            .demo-gallery > ul > li a .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.1);
              bottom: 0;
              left: 0;
              position: absolute;
              right: 0;
              top: 0;
              -webkit-transition: background-color 0.15s ease 0s;
              -o-transition: background-color 0.15s ease 0s;
              transition: background-color 0.15s ease 0s;
            }
            .demo-gallery > ul > li a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .justified-gallery > a > img {
              -webkit-transition: -webkit-transform 0.15s ease 0s;
              -moz-transition: -moz-transform 0.15s ease 0s;
              -o-transition: -o-transform 0.15s ease 0s;
              transition: transform 0.15s ease 0s;
              -webkit-transform: scale3d(1, 1, 1);
              transform: scale3d(1, 1, 1);
              height: 100%;
              width: 100%;
            }
            .demo-gallery .justified-gallery > a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
              opacity: 1;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.1);
              bottom: 0;
              left: 0;
              position: absolute;
              right: 0;
              top: 0;
              -webkit-transition: background-color 0.15s ease 0s;
              -o-transition: background-color 0.15s ease 0s;
              transition: background-color 0.15s ease 0s;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .video .demo-gallery-poster img {
              height: 48px;
              margin-left: -24px;
              margin-top: -24px;
              opacity: 0.8;
              width: 48px;
            }
            .demo-gallery.dark > ul > li a {
              border: 3px solid #04070a;
            }
            .demo-gallery {
              padding-bottom: 80px;
            }
        </style>
	<!-- Inner-intro -->
	<section id="inner_intro" class="section-padding">
		<div class="container">
			<div class="inner_wp z_index white_text">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center">Gallery</h1>
						<nav class="breadcrumb">
							<ul>
								<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item active">Gallery</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Inner-intro -->

	<section class="sa-paster-about-section section-padding pd-default">
	<div class="container">
		<div class="row">
      <div class="col-xl-12 col-md-12 text-center">
          <h2>Coming <u class="text-custom-primary">Soon</u></h2>
        </div>
			<div class="col-lg-12">
				<div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                <li class="col-xs-6 col-sm-3 col-md-3" data-responsive="<?= base_url('frontend_assets/lightGallery/demo/'); ?>img/1-375.jpg 375, <?= base_url('frontend_assets/lightGallery/demo/'); ?>img/1-480.jpg 480, <?= base_url('frontend_assets/lightGallery/demo/'); ?>img/1.jpg 800" data-src="<?= base_url('frontend_assets/lightGallery/demo/'); ?>img/1-1600.jpg" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                    <a href="">
                      <img class="img-responsive" src="<?= base_url('frontend_assets/lightGallery/demo/'); ?>img/thumb-1.jpg">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3 col-md-3" data-responsive="<?= base_url('frontend_assets/lightGallery/demo/'); ?>img/2-375.jpg 375, <?= base_url('frontend_assets/lightGallery/demo/'); ?>img/2-480.jpg 480, <?= base_url('frontend_assets/lightGallery/demo/'); ?>img/2.jpg 800" data-src="<?= base_url('frontend_assets/lightGallery/demo/'); ?>img/2-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                      <img class="img-responsive" src="<?= base_url('frontend_assets/lightGallery/demo/'); ?>img/thumb-2.jpg">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3 col-md-3" data-responsive="<?= base_url('frontend_assets/lightGallery/demo/'); ?>img/13-375.jpg 375, <?= base_url('frontend_assets/lightGallery/demo/'); ?>img/13-480.jpg 480, <?= base_url('frontend_assets/lightGallery/demo/'); ?>img/13.jpg 800" data-src="<?= base_url('frontend_assets/lightGallery/demo/'); ?>img/13-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                      <img class="img-responsive" src="<?= base_url('frontend_assets/lightGallery/demo/'); ?>img/thumb-13.jpg">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3 col-md-3" data-responsive="<?= base_url('frontend_assets/lightGallery/demo/'); ?>img/4-375.jpg 375, <?= base_url('frontend_assets/lightGallery/demo/'); ?>img/4-480.jpg 480, <?= base_url('frontend_assets/lightGallery/demo/'); ?>img/4.jpg 800" data-src="<?= base_url('frontend_assets/lightGallery/demo/'); ?>img/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                      <img class="img-responsive" src="<?= base_url('frontend_assets/lightGallery/demo/'); ?>img/thumb-4.jpg">
                    </a>
                </li>
            </ul>
        </div>
			</div>
		</div>
	</div>
	</section>