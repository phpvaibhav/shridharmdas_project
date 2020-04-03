  <?php $backend_assets =  base_url().'backend_assets/'; ?>
  
<div id="main" role="main">
  <!-- MAIN CONTENT -->
  <div id="content" class="container">

<!-- START ROW -->

<div class="row">

  <!-- NEW COL START -->
      <!--       <div class="col-sm-12 col-md-12 col-lg-2 hidden-xs hidden-sm">
            <div class="hero-1">

              <div class="pull-left login-desc-box-l">
                <img src="<?php echo $backend_assets; ?>img/logo.png" class="pull-left display-image-1" alt="" style=" margin-left: -76px;" >

              </div>
            </div>

          </div> -->
  <article class="col-sm-12 col-md-12 col-lg-12">
    <header>
       <center> <a type="button"  data-toggle="modal" data-target=".bd-example-modal-lg"class="btn  btn-sm header-btn"><h3>फॉर्म को भरने हेतु निर्देश</h3> </a>  </center>
    </header>
   
  </article>
  <article class="col-sm-12 col-md-12 col-lg-12">
    
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
                  <label class="input"> <i class="icon-prepend fa fa-sun-o"></i>
                    <input type="text" name="preceptorName" placeholder="<?= lang('Preceptor').' '.lang('Name'); ?>">
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-sitemap"></i>
                    <input type="text" name="unionName" placeholder="<?= lang('Union').' '.lang('Name'); ?>">
                  </label>
                </section>
              </div>
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
                    <input type="text" name="contactNumber" placeholder="<?= lang('Phone'); ?>" data-mask="999 999 9999">
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
                   <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                    <input type="email" name="email" placeholder="<?= lang('email'); ?>">
                  </label>
                  </section>
                    <section class="col col-6">
                   <label class="input"> <i class="icon-prepend fa fa-tag"></i>
                    <input type="text" name="education" placeholder="<?= lang('Education'); ?>">
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
                      <option value="Married"><?= lang('married');?></option>
                      <option value="Unmarried"><?= lang('unmarried');?></option>
                      <option value="Divorced"><?= lang('divorced');?></option>
                       <option value="Other"><?= lang('other');?></option>
                    </select> <i></i> </label>
                </section>
               
           
              </div>
              <div class="row">
                   <section class="col col-6">
                <!--     <label>Select2 Plugin (multi-select)</label>
                    <select multiple style="width:100%" class="select2">
                      <optgroup label="Alaskan/Hawaiian Time Zone">
                        <option value="AK">Alaska</option>
                        <option value="HI">Hawaii</option>
                      </optgroup>
                      <optgroup label="Pacific Time Zone">
                        <option value="CA">California</option>
                        <option value="NV" selected="selected">Nevada</option>
                        <option value="OR">Oregon</option>
                        <option value="WA">Washington</option>
                      </optgroup>
                      <optgroup label="Mountain Time Zone">
                        <option value="AZ">Arizona</option>
                        <option value="CO">Colorado</option>
                        <option value="ID">Idaho</option>
                        <option value="MT" selected="selected">Montana</option><option value="NE">Nebraska</option>
                        <option value="NM">New Mexico</option>
                        <option value="ND">North Dakota</option>
                        <option value="UT">Utah</option>
                        <option value="WY">Wyoming</option>
                      </optgroup>
                      <optgroup label="Central Time Zone">
                        <option value="AL">Alabama</option>
                        <option value="AR">Arkansas</option>
                        <option value="IL">Illinois</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="OK">Oklahoma</option>
                        <option value="SD">South Dakota</option>
                        <option value="TX">Texas</option>
                        <option value="TN">Tennessee</option>
                        <option value="WI">Wisconsin</option>
                      </optgroup>
                      <optgroup label="Eastern Time Zone">
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="IN">Indiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI" selected="selected">Michigan</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="OH">Ohio</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WV">West Virginia</option>
                      </optgroup>
                    </select> -->
                      
                      <select name="religiousKnowledge[]" multiple style="width:100%" class="select2" data-placeholder="<?= lang('Religious_knowledge'); ?>">
                     <!--  <option value="" selected="" disabled=""><?= lang('Religious_knowledge'); ?></option> -->
                      <option value="णमोकार मंत्र"> णमोकार मंत्र</option>
                      <option value="सामायिक">सामायिक</option>
                      <option value="प्रतिक्रमण">प्रतिक्रमण</option>
                      <option value="पच्चीस बोल">पच्चीस बोल</option>
                      <option value="पुच्छिस्सुणम्">पुच्छिस्सुणम्</option>
                      <option value="दशवैकालिक सूत्र">दशवैकालिक सूत्र</option>
                      <option value="उत्तराध्ययन सूत्र">उत्तराध्ययन सूत्र</option>
                      <option value="अन्य">अन्य</option>
                     
                      </select>
                  </section>
                
           <!--        <section class="col col-6">
                      <label class="select">
                      <select name="education">
                      <option value="" selected="" disabled=""><?= lang('Education'); ?></option>
                      <option value="Yes"><?= lang('Yes');?></option>
                      <option value="No"><?= lang('No');?></option>
                      </select> <i></i> </label>
                  </section> -->
                  <section class="col col-6">
                      <label class="select">
                      <select name="profession">
                      <option value="" selected="" disabled=""><?= lang('Profession'); ?></option>
                      <option value="job">Job</option>
                      <option value="business">Business</option>
                      <option value="house wife">House wife</option>
                      <option value="student">Student</option>
                      <option value="other">Other</option>
                      </select> <i></i> </label>
                  </section>
           
              </div>
              <div class="row">
                
                  <section class="col col-6">
                      <label class="select">
                      <select name="bloodGroup">
                      <option value="" selected="" disabled=""><?= lang('blood_group'); ?></option>
                      <option value="A+">A+</option>
                      <option value="O+">O+</option>
                      <option value="B+">B+</option>
                      <option value="AB+">AB+</option>
                      <option value="A-">A-</option>
                      <option value="O-">O-</option>
                      <option value="B-">B-</option>
                      <option value="AB-">AB-</option>
                    
                      </select> <i></i> </label>
                  </section>
                   <section class="col col-6">
                   <label class="input"> <i class="icon-prepend fa fa-list"></i>
                    <input type="text" name="unionResponsibility" placeholder="<?= lang('unionResponsibility'); ?>">
                  </label>
                  </section>
           
              </div>
              

            </fieldset>
            <header>
              <?= lang('home_address'); ?>
            </header>
            <fieldset>
              <section>
                <label for="address2" class="input">
                  <input type="text" name="address" id="address" placeholder=" <?= lang('Address'); ?>">
                </label>
              </section>

              <div class="row">
                
                <section class="col col-6">
                  <!-- <label class="select">
                    <select  class="cities" id="city" name="city">
                      <option value="0" selected="" disabled="">Select City</option>
              
                    </select> <i></i> </label> -->
                    <label class="input">
                    <input type="text" name="city" id="city" placeholder="<?= lang('City'); ?>">
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input">
                    <input type="text" name="zip_code" id="zip_code" placeholder="<?= lang('zip_code'); ?>" class="number-only">
                  </label>
                </section>
              </div>
               <div class="row">
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="tehsil" id="tehsil" placeholder="<?= lang('Tehsil'); ?>">
                  </label>
                </section>
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="district" id="district" placeholder="<?= lang('District'); ?>">
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
              <div class="row">
                   <section class="col col-6">
                  <label class="checkbox">
                    <input type="checkbox" id="remember_Address" name="rememberAddress">
                    <i></i>Remember address</label>
                  </section>
              </div>
            </fieldset>            
            <header>
                <div class="row">
                   <section class="col col-6">
                 <?= lang('office_address'); ?>
                  </section>  
                  <section class="col col-6">
                  <label class="checkbox pull-right">
                    <input type="checkbox" id="Same_Address" name="remember">
                    <i></i>Same as above</label>
                  </section>
              </div>
             
            </header>
            <fieldset>
              <section>
                <label for="address2" class="input">
                  <input type="text" name="oaddress" id="oaddress" placeholder=" <?= lang('Address'); ?>">
                </label>
              </section>

              <div class="row">
                
                <section class="col col-6">
                  <!-- <label class="select">
                    <select  class="cities" id="city" name="city">
                      <option value="0" selected="" disabled="">Select City</option>
              
                    </select> <i></i> </label> -->
                    <label class="input">
                    <input type="text" name="ocity" id="ocity" placeholder="<?= lang('City'); ?>">
                  </label>
                </section>
                <section class="col col-6">
                  <label class="input">
                    <input type="text" name="ozip_code" id="ozip_code" placeholder="<?= lang('zip_code'); ?>" class="number-only">
                  </label>
                </section>
              </div>
               <div class="row">
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="otehsil" id="otehsil" placeholder="<?= lang('Tehsil'); ?>">
                  </label>
                </section>
                
                <section class="col col-6">
              
                    <label class="input">
                    <input type="text" name="odistrict" id="odistrict" placeholder="<?= lang('District'); ?>">
                  </label>
                </section>
               
              </div>
              
              <div class="row">
                <section class="col col-6">
                  <label class="select">
                    <select name="ocountry"  class="countries" id="ocountry">
                      <option value="0" selected="" disabled=""><?= lang('Country'); ?></option>
                      <?php if(!empty($countries)):
                        foreach ($countries as $k => $country) {?>
                          <option value="<?=  $country->country_name; ?>" <?=  ($country->country_id==100)?  "selected='selected'" :""; ?> ><?=  $country->country_name; ?></option>
                      <?php } endif; ?>
              
                    </select> <i></i> </label>
                </section>
                <section class="col col-6">
                  <label class="select">
                    <select  class="states" name="ostate" id="ostate">
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
           <!--  <div class="col-sm-12 col-md-12 col-lg-2 hidden-xs hidden-sm">
            <div class="hero-1">

              <div class="pull-left login-desc-box-l">
                <img src="<?php echo $backend_assets; ?>img/logo.png" class="pull-left display-image-1" alt="" >

              </div>
            </div>

          </div> -->

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



