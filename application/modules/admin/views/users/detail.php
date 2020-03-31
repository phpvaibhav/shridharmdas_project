<?php $backend_assets=base_url().'backend_assets/'; ?>
<div class="row">

	<div class="col-sm-12">


			<div class="well well-sm">

				<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-3">
						<div class="well well-light well-sm no-margin no-padding">

							<div class="row">

							

								<div class="col-sm-12">

									<div class="row">
									
										<!-- <div class="col-sm-3">
											<img src="<?= $backend_assets; ?>img/avatars/sunny-big.png" alt="demo user">
											<div class="padding-10">
												<h4 class="font-md"><strong>1,543</strong>
												<br>
												<small>Followers</small></h4>
												<br>
												<h4 class="font-md"><strong>419</strong>
												<br>
												<small>Connections</small></h4>
											</div>
										</div> -->
										<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
											<h1><?= ucfirst($info['firstName']); ?> <span class="semi-bold"><?= ucfirst($info['lastName']); ?></span>
											<br>
											<!-- <small> CEO, SmartAdmin</small> --></h1>
										
											
											
											<ul class="list-unstyled">
												<li>
													<p class="text-muted"><i class="fa fa-bookmark" aria-hidden="true"></i> 
														Status :&nbsp;&nbsp;<span class="txt-color-darken pull-right"><label class="label label-<?= $info['status'] ? "success":"warning"; ?>"><?= $info['status'] ? "Active":"Inactive"; ?></label></span>
													</p>
												</li>
												<li>
													<p class="text-muted"><i class="fa fa-hand-o-right" aria-hidden="true"></i>
														Approval :&nbsp;&nbsp;<span class="txt-color-darken pull-right"><label class="label label-<?= $info['verifyUser'] ? "info":"danger"; ?>"><?= $info['verifyUser'] ? "Approved":"Not approved"; ?></label></span>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<i class="fa fa-list"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?= display_aadhar_text($info['aadharNumber'],6); ?></span>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<i class="fa fa-phone"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?= display_mobile_text($info['contactNumber']); ?></span>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<i class="fa fa-calendar"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?= display_placeholder_text(date('d-m-Y',strtotime($info['dob']))); ?></span>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<i class="fa fa-transgender"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?= display_placeholder_text($info['gender']); ?> 	<i class="fa fa-<?= ($info['gender']=='Female')?'female':'male'; ?>"></i> </span>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<i class="fa fa-heart"></i>&nbsp;&nbsp;<span c0lass="txt-color-darken"><?= display_placeholder_text($info['maritalStatus']); ?> </span>
													</p>
												</li>
												
												<li>
													<p class="text-muted">
														<i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="javascript:void(0);"><?= display_placeholder_text($info['email']); ?></a>
													</p>
												</li>
											</ul>
											<hr>
											<ul class="list-unstyled">
												<li>
													<p class="text-muted"><i class="fa fa-sun-o" aria-hidden="true"></i> 
														<?= lang('Preceptor').' '.lang('Name'); ?> :&nbsp;&nbsp;<span class="txt-color-darken pull-right"><?= display_placeholder_text($usermeta['preceptorName']); ?></span>
													</p>
												</li>
												
												<li>
													<p class="text-muted"><i class="fa fa-sitemap" aria-hidden="true"></i> 
														<?= lang('Union').' '.lang('Name'); ?> :&nbsp;&nbsp;<span class="txt-color-darken pull-right"><?= display_placeholder_text($usermeta['unionName']); ?></span>
													</p>
												</li>
												<li>
													<p class="text-muted"><i class="fa fa-tag" aria-hidden="true"></i> 
														<?= trim(lang('Education')); ?> :&nbsp;&nbsp;<span class="txt-color-darken pull-right"><?= display_placeholder_text($usermeta['education']); ?></span>
													</p>
												</li>
												<li>
													<p class="text-muted"><i class="fa fa-circle" aria-hidden="true"></i> 
														<?= trim(lang('Religious_knowledge')); ?> :&nbsp;&nbsp;
														<br><span class="txt-color-darken pull-right"><?= display_placeholder_text($usermeta['religiousKnowledge']); ?></span>
													</p>
													<br>
												</li>
												<li>
													<p class="text-muted"><i class="fa fa-circle" aria-hidden="true"></i> 
														<?= trim(lang('Profession')); ?> :&nbsp;&nbsp;
														<span class="txt-color-darken pull-right"><?= display_placeholder_text($usermeta['profession']); ?></span>
													</p>

												</li>
												<li>
													<p class="text-muted"><i class="fa fa-circle" aria-hidden="true"></i> 
														<?= trim(lang('blood_group')); ?> :&nbsp;
														<span class="txt-color-darken pull-right"><?= display_placeholder_text($usermeta['bloodGroup']); ?></span>
													</p>
												</l>
												<li>
													<p class="text-muted"><i class="fa fa-circle" aria-hidden="true"></i> 
														<?= trim(lang('unionResponsibility')); ?> :&nbsp;
														<span class="txt-color-darken pull-right"><?= display_placeholder_text($usermeta['unionResponsibility']); ?></span>
													</p>
												</li>
											</ul>
											<?php if(!empty($addresses)){ foreach ($addresses as $e => $address) {?>
											<br>
											<p class="font-md">
												<i><?= $address->addressType; ?> Address</i>
											</p>
											<p>
												<ul class="list-unstyled">
													<li>
														<p class="text-muted">
														<i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?= display_placeholder_text($address->address); ?></span>
														</p>
														<p><?= lang('City'); ?> : <?= display_placeholder_text($address->city); ?></p>
													<!-- 	<p><?= lang('zip_code'); ?> : <?= display_placeholder_text($address->zip_code); ?></p> -->
														<p><?= lang('Tehsil'); ?> : <?= display_placeholder_text($address->tehsil); ?></p>
														<p><?= lang('District'); ?> : <?= display_placeholder_text($address->district); ?></p>
														<p><?= lang('State'); ?> : <?= display_placeholder_text($address->state); ?></p>
														<p><?= lang('Country'); ?> : <?= display_placeholder_text($address->country); ?></p>
														<p><?= lang('zip_code'); ?> : <?= display_placeholder_text($address->zip_code); ?></p>
													</li>
												</ul>
											</p>
											<?php } } ?>
											<br>
											<p class="font-md">
												<i>Bio</i>
											</p>
											<p>
												<?= display_placeholder_text($info['bio']); ?>
											</p>
											<br>
											<br>
											<br>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-9">
						<!-- data -->
							<div class="row">
								<div class="col-sm-12">
									<div class="padding-10">
										<ul class="nav nav-tabs tabs-pull-left">
											<li class="active">
												<a href="#a1" data-toggle="tab">Basic info</a>
											</li>
											<li>
												<a href="#a2" data-toggle="tab">Address</a>
											</li>
											<li>
												<a href="#a3" data-toggle="tab">Education</a>
											</li>
											<li>
												<a href="#a4" data-toggle="tab">Occupation</a>
											</li>
											<li>
												<a href="#a5" data-toggle="tab">Family Member</a>
											</li>
											<li class="pull-right">
												<span class="margin-top-10 display-inline"><i class="fa fa-rss text-success"></i> Activity</span>
											</li>
										</ul>

										<div class="tab-content padding-top-10">
											<div class="tab-pane fade in active" id="a1">
												<div class="row">
													<div class="col-xs-12 col-sm-12">	
														<center><strong>Maintenance -1</strong></center>
<!-- 
 <select name="bloodgp" id="bloodgp" <?php echo($data['user_bloodgroup']==$bloodgp)?'checked':'' ?>>
    <option value="A+">A+</option
    <option value="B+">B+</option>
    <option value="AB+">AB+</option>
    <option value="O+">O+</option>
    <option value="A-">A-</option>
    <option value="B-">B-</option>
    <option value="AB-">AB-</option>
    <option value="O-">O-</option>
</select> -->


													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="a2">
												<div class="row">
													<div class="col-xs-12 col-sm-12">	
														<center><strong>Maintenance -2</strong></center>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="a3">
												<div class="row">
													<div class="col-xs-12 col-sm-12">	
														<center><strong>Maintenance -3</strong></center>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="a4">
												<div class="row">
													<div class="col-xs-12 col-sm-12">	
														<center><strong>Maintenance -4</strong></center>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="a5">

												<div class="row">
													<div class="col-xs-12 col-sm-12">	
														<center><strong>Maintenance -5</strong></center>
													</div>
												</div>

											</div>
											<!-- end tab -->
										</div>
									</div>
								</div>
							</div>
							<!-- end row -->
						<!-- data -->
					</div>
				</div>
			</div>
	</div>
</div>
<!-- end row-->