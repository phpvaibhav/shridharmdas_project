<?php $backend_assets=base_url().'backend_assets/'; ?>
<style type="text/css">
	.select2-container-multi .select2-choices .select2-search-choice, .select2-selection__choice {
    padding: 1px 28px 1px 8px !important;
    margin: 4px 0 3px 5px !important;
    position: relative;
    line-height: 18px;
    color: #fff;
    cursor: default;
    border: 1px solid #2a6395;
    -webkit-background-clip: padding-box !important;
    background-clip: padding-box;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: #3276b1;
}

</style>
<div class="row">
	<div class="col-sm-12">
		<div class="well well-sm">
			<div class="row">
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
						<div class="row">
								<div class="col-sm-12">
									<div class="padding-10">
										<ul class="nav nav-tabs tabs-pull-left">
											<li class="active">
												<a href="#a1" data-toggle="tab">Basic info</a>
											</li>

											<li>
												<a href="#a2" data-toggle="tab">Change password</a>
											</li>
										
											<li class="pull-right">
												<span class="margin-top-10 display-inline"><i class="fa fa-rss text-success"></i> Activity</span>
											</li>
										</ul>
										<div class="tab-content padding-top-10">
											<div class="tab-pane fade in active" id="a1">
												<div class="row">
													<div class="col-xs-12 col-sm-12">
														<!-- update -->
														<form action="updateUser" id="smart-form-updateuser-role" class="smart-form client-form" enctype="multipart/form-data" novalidate="" autocomplete="off">
														<!-- 	<header>
																<?= lang('Update'); ?>
															</header> -->
															<fieldset>
																<input type="hidden" name="userauth" value="<?php echo $this->uri->segment(2); ?>"><input type="hidden" name="roleId" value="<?php echo $userData['roleId']; ?>">
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
																<?php if($userData['roleId']==2): ?>
																		<section>
																		<select name="sanghId"  class="form-control js-example-basic-single "  id="sanghId">
																		<?php if(!empty($unionList)):?>
																		<option value="" selected="" disabled=""><?= lang('Union').' '.lang('Name'); ?></option>
																		<?php foreach ($unionList as $kc => $union) { ?>
																		<option value="<?= $union->sanghId; ?>" data-sanghname="<?=  $union->name; ?>"<?=  $union->sanghId==$userData['sanghId']?"selected='selected'":""; ?> ><?=  $union->name; ?></option>
																		<?php } endif; ?>
																		</select>
																		</section>
																<?php endif; ?>																<?php if($userData['roleId']==4):
																	$sa = isset($adminR) ?explode(",",$adminR) :array();
																//	print_r($sa);

																 ?>
																<section >
					<select name="sanghIdM[]"  class="form-control js-example-basic-single "  id="sanghIdM" multiple="multiple">
					<?php if(!empty($unionList)):?>
						<!-- <option value="" selected="" disabled=""><?= lang('Union').' '.lang('Name'); ?></option> -->
					<?php foreach ($unionList as $kc => $union) { ?>
						<option value="<?= $union->sanghId; ?>" data-sanghname="<?=  $union->name; ?>"  <?=  in_array($union->sanghId,$sa) ?"selected='selected'":""; ?> ><?=  $union->name; ?></option>
					<?php } endif; ?>
					</select>
				</section>
																<?php endif; ?>
															</fieldset>
															<footer>
																<button type="submit" id="submit" class="btn btn-primary"><?= lang('Update'); ?></button>
															</footer>
														</form>
														<!-- update -->
													</div>
												</div>
											</div>											
											<div class="tab-pane fade in" id="a2">
												<div class="row">
													<div class="col-xs-12 col-sm-12">
														<!-- update -->
														<form method="post" action="adminrole/changePassword" id="adminrole-changepass" class="smart-form client-form" enctype="multipart/form-data" novalidate autocomplete="off">
														<!-- 	<header>
																<?= lang('Change_Password'); ?>
															</header> -->
														
															<input type="hidden" name="userId" value="<?php echo $this->uri->segment(2); ?>">
															<fieldset>
															
																<section>
																	<label class="input"> <i class="icon-append fa fa-lock"></i>
																		<input type="password" name="npassword" autocomplete="new-password" id="npassword" placeholder="<?= lang('New_Password'); ?>" >
																		<b class="tooltip tooltip-bottom-right"> <?= lang('Please_enter_your_new_password');?></b> 
																	</label>
																</section>
																<section>
																	<label class="input"> <i class="icon-append fa fa-lock"></i>
																		<input type="password" name="rnpassword" placeholder="<?= lang('Confirm_Password'); ?>">
																		<b class="tooltip tooltip-bottom-right"> <?= lang('Please_re-enter_your_password'); ?></b> 
																	</label>
																</section>		
															</fieldset>
															<footer>
																<button type="submit" id="submitP" class="btn btn-primary"> <?= lang('Change_Password'); ?></button>
															</footer>
														</form>
														<!-- update -->
													</div>
												</div>
											</div>

											<!--  -->
										</div>
									</div>
								</div>
							</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end row-->