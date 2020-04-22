
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
					
					<form id="user-add-form" class="smart-form" novalidate="novalidate" action="users/edit" novalidate="novalidate" autocomplete="off">
            <header>
             <?= lang('basic_Information'); ?>
              <input type="hidden" name="id" value="<?= encoding($info['id']); ?>">
            </header>
            <fieldset>
             
              <div class="row">
                  <section class="col col-6">
                  <label class="label"><?= lang('First_name').'(Actual)'; ?></label>
                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                      <input type="text" name="actualFirstName" placeholder="<?= lang('First_name'); ?>"  maxlength="30" size="30" value="<?= $usermeta['actualFirstName']; ?>" >
                    </label>
                  </section>
                  <section class="col col-6">
                  	<label class="label"><?= lang('Last_name').'(Actual)'; ?></label>
                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                      <input type="text" name="actualLastName" placeholder="<?= lang('Last_name'); ?>"  maxlength="30" size="30" value="<?= $usermeta['actualLastName'] ?>" >
                    </label>
                  </section>
              </div>


              <div class="row">
                  <section class="col col-6">
                  <label class="label"><?= lang('First_name').'(Hindi)'; ?></label>
                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                      <input type="text" name="hindiFirstName" placeholder="<?= lang('First_name'); ?>"  maxlength="30" size="30" value="<?= $usermeta['hindiFirstName']; ?>" >
                    </label>
                  </section>
                  <section class="col col-6">
                    <label class="label"><?= lang('Last_name').'(Hindi)'; ?></label>
                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                      <input type="text" name="hindiLastName" placeholder="<?= lang('Last_name'); ?>"  maxlength="30" size="30" value="<?= $usermeta['hindiLastName'] ?>" >
                    </label>
                  </section>
              </div>


              <div class="row">
                  <section class="col col-6">
                  <label class="label"><?= lang('First_name').'(English)'; ?></label>
                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                      <input type="text" name="firstName" placeholder="<?= lang('First_name'); ?>"  maxlength="30" size="30" value="<?= $info['firstName']; ?>" >
                    </label>
                  </section>
                  <section class="col col-6">
                    <label class="label"><?= lang('Last_name').'(English)'; ?></label>
                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                      <input type="text" name="lastName" placeholder="<?= lang('Last_name'); ?>"  maxlength="30" size="30" value="<?= $info['lastName'] ?>" >
                    </label>
                  </section>
              </div>
              <div class="row">
                <section class="col col-6">
                    <label class="label"><?= lang('parentName').'('.lang('Write_full_name').')'.' (Actual)'; ?></label>
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="actualParentName" placeholder="<?= lang('parentName'); ?>"   maxlength="30" size="30" value="<?= $usermeta['actualParentName']; ?>"  >
                  </label>
                </section>
                 <section class="col col-6">
                    <label class="label"><?= lang('familyHeadName').'('.lang('Write_full_name').')'.' (Actual)'; ?></label>
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="actualFamilyHeadName" placeholder="<?= lang('familyHeadName'); ?>"  maxlength="30" size="30" value="<?= $usermeta['actualFamilyHeadName']; ?>"   >
                  </label>
                </section>
              </div>
              <div class="row">
                <section class="col col-6">
                    <label class="label"><?= lang('parentName').'('.lang('Write_full_name').')'.' (Hindi)'; ?></label>
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="hindiParentName" placeholder="<?= lang('parentName'); ?>"   maxlength="30" size="30" value="<?= $usermeta['hindiParentName']; ?>"  >
                  </label>
                </section>
                 <section class="col col-6">
                    <label class="label"><?= lang('familyHeadName').'('.lang('Write_full_name').')'.' (Hindi)'; ?></label>
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="hindiFamilyHeadName" placeholder="<?= lang('familyHeadName'); ?>"  maxlength="30" size="30" value="<?= $usermeta['hindiFamilyHeadName']; ?>"   >
                  </label>
                </section>
              </div>
              <div class="row">
                <section class="col col-6">
                    <label class="label"><?= lang('parentName').'('.lang('Write_full_name').')'.' (English)'; ?></label>
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="parentName" placeholder="<?= lang('parentName'); ?>"   maxlength="30" size="30" value="<?= $info['parentName']; ?>"  >
                  </label>
                </section>
                 <section class="col col-6">
                    <label class="label"><?= lang('familyHeadName').'('.lang('Write_full_name').')'.' (English)'; ?></label>
                  <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="familyHeadName" placeholder="<?= lang('familyHeadName'); ?>"  maxlength="30" size="30" value="<?= $info['familyHeadName']; ?>"   >
                  </label>
                </section>
              </div>

           <!--    <div class="row">
               <section class="col col-6">
                  <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    <input type="text" name="dob" id="dob" placeholder="<?= lang('dob'); ?>" readonly="">
                  </label>
                </section>

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
               
              
              </div> -->
