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
					<h2>Users</h2>
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

											
												<div class="col-md-4 text-center">
						<label class="select">
						<select name="unionName"  class="form-control select2-" id="unionName_1">
						<option value="" selected="" disabled=""><?= lang('Union').' '.lang('Name'); ?></option>
						<?php if(!empty($unionList)):
						foreach ($unionList as $k => $union) {?>
						<option value="<?=  $union; ?>"  ><?=  $union; ?></option>
						<?php } endif; ?>

						</select> <i></i> </label>
													</div> 
															<div class="col-md-2"><button type="submit" name="import" class="btn btn-primary">Export</button></div>
												</div>

      </form>
	</div>
		
	</div>
<?php endif; ?>

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