<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-6">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false"
			data-widget-colorbutton="false"
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
					<span class="widget-icon"> <i class="fa fa-key"></i> </span>
					<h2>Permission</h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">

						<form method="post" class="form-horizontal" action="permission/add" id="smart-form-add-data"  enctype="multipart/form-data" novalidate="" autocomplete="off">
						<?php
							
							$profile  = isset($info['profile']) ? json_decode($info['profile'],true) :array();
							$p_view 	= isset($profile['view'])? $profile['view']:0;
							$p_add 		= isset($profile['add'])? $profile['add']:0;
							$p_edit 	= isset($profile['edit'])? $profile['edit']:0;
							$p_delete 	= isset($profile['delete'])? $profile['delete']:0;

							//echo "</pre>";
							$password  	= isset($info['password']) ? json_decode($info['password'],true) :array();
							$ps_view 	= isset($password['view'])? $password['view']:0;
							$ps_add 	= isset($password['add'])? $password['add']:0;
							$ps_edit 	= isset($password['edit'])? $password['edit']:0;
							$ps_delete 	= isset($password['delete'])? $password['delete']:0;

							//echo "</pre>";
							$u_set  	= isset($info['users']) ? json_decode($info['users'],true) :array();
							$u_list 	= isset($u_set['list'])? $u_set['list']:0;
							$u_view 	= isset($u_set['view'])? $u_set['view']:0;
							$u_add 		= isset($u_set['add'])? $u_set['add']:0;
							$u_edit 	= isset($u_set['edit'])? $u_set['edit']:0;
							$u_delete 	= isset($u_set['delete'])? $u_set['delete']:0;
							$u_export 	= isset($u_set['export'])? $u_set['export']:0;
							$u_contactNumber 		= isset($u_set['contactNumber'])? $u_set['contactNumber']:0;
							$u_current_address 		= isset($u_set['current_address'])? $u_set['current_address']:0;
							$u_permanent_address 	= isset($u_set['permanent_address'])? $u_set['permanent_address']:0;


								$pachkan  	= isset($info['pachkan']) ? json_decode($info['pachkan'],true) :array();
							$pc_view 	= isset($pachkan['view'])? $pachkan['view']:0;
							$pc_add 	= isset($pachkan['add'])? $pachkan['add']:0;
							$pc_edit 	= isset($pachkan['edit'])? $pachkan['edit']:0;
							$pc_delete 	= isset($pachkan['delete'])? $pachkan['delete']:0;

								$report  	= isset($info['report']) ? json_decode($info['report'],true) :array();
							$r_view 	= isset($report['view'])? $report['view']:0;
							$r_add 	= isset($report['add'])? $report['add']:0;
							$r_edit 	= isset($report['edit'])? $report['edit']:0;
							$r_delete 	= isset($report['delete'])? $report['delete']:0;
							
						?>
							<fieldset class="demo-switcher-1">
								<input type="hidden" name="roleId" value="<?= encoding($role['roleId']); ?>">
								<input type="hidden" name="id" value="<?= isset($info['preId'])? encoding($info['preId']):0; ?>">
								<legend><label class="checkbox-inline">
											  <input type="checkbox" id="checkbox_select_all" class="checkbox style-0">
											  <span><?= $role['role']; ?></span>
										</label></legend>
								
								<div class="form-group">
									<label class="col-md-2 control-label"><strong>Profile</strong></label>
									<div class="col-md-10">
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="p_view" <?= ($p_view==1)?"checked='checked'":""; ?> value="1">
											  <span>View</span>
										</label>
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="p_add" <?= ($p_add==1)?"checked='checked'":""; ?> value="1">
											  <span>Add</span>
										</label>
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="p_edit" <?= ($p_edit==1)?"checked='checked'":""; ?> value="1">
											  <span>Edit</span>
										</label>
										
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="p_delete" <?= ($p_delete==1)?"checked='checked'":""; ?> value="1">
											  <span>Delete</span>
										</label>

									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-2 control-label"><strong>Password</strong></label>
									<div class="col-md-10">
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="ps_view" <?= ($ps_view==1)?"checked='checked'":""; ?> value="1">
											  <span>View</span>
										</label>
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="ps_add" <?= ($ps_add==1)?"checked='checked'":""; ?> value="1">
											  <span>Add</span>
										</label>
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="ps_edit" <?= ($ps_edit==1)?"checked='checked'":""; ?> value="1">
											  <span>Edit</span>
										</label>
										
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="ps_delete" <?= ($ps_delete==1)?"checked='checked'":""; ?> value="1">
											  <span>Delete</span>
										</label>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-2 control-label"><strong>Users</strong></label>
									<div class="col-md-10">
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="u_list" <?= ($u_list==1)?"checked='checked'":""; ?> value="1">
											  <span>List</span>
										</label>
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="u_view" <?= ($u_view==1)?"checked='checked'":""; ?> value="1">
											  <span>View</span>
										</label>
										
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="u_add" <?= ($u_add==1)?"checked='checked'":""; ?> value="1">
											  <span>Add</span>
										</label>
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="u_edit" <?= ($u_edit==1)?"checked='checked'":""; ?> value="1">
											  <span>Edit</span>
										</label>
										
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="u_delete" <?= ($u_delete==1)?"checked='checked'":""; ?> value="1">
											  <span>Delete</span>
										</label>

										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="u_export" <?= ($u_export==1)?"checked='checked'":""; ?> value="1">
											  <span>Export</span>
										</label>
										
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-1 control-label"></label>
									<div class="col-md-11">
										
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="u_contactNumber" <?= ($u_contactNumber==1)?"checked='checked'":""; ?> value="1">
											  <span>Contact Number</span>
										</label>
										
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="u_current_address" <?= ($u_current_address==1)?"checked='checked'":""; ?> value="1">
											  <span>Current address</span>
										</label>
										
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="u_permanent_address" <?= ($u_permanent_address==1)?"checked='checked'":""; ?> value="1">
											  <span>Permanent address</span>
										</label>
										
									</div>
								</div>


								<div class="form-group">
									<label class="col-md-2 control-label"><strong>Pachkan</strong></label>
									<div class="col-md-10">
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="pc_view" <?= ($pc_view==1)?"checked='checked'":""; ?> value="1">
											  <span>View</span>
										</label>
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="pc_add" <?= ($pc_add==1)?"checked='checked'":""; ?> value="1">
											  <span>Add</span>
										</label>
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="pc_edit" <?= ($pc_edit==1)?"checked='checked'":""; ?> value="1">
											  <span>Edit</span>
										</label>
										
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="pc_delete" <?= ($pc_delete==1)?"checked='checked'":""; ?> value="1">
											  <span>Delete</span>
										</label>
									</div>
								</div>
								

								<div class="form-group">
									<label class="col-md-2 control-label"><strong>Report</strong></label>
									<div class="col-md-10">
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="r_view" <?= ($r_view==1)?"checked='checked'":""; ?> value="1">
											  <span>View</span>
										</label>
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="r_add" <?= ($r_add==1)?"checked='checked'":""; ?> value="1">
											  <span>Add</span>
										</label>
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="r_edit" <?= ($r_edit==1)?"checked='checked'":""; ?> value="1">
											  <span>Edit</span>
										</label>
										
										<label class="checkbox-inline">
											  <input type="checkbox" class="checkbox check-Add-check style-0" name="r_delete" <?= ($r_delete==1)?"checked='checked'":""; ?> value="1">
											  <span>Delete</span>
										</label>
									</div>
								</div>
								
								
							</fieldset>

							<div class="form-actions">
								<div class="row">
									<div class="col-md-12">
										
										<button id="submit" class="btn btn-primary" type="submit">
											<i class="fa fa-save"></i>
											Submit
										</button>
									</div>
								</div>
							</div>

						</form>

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