<!--               <div class="row">
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
               
           
              </div> -->
<!--               <div class="row">
                   <section class="col col-6">

                      
                      <select name="religiousKnowledge[]" multiple style="width:100%" class="select2" data-placeholder="<?= lang('Religious_knowledge'); ?>">
                    
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
           
              </div> -->
<!--               <div class="row">
                
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
           
              </div> -->
              

            </fieldset>
<!--             <header>
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
  var Please_select_your_full_name              = "<?= lang('Please_select_your_full_name');?>";
  var Please_select_your_first_name             =  "<?= lang('Please_select_your_first_name');?>";
  var Please_select_your_last_name              = "<?= lang('Please_select_your_last_name');?>";
  var Please_select_your_father_name_husband_name = "<?= lang('Please_select_your_father_name_husband_name');?>";
  var Please_select_your_date_of_birth            ="<?= lang('Please_select_your_date_of_birth');?>";
  var Please_select_your_gender                   = "<?= lang('Please_select_your_gender');?>";
  var Please_select_your_marital_status           = "<?= lang('Please_select_your_marital_status');?>";
  var Please_select_your_contact_number           = "<?= lang('Please_select_your_contact_number');?>";
  var Please_select_your_aadhar_number            = "<?= lang('Please_select_your_aadhar_number');?>";
  var Please_select_your_address                  = "<?= lang('Please_select_your_address');?>";
  var Please_select_your_city                     = "<?= lang('Please_select_your_city');?>";
  var Please_select_your_zip_code                 = "<?= lang('Please_select_your_zip_code');?>";
  var Please_select_your_tehsil                   = "<?= lang('Please_select_your_tehsil');?>";
  var Please_select_your_district                 = "<?= lang('Please_select_your_district');?>";
  var Good_job                                    = "<?= lang('Good_job');?>";
  var Your_form_submitted_successfully            = "<?= lang('Your_form_submitted_successfully');?>";
  var Please_select_your_front_image              = "<?= lang('Please_select_your_front_image');?>";
  var Please_select_your_back_image               = "<?= lang('Please_select_your_back_image');?>";
  var Please_select__image_type                   = "<?= lang('Please_select__image_type');?>";
  var Please_select_your_familyHeadName           = "<?= lang('Please_select_your_familyHeadName');?>";
  var Please_enter_at_least_12_digit_aadhaar_number = "<?= lang('Please_enter_at_least_12_digit_aadhaar_number');?>";
  var Please_enter_at_least_10_digit_phone_number   = "<?= lang('Please_enter_at_least_10_digit_phone_number');?>";
  var Please_select_your_unionName                  = "<?= lang('Please_select_your_unionName');?>";
  var This_option_field_is_required                 = "<?= lang('This_option_field_is_required');?>";
  var This_aadhar_number_is_already_taken                 = "<?= lang('This_aadhar_number_is_already_taken');?>";
  var Please_select_your_Occupation ="<?= lang('Please_select_your_Occupation');?>";
var Please_select_your_religious_Knowledge ="<?= lang('Please_select_your_religious_Knowledge');?>";
var Please_select_your_Identity_image ="<?= lang('Please_select_your_Identity_image');?>";
</script>