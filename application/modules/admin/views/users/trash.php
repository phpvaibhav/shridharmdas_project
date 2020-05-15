<section id="widget-grid" class="">
	<!-- row -->

	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="false"
				data-widget-sortable="false">
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
				<!-- 	<span class="widget-icon"> <i class="fa fa-users"></i> </span> -->
					<h2>Trash Users </h2>
					<div class="jarviswidget-ctrls" role="menu">   
						<a href="<?= base_url('users');?>" class="button-icon" rel="tooltip" title="All User"><i class="fa fa-users "></i> All users &nbsp;&nbsp; </a> 
						<a href="<?= base_url('users-incomplete');?>" class="button-icon" rel="tooltip" title="Users incomplete"><i class="glyphicon glyphicon-ban-circle"></i>  Incomplete users&nbsp;&nbsp; </a> 

						</div>
					<!--  <a class="btn btn-warning pull-right"  target="_blank" href="<?= base_url('users-incomplete');?>">Users incomplete</a>  -->
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
					
						<?php if(!empty($countuser)): ?>
							<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		 <form action="<?php print base_url();?>admin/users/exportUser" class="form-horizontal"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
		 <div class="form-group">
													
													<div class="col-md-3 text-center">
														<input type="hidden" name="trash" value="trash">
														<label class="radio radio-inline">
															<input type="radio" class="radiobox" name="export_type" value="xlsx" checked=""> 
															<span>.xlsx</span> 	
														</label>
														<label class="radio radio-inline">
															<input type="radio" class="radiobox" name="export_type" value="xls"> 
															<span>.xls</span> 	
														</label>
														<label class="radio radio-inline">
															<input type="radio" class="radiobox" name="export_type" value="csv"> 
															<span>.csv</span> 	
														</label>
														
													</div>									
													<div class="col-md-3 text-center">

														<label class="radio radio-inline">
															<input type="radio" class="radiobox" name="lang_type" value="Actual" > 
															<span>Actual</span> 	
														</label>
														<label class="radio radio-inline">
															<input type="radio" class="radiobox" name="lang_type" value="Hindi" checked=""> 
															<span>Hindi</span> 	
														</label>
														<label class="radio radio-inline">
															<input type="radio" class="radiobox" name="lang_type" value="English"> 
															<span>English</span> 	
														</label>
														
													</div>

													<div class="col-md-2"><button type="submit" name="import" class="btn btn-primary">Export</button></div>
												<div class="col-md-4 text-right">
											<!-- 	<a href="<?= base_url('user-excel'); ?>"> Advance Export</a>  -->
						
													</div> 
												</div>

      </form>
	</div>
		
	</div>
<?php endif; ?>
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover dataTables-example-list" width="100%" data-list-url = "adminapi/users/list" data-id ="trash" data-no-record-found = "<?= lang('No_Record_found'); ?>" >
								<thead>			                
									<tr>
										<th data-hide="phone">ID</th>
										<th data-hide="phone">Full Name</th>
										<th data-hide="phone">S/O|W/O</th>
										<th data-hide="phone">Family Head</th>
										<th data-hide="phone">Shree Shangh</th>
										<th data-hide="phone">Contact Number</th>
										<th data-hide="phone">Date Of Birth</th>
										<th data-hide="phone,tablet">Status</th>
										<th data-hide="phone,tablet">Approval</th>
										<th data-hide="phone,tablet">Action</th>
									</tr>
								</thead>
								<tbody>			
								</tbody>
								<!-- <tfoot>
									<tr>
										<th data-hide="phone">ID</th>
										<th data-hide="phone">Full Name</th>
										<th data-hide="phone">Aadhar Number</th>
										<th data-hide="phone">Contact Number</th>
										<th data-hide="phone">Gender</th>
										<th data-hide="phone,tablet">Status</th>
										<th data-hide="phone,tablet">Approval</th>
										<th data-hide="phone,tablet">Action</th>
									</tr>
								</tfoot> -->
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
<script type="text/javascript">
  var Please_select_your_full_name              = "<?= lang('Please_select_your_full_name');?>";
  var Please_select_your_first_name             =  "<?= lang('Please_select_your_first_name');?>";
  var Please_select_your_last_name              = "<?= lang('Please_select_your_last_name');?>";
  var Please_select_your_father_name_husband_name = "<?= lang('Please_select_your_father_name_husband_name');?>";
  var Please_select_your_date_of_birth            ="<?= lang('Please_select_your_date_of_birth');?>";
  var Please_select_your_gender                   = "<?= lang('Please_select_your_gender');?>";
  var Please_select_your_marital_status           = "<?= lang('Please_select_your_marital_status');?>";
  var Please_select_your_contact_number           = "<?= lang('Please_select_your_contact_number');?>";
  var Please_select_your_aadhar_number            = "<?= lang('Please_select_your_aadhar_number');?>";
  var Please_select_your_address                  = "<?= lang('Please_select_your_address');?>";
  var Please_select_your_city                     = "<?= lang('Please_select_your_city');?>";
  var Please_select_your_zip_code                 = "<?= lang('Please_select_your_zip_code');?>";
  var Please_select_your_tehsil                   = "<?= lang('Please_select_your_tehsil');?>";
  var Please_select_your_district                 = "<?= lang('Please_select_your_district');?>";
  var Good_job                                    = "<?= lang('Good_job');?>";
  var Your_form_submitted_successfully            = "<?= lang('Your_form_submitted_successfully');?>";
  var Please_select_your_front_image              = "<?= lang('Please_select_your_front_image');?>";
  var Please_select_your_back_image               = "<?= lang('Please_select_your_back_image');?>";
  var Please_select__image_type                   = "<?= lang('Please_select__image_type');?>";
  var Please_select_your_familyHeadName           = "<?= lang('Please_select_your_familyHeadName');?>";
  var Please_enter_at_least_12_digit_aadhaar_number = "<?= lang('Please_enter_at_least_12_digit_aadhaar_number');?>";
  var Please_enter_at_least_10_digit_phone_number   = "<?= lang('Please_enter_at_least_10_digit_phone_number');?>";
  var Please_select_your_unionName                  = "<?= lang('Please_select_your_unionName');?>";
  var This_option_field_is_required                 = "<?= lang('This_option_field_is_required');?>";
  var This_aadhar_number_is_already_taken                 = "<?= lang('This_aadhar_number_is_already_taken');?>";
  var Please_select_your_Occupation ="<?= lang('Please_select_your_Occupation');?>";
var Please_select_your_religious_Knowledge ="<?= lang('Please_select_your_religious_Knowledge');?>";
var Please_select_your_Identity_image ="<?= lang('Please_select_your_Identity_image');?>";
</script>