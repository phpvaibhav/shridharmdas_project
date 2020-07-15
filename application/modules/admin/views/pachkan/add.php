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
     width: 100%;
}
.select2-container {
 
    width: 100% !important;
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
				<span class="widget-icon"> <i class="fa fa-list"></i> </span>
				<h2> <?= lang('pachkan'); ?> </h2>				
				
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
					
					<form method="post" id="pachkan-form" class="smart-form" novalidate="novalidate" action="adminapi/pachkan/add" enctype="multipart/form-data" novalidate="novalidate" autocomplete="off">
           
            <fieldset>
							<section>
								<input type="hidden" name="id"  value="<?= encoding(@$pachkan['pachkanId']); ?>">
								<label class="label">Name</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="text" id="name" name="name" placeholder="Name" value="<?= @$pachkan['name']; ?>" maxlength="30" size="30">
								</label>
							</section>
							
							<section>
								<label class="label">Description</label>
								<label class="textarea" > <i class="icon-append fa fa-comment"></i>
								<textarea rows="4" placeholder="Description" name="description" id="description"><?= @$pachkan['description']; ?></textarea> </label>
								
							</section>	
             
							<section>
								<label>Audio file<span>*</span></label>
								<div class="input input-file">
									<span class="button"><input type="file" name="audioFile" id="audioFile" onchange="this.parentNode.nextSibling.value = this.value" accept="audio/*" >Browse</span><input type="text" readonly="" placeholder="Audio file (audio/* only)">
								</div>
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
				
			</div>
			<!-- end widget div -->
			
		</div>
		<!-- end widget -->
	
	</article>
	<!-- END COL -->
</div>
<!-- END ROW -->
