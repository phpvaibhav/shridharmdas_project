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
				<span class="widget-icon"> <i class="fa fa-file-excel-o"></i> </span>
				<h2> Import Excel file </h2>				
				
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
					
					<form method="post" id="excel-import-form" class="smart-form" novalidate="novalidate" action="admin/excel_import/importFile" enctype="multipart/form-data" novalidate="novalidate" autocomplete="off">
           
            <fieldset>
             
							<section>
								<label>Excel file<span>*</span></label>
								<div class="input input-file">
									<span class="button"><input type="file" name="excelFile" id="excelFile" onchange="checkExcel();this.parentNode.nextSibling.value = this.value" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" >Browse</span><input type="text" readonly="" placeholder="Import Excel file (file .xlsx, .xlsm, .xls only)">
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
