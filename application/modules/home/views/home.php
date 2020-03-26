  <?php $backend_assets =  base_url().'backend_assets/'; ?>
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
        <h2>User Form</h2>       
        
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
              Basic Information
              <input type="hidden" name="id" value="0">
            </header>
            <fieldset>
              <div class="row">
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="firstName" placeholder="First name">
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="lastName" placeholder="Last name">
                  </label>
                </section>
              </div>

              <div class="row">
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="parentName" placeholder="Father name/ Husband name">
                  </label>
                </section>
                  <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    <input type="text" name="dob" id="dob" placeholder="Date of birth" readonly="">
                  </label>
                </section>

              </div>

              <div class="row">
                
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                    <input type="text" name="contactNumber" placeholder="Phone" data-mask="(999) 999-9999">
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-list"></i>
                    <input type="text" name="aadharNumber" placeholder="Aadhar number" data-mask="9999-9999-9999">
                  </label>
                </section>
              </div>
              <div class="row">
               
                <section class="col col-6">
                  <label class="select">
                    <select name="gender">
                      <option value="" selected="" disabled="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select> <i></i> </label>
                </section>
                <section class="col col-6">
                  <label class="select">
                    <select name="maritalStatus">
                      <option value="" selected="" disabled="">Marital Status</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select> <i></i> </label>
                </section>
              </div>

            </fieldset>
            <header>
              Address
            </header>
            <fieldset>
              <section>
                <label for="address2" class="input">
                  <input type="text" name="address" placeholder="Address">
                </label>
              </section>

              <div class="row">
                
                <section class="col col-6">
                  <!-- <label class="select">
                    <select  class="cities" id="city" name="city">
                      <option value="0" selected="" disabled="">Select City</option>
              
                    </select> <i></i> </label> -->
                    <label class="input">
                    <input type="text" name="city" placeholder="City">
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input">
                    <input type="text" name="zip_code" placeholder="Zip Code" class="number-only">
                  </label>
                </section>
              </div>
               <div class="row">
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="tehsil" placeholder="Tehsil">
                  </label>
                </section>
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="district" placeholder="District">
                  </label>
                </section>
               
              </div>
              
              <div class="row">
                <section class="col col-6">
                  <label class="select">
                    <select name="country"  class="countries" id="country">
                      <option value="0" selected="" disabled="">Select Country</option>
                      <?php if(!empty($countries)):
                        foreach ($countries as $k => $country) {?>
                          <option value="<?=  $country->country_name; ?>" ><?=  $country->country_name; ?></option>
                      <?php } endif; ?>
              
                    </select> <i></i> </label>
                </section>
                <section class="col col-6">
                  <label class="select">
                    <select  class="states" name="state" id="state">
                      <option value="0" selected="" disabled="">Select State</option>
              
                    </select> <i></i> </label>
                </section>
              
              </div>
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