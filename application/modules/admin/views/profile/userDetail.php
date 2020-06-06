<?php $backend_assets=base_url().'backend_assets/'; ?>
<div class="row">
	<div class="col-sm-12">
		<div class="well well-sm">
			<div class="row">
				<?php
			/*	echo "<pre>";
				print_r($userData);
				echo "</pre>";

*/
				?>
				<div class="col-sm-12 col-md-12 col-lg-6">
					<div class="well well-light well-sm no-margin no-padding">
						<div class="row">
							<div class="col-sm-12">
								<div id="myCarousel" class="carousel fade profile-carousel">
									<div class="air air-bottom-right padding-10">
										<label class="center-block padding-5 label label-<?php echo $userData['status']?'success':'danger'; ?>"> <i class="fa fa-<?php echo $userData['status']?'check':'close'; ?>"></i><?php echo $userData['status']?' Active':' Inactive'; ?></label>
									</div>
									<div class="air air-top-left padding-10">
										<!-- <h4 class="txt-color-white font-md"><?php echo date('M d,Y',strtotime($userData['crd'])); ?></h4> -->
									</div>
									<div class="carousel-inner">
										<div class="item active">
											<img src="<?php echo $backend_assets;?>img/demo/s1.jpg" alt="demo user">
										</div>	
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-4 profile-pic">
										<?php 
											$img = $backend_assets.'img/avatars/sunny-big.png';
											if(!empty($userData['profileImage'])):
												$img = base_url().'uploads/admin/thumb/'.$userData['profileImage'];
											endif;
										?>
										<img src="<?php echo $img;?>" alt="<?php echo $userData['fullName'];?>">
									</div>
									<div class="col-sm-8">
										<?php $fullName =  $userData['fullName'];
											$name = explode(" ",$fullName);
										?>
										<h1>
											<?php for ($i=0; $i <sizeof($name) ; $i++) { 
												if($i==0){
													echo $name[$i];
												}else{
													echo '<span class="semi-bold"> '.$name[$i].'</span> ';
												}
											} ?>
											
										<br>
										<small><?php 
										echo $userData['userRole'];
										/*switch ($userData['userType']) {
											case 1:
												echo 'Super Admin';
												break;
											case 2:
												echo 'Customer';
												break;
											case 3:
												echo 'Employee';
												break;
											
											default:
												echo 'Unknown';
												break;
										}*/
										?></small></h1>
										<ul class="list-unstyled">
											<li>
												<p class="text-muted">
													<i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:<?php echo $userData['email']; ?>"><?php echo $userData['email']; ?></a>
												</p>
											</li>
											<li>
												<p class="text-muted">
													<i class="fa fa-phone"></i>&nbsp;&nbsp;<a href="javascript:void(0);"><?php echo $userData['contactNumber']; ?></a>
												</p>
											</li>
										</ul>
										<br>
										<br>
										<br>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6">
					<!-- update -->
					<form action="updateUser" id="smart-form-updateuser" class="smart-form client-form" enctype="multipart/form-data" novalidate="" autocomplete="off">
						<header>
							<?= lang('Update'); ?>
						</header>
						<fieldset>
							<input type="hidden" name="userauth" value="<?php echo $this->uri->segment(2); ?>">
							<section>
								<label class="input"> <i class="icon-append fa fa-user"></i>
								<input type="text" name="fullName" placeholder="<?=lang('Full_name');?>" value="<?php echo $userData['fullName']; ?>" maxlength="30" size="30">
								<b class="tooltip tooltip-bottom-right"> <?= lang('Please_enter_your_full_name'); ?></b> </label>
							</section>
							<section>
								<label class="input"> <i class="icon-append fa fa-envelope"></i>
									<input type="email" name="email" placeholder="<?=lang('email');?>" value="<?php echo $userData['email']; ?>" maxlength="30" size="30">
									<b class="tooltip tooltip-bottom-right"> <?= lang('Please_enter_your_registered_email_address'); ?></b>
								</label>
							</section>
							<section>
								<label class="input"> <i class="icon-append fa fa-phone"></i>
									<input type="text" name="contact" maxlength="20" size="20" class="number-only" placeholder="<?=lang('Contact');?>"  value="<?php echo $userData['contactNumber']; ?>" data-mask="(99999) 999999">
									<b class="tooltip tooltip-bottom-right"> <?= lang('Please_enter_your_contact_number'); ?></b> 
								</label>
							</section>
						
							<section>
								<div class="input input-file">
									<span class="button"><input type="file" name="profileImage" id="file" onchange="this.parentNode.nextSibling.value = this.value" accept="image/*">Browse</span><input type="text" readonly="" placeholder="Change Avatar">
								</div>
							</section>
						</fieldset>
						<footer>
							<?php
							 $u_user_permission_e  = isset($user_permission['profile']) ? json_decode($user_permission['profile'],true) :array();
              $u_edit_pre = isset($u_user_permission_e['edit'])? $u_user_permission_e['edit']:0;
              	if($u_edit_pre):
							 ?>
							<button type="submit" id="submit" class="btn btn-primary"><?= lang('Update'); ?></button>
						<?php endif; ?>
						</footer>
					</form>
					<!-- update -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end row-->