<?php $backend_assets =  base_url().'backend_assets/';?>
</div>
  <!-- END MAIN CONTENT -->
  </div>
    <!-- END MAIN PANEL -->
    <!-- PAGE FOOTER -->
    <div class="page-footer">
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <span class="txt-color-white">1.0.0 <span class="hidden-xs"> - <?= lang('web-application'); ?> : </span><?php echo lang('copy-right'); ?></span>
        </div>
        <div class="col-xs-6 col-sm-6 text-right hidden-xs">
          <div class="txt-color-white inline-block">
            <!--   <i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i> <strong>52 mins ago &nbsp;</strong> </i> -->
            <!--  <div class="btn-group dropup">
            <button class="btn btn-xs dropdown-toggle bg-color-blue txt-color-white" data-toggle="dropdown">
              <i class="fa fa-link"></i> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-right text-left">
              <li>
                <div class="padding-5">
                  <p class="txt-color-darken font-sm no-margin">Download Progress</p>
                  <div class="progress progress-micro no-margin">
                    <div class="progress-bar progress-bar-success" style="width: 50%;"></div>
                  </div>
                </div>
              </li>
              <li class="divider"></li>
              <li>
                <div class="padding-5">
                  <p class="txt-color-darken font-sm no-margin">Server Load</p>
                  <div class="progress progress-micro no-margin">
                    <div class="progress-bar progress-bar-success" style="width: 20%;"></div>
                  </div>
                </div>
              </li>
              <li class="divider"></li>
              <li>
                <div class="padding-5">
                  <p class="txt-color-darken font-sm no-margin">Memory Load <span class="text-danger">*critical*</span></p>
                  <div class="progress progress-micro no-margin">
                    <div class="progress-bar progress-bar-danger" style="width: 70%;"></div>
                  </div>
                </div>
              </li>
              <li class="divider"></li>
              <li>
                <div class="padding-5">
                  <button class="btn btn-block btn-default">refresh</button>
                </div>
              </li>
            </ul>
          </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- END PAGE FOOTER -->
    <!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
    Note: These tiles are completely responsive,
    you can add as many as you like
    -->
    <div id="shortcut">
      <ul>
       <!--  <li>
          <a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
        </li>
        <li>
          <a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
        </li>
        <li>
          <a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
        </li>
        <li>
          <a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
        </li>
        <li>
          <a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
        </li> -->
        <?php if(!empty($user_permission) && $user['roleId']!=1): ?>
          <?php 
          $pro_per  = isset($user_permission['profile']) ? json_decode($user_permission['profile'],true) :array();
              $pr_view = isset($pro_per['view'])? $pro_per['view']:0;
              if($pr_view):
          ?>
        <li>
          <a href="<?php echo base_url().'profile/'.encoding($user['userId']);  ?>" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span><?= lang('My_Profile'); ?> </span> </span> </a>
        </li>  
      <?php endif;
          $password_pro  = isset($user_permission['password']) ? json_decode($user_permission['password'],true) :array();
              $ps_view_pre = isset($password_pro['view'])? $password_pro['view']:0;
              if($ps_view_pre):
        ?>
        <li>
          <a href="<?php echo base_url().'change_password/'.encoding($user['userId']);  ?>" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-key fa-4x"></i> <span><?= lang('Change_Password'); ?></span> </span> </a>
        </li>
         <?php endif;  ?>
        <?php elseif($user['roleId']==1): ?>
                <li>
          <a href="<?php echo base_url().'profile/'.encoding($user['userId']);  ?>" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span><?= lang('My_Profile'); ?> </span> </span> </a>
        </li>  
        <li>
          <a href="<?php echo base_url().'change_password/'.encoding($user['userId']);  ?>" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-key fa-4x"></i> <span><?= lang('Change_Password'); ?></span> </span> </a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
    <!-- END SHORTCUT AREA -->
    <!--================================================== -->
    <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
    <script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo $backend_assets ?>js/plugin/pace/pace.min.js"></script>
    <script>
      if (!window.jQuery) {
        document.write('<script src="<?php echo $backend_assets ?>js/libs/jquery-3.2.1.min.js"><\/script>');
      }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
      if (!window.jQuery.ui) {
        document.write('<script src="<?php echo $backend_assets ?>js/libs/jquery-ui.min.js"><\/script>');
      }
    </script>
    <!-- IMPORTANT: APP CONFIG -->
    <script src="<?php echo $backend_assets ?>js/app.config.js"></script>
    <!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
    <script src="<?php echo $backend_assets ?>js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 
    <!-- BOOTSTRAP JS -->
    <script src="<?php echo $backend_assets ?>js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- CUSTOM NOTIFICATION -->
    <script src="<?php echo $backend_assets ?>js/notification/SmartNotification.min.js"></script>
    <!-- JARVIS WIDGETS -->
    <script src="<?php echo $backend_assets ?>js/smartwidgets/jarvis.widget.min.js"></script>
    <!-- EASY PIE CHARTS -->
    <script src="<?php echo $backend_assets ?>js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
    <!-- SPARKLINES -->
    <script src="<?php echo $backend_assets ?>js/plugin/sparkline/jquery.sparkline.min.js"></script>
    <!-- JQUERY VALIDATE -->
    <script src="<?php echo $backend_assets ?>js/plugin/jquery-validate/jquery.validate.min.js"></script>
    <!-- JQUERY MASKED INPUT -->
    <script src="<?php echo $backend_assets ?>js/plugin/masked-input/jquery.maskedinput.min.js"></script>
    <!-- JQUERY SELECT2 INPUT -->
    <script src="<?php echo $backend_assets ?>js/plugin/select2/select2.min.js"></script>
    <!-- JQUERY UI + Bootstrap Slider -->
    <script src="<?php echo $backend_assets ?>js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>
    <!-- browser msie issue fix -->
    <script src="<?php echo $backend_assets ?>js/plugin/msie-fix/jquery.mb.browser.min.js"></script>
    <!-- FastClick: For mobile devices -->
    <script src="<?php echo $backend_assets ?>js/plugin/fastclick/fastclick.min.js"></script>
    <!--[if IE 8]>
    <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
    <![endif]-->
    <!-- Demo purpose only -->
    <script src="<?php echo $backend_assets ?>js/demo.min.js"></script>
    <!-- MAIN APP JS FILE -->
    <script src="<?php echo $backend_assets ?>js/app.min.js"></script>
    <!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
    <!-- Voice command : plugin -->
    <script src="<?php echo $backend_assets ?>js/speech/voicecommand.min.js"></script>
    <!-- SmartChat UI : plugin -->
    <script src="<?php echo $backend_assets ?>js/smart-chat-ui/smart.chat.ui.min.js"></script>
    <script src="<?php echo $backend_assets ?>js/smart-chat-ui/smart.chat.manager.min.js"></script>
    <script src="<?php echo $backend_assets ?>js/plugin/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!-- PAGE RELATED PLUGIN(S) 
    <script src="..."></script>-->
      <!-- PAGE RELATED PLUGIN(S) -->
    <!-- DataTables -->
    <script src="<?php echo $backend_assets ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $backend_assets ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
   
    <!--    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjhKBJtoevmCuR5iD1El6cuDHTMByw9Co&libraries=places" type="text/javascript"></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js'></script>
    <script type="text/javascript">
      var Please_enter_your_current_password = "<?= lang('Please_enter_your_current_password'); ?>";
      var Please_enter_your_new_password = "<?= lang('Please_enter_your_new_password'); ?>";
      var Please_re_enter_your_password = "<?= lang('Please_re-enter_your_password'); ?>";
      var Please_enter_the_same_password_as_above = "<?= lang('Please_enter_the_same_password_as_above'); ?>";
      var Please_enter_your_full_name = "<?= lang('Please_enter_your_full_name'); ?>";
        var Please_enter_email_address = '<?= lang('Please_enter_email_address'); ?>';
        var Please_enter_a_valid_email_address = '<?= lang('Please_enter_a_valid_email_address'); ?>';
        var Please_enter_your_contact_number = '<?= lang('Please_enter_your_contact_number'); ?>';
        var Please_enter_your_name = '<?= lang('Please_enter_your_name'); ?>';
    </script>
    <script src="<?php echo $backend_assets; ?>admin/js/profile.js"></script>
   <script src="<?php echo $backend_assets; ?>custom/js/common.js"></script>
    <script src="<?php echo $backend_assets; ?>custom/js/custom.js"></script>
    
    <?php if(!empty($front_scripts)) { load_js($front_scripts);} //load required page scripts ?>
    <script>
      $(document).ready(function() {
        
      /* DO NOT REMOVE : GLOBAL FUNCTIONS!
       *
       * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
       *
       * // activate tooltips
       * $("[rel=tooltip]").tooltip();
       *
       * // activate popovers
       * $("[rel=popover]").popover();
       *
       * // activate popovers with hover states
       * $("[rel=popover-hover]").popover({ trigger: "hover" });
       *
       * // activate inline charts
       * runAllCharts();
       *
       * // setup widgets
       * setup_widgets_desktop();
       *
       * // run form elements
       * runAllForms();
       *
       ********************************
       *
       * pageSetUp() is needed whenever you load a page.
       * It initializes and checks for all basic elements of the page
       * and makes rendering easier.
       *
       */
      
       pageSetUp();
       
      /*
       * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
       * eg alert("my home function");
       * 
       * var pagefunction = function() {
       *   ...
       * }
       * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
       * 
       * TO LOAD A SCRIPT:
       * var pagefunction = function (){ 
       *  loadScript(".../plugin.js", run_after_loaded);  
       * }
       * 
       * OR
       * 
       * loadScript(".../plugin.js", run_after_loaded);
       */
        
      })
    </script>
    <!-- Your GOOGLE ANALYTICS CODE Below -->
    <script>
      var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
        _gaq.push(['_trackPageview']);
      
      (function() {
        var ga    = document.createElement('script');
        ga.type   = 'text/javascript';
        ga.async  = true;
        ga.src    = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s     = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      })();
      $(document).ready(function() {
      /* show lightbox when clicking a thumbnail */
        $('a.thumb').click(function(event){
          event.preventDefault();
          var content = $('.modal-body');
          content.empty();
            var title = $(this).attr("title");
            $('.modal-title').html(title);        
            content.html($(this).html());
            $(".modal-profile").modal({show:true});
        });

      });
    </script>
  </body>
</html>