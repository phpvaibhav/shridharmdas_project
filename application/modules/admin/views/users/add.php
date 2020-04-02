<style type="text/css">

.select2-container-multi .select2-choices .select2-search-choice, .select2-selection__choice {
    padding: 1px 28px 1px 8px !important;
    margin: 4px 0 3px 5px !important;
    position: relative;
    line-height: 18px;
    color: #fff;
    cursor: default;
    border: 1px solid #2a6395;
    -webkit-background-clip: padding-box !important;
    background-clip: padding-box !important;
    -webkit-touch-callout: none !important;
    -webkit-user-select: none !important;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: #3276b1;
}
  </style>
<!-- START ROW -->

<div class="row">

	<!-- NEW COL START -->
	<article class="col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
		
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
					
					<form id="user-add-form" class="smart-form" novalidate="novalidate" action="users/add" novalidate="novalidate" autocomplete="off">
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
            <!--   <div class="row">
                   <section class="col col-6">
                  <label class="checkbox">
                    <input type="checkbox" id="remember_Address" name="rememberAddress">
                    <i></i>Remember address</label>
                  </section> 
              </div>-->
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
				<!-- 		<header>
							<?= lang('basic_Information'); ?>
							<input type="hidden" name="id" value="0">
						</header> -->
            <!-- <fieldset>
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

            </fieldset> -->
          <!--   <header>
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
            </fieldset> -->
						<footer>
							<button type="submit" id="submit" class="btn btn-primary">
								<?= lang('Save'); ?>
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


</div>

<!-- END ROW -->
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