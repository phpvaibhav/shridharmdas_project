<style type="text/css">
	.select2-container {
    margin: 0;
    position: relative;
    display: inline-block;
    zoom: 1;
    *display: inline;
    vertical-align: middle;
    width: 100% !important;
}
	.select2-container-multi .select2-choices .select2-search-choice, .select2-selection__choice {
    padding: 1px 28px 1px 8px !important;
    margin: 4px 0 3px 5px !important;
    position: relative;
    line-height: 18px;
    color: #fff;
    cursor: default;
    border: 1px solid #2a6395;
    -webkit-background-clip: padding-box !important;
    background-clip: padding-box;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: #3276b1;
}

</style>
<!-- row -->
<?php $backend_assets=base_url().'backend_assets/'; ?>
<div class="row">

	<div class="col-sm-12">


			<div class="well well-sm">
				<header><h3 class="no-margin"><a href="javascript:void(0);"><?= $info['name'];?></a></h3></header>
				<hr>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12">
						About : <?= $info['about'];?>
					</div>
				</div>
				<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-12">
						
						<div class="well well-light well-sm no-margin no-padding">
							<div class="row">

								<div class="col-sm-12">
									

									<div class="padding-10">

										<ul class="nav nav-tabs tabs-pull-left">
											<li class="active">
												<a href="#a1" data-toggle="tab">Maharaj Sahab</a>
											</li>
											<li>
												<a href="#a2" data-toggle="tab">Contact us</a>
											</li>
											<li>
												<a href="#a3" data-toggle="tab">Address</a>
											</li>
											<li class="pull-right">
												<span class="margin-top-10 display-inline"><i class="fa fa-rss text-success"></i> Activity</span>
											</li>
										</ul>

										<div class="tab-content padding-top-10">
											<div class="tab-pane fade in active" id="a1">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<a href="javascript:void(0);" class="btn btn-labeled btn-success margin-bottom-5 pull-right"  onclick="openActionShishya();"> <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Add </a>
													</div>
												</div>
												
													<div class="row">
										<div class="text">
											<?php if(!empty($shishya)): foreach ($shishya as $k => $v) { ?>
											<div class="col-sm-12 col-md-6 col-lg-4">
												<div class="well text-center connect">
													<img src="<?= $backend_assets; ?>img/avatars/male.png" alt="img" class="margin-bottom-5 margin-top-5">
													<br>
													<span class="font-sm"><b><?= $v->name; ?></b></span>
													<br>
													<a href="<?= base_url().'admin/sant/detail/'.encoding($v->santId); ?>" class="btn btn-xs btn-success margin-top-5 margin-bottom-5"> <span class="font-xs">Detail</span> </a>
													
												</div>
											</div>
											<?php } else: ?>
												<div class="col-sm-12 col-md-6 col-lg-12">
												<div class="text-center">
													Record not found.
												</div>
											</div>
											<?php endif; ?>
											
										</div>
									</div>

												

											</div>
											<div class="tab-pane fade" id="a2">
												<!-- test -->
												<div class="row">
												<div class="col-sm-12">
													<ul class="list-unstyled">
											<li>
												<!-- <h4 class="semi-bold">Rogers, Inc.</h4> -->
													<address>
														<strong>Mr. Simon Hedger</strong>
														<br>
														342 Mirlington Road,
														<br>
														Calfornia, CA 431464
														<br>
														<abbr title="Phone">P:</abbr> (467) 143-4317
													</address>
											</li>
											<li>
												<!-- <h4 class="semi-bold">Rogers, Inc.</h4> -->
													<address>
														<strong>Mr. Simon Hedger</strong>
														<br>
														342 Mirlington Road,
														<br>
														Calfornia, CA 431464
														<br>
														<abbr title="Phone">P:</abbr> (467) 143-4317
													</address>
											</li>
										</ul>
													
												</div>
												
											</div>
												<!-- test -->

											</div>
											<div class="tab-pane fade" id="a3">

												<div class="text-center">
													Maintenance 
												</div>

											</div>
											<!-- end tab -->
										</div>

									</div>

								</div>

							</div>
							<!-- end row -->

						</div>

					</div>
					
				</div>

			</div>


	</div>

</div>

<!-- end row -->

<!-- Modal -->
<div class="modal fade" id="add-data-shishya" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<?= lang('sant_satee'); ?>
				</h4>
			</div>
			<div class="modal-body">
	           <!-- Add CUstomer -->
				<!-- widget content -->
				<div class="widget-body no-padding">
					<form action="sant/addSant" id="create-pro-sant" class="smart-form" novalidate="novalidate" autocomplete="off">
					
						<fieldset>
							<input type="hidden" name="id" id="id"  value="<?= encoding($info['santId']); ?>" >
							<?php $sm = !empty($info['shishya']) ? explode(",",$info['shishya']) :array() ; ?>
								<section>
									<label class="label"><?= lang('sant_satee').' '.lang('Name'); ?></label>
									<select name="santIdM[]"  class="form-control js-example-basic-single "  id="santIdM" multiple="multiple" data-placeholder="Select a sant">
					<?php if(!empty($shishyaList)):?>
						
					<?php foreach ($shishyaList as $kc => $s) { ?>
						<option value="<?= $s->santId; ?>" <?= in_array($s->santId,$sm)?"selected='selected'":"";  ?>><?=  $s->name; ?></option>
					<?php } endif; ?>
					</select>
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
				<!-- Add CUstomer -->
	        </div>
		</div>
	</div>
</div>
<!-- End modal -->