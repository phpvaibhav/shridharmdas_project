
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
					<h2>Users (<?= decoding($id_gyan); ?>)</h2>
					<div class="jarviswidget-ctrls" role="menu">   
						<!-- <a href="<?= base_url('sangh-users-incomplete');?>" class="button-icon" rel="tooltip" title="Users incomplete"><i class="glyphicon glyphicon-ban-circle"></i> Incomplete users&nbsp;&nbsp; </a> -->

					
						</div>
						 <a class="btn btn-warning pull-right"  target="_blank" href="<?= base_url('admin/report/listpdf/').$id_gyan;?>">Download PDF</a> 
					<!--  <a class="btn btn-warning pull-right"  target="_blank" href="<?= base_url('users-incomplete');?>">Users incomplete</a> 
					 <a class="btn btn-danger pull-right"  target="_blank" href="<?= base_url('users-trash');?>">Trash User</a>  -->
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
							<table class="table table-striped table-bordered table-hover dataTables-example-list" width="100%" data-list-url = "adminapi/report/list" data-id ="<?= $id_gyan; ?>" data-no-record-found = "<?= lang('No_Record_found'); ?>" >
								<thead>			                
									<tr>
										<th data-hide="phone">ID</th>
										<th data-hide="phone">Full Name</th>
										<th data-hide="phone">S/O|W/O</th>
										<th data-hide="phone">Family Head</th>
										<th data-hide="phone">Shree Shangh</th>
										<th data-hide="phone">Religious knowledge</th>
										<th data-hide="phone,tablet">Status</th>
										<th data-hide="phone,tablet">Approval</th>
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
