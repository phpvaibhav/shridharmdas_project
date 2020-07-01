<!-- row -->
					<div class="row">
						
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="btn-group">
								<?php $rk = array('णमोकार मंत्र एवं  प्राथमिक ज्ञान','सामयिक','प्रतिक्रमण','थोकड़ो का ज्ञान','स्वाध्याय का ज्ञान'); ?>
											<button class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown">
												<?= lang('Religious_knowledge'); ?> <span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<?php for ($i=0; $i <sizeof($rk) ; $i++) { ?>
												<li>
													<a href="<?= base_url('admin/report/gyan/').encoding($rk[$i]); ?>"><?= $rk[$i]; ?></a>
												</li>
												<?php } ?>
											</ul>
										</div>
				
						</article>
						<!-- WIDGET END -->
						
					</div>
				
					<!-- end row -->
				