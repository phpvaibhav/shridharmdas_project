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
    background-clip: padding-box !important;
    -webkit-touch-callout: none !important;
    -webkit-user-select: none !important;
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
															<form id="user-update-form" class="smart-form" novalidate="novalidate" action="users/update" novalidate="novalidate" autocomplete="off">
												<div class="row">

	<!-- NEW COL START -->
	<article class="col-sm-12 col-md-12 col-lg-8 col-lg-offset-3">
		
			<div class="table-responsive1">
							<table class="table table-striped table-bordered table-hover">
								<thead>			                
									<tr>
										<th data-hide="phone">Name</th>
										<th data-hide="phone">English</th>
										<th data-hide="phone">Hindi</th>
										<th data-hide="phone">Actual</th>
									
									</tr>
								</thead>
									<tr>
										<td data-hide="phone">Full Name</td>
										<td data-hide="phone"><?= @$info['fullName'] ." (".@$usermeta['hindiFullName'].")"; ?></td>
										<td data-hide="phone"><?= @$usermeta['hindiFullName']; ?></td>
										<td data-hide="phone"><?= @$usermeta['actualFullName']; ?></td>
									
									</tr>
									<tr>
										<td >First Name</td>
										<td ><?= @$info['firstName']; ?></td>
										<td ><?= @$usermeta['hindiFirstName']; ?></td>
										<td ><?= @$usermeta['actualFirstName'] ; ?></td>
									</tr>
									<tr>
										<td >Last Name</td>
										<td ><?= @$info['lastName']; ?></td>
										<td ><?= @$usermeta['hindiLastName']; ?></td>
										<td ><?= @$usermeta['actualLastName']; ?></td>
									</tr>
									<tr>
										<td >S/O W/O</td>
										<td ><?= @$info['parentName']; ?></td>
										<td ><?= @$usermeta['hindiParentName']; ?></td>
										<td ><?= @$usermeta['actualParentName']; ?></td>
									</tr>
									<tr>
										<td >Family Head Name</td>
										<td ><?= @$info['familyHeadName'] ; ?></td>
										<td ><?= @$usermeta['hindiFamilyHeadName']; ?></td>
										<td ><?= @$usermeta['actualFamilyHeadName'] ; ?></td>
									</tr>
									<tr>
										<td >Identity Type</td>
										<td colspan="3" ><?= @$info['identityType'] ; ?></td>
									
									</tr>
									
									<tr>
										<td >Identity Image</td>
										<td colspan="3">
											<?php
											$furl = "https://via.placeholder.com/640x360";
											if(!empty($info['identityImage'])){
												$furl = base_url().'uploads/identity/'.$info['identityImage'];
												
											}else{
												if(!empty($info['frontAadharImage'])){
													$furl = base_url().'uploads/aadhar/'.$info['frontAadharImage'];
												
												}

											}
												

												?>
											<img src="<?= $furl; ?>" width="300" height="255" class="img img-thumbnail"></td>
									</tr>
<!-- 									<tr>
										<td >Back Aadhar Image</td>
										<td colspan="3">
