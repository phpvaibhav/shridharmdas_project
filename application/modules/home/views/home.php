  <?php $backend_assets =  base_url().'backend_assets/'; ?>
  <style type="text/css">
    .header-dropdown-list > li > .dropdown-toggle {
    margin-top: 0px ! important;
    
}
  </style>
<div id="main" role="main">
  <!-- MAIN CONTENT -->
  <div id="content" class="container">

<!-- START ROW -->

<div class="row">

  <!-- NEW COL START -->
            <div class="col-sm-12 col-md-12 col-lg-2 hidden-xs hidden-sm">
            <div class="hero-1">

              <div class="pull-left login-desc-box-l">
                <img src="<?php echo $backend_assets; ?>img/logo.png" class="pull-left display-image-1" alt="" style=" margin-left: -76px;" >

              </div>
            </div>

          </div>
  <article class="col-sm-12 col-md-12 col-lg-8">
    
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
        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
        <h2><?= lang('User_Form'); ?></h2>       
          <ul class="header-dropdown-list hidden-xs">
          <li>
            <?php if($this->session->userdata('site_lang')=='english'): ?>
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo $backend_assets; ?>img/blank.gif" class="flag flag-us" alt="English"> <span> English  </span> <i class="fa fa-angle-down"></i> </a>
             <?php elseif($this->session->userdata('site_lang')=='hindi'): ?>
               <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo $backend_assets; ?>img/blank.gif" class="flag flag-in" alt="Hindi"> <span> Hindi  </span> <i class="fa fa-angle-down"></i> </a>
             <?php else:  ?>
               <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo $backend_assets; ?>img/blank.gif" class="flag flag-in" alt="Hindi"> <span> Hindi  </span> <i class="fa fa-angle-down"></i> </a>
             <?php endif;  ?>
            <ul class="dropdown-menu pull-right">
              <li class="<?= ($this->session->userdata('site_lang')=='english')? 'active':'' ?>">
                <a href="<?php echo base_url().'home/switchLang/english/'.encoding(current_url()); ?>"><img src="<?php echo $backend_assets; ?>img/blank.gif" class="flag flag-us" alt="United States"> English (US)</a>
              </li>
              <li class="<?= ($this->session->userdata('site_lang')=='hindi')? 'active':'' ?>">
                <a href="<?php echo base_url().'home/switchLang/hindi/'.encoding(current_url()); ?>"><img src="<?php echo $backend_assets; ?>img/blank.gif" class="flag flag flag-in" alt="Hindi"> Hindi</a>
              </li>
              
              
            </ul>
          </li>
        </ul>
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
          
          <form id="user-add-form" method="post" class="smart-form" novalidate="novalidate" action="users/add" novalidate="novalidate" autocomplete="off">
            <header>
             <?= lang('basic_Information'); ?>
              <input type="hidden" name="id" value="0">
            </header>
            <fieldset>
              <div class="row">
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="firstName" placeholder="<?= lang('First_name'); ?>">
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="lastName" placeholder="<?= lang('Last_name'); ?>">
                  </label>
                </section>
              </div>

              <div class="row">
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="parentName" placeholder="<?= lang('parentName'); ?>">
                  </label>
                </section>
                  <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    <input type="text" name="dob" id="dob" placeholder="<?= lang('dob'); ?>" readonly="">
                  </label>
                </section>

              </div>

              <div class="row">
                
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                    <input type="text" name="contactNumber" placeholder="<?= lang('Phone'); ?>" data-mask="(999) 999-9999">
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-list"></i>
                    <input type="text" name="aadharNumber" placeholder="<?= lang('Aadhar_number'); ?>" data-mask="9999-9999-9999">
                  </label>
                </section>
              </div>
              <div class="row">
               
        
                <section class="col col-6">
                  <label class="select">
                    <select name="gender">
                      <option value="" selected="" disabled=""><?= lang('Select_Gender'); ?></option>
                      <option value="Male"><?= lang('Male');?></option>
                      <option value="Female"><?= lang('Female');?></option>
                    </select> <i></i> </label>
                </section>
                <section class="col col-6">
                  <label class="select">
                    <select name="maritalStatus">
                      <option value="" selected="" disabled=""><?= lang('Marital_Status'); ?></option>
                      <option value="Yes"><?= lang('Yes');?></option>
                      <option value="No"><?= lang('No');?></option>
                    </select> <i></i> </label>
                </section>
              </div>

            </fieldset>
            <header>
              <?= lang('Address'); ?>
            </header>
            <fieldset>
              <section>
                <label for="address2" class="input">
                  <input type="text" name="address" placeholder=" <?= lang('Address'); ?>">
                </label>
              </section>

              <div class="row">
                
                <section class="col col-6">
                  <!-- <label class="select">
                    <select  class="cities" id="city" name="city">
                      <option value="0" selected="" disabled="">Select City</option>
              
                    </select> <i></i> </label> -->
                    <label class="input">
                    <input type="text" name="city" placeholder="<?= lang('City'); ?>">
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input">
                    <input type="text" name="zip_code" placeholder="<?= lang('zip_code'); ?>" class="number-only">
                  </label>
                </section>
              </div>
               <div class="row">
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="tehsil" placeholder="<?= lang('Tehsil'); ?>">
                  </label>
                </section>
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="district" placeholder="<?= lang('District'); ?>">
                  </label>
                </section>
               
              </div>
              
              <div class="row">
                <section class="col col-6">
                  <label class="select">
                    <select name="country"  class="countries" id="country">
                      <option value="0" selected="" disabled=""><?= lang('Country'); ?></option>
                      <?php if(!empty($countries)):
                        foreach ($countries as $k => $country) {?>
                          <option value="<?=  $country->country_name; ?>" <?=  ($country->country_id==100)?  "selected='selected'" :""; ?> ><?=  $country->country_name; ?></option>
                      <?php } endif; ?>
              
                    </select> <i></i> </label>
                </section>
                <section class="col col-6">
                  <label class="select">
                    <select  class="states" name="state" id="state">
                      <option value="0" selected="" disabled=""><?= lang('State'); ?></option>
              
                    </select> <i></i> </label>
                </section>
              
              </div>
            </fieldset>
            <footer>
              <button type="submit" id="submit" class="btn btn-primary">
                <?= lang('Submit'); ?>
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
            <div class="col-sm-12 col-md-12 col-lg-2 hidden-xs hidden-sm">
            <div class="hero-1">

              <div class="pull-left login-desc-box-l">
                <img src="<?php echo $backend_assets; ?>img/logo.png" class="pull-left display-image-1" alt="" >

              </div>
            </div>

          </div>

