<!-- widget grid -->
<section id="widget-grid" class="">
    <!-- Widgets -->
    <div class="row clearfix">
    	<?php foreach ($rolesList as $e => $role) {?>
    	
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a href="<?= base_url().'admin-permissions-set/'.encoding($role->roleId);?>">
                <div class="info-box hover-expand-effect">
                    <div class="icon">
                        <i class="fa fa-user-secret"></i>
                    </div>
                    <div class="content">
                        <div class="text"><h3><strong><?= $role->role;?></strong></h3></div>
                        <div class="number count-to"></div>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
    <!-- #END# Widgets -->
</section>
<!-- end widget grid -->