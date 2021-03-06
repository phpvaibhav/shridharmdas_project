
<div class="row">

	<!-- NEW COL START -->
	<article class="col-sm-7 col-md-7 col-lg-7">

		
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
				 <a class=" btn btn-success pull-right" href="<?= base_url().'user-detail/'.encoding($info['id']); ?>">
                   Back To User Detail</a>
                 
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
					
					<form method="post" id="user-add-form" class="smart-form" novalidate="novalidate" action="users/edit" novalidate="novalidate" autocomplete="off">
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
               <div class="row">
               <section class="col col-6">
                 <label for="dob"><?= lang('dob'); ?><span>*</span></label>
                  <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    <input type="text" name="dob" id="dob" placeholder="<?= lang('dob'); ?>" readonly="" value="<?= date('d-m-Y',strtotime($info['dob'])); ?>">
                  </label>
                </section>

              <section class="col col-6">
                  <label for="gender"><?= lang('Select_Gender'); ?><span>*</span></label>
                  <label class="select">
                    <select name="gender">
                      <option value="" selected="" disabled=""><?= lang('Select_Gender'); ?></option>
                      <option value="Male" <?= $info['gender']=='Male'? "selected='selected'":""; ?>><?= lang('Male');?></option>
                      <option value="Female" <?= $info['gender']=='Female'? "selected='selected'":""; ?>><?= lang('Female');?></option>
                    </select> <i></i> </label>
                </section>
              
              </div>
                            <div class="row">
                 <section class="col col-6">
                  <label class="label"><?= lang('blood_group'); ?></label>
                  <label class="select">
                      <select name="bloodGroup" class="form-control" id="bloodGroup">
                            <option value="" selected="" disabled=""><?= lang('blood_group'); ?></option>
                            <option value="A+" <?= $usermeta['bloodGroup']=='A+'?"selected='selected'":"";  ?>>A+</option>
                            <option value="O+" <?= $usermeta['bloodGroup']=='O+'?"selected='selected'":"";  ?>>O+</option>
                            <option value="B+" <?= $usermeta['bloodGroup']=='B+'?"selected='selected'":"";  ?>>B+</option>
                            <option value="AB+" <?= $usermeta['bloodGroup']=='A+'?"selected='selected'":"";  ?>>AB+</option>
                            <option value="A-" <?= $usermeta['bloodGroup']=='A-'?"selected='selected'":"";  ?>>A-</option>
                            <option value="O-" <?= $usermeta['bloodGroup']=='O-'?"selected='selected'":"";  ?>>O-</option>
                            <option value="B-" <?= $usermeta['bloodGroup']=='B-'?"selected='selected'":"";  ?>>B-</option>
                            <option value="AB-" <?= $usermeta['bloodGroup']=='AB-'?"selected='selected'":"";  ?>>AB-</option>
                            <option value="Unknown" <?= $usermeta['bloodGroup']=='Unknown'?"selected='selected'":"";  ?>>Unknown</option>
                          
                            </select><i></i> </label>
                </section>
               <section class="col col-6">
                   <label class="label"><?= lang('Marital_Status'); ?></label>
                  <label class="select">
                     <select name="maritalStatus" class="form-control" id="maritalStatus">
                            <option value="" selected="" disabled=""><?= lang('Marital_Status'); ?></option>
                            <option value="Married"  <?= $info['maritalStatus']=='Married' ?"selected='selected'":""; ?>><?= lang('married');?></option>
                            <option value="Unmarried" <?= $info['maritalStatus']=='Unmarried' ?"selected='selected'":""; ?>><?= lang('unmarried');?></option>
                            <option value="Divorced" <?= $info['maritalStatus']=='Divorced' ?"selected='selected'":""; ?>><?= lang('divorced');?></option>
                            <option value="Other" <?= $info['maritalStatus']=='Other' ?"selected='selected'":""; ?>><?= lang('other');?></option>
                            </select><i></i> </label>
                </section>
    
              </div>
              <div class="row">
                
                <section class="col col-6">
                      <label class="label"><?= lang('Union').' '.lang('Name'); ?></label>
                     <select name="unionName"  class="form-control js-example-basic-single "  id="unionName"  >
                              <?php if(!empty($unionList)):?>
                                  <option value="" selected="" disabled=""><?= lang('Union').' '.lang('Name'); ?></option>
                                <?php
                              foreach ($unionList as $kc => $union) { 
                                
                                ?>
                             
                              <option value="<?= $union->sanghId; ?>" data-sanghname="<?=  $union->name; ?>" <?= $info['sanghId']==$union->sanghId ?"selected='selected'":""; ?> ><?=  $union->name; ?></option>
                              <?php } endif; ?>

                              </select>
                </section>
    
              </div>              

              <div class="row">
                 <section class="col col-6 otherUnionName" <?= $usermeta['unionName']=='OTHER' ?"style='display: block;'":"style='display: none;'"; ?> >
                  <label class="input">
                   <input type="text" id="otherUnionName" class="form-control" placeholder="<?= lang('otherUnionName'); ?>" value="<?= $usermeta['otherUnionName']; ?>"  name="otherUnionName">
                  </label>
                </section>
              </div>
