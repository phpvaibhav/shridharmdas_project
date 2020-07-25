<style type="text/css">
	.select2-container {
    margin: 0;
    position: relative;
    display: inline-block;
    zoom: 1;
    *display: inline;
    vertical-align: middle;
    width: 100% !important;
}
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
<!-- row -->
<?php $backend_assets=base_url().'backend_assets/'; ?>
<div class="row">

	<div class="col-sm-12">


			<div class="well well-sm">
				<header><h3 class="no-margin"><a href="javascript:void(0);"><?= $info['name'];?></a></h3></header>
				<hr>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12">
						About : <?= $info['about'];?>
					</div>
				</div>
				<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-12">
						
						<div class="well well-light well-sm no-margin no-padding">
							<div class="row">

								<div class="col-sm-12">
									

									<div class="padding-10">

										<ul class="nav nav-tabs tabs-pull-left">
											<li class="active">
												<a href="#a1" data-toggle="tab">Maharaj Sahab</a>
											</li>
											<li>
												<a href="#a2" data-toggle="tab">Contact us</a>
											</li>
											<li>
												<a href="#a3" data-toggle="tab">Address</a>
											</li>
											<li class="pull-right">
												<span class="margin-top-10 display-inline"><i class="fa fa-rss text-success"></i> Activity</span>
											</li>
										</ul>

										<div class="tab-content padding-top-10">
											<div class="tab-pane fade in active" id="a1">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<a href="javascript:void(0);" class="btn btn-labeled btn-success margin-bottom-5 pull-right"  onclick="openActionShishya();"> <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Add </a>
													</div>
												</div>
												
													<div class="row">
										<div class="text">
											<?php if(!empty($shishya)): foreach ($shishya as $k => $v) { ?>
											<div class="col-sm-12 col-md-6 col-lg-4">
												<div class="well text-center connect">
													<img src="<?= $backend_assets; ?>img/avatars/male.png" alt="img" class="margin-bottom-5 margin-top-5">
													<br>
													<span class="font-sm"><b><?= $v->name; ?></b></span>
													<br>
													<a href="<?= base_url().'admin/sant/detail/'.encoding($v->santId); ?>" class="btn btn-xs btn-success margin-top-5 margin-bottom-5"> <span class="font-xs">Detail</span> </a>
													
												</div>
											</div>
											<?php } else: ?>
												<div class="col-sm-12 col-md-6 col-lg-12">
												<div class="text-center">
													Record not found.
												</div>
											</div>
											<?php endif; ?>
											
										</div>
									</div>

												

											</div>
											<div class="tab-pane fade" id="a2">
												<!-- test -->
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<a href="javascript:void(0);" class="btn btn-labeled btn-success margin-bottom-5 pull-right"  onclick="openActionCon();"> <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Add Contact</a>
													</div>
												</div>
												<div class="row">
												<div class="col-sm-12">
													<ul class="list-unstyled">
														<?php if(!empty($con_list)): foreach ($con_list as $kc => $c) {?>
											<li>
												<!-- <h4 class="semi-bold">Rogers, Inc.</h4> -->
													<address>
														<strong><?= $c->name; ?></strong>
														<br>
														<?= $c->address; ?>
														<br>
														<?= $c->city.", ".$c->state.", ".$c->country.", ".$c->zip; ?>
														<br>
														<abbr title="Phone">M:</abbr> <?= $c->contact; ?> <span><a href="javascript:void(0);" onclick="confirmAction(this);" data-message="You want to delete this record!" data-id="<?= encoding($c->contactId);?>" data-url="adminapi/sant/recordDelete_1" data-list="0"  class="on-default edit-row table_action" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span>
													</address>

											</li>
										<?php } else: ?>
											<li>
												<div class="text-center">No Record Found.</div>
											</li>
										<?php endif; ?>
										</ul>
													
												</div>
												
											</div>
												<!-- test -->

											</div>
											<div class="tab-pane fade" id="a3">

												<div class="text-center-1">
													<!-- Maintenance  -->
													<form action="sant/address" id="addresssAddUpdate" class="smart-form" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">

						<header>
							Address
						</header>
						<fieldset>
							<div class="row">
								<section class="col col-md-12">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="address" placeholder="Address" id="autocomplete0" class="autocomplete" data-id="0" maxlength="300" size="300" value="<?= $info['address']; ?>" >
										<input type="hidden" name="id" value="<?= encoding($info['santId']); ?>">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" class="latitudeautocomplete0" name="latitude" placeholder="latitude" maxlength="30" size="30" value="<?= $info['latitude']; ?>" readonly="">
									</label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text"  class="longitudeautocomplete0" name="longitude" placeholder="longitude" maxlength="30" size="30" readonly="" value="<?= $info['longitude']; ?>">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-3">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="street" placeholder="Street" class="street_numberautocomplete0" maxlength="30" size="30" value="<?= $info['street']; ?>" >
									</label>
								</section>
								<section class="col col-9">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="street2" placeholder="Street Second" class="routeautocomplete0" maxlength="30" size="30" value="<?= $info['street2']; ?>">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="city" placeholder="City" class="localityautocomplete0" maxlength="30" size="30" value="<?= $info['city']; ?>">
									</label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="state" placeholder="State" class="administrative_area_level_1autocomplete0" maxlength="30" size="30" value="<?= $info['state']; ?>" >
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="zip" placeholder="Zip Code" class="postal_codeautocomplete0 number-only1" maxlength="15" size="15" value="<?= $info['zip']; ?>">
									</label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="country" placeholder="Country" class="countryautocomplete0" maxlength="15" size="15" value="<?= $info['country']; ?>">
									</label>
								</section>
							</div>
						</fieldset>				
						<footer>
							<button type="submit" id="submit" class="btn btn-primary">
								Add 
							</button>
						</footer>
					</form>
													<!-- Maintenance  -->
												</div>

											</div>
											<!-- end tab -->
										</div>

									</div>

								</div>

							</div>
							<!-- end row -->

						</div>

					</div>
					
				</div>

			</div>


	</div>

