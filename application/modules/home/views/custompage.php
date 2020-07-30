
	<!-- Inner-intro -->
	<section id="inner_intro" class="section-padding">
		<div class="container">
			<div class="inner_wp z_index white_text">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center"><?= $info['title']; ?></h1>
						<nav class="breadcrumb">
							<ul>
								<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item active"><?= $info['title']; ?></li>
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
					<div class="col-xl-12 col-md-12">
					<?= $info['description']; ?>
				</div>
					
					
				</div>
			</div>
		</section>