  <?php $backend_assets =  base_url().'backend_assets/'; ?>
<div id="main" role="main">
  <!-- MAIN CONTENT -->
  <div id="content" class="container">
    <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-xs hidden-sm">
            <div class="hero-1">

              <div class="pull-left login-desc-box-l">
                <img src="<?php echo $backend_assets; ?>img/logo.png" class="pull-left display-image-1" alt="" style="width:300px">

              </div>
            </div>

          </div>
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="well no-padding">
          <form action="adminapi/login" id="login-form" class="smart-form client-form">
            <header><?= lang('sign_in'); ?></header>
            <fieldset>
              <section>
                <label class="label"><?= lang('email'); ?><span class="error">*</span></label>
                <label class="input"> <i class="icon-append fa fa-user"></i>
                  <input type="email" id="username" name="email" maxlength="100" size="100">
                  <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> <?= lang('Please_enter_email_address'); ?></b>
                </label>
              </section>
              <section>
                <label class="label"><?= lang('password');?><span class="error">*</span></label>
                <label class="input"> <i class="icon-append fa fa-lock"></i>
                  <input type="password" id="password" name="password">
                  <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> <?= lang("Please_enter_your_password"); ?></b> </label>
                  <div class="note">
                    <a href="<?php echo base_url().'admin/forgot' ?>"><?= lang('forgot_password');?>?</a>
                  </div>
              </section>
              <section>
                <label class="checkbox">
                  <input type="checkbox" id="remember_me" name="remember" checked="">
                  <i></i><?= lang('stay_signed_in'); ?></label>
              </section>
            </fieldset>
            <footer>
              <button type="submit" id="submit" class="btn btn-primary">
                <?= lang('sign_in'); ?>
              </button>
            </footer>
          </form>
        </div> 
      </div>
       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-xs hidden-sm">
            <div class="hero-1">

              <div class="pull-left login-desc-box-l">
                <img src="<?php echo $backend_assets; ?>img/logo.png" class="pull-left display-image-1"  alt="" style="width:300px; margin-left: 63px;">

              </div>
            </div>

          </div>
    </div>
  </div>
</div>