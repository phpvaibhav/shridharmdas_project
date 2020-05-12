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
<!-- START ROW -->

<div class="row">

	<!-- NEW COL START -->
	<article class="col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
		
		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
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
				<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
				<h2>Add </h2>				
				
			</header>

			<!-- widget div-->
			<div>
				
				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->
					
				</div>
				<!-- end widget edit box -->
				
				<!-- widget content -->
				<div class="widget-body no-padding">
					
					<form id="user-add-form" class="smart-form" novalidate="novalidate" action="adminrole/add" novalidate="novalidate" autocomplete="off">
           
            <fieldset>
             
                <section>
                	 <input type="hidden" name="id" value="0">
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                        <input type="text" name="fullName" maxlength="30" size="30" placeholder="Full name">
                  </label>
                </section>

             	<section>
                   <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                    <input type="email" name="email" placeholder="E-mail" maxlength="30" size="30" value="" autocomplete="off">
                  </label>
              	</section>

          		<section>
                   <label class="input"> <i class="icon-prepend fa fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" value="" autocomplete="new-password">
                  </label>
              	</section>
				<section>

					<label class="select">
					<select name="roleId"  class="form-control"  id="roleId"  >
					<?php if(!empty($rolesList)):
					foreach ($rolesList as $r => $role) { 

					?>

					<option value="<?= $role->roleId; ?>" selected='selected' ><?=  $role->role; ?></op0tion>
					<?php } endif; ?>

					</select><i></i> </label>
				</section>

				<section>

					<label class="select">
					<select name="sanghId"  class="form-control js-example-basic-single "  id="sanghId"  >
					<?php if(!empty($unionList)):
					foreach ($unionList as $kc => $union) { 

					?>

					<option value="<?= $union->sanghId; ?>" data-sanghname="<?=  $union->name; ?>" ><?=  $union->name; ?></option>
					<?php } endif; ?>

					</select><i></i> </label>
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
				
			</div>
			<!-- end widget div -->
			
		</div>
		<!-- end widget -->
	
	</article>
	<!-- END COL -->
</div>
<!-- END ROW -->
