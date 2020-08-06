	<!-- NEW WIDGET START -->
	<?php $backend_assets=base_url().'backend_assets/';
	 ?>
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget well jarviswidget-color-darken" id="wid-id-0" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-colorbutton="false">
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
									<span class="widget-icon"> <i class="fa fa-barcode"></i> </span>
									<h2><!-- Item #44761 --> </h2>
				
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
				<!-- 
										<div class="widget-body-toolbar">
				
											<div class="row">
				
												<div class="col-sm-4">
				
													<div class="input-group">
														<input class="form-control" type="text" placeholder="Type invoice number or date...">
														<div class="input-group-btn">
															<button class="btn btn-default" type="button">
																<i class="fa fa-search"></i> Search
															</button>
														</div>
													</div>
												</div>
				
												<div class="col-sm-8 text-align-right">
				
													<div class="btn-group">
														<a href="javascript:void(0)" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> Edit </a>
													</div>
				
													<div class="btn-group">
														<a href="javascript:void(0)" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Create New </a>
													</div>
				
												</div>
				
											</div>
				
										</div> -->
				
										<div class="padding-10">
											<br>
											<div class="pull-left">
												<img src="<?= base_url().APP_ADMIN_ASSETS_IMG.'logo.png'; ?>" width="80" height="80" alt="invoice icon">
				
												<address>
													<br>
													<strong><?= $info['receiptName'];?></strong>
													<br>
													<?= $info['address'];?>
													<br>
													<abbr title="Phone">M:</abbr> <?= $info['contactNumber'];?>
												</address>
											</div>
											<div class="pull-right">
												<h1 class="font-400">invoice</h1>
											</div>
											<div class="clearfix"></div>
											<br>
											<br>
											<div class="row">
												<div class="col-sm-9">
													<!-- <h4 class="semi-bold">Rogers, Inc.</h4>
													<address>
														<strong>Mr. Simon Hedger</strong>
														<br>
														342 Mirlington Road,
														<br>
														Calfornia, CA 431464
														<br>
														<abbr title="Phone">P:</abbr> (467) 143-4317
													</address> -->
												</div>
												<div class="col-sm-3">
													<div>
														<!-- <div>
															<strong>INVOICE NO :</strong>
															<span class="pull-right"> #AA-454-4113-00 </span>
														</div> -->
				
													</div>
													<div>
														<div class="font-md">
															<strong>INVOICE DATE :</strong>
															<span class="pull-right"> <i class="fa fa-calendar"></i> <?= date('d/m/Y',strtotime($info['crd']));?></span>
														</div>
				
													</div>
													<br>
													<div class="well well-sm  bg-color-darken txt-color-white no-border">
														<div class="fa-lg">
															Total :
															<span class="pull-right"> <?= $info['amount'];?> </span>
														</div>
				
													</div>
													<br>
													<br>
												</div>
											</div>
											<table class="table table-hover">
												<thead>
													<tr>
														<th class="text-center">Pay Name</th>
														<th>OCCASION</th>
														<th>HELP FOR</th>
														<th>AMOUNT</th>
														<th>SUBTOTAL</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-center"><strong><?= $info['payName']; ?></strong></td>
														<td><a href="javascript:void(0);"><?= $info['occasionName']; ?></a></td>
														<td><?= $info['helpforName']; ?></td>
														<td><?= $info['amount']; ?></td>
				
														<td><?= $info['amount']; ?></td>
													</tr>
													
														<td colspan="4">Total</td>
														<td><strong><?= $info['amount']; ?></strong></td>
													</tr>
													<!-- <tr>
														<td colspan="4">HST/GST</td>
														<td><strong>13%</strong></td>
													</tr> -->
												</tbody>
											</table>
				
											<div class="invoice-footer">
				
												<div class="row">
				
													<div class="col-sm-7">
														<div class="payment-methods">
															<h5>Payment Methods</h5>
															<label class="label label-info"><?= $info['paymentMode'] ?></label>
														</div><div class="payment-methods">
															<h5>Payment Status</h5>
															<?php
																if($info['paymentStatus']){
																echo '<label class="label label-success">'.$info['statusShow'].'</label>';
																}else{ 
																echo '<label class="label label-danger">'.$info['statusShow'].'</label>'; 
																} 

															?>
														</div>
													</div>
													<div class="col-sm-5">
														<div class="invoice-sum-total pull-right">
															<h3><strong>Total: <span class="text-success"><?= $info['amount'] ?></span></strong></h3>
														</div>
													</div>
				
												</div>
												
												<div class="row">
													<div class="col-sm-12">
														<p class="note"><?= $info['message'] ?></p>
													</div>
												</div>
				
											</div>
										</div>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->
				
						</article>
						<!-- WIDGET END -->