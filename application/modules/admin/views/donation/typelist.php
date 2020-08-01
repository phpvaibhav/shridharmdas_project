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
				<!-- 	<span class="widget-icon"> <i class="fa fa-sun-o"></i> </span> -->
					<h2><?= $title; ?></h2>
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
							<table class="table table-striped table-bordered table-hover dataTables-example-list" width="100%" data-list-url = "adminapi/donationtype/list" data-id ="<?= $type; ?>" data-no-record-found = "<?= lang('No_Record_found'); ?>" >
								<thead>			                
									<tr>
										<th data-hide="phone"><?=lang('ID');?></th>
										<th data-hide="phone"><?= lang('Name'); ?></th>
							
										<th data-hide="phone,tablet"><?= lang('Status'); ?></th>
										<th data-hide="phone,tablet"><?= lang('Action'); ?></th>
									</tr>
								</thead>
								<tbody>			
								</tbody>
								
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
					<?= $title; ?>
				</h4>
			</div>
			<div class="modal-body">
	           <!-- Add CUstomer -->
				<!-- widget content -->
				<div class="widget-body no-padding">
					<form action="donationtype/add" id="create-pro" class="smart-form" novalidate="novalidate" autocomplete="off">
					
						<fieldset>
							<input type="hidden" name="id" id="id"  value="0" >
							<input type="hidden" name="type"   value="<?= $type; ?>" >
								<section>
									<label class="label">Name</label>
									<label class="input"> <i class="icon-append fa fa-list"></i>
										<input type="text" id="name" name="name" placeholder="Name" maxlength="30" size="30">
									</label>
								</section>
								
								
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