<div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">श्री धर्मदास गण जनगणना फॉर्म को भरने हेतु निर्देश <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h5>
        
      </div>
      <div class="modal-body scrollbar">
         <ul style="font-size: 18px;font-weight: bold; padding-left:20px;">
           <li>गुरु भगवंत के नाम वाले कॉलम मे जिन्हे आपने अपना गुरु बनाया हो तो उनका नाम भरे |</li>
           <li>श्री संघ के नाम वाले कॉलम मे आप जहाँ रहते ही उस श्री संघ व शहर का नाम |</li>
           <li>घर का पता वाले कॉलम मे आप वर्तमान मे जहा रह रहे है उसका सम्पूर्ण पता |</li>
           <li>कार्यालय प्रतिष्ठान वाले कॉलम मे जिस कंपनी मे आपकी जॉब हो या आपका व्यापार हो उसका नाम व पूर्ण पता लिखे|</li>
           <li>नाम वाले कॉलम मे अपना नाम व उपनाम वाले कॉलम मे अपनी सरनेम लिखे |</li>
           <li>श्री संघ या संगठन वाले कॉलम मे यदि आपके पास कोई स्थानीय संघ ,धर्मदास गण परिषद ,युवा संगठन , श्राविका संगठन, नवयुवक मण्डल, बालिका मण्डल मे कोई पद हो तो उसका उल्लेख करे |</li>
           <li>आपके पहला फॉर्म submit होने पर दूसरा फॉर्म स्वतः जनरेट हो जाएगा आप अपने परिवार के दूसरे सदस्य का फॉर्म submit कर सकते है उसमे आपको पता और कार्यालय यदि एक ही है तो दूसरा भरने की जरूरत नहीं है, आप same as above पर क्लिक करे |</li>
           <li>अपने परिवार के दूसरे सदस्य का फॉर्म भरते समय आपको अपने फॉर्म मैं भरा हुआ अड्रेस ही रखना हो तो अपना फॉर्म भरते समय remember address ऑप्शन पर क्लिक करे ।</li>
           <li>इस फ़ॉर्म मे अनिवार्य रूप से नाम , उपनाम , पिता/पति का नाम , जन्म तारीख यदि याद ना हों तो 1 जनवरी जिस वर्ष मे आपका जन्म हुआ हो वह डाल देवे , मोबाईल नंबर , लिंग , वैवाहिक स्थिति यह सभी कॉलम को भरना |</li>

         </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>