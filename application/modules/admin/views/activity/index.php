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
					<h2><?= lang('Activity_Log'); ?></h2>
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
							<table class="table table-striped table-bordered table-hover dataTables-example-list" width="100%" data-list-url = "adminapi/activity/list" data-id ="" data-no-record-found = "<?= lang('No_Record_found'); ?>" >
								<thead>			                
									<tr>
										<th data-hide="phone"><?=lang('ID');?></th>
										<th data-hide="phone,tablet"><?= lang('Sub_Admin')." ".lang('Name'); ?></th>
										<th data-hide="phone,tablet"><?= lang('Users')." ".lang('Name'); ?></th>
										<th data-hide="phone,tablet"><?= lang('Activity_Log'); ?></th>
										<th data-hide="phone,tablet"><?= lang('Activity_Time'); ?></th>
										
										<th data-hide="phone,tablet"><?= lang('Action'); ?></th>
									</tr>
								</thead>
								<tbody>			
								</tbody>
							<!-- 	<tfoot>
																		<tr>
										<th data-hide="phone"><?=lang('ID');?></th>
										<th data-hide="phone"><?= lang('Union')." ".lang('Name'); ?></th>
										<th data-hide="phone"><?= lang('Union')." ".lang('About'); ?></th>
										<th data-hide="phone,tablet"><?= lang('Status'); ?></th>
										<th data-hide="phone,tablet"><?= lang('Action'); ?></th>
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
<!-- Modal -->
<div class="modal fade" id="add-data" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<strong>Log Activity</strong>	
				</h4>
			</div>
			<div class="modal-body">
	           <!-- Add CUstomer -->
				<!-- widget content -->
				<div class="widget-body padding">
					<header>
					<p><strong>Actvity Log detail below :</strong></p>
					</header>
					
						<fieldset>
							<section>
								<p id="act_detail"></p>
							</section>
						</fieldset>

						<footer>
							<button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-primary">OK</button>
						</footer>
					
				</div>
				<!-- end widget content -->
				<!-- Add CUstomer -->
	        </div>
		</div>
	</div>
</div>
<!-- End modal -->