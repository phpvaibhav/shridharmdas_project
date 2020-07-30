<!-- START ROW -->
<div class="row">
	<!-- NEW COL START -->
	<article class="col-sm-12 col-md-12 col-lg-12">	
		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
		
			<header>
				<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
				<h2><?php echo $page['pageId'] ?'Edit':'Add'; ?></h2>				
				
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
				
						<form method="post" action="pages/addPage" id="pageAddUpdate" class="smart-form" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
									

							<fieldset>
							
									
									<section >
								
									 <label class="select"><select  class="form-control" name="pageUrl"  id="pageUrl" >
										<option value="">Please select Page Type</option>
										
										<option value="termConditions" <?php echo (isset($page['pageUrl']) && $page['pageUrl']=='termConditions')?"selected='selected'":""; ?> >Term & Conditions</option>
										<option value="privacyPolicy" <?php echo (isset($page['pageUrl']) && $page['pageUrl']=='privacyPolicy')?"selected='selected'":""; ?>>Privacy Policy</option>
									
										
									</select><i></i> </label>
								</section>
							
							<div class="row">
									
									<section class="col col-md-12">
										<label class="label">Title</label>
										<input type="hidden" name="pageId" value="<?php echo encoding($page['pageId']); ?>" id="pageId" >
										<label class="input"> <i class="icon-append fa fa-list-alt"></i>
											<input type="text"  name="title" placeholder="Title" value="<?php echo $page['title']; ?>" id="title" >
										</label>
									</section>
									
									
								</div>
							
								<div class="row">
									<section class="col col-6">
										<label class="label">Sub Title</label>
								
										<label class="input"> <i class="icon-append fa fa-list-alt"></i>
											<input type="text"  name="subTitle" placeholder="Sub Title"  value="<?php echo $page['subTitle']; ?>" id="subTitle" >
										</label>
									
									</section>
									<section class="col col-6">
											<label class="label">Icon</label>
								
										<label class="input"> <i class="icon-append fa fa-list-alt"></i>
											<input type="text"  name="icon" placeholder="fa fa-icon" id="icon"  value="<?php echo $page['icon']; ?>" >
										</label>
									</section>
								</div>
								<div class="row hide">
									
									<section class="col col-md-12">
										<label class="label">Meta  Title</label>
										<label class="input"> <i class="icon-append fa fa-list-alt"></i>
											<input type="text"  name="metaTitle" placeholder="Meta Title"  value="<?php echo $page['metaTitle']; ?>" id="metaTitle" >
										</label>
									</section>
									<section class="col col-md-12">
										<label class="label">Meta  Keyword</label>
										<label class="input"> <i class="icon-append fa fa-list-alt"></i>
											<input type="text"  name="metaKeyword" placeholder="Meta Keyword" id="metaKeyword" value="<?php echo $page['metaKeyword']; ?>" >
										</label>
									</section>
									<section class="col col-md-12">
										<label class="label">Meta  Description</label>
										<textarea name="metaDescription" class="form-control" placeholder="Meta  Description" rows="3"><?php echo $page['metaDescription']; ?></textarea>
									</section>
									
									
								</div>
								<section class="hide">
									<label class="label">Show menu</label>
									<div class="inline-group" >
										<label class="radio">
											<input type="radio" name="showMenu" value="1" <?php echo $page['showMenu']==1?"checked='checked'":""; ?> >
											<i></i>Yes</label>
										<label class="radio">
											<input type="radio"  name="showMenu" value="0" <?php echo $page['showMenu']==0?"checked='checked'":""; ?>>
											<i></i>No</label>
										
									</div>
								</section>
								<section>
								<label class="label">Description</label>
									<textarea name="description" class="form-control note_description" placeholder="" rows="3"><?php echo $page['description']; ?></textarea>			
								</section>
								
							
							</fieldset>
							
							<footer>
								<button type="submit" id="submit" class="btn btn-primary">
									<span id="catbtnTitle"><?php echo $page['pageId'] ?'Update Page':'Add Page'; ?></span>
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
<script type="text/javascript">
	$(document).ready(function() {

 CKEDITOR.replace( 'ckeditor', { height: '380px', startupFocus : true});

 

});	
</script>