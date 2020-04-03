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
													<label class="col-md-2"><button type="submit" name="import" class="btn btn-primary">Export</label>
												</div>
<!--         <div class="row padall">  
        <div class="col-lg-12">
        <div class="float-right">  
          <input type="radio" checked="checked" name="export_type" value="xlsx"> .xlsx
          <input type="radio" name="export_type" value="xls"> .xls
          <input type="radio" name="export_type" value="csv"> .csv
          <button type="submit" name="import" class="btn btn-primary">Export</button>
          </div> 
        </div>
        </div> -->
      </form>
	</div>
		
	</div>
<?php endif; ?>
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover dataTables-example-list" width="100%" data-list-url = "adminapi/users/list" data-id ="" data-no-record-found = "<?= lang('No_Record_found'); ?>" >
								<thead>			                
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
