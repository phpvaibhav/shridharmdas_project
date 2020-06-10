<!-- widget grid -->
<section id="widget-grid" class="">
    <!-- Widgets -->
    <div class="row clearfix">
<!--         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo base_url('preceptor'); ?>">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="fa fa-sun-o"></i>
                    </div>
                    <div class="content">
                        <div class="text"><?= lang('Preceptor');?></div>
                        <div class="number count-to"><?php echo number_format_short($preceptor); ?></div>
                    </div>
                </div>
            </a>
        </div>  -->
<!--         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo base_url('union'); ?>">
                <div class="info-box bg-red hover-expand-effect">
                    <div class="icon">
                        <i class="fa fa-sitemap"></i>
                    </div>
                    <div class="content">
                        <div class="text"><?= lang('Union');?></div>
                        <div class="number count-to"><?php echo number_format_short($union); ?></div>
                    </div>
                </div>
            </a>
        </div>   -->
<!--         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo base_url('office'); ?>">
                <div class="info-box bg-blue hover-expand-effect">
                    <div class="icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <div class="content">
                        <div class="text"><?= lang('Office');?></div>
                        <div class="number count-to"><?php echo number_format_short($office); ?></div>
                    </div>
                </div>
            </a>
        </div>  -->
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

            <?php 
           /* echo "<pre>";
            print_r($_SESSION[ADMIN_USER_SESS_KEY]);
            echo "</pre>";*/
            if($_SESSION[ADMIN_USER_SESS_KEY]['roleId']==1){
 $burl = base_url('users');
          }else{

                  
             $us_user_permission  = isset($user_permission['users']) ? json_decode($user_permission['users'],true) :array();
              $us_view_pr = isset($us_user_permission['list'])? $us_user_permission['list']:0;
              $burl = base_url('sangh-users');
              if($us_view_pr==0):
                $burl = 'javascript:void(0);';
              endif;
           
          }

            ?>
            <a href="<?php echo $burl; ?>">
                <div class="info-box bg-green hover-expand-effect">
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="content">
                        <div class="text"><?= lang('Users');?></div>
                        <div class="number count-to"><?php echo number_format_short($users); ?></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- #END# Widgets -->
</section>
<!-- end widget grid -->