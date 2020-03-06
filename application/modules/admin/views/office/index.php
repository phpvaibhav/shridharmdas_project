<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" ta-widget-deletebutton="false" data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"data-widget-custombutton="false" data-widget-sortable="false" data-widget-collapsed="false" >
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"
				-->
				<header>
					<!-- <span class="widget-icon"> <i class="fa fa-users"></i> </span> -->
					<h2><?= lang('Office'); ?></h2>
				</header>
				<!-- widget div-->
				<div>
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
					</div>
					<!-- end widget edit box -->
					<!-- widget content -->
					<div class="widget-body padding">
						<div class="table-responsive">
							<table  class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-hide="phone">ID</th>
										<th data-hide="phone">Name</th>
										<th data-hide="phone,tablet">Email</th>
										<th data-hide="phone,tablet">Contact Number</th>
										<th data-hide="phone,tablet">Address</th>
										<th data-hide="phone,tablet">Status</th>
										<th data-hide="phone,tablet">Action</th>
									</tr>
								</thead>
								<tbody>			
								</tbody>
								<tfoot>
									<tr>
										<th data-hide="phone">ID</th>
										<th data-hide="phone">Name</th>
										<th data-hide="phone,tablet">Email</th>
										<th data-hide="phone,tablet">Contact Number</th>
										<th data-hide="phone,tablet">Address</th>
										<th data-hide="phone,tablet">Status</th>
										<th data-hide="phone,tablet">Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<!-- end widget content -->
				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->
		</article>
		<!-- WIDGET END -->
	</div>
	<!-- end row -->
</section>
<!-- end widget grid -->
<!-- Modal -->
<div class="modal fade" id="add-data" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<?= lang('Office'); ?>
				</h4>
			</div>
			<div class="modal-body">
	           <!-- Add CUstomer -->
				<!-- widget content -->
				<div class="widget-body no-padding">
					<form action="office/add" id="create-office" class="smart-form" novalidate="novalidate" autocomplete="off">
						<header>
							<?= lang('Basic_Information'); ?>
						</header>
						<fieldset>
						
								<section>
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input type="text" name="name" placeholder="<?= lang('Office').' '.lang('Name'); ?>" maxlength="30" size="30">
									</label>
								</section>
								
							
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="email" name="email" placeholder="<?= lang('Office').' '.lang('email'); ?>" maxlength="30" size="30" value="" autocomplete="off">
									</label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-phone"></i>
										<input type="text" name="contactNumber" placeholder="<?= lang('Office').' '.lang('contactNumber'); ?>" data-mask="(99999) 999999">
									</label>
								</section>
							</div>
						</fieldset>
						<header>
							<?= lang('Address'); ?>
						</header>
						<fieldset>
							<div class="row">
								<section class="col col-md-12">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="address" placeholder="<?= lang('Address'); ?>" maxlength="300" size="300" >
										
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-3">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="street" placeholder="Street" class="street_numberautocomplete0" maxlength="20" size="20">
									</label>
								</section>
								<section class="col col-9">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="street2" placeholder="Street Second" class="routeautocomplete0" maxlength="30" size="30">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="city" placeholder="City" class="localityautocomplete0" maxlength="15" size="15">
									</label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="state" placeholder="State" class="administrative_area_level_1autocomplete0" maxlength="15" size="15">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="zip" placeholder="Zip Code" class="postal_codeautocomplete0 number-only1" maxlength="15" size="15">
									</label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-map-marker"></i>
										<input type="text" name="country" placeholder="Country" class="countryautocomplete0" maxlength="15" size="15">
									</label>
								</section>
							</div>
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