<section>
  <?php $rk = !empty($usermeta['religiousKnowledge']) ? explode(",",$usermeta['religiousKnowledge']):array(); ?>
                          <label class="label"><?= lang('Religious_knowledge'); ?></label>
                          <div class="row">
                            <div class="col col-6">
                              <label class="checkbox">
                                <input type="checkbox" name="religiousKnowledge[]" <?= in_array("णमोकार मंत्र एवं  प्राथमिक ज्ञान",$rk)?"checked='checked'":""; ?>  value="णमोकार मंत्र एवं  प्राथमिक ज्ञान" >
                                <i></i>णमोकार मंत्र एवं  प्राथमिक ज्ञान</label>
                              <label class="checkbox">
                                <input type="checkbox" name="religiousKnowledge[]" <?= in_array("सामयिक",$rk)?"checked='checked'":""; ?> value="सामयिक" >
                                <i></i>सामयिक</label>
                             <label class="checkbox">
                                <input type="checkbox" name="religiousKnowledge[]"  value="प्रतिक्रमण" <?= in_array("प्रतिक्रमण",$rk)?"checked='checked'":""; ?>>
                                <i></i>प्रतिक्रमण</label>
                               <label class="checkbox">
                                <input type="checkbox" name="religiousKnowledge[]"  value="थोकड़ो का ज्ञान" <?= in_array("थोकड़ो का ज्ञान",$rk)?"checked='checked'":""; ?>>
                                <i></i>थोकड़ो का ज्ञान</label>
                                
                                <label class="checkbox">
                                <input type="checkbox" name="religiousKnowledge[]"  value="स्वाध्याय का ज्ञान" <?= in_array("स्वाध्याय का ज्ञान",$rk)?"checked='checked'":""; ?>>
                                <i></i>स्वाध्याय का ज्ञान</label>
                            </div>

                        </section>
            </fieldset>

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

  <!-- NEW COL START -->
  <article class="col-sm-5 col-md-5 col-lg-5">
    
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
        <h2>Address</h2>        
         <a class=" btn btn-success pull-right" href="<?= base_url().'user-detail/'.encoding($info['id']); ?>">Back To User Detail</a>     
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
         <form method="post" id="user-address-form" class="smart-form" novalidate="novalidate" action="users/addressupdate" novalidate="novalidate" autocomplete="off">
                                        <header>
             <?= lang('home_address'); ?>
            </header>
            <fieldset>
              <section>
              <label for="zip_code"><?= lang('zip_code'); ?><span>*</span></label>
                <label for="zip_code" class="input">
                   <input type="text" class="form-control number-only" name="zip_code" maxlength="6" size="6" id="zip_code" placeholder="<?= lang('zip_code'); ?>" onkeyup="zipCodetoData(this);" data-set=""; value="<?= @$addresses[0]->zip_code; ?>"   >
                </label>
              </section>
        <section>
               <label for="address"><?= lang('Address'); ?><span>*</span></label>
                <label for="address" class="input">
                  <input type="hidden" name="addressId" value="<?= @$addresses[0]->addressId; ?>">
                  <input type="hidden" name="paddressId" value="<?= @$addresses[1]->addressId; ?>">
                  <input type="hidden" name="userId" value="<?= encoding($info['id']); ?>">
                    <input type="hidden" id="postNameE" name="postNameE" value="<?= @$addresses[0]->postName; ?>">
                  <input type="hidden" id="ppostNameE" name="ppostNameE" value="<?= @$addresses[1]->postName; ?>">
                  <input type="text" name="address" id="address" value="<?= @$addresses[0]->address; ?>" placeholder=" <?= lang('Address'); ?>"  maxlength="100" size="100">
                </label>
              </section>

              <div class="row">
                
                <section class="col col-6">
                   <label for="postName"><?= lang('postName'); ?><span>*</span></label>
                 <label class="select">
                    <select  class="form-control" name="postName" id="postName">
                              <option value="0" selected="" disabled=""><?= lang('postName'); ?></option>
                              </select><i></i></label>
                 
                </section>
                <section class="col col-6">
                   <label for="city"><?= lang('City'); ?><span>*</span></label>
                  <label class="input">
                    <input type="text" class="form-control" name="city" id="city" placeholder="<?= lang('City'); ?>" value="<?= @$addresses[0]->city; ?>" maxlength="30" size="30">
                  </label>
                </section>
              </div>
               <div class="row">
                
                <section class="col col-6">
                  <label for="tehsil"><?= lang('Tehsil'); ?><span>*</span></label>
                    <label class="input">
                    <input type="text" class="form-control" name="tehsil" id="tehsil" placeholder="<?= lang('Tehsil'); ?>"  value="<?= @$addresses[0]->tehsil; ?>" maxlength="30" size="30">
                  </label>
                </section>
                
                <section class="col col-6">
                   <label for="district"><?= lang('District'); ?><span>*</span></label>
                    <label class="input">
                    <input type="text" class="form-control" name="district" id="district" placeholder="<?= lang('District'); ?>" value="<?= @$addresses[0]->district; ?>" maxlength="30" size="30">
                  </label>
                </section>
               
              </div>
              
              <div class="row">
                 <section class="col col-6">
                   <label for="state"><?= lang('State'); ?><span>*</span></label>
                    <label class="input">
                    <input type="text" class="form-control" name="state" id="state" placeholder="<?= lang('State'); ?>" value="<?= @$addresses[0]->state; ?>" maxlength="30" size="30">
                  </label>
                </section>
               <section class="col col-6">
                  <label for="country"><?= lang('Country'); ?><span>*</span></label>
                    <label class="input">
                    <input type="text" class="form-control" name="country"  id="country" placeholder="<?= lang('Country'); ?>" value="<?= @$addresses[0]->country; ?>" value="India" maxlength="30" size="30">
                  </label>
                </section>
              
              
              </div>
          
            </fieldset>            
            <header>
                <div class="row">
                   <section class="col col-6">
                 <?= lang('permanent_address'); ?>
                  </section>  
                  <section class="col col-6">
                  <label class="checkbox pull-right">
                    <input type="checkbox" id="Same_AddressP" name="remember">
                    <i></i>Same as above</label>
                  </section>
              </div>
             
            </header>
                     <fieldset>
              <section>
              <label for="pzip_code"><?= lang('zip_code'); ?><span>*</span></label>
                <label for="pzip_code" class="input">
                   <input type="text" class="form-control number-only" name="pzip_code" maxlength="6" size="6" id="pzip_code" placeholder="<?= lang('zip_code'); ?>" onkeyup="zipCodetoData(this);" data-set="p" value="<?= @$addresses[1]->zip_code; ?>"   >
                </label>
              </section>
        <section>
               <label for="paddress"><?= lang('Address'); ?><span>*</span></label>
                <label for="paddress" class="input">
                  <input type="text" name="paddress" id="paddress" value="<?= @$addresses[1]->address; ?>" placeholder=" <?= lang('Address'); ?>"  maxlength="100" size="100">
                </label>
              </section>

              <div class="row">
                
                <section class="col col-6">
                   <label for="ppostName"><?= lang('postName'); ?><span>*</span></label>
                 <label class="select">
                    <select  class="form-control" name="ppostName" id="ppostName">
                              <option value="0" selected="" disabled=""><?= lang('postName'); ?></option>
                              </select><i></i></label>
                 
                </section>
                <section class="col col-6">
                   <label for="pcity"><?= lang('City'); ?><span>*</span></label>
                  <label class="input">
                    <input type="text" class="form-control" name="pcity" id="pcity" placeholder="<?= lang('City'); ?>" value="<?= @$addresses[1]->city; ?>" maxlength="30" size="30">
                  </label>
                </section>
              </div>
               <div class="row">
                
                <section class="col col-6">
                  <label for="ptehsil"><?= lang('Tehsil'); ?><span>*</span></label>
                    <label class="input">
                    <input type="text" class="form-control" name="ptehsil" id="ptehsil" placeholder="<?= lang('Tehsil'); ?>"  value="<?= @$addresses[1]->tehsil; ?>" maxlength="30" size="30">
                  </label>
                </section>
                
                <section class="col col-6">
                   <label for="district"><?= lang('District'); ?><span>*</span></label>
                    <label class="input">
                    <input type="text" class="form-control" name="pdistrict" id="pdistrict" placeholder="<?= lang('District'); ?>" value="<?= @$addresses[1]->district; ?>" maxlength="30" size="30">
                  </label>
                </section>
               
              </div>
              
              <div class="row">
                 <section class="col col-6">
                   <label for="pstate"><?= lang('State'); ?><span>*</span></label>
                    <label class="input">
                    <input type="text" class="form-control" name="pstate" id="pstate" placeholder="<?= lang('State'); ?>" value="<?= @$addresses[1]->state; ?>" maxlength="30" size="30">
                  </label>
                </section>
               <section class="col col-6">
                  <label for="pcountry"><?= lang('Country'); ?><span>*</span></label>
                    <label class="input">
                    <input type="text" class="form-control" name="pcountry"  id="pcountry" placeholder="<?= lang('Country'); ?>" value="<?= @$addresses[1]->country; ?>" value="India" maxlength="30" size="30">
                  </label>
                </section>
              
              
              </div>
          
            </fieldset>     
            <footer>
              
              <button type="submit" id="submitA" class="btn btn-primary">
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
var Please_enter_your_post_name ="<?= lang('Please_enter_your_post_name');?>";
</script>