</div>

<!-- end row -->

<!-- Modal -->
<div class="modal fade" id="add-data-shishya" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<?= lang('sant_satee'); ?>
				</h4>
			</div>
			<div class="modal-body">
	           <!-- Add CUstomer -->
				<!-- widget content -->
				<div class="widget-body no-padding">
					<form action="sant/addSant" id="create-pro-sant" class="smart-form" novalidate="novalidate" autocomplete="off">
					
						<fieldset>
							<input type="hidden" name="id" id="id"  value="<?= encoding($info['santId']); ?>" >
							<?php $sm = !empty($info['shishya']) ? explode(",",$info['shishya']) :array() ; ?>
								<section>
									<label class="label"><?= lang('sant_satee').' '.lang('Name'); ?></label>
									<select name="santIdM[]"  class="form-control js-example-basic-single "  id="santIdM" multiple="multiple" data-placeholder="Select a sant">
					<?php if(!empty($shishyaList)):?>
						
					<?php foreach ($shishyaList as $kc => $s) { ?>
						<option value="<?= $s->santId; ?>" <?= in_array($s->santId,$sm)?"selected='selected'":"";  ?>><?=  $s->name; ?></option>
					<?php } endif; ?>
					</select>
								</section>
								
								
						</fieldset>

						<footer>
							<button type="submit" id="submit" class="btn btn-primary">
								<?= lang('Save'); ?>
							</button>
						</footer>
					</form>
				</div>
				<!-- end widget content -->
				<!-- Add CUstomer -->
	        </div>
		</div>
	</div>
</div>
<!-- End modal -->
<!-- Modal -->
<div class="modal fade" id="add-data-contact" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Add
				</h4>
			</div>
			<div class="modal-body">
	           <!-- Add CUstomer -->
				<!-- widget content -->
				<div class="widget-body no-padding">
					<form action="sant/addSantContact" id="create-pro-sant-contact" class="smart-form" novalidate="novalidate" autocomplete="off">
					
						<fieldset>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input type="text" name="contactName" placeholder="Contact Name" maxlength="30" size="30">
									</label>
								</section>
							
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-phone"></i>
										<input type="text" name="contactNumber" placeholder="Contact Number" data-mask="(99999) 999999">
									</label>
								</section>
							</div>
							<!-- Address name -->
							<div class="row">
								<section class="col col-md-12">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="address" placeholder="Address" id="autocomplete1" class="autocomplete" data-id="1" maxlength="300" size="300">
										<input type="hidden" name="id" value="<?= encoding($info['santId']); ?>">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" class="latitudeautocomplete1" name="latitude" placeholder="latitude" maxlength="30" size="30"  readonly="">
									</label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text"  class="longitudeautocomplete1" name="longitude" placeholder="longitude" maxlength="30" size="30" readonly="" >
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-3">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="street" placeholder="Street" class="street_numberautocomplete1" maxlength="30" size="30"  >
									</label>
								</section>
								<section class="col col-9">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="street2" placeholder="Street Second" class="routeautocomplete1" maxlength="30" size="30" >
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="city" placeholder="City" class="localityautocomplete1" maxlength="30" size="30" >
									</label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="state" placeholder="State" class="administrative_area_level_1autocomplete1" maxlength="30" size="30"  >
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="zip" placeholder="Zip Code" class="postal_codeautocomplete1 number-only1" maxlength="15" size="15" >
									</label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="country" placeholder="Country" class="countryautocomplete1" maxlength="15" size="15" >
									</label>
								</section>
							</div>
							<!-- Address name -->
							
								
								
						</fieldset>

						<footer>
							<button type="submit" id="submit" class="btn btn-primary">
								Submit
							</button>
						</footer>
					</form>
				</div>
				<!-- end widget content -->
				<!-- Add CUstomer -->
	        </div>
		</div>
	</div>
</div>
<!-- End modal -->