<div id="main" role="main">
	<!-- MAIN CONTENT -->
	<div id="content" class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
				<div class="well no-padding">
					<form method="post" action="adminapi/forgotPassword" id="forgot-form" class="smart-form client-form">
						<header>
							<?= lang('forgot_password');?>
						</header>
						<fieldset>
							<section>
								<label class="label"><?= lang('Please_enter_email_address'); ?><span class="error">*</span></label>
								<label class="input"> <i class="icon-append fa fa-envelope"></i>
									<input type="email" name="email" maxlength="100" size="100">
									<b class="tooltip tooltip-top-right"><i class="fa fa-envelope txt-color-teal"></i> <?= lang('Please_enter_email_address_to_reset_password'); ?></b></label>
							</section>
							<section>	
								<div class="note">
									<a href="<?php  echo base_url(); ?>"><?= lang('I_remembered_my_password');?>!</a>
								</div>
							</section>
						</fieldset>
						<footer>
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-refresh"></i> <?= lang('Reset_Password'); ?>
							</button>
						</footer>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>