</div>

<!-- END ROW -->

   </div>
</div>
<script type="text/javascript">
  var Please_select_your_first_name ="<?= lang('Please_select_your_first_name');?>";
  var Please_select_your_last_name ="<?= lang('Please_select_your_last_name');?>";
  var Please_select_your_father_name_husband_name ="<?= lang('Please_select_your_father_name_husband_name');?>";
  var Please_select_your_date_of_birth ="<?= lang('Please_select_your_date_of_birth');?>";
  var Please_select_your_gender ="<?= lang('Please_select_your_gender');?>";
  var Please_select_your_marital_status ="<?= lang('Please_select_your_marital_status');?>";
  var Please_select_your_contact_number ="<?= lang('Please_select_your_contact_number');?>";
  var Please_select_your_aadhar_number ="<?= lang('Please_select_your_aadhar_number');?>";
  var Please_select_your_address ="<?= lang('Please_select_your_address');?>";
  var Please_select_your_city ="<?= lang('Please_select_your_city');?>";
  var Please_select_your_zip_code ="<?= lang('Please_select_your_zip_code');?>";
  var Please_select_your_tehsil ="<?= lang('Please_select_your_tehsil');?>";
  var Please_select_your_district ="<?= lang('Please_select_your_district');?>";
  var Good_job ="<?= lang('Good_job');?>";
  var Your_form_submitted_successfully ="<?= lang('Your_form_submitted_successfully');?>";
</script>