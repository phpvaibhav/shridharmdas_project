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
    <?php if(!empty($AssignedSangh)):?>
    <div class="row clearfix">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="jarviswidget jarviswidget-color-pink jarviswidget-sortable" id="wid-id-9" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" role="widget" >
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
                                <header role="heading" class="ui-sortable-handle">
                                    <span class="widget-icon"> <i class="fa fa-lg fa-fw  fa-sun-o"></i> </span>
                                    <h2><strong>Assigned Shree Sangh</strong> </h2> 
                                </header>

                                <!-- widget div-->
                                <div role="content">
                                    
                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->
                                        
                                    </div>
                                    <!-- end widget edit box -->
                                    
                                    <!-- widget content -->
                                    <div class="widget-body">
                                        
                                       
                                        <!-- widget body text-->
                                        <?php
                                        $colors = array('info', 'success','warning','danger');
                                         foreach ($AssignedSangh as $key => $sangh) {

                                             $rand_color = $colors[array_rand($colors)];
                                            ?>
                                            <p class="alert alert-<?= $rand_color; ?>">
                                                
                                                <strong><?= $sangh->name; ?></strong>
                                                
                                            </p>
                                        <?php } ?>
                                        <!-- end widget body text-->
                                        

                                        
                                    </div>
                                    <!-- end widget content -->
                                    
                                </div>
                                <!-- end widget div -->
                                
                            </div>
    </div>
    </div>
<?php endif; ?>
</section>
<!-- end widget grid -->