<?php
											$burl = "https://via.placeholder.com/640x360";
											if(!empty($info['backAadharImage'])){
												$burl = base_url().'uploads/aadhar/'.$info['backAadharImage'];
											}
												

												?>
											<img src="<?= $burl; ?>" width="300" height="255" class="img img-thumbnail"></td>
									</tr> -->
									
								<tbody>			
								</tbody>
								
							</table>
						</div>
	</article></div>
				
																           <!--  <fieldset>
              <div class="row">
                <section class="col col-6">
                	<input type="hidden" name="id" value="<?= encoding($info['id']); ?>">
                  <label class="input"> <i class="icon-prepend fa fa-sun-o"></i>
                    <input type="text" name="preceptorName" placeholder="<?= lang('Preceptor').' '.lang('Name'); ?>" value="<?= @$usermeta['preceptorName']; ?>" >
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-sitemap"></i>
                    <input type="text" name="unionName" placeholder="<?= lang('Union').' '.lang('Name'); ?>" value="<?= @$usermeta['unionName']; ?>">
                  </label>
                </section>
              </div>
              <div class="row">
                  <section class="col col-6">
                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                      <input type="text" name="firstName" value="<?= @$info['firstName']; ?>" placeholder="<?= lang('First_name'); ?>">
                    </label>
                  </section>
                  <section class="col col-6">
                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                      <input type="text" name="lastName" value="<?= @$info['lastName']; ?>" placeholder="<?= lang('Last_name'); ?>">
                    </label>
                  </section>
              </div>

              <div class="row">
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="parentName" value="<?= @$info['parentName']; ?>" placeholder="<?= lang('parentName'); ?>">
                  </label>
                </section>
                  <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    <input type="text" name="dob" id="dob" value="<?= date('d-m-Y',strtotime($info['dob'])); ?>" placeholder="<?= lang('dob'); ?>" readonly="">
                  </label>
                </section>

              </div>

              <div class="row">
                
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                    <input type="text" name="contactNumber" value="<?= $info['contactNumber']; ?>" placeholder="<?= lang('Phone'); ?>" data-mask="999 999 9999">
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-list"></i>
                    <input type="text" name="aadharNumber" value="<?= $info['aadharNumber']; ?>"  placeholder="<?= lang('Aadhar_number'); ?>" data-mask="9999-9999-9999">
                  </label>
                </section>
              </div>  
              
              <div class="row">
                  <section class="col col-6">
                   <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                    <input type="email" name="email" value="<?= $info['email']; ?>"   placeholder="<?= lang('email'); ?>">
                  </label>
                  </section>
                    <section class="col col-6">
                   <label class="input"> <i class="icon-prepend fa fa-tag"></i>
                    <input type="text" name="education" value="<?= $usermeta['education']; ?>" placeholder="<?= lang('Education'); ?>">
                  </label>
                  </section>
               
              
              </div>
              <div class="row">
                <section class="col col-6">
                  <label class="select">
                    <select name="gender">
                      <option value="" selected="" disabled=""><?= lang('Select_Gender'); ?></option>
                      <option value="Male" <?= $info['gender']=='Male' ?"selected='selected'":""; ?> ><?= lang('Male');?></option>
                      <option value="Female" <?= $info['gender']=='Female' ?"selected='selected'":""; ?>><?= lang('Female');?></option>
                    </select> <i></i> </label>
                </section>
                  <section class="col col-6">
                  <label class="select">
                    <select name="maritalStatus">
                      <option value="" selected="" disabled=""><?= lang('Marital_Status'); ?></option>
                      <option value="Married" <?= $info['maritalStatus']=='Married' ?"selected='selected'":""; ?>><?= lang('married');?></option>
                      <option value="Unmarried" <?= $info['maritalStatus']=='Unmarried' ?"selected='selected'":""; ?>><?= lang('unmarried');?></option>
                      <option value="Divorced" <?= $info['maritalStatus']=='Divorced' ?"selected='selected'":""; ?>><?= lang('divorced');?></option>
                    </select> <i></i> </label>
                </section>
               
           
              </div>
              <div class="row">
                   <section class="col col-6">
                     <?php 
                     		$rk = !empty($usermeta['religiousKnowledge']) ? explode(",",$usermeta['religiousKnowledge']): array();

                    // $info['maritalStatus']=='Unmarried' ?"selected='selected'":"";
                      ?>
                      <select name="religiousKnowledge[]" multiple style="width:100%" class="select2" data-placeholder="<?= lang('Religious_knowledge'); ?>">
                  
                      <option value="णमोकार मंत्र" <?= in_array("णमोकार मंत्र", $rk) ? "selected='selected'":""; ?>> णमोकार मंत्र</option>
                      <option value="सामायिक" <?= in_array("सामायिक", $rk) ? "selected='selected'":""; ?>>सामायिक</option>
                      <option value="प्रतिक्रमण" <?= in_array("प्रतिक्रमण", $rk) ? "selected='selected'":""; ?>>प्रतिक्रमण</option>
                      <option value="पच्चीस बोल" <?= in_array("पच्चीस बोल", $rk) ? "selected='selected'":""; ?> >पच्चीस बोल</option>
                      <option value="पुच्छिस्सुणम्" <?= in_array("पुच्छिस्सुणम्", $rk) ? "selected='selected'":""; ?> >पुच्छिस्सुणम्</option>
                      <option value="दशवैकालिक सूत्र" <?= in_array("दशवैकालिक सूत्र", $rk) ? "selected='selected'":""; ?>>दशवैकालिक सूत्र</option>
                      <option value="उत्तराध्ययन सूत्र" <?= in_array("उत्तराध्ययन सूत्र", $rk) ? "selected='selected'":""; ?>>उत्तराध्ययन सूत्र</option>
                      <option value="अन्य" <?= in_array("अन्य", $rk) ? "selected='selected'":""; ?>>अन्य</option>
                     
                      </select>
                  </section>
                
        
                  <section class="col col-6">
                      <label class="select">
                      <select name="profession">
                      <option value="" selected="" disabled=""><?= lang('Profession'); ?></option>
                      <option value="job" <?=  $usermeta['profession']=='job' ?"selected='selected'":""; ?>>Job</option>
                      <option value="business" <?=  $usermeta['profession']=='business' ?"selected='selected'":""; ?>>Business</option>
                      <option value="house wife" <?=  $usermeta['profession']=='house wife' ?"selected='selected'":""; ?>>House wife</option>
                      <option value="student" <?=  $usermeta['profession']=='student' ?"selected='selected'":""; ?>>Student</option>
                      </select> <i></i> </label>
                  </section>
           
              </div>
              <div class="row">
                
                  <section class="col col-6">
                      <label class="select">
                      <select name="bloodGroup">
                      <option value="" selected="" disabled=""><?= lang('blood_group'); ?></option>
                      <option value="A+" <?=  $usermeta['bloodGroup']=='A+' ?"selected='selected'":""; ?>>A+</option>
                      <option value="O+" <?=  $usermeta['bloodGroup']=='O+' ?"selected='selected'":""; ?>>O+</option>
                      <option value="B+" <?=  $usermeta['bloodGroup']=='B+' ?"selected='selected'":""; ?>>B+</option>
                      <option value="AB+" <?=  $usermeta['bloodGroup']=='AB+' ?"selected='selected'":""; ?>>AB+</option>
                      <option value="A-"  <?=  $usermeta['bloodGroup']=='A-' ?"selected='selected'":""; ?>>A-</option>
                      <option value="O-" <?=  $usermeta['bloodGroup']=='O-' ?"selected='selected'":""; ?>>O-</option>
                      <option value="B-" <?=  $usermeta['bloodGroup']=='B-' ?"selected='selected'":""; ?>>B-</option>
                      <option value="AB-" <?=  $usermeta['bloodGroup']=='AB-' ?"selected='selected'":""; ?>>AB-</option>
                    
                      </select> <i></i> </label>
                  </section>
                   <section class="col col-6">
                   <label class="input"> <i class="icon-prepend fa fa-list"></i>
                    <input type="text" value="<?= $usermeta['unionResponsibility']; ?>" name="unionResponsibility" placeholder="<?= lang('unionResponsibility'); ?>">
                  </label>
                  </section>            
              </div>
    
            </fieldset> -->
             <!--   <footer>
                 <button type="submit" id="submit" class="btn btn-primary">
								<?= lang('Save'); ?>
							</button>
                  </footer> -->
															</form>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="a2">
												<div class="row">
													<div class="col-xs-12 col-sm-12">	
														<center><strong>Maintenance -2</strong></center>
														<!-- 	<form id="user-address-form" class="smart-form" novalidate="novalidate" action="users/addressupdate" novalidate="novalidate" autocomplete="off">
														            <header>
             <?= lang('home_address'); ?>
            </header>
            <fieldset>
              <section>
             
                <label for="address2" class="input">
                  <input type="text" name="address" id="addressu" value="<?= $addresses[0]->address; ?>" placeholder=" <?= lang('Address'); ?>">
                </label>
              </section>

              <div class="row">
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="city" id="cityu" value="<?= $addresses[0]->city; ?>" placeholder="<?= lang('City'); ?>">
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input">
                    <input type="text" name="zip_code" id="zip_codeu" value="<?= $addresses[0]->zip_code; ?>" placeholder="<?= lang('zip_code'); ?>" class="number-only">
                  </label>
                </section>
              </div>
               <div class="row">
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="tehsil" id="tehsilu"  value="<?= $addresses[0]->tehsil; ?>" placeholder="<?= lang('Tehsil'); ?>">
                  </label>
                </section>
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="district" id="districtu"  value="<?= $addresses[0]->district; ?>" placeholder="<?= lang('District'); ?>">
                  </label>
                </section>
               
              </div>
              
              <div class="row">
                <section class="col col-6">
                  <label class="select">
                    <select name="country"  class="countries" id="countryu">
                      <option value="0" selected="" disabled=""><?= lang('Country'); ?></option>
                      <?php if(!empty($countries)):
                        foreach ($countries as $k => $country) {?>
                          <option value="<?=  $country->country_name; ?>" <?=  ($country->country_id==100)?  "selected='selected'" :""; ?> ><?=  $country->country_name; ?></option>
                      <?php } endif; ?>
              
                    </select> <i></i> </label>
                </section>
                <section class="col col-6">
                  <label class="select">
                    <select  class="states" name="state" id="stateu">
                      <option value="0" selected="" disabled=""><?= lang('State'); ?></option>
              
                    </select> <i></i> </label>
                </section>
              
              
              </div>
          
            </fieldset>            
            <header>
                <div class="row">
                   <section class="col col-6">
                 <?= lang('office_address'); ?>
                  </section>  
                  <section class="col col-6">
                  <label class="checkbox pull-right">
                    <input type="checkbox" id="Same_AddressA" name="remember">
                    <i></i>Same as above</label>
                  </section>
              </div>
             
            </header>
            <fieldset>
              <section>
              	<input type="hidden" id="st" value="<?= $addresses[0]->state; ?>" >
              	<input type="hidden" id="ost" value="<?= $addresses[1]->state; ?>" >
              	<input type="hidden" name="addressId" value="<?= $addresses[0]->addressId; ?>" >
              	<input type="hidden" name="oaddressId" value="<?= $addresses[1]->addressId; ?>" >
                <label for="address2" class="input">
                  <input type="text" value="<?= $addresses[1]->address; ?>" name="oaddress" id="oaddressu" placeholder=" <?= lang('Address'); ?>">
                </label>
              </section>

              <div class="row">
                
                <section class="col col-6">
                
                    <label class="input">
                    <input type="text" name="ocity" id="ocityu" value="<?= $addresses[1]->city; ?>" placeholder="<?= lang('City'); ?>">
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input">
                    <input type="text" name="ozip_code" id="ozip_codeu" value="<?= $addresses[1]->zip_code; ?>"  placeholder="<?= lang('zip_code'); ?>" class="number-only">
                  </label>
                </section>
              </div>
               <div class="row">
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="otehsil" id="otehsilu" value="<?= $addresses[1]->tehsil; ?>" placeholder="<?= lang('Tehsil'); ?>">
                  </label>
                </section>
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="odistrict" id="odistrictu" value="<?= $addresses[1]->district; ?>" placeholder="<?= lang('District'); ?>">
                  </label>
                </section>
               
              </div>
              
              <div class="row">
                <section class="col col-6">
                  <label class="select">
                    <select name="ocountry"  class="countries" id="ocountryu">
                      <option value="0" selected="" disabled=""><?= lang('Country'); ?></option>
                      <?php if(!empty($countries)):
                        foreach ($countries as $k => $country) {?>
                          <option value="<?=  $country->country_name; ?>" <?=  ($country->country_id==100)?  "selected='selected'" :""; ?> ><?=  $country->country_name; ?></option>
                      <?php } endif; ?>
              
                    </select> <i></i> </label>
                </section>
                <section class="col col-6">
                  <label class="select">
                    <select  class="states" name="ostate" id="ostateu">
                      <option value="0" selected="" disabled=""><?= lang('State'); ?></option>
              
                    </select> <i></i> </label>
                </section>
              
              </div>
            </fieldset>
            <footer>
							<button type="submit" id="submitA" class="btn btn-primary">
								<?= lang('Save'); ?>
							</button>
						</footer>
        </form> -->
														<!-- <center><strong>Maintenance -2</strong></center> -->
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
<!-- END ROW -->
<script type="text/javascript">
  var Please_select_your_first_name ="<?= lang('Please_select_your_first_name');?>";
  var Please_select_your_last_name ="<?= lang('Please_select_your_last_name');?>";
  var Please_select_your_father_name_husband_name ="<?= lang('Please_select_your_father_name_husband_name');?>";
  var Please_select_your_date_of_birth ="<?= lang('Please_select_your_date_of_birth');?>";
  var Please_select_your_gender ="<?= lang('Please_select_your_gender');?>";
  var Please_select_your_marital_status ="<?= lang('Please_select_your_marital_status');?>";
  var Please_select_your_contact_number ="<?= lang('Please_select_your_contact_number');?>";
  var Please_select_your_aadhar_number ="<?= lang('Please_select_your_aadhar_number');?>";
  var Please_select_your_address ="<?= lang('Please_select_your_address');?>";
  var Please_select_your_city ="<?= lang('Please_select_your_city');?>";
  var Please_select_your_zip_code ="<?= lang('Please_select_your_zip_code');?>";
  var Please_select_your_tehsil ="<?= lang('Please_select_your_tehsil');?>";
  var Please_select_your_district ="<?= lang('Please_select_your_district');?>";
  var Good_job ="<?= lang('Good_job');?>";
  var Your_form_submitted_successfully ="<?= lang('Your_form_submitted_successfully');?>";
</script>