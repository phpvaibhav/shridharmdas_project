 <div class="container">
    <div class="row no-gutter">
      <!-- lang -->
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
      <div class="col-md-6 text-right">
         <div class="row">
            
              <div class="col-md-9 col-lg-10 lang-panding">
                <div class="radio d-inline mr-4">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="hindi"<?= ($this->session->userdata('site_lang')=='hindi') ?"checked='checked'":""; ?> data-url="<?php echo base_url().'home/switchLang/hindi/'.encoding(current_url()); ?>" onclick="checkLang(this);">
                  <label for="inlineRadio1">Hindi</label>
                </div>
                <div class="radio d-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="english" <?= ($this->session->userdata('site_lang')=='english') ?"checked='checked'":""; ?>  data-url="<?php echo base_url().'home/switchLang/english/'.encoding(current_url()); ?>" onclick="checkLang(this);">
                  <label for="inlineRadio2">English</label>
                </div>
              </div>
            </div>

          <!--   <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="hindi"<?= ($this->session->userdata('site_lang')=='hindi') ?"checked='checked'":""; ?> data-url="<?php echo base_url().'home/switchLang/hindi/'.encoding(current_url()); ?>" onclick="checkLang(this);" >
            <label class="form-check-label" for="inlineRadio1">Hindi</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="english" <?= ($this->session->userdata('site_lang')=='english') ?"checked='checked'":""; ?>  data-url="<?php echo base_url().'home/switchLang/english/'.encoding(current_url()); ?>" onclick="checkLang(this);">
            <label class="form-check-label" for="inlineRadio2">English</label>
            </div> -->
      </div>
      <!-- lang -->
      <div class="col-md-12">
        <div class="login py-5">
            <div class="row">
              <div class="col-md-8 offset-col-2 mx-auto d-block login-page">
                <div class="login-page">
                    <h4 class="title"><?= lang('User_Form'); ?> (Step-3)</h4>
                    <p class="sub_title text-center"><!-- Already have an account? --> 
                    	<a class="color-litegreen" href="javascript:void(0);" type="button"  data-toggle="modal" data-target=".bd-example-modal-lg">फॉर्म को भरने हेतु निर्देश</a></p>
                </div>
                
                <form id="user-add-step-3" method="post" class="login-form-t" novalidate="novalidate" action="userStep3"  novalidate="novalidate" autocomplete="off">
                  <div class="row">
                      <div class="col-md-12">
                          <header>
                          <b><?= lang('other_Information'); ?></b>
                         <input type="hidden" name="userId" value="<?= $userId; ?>">

                          </header>
                          <hr>
                      </div>
                    
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="email"><?= lang('email'); ?></label>
                            <input type="email" id="email" class="form-control" placeholder="<?= lang('email'); ?>"  name="email" maxlength="30" size="30">
                          </div>
                      </div>


                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="bloodGroup"><?= lang('blood_group'); ?></label>
                          
                            <select name="bloodGroup" class="form-control" id="bloodGroup">
                            <option value="" selected="" disabled=""><?= lang('blood_group'); ?></option>
                            <option value="A+">A+</option>
                            <option value="O+">O+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="A-">A-</option>
                            <option value="O-">O-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                          
                            </select>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="education"><?= lang('Education'); ?></label>
                          
                          
                            <select id="education" name="education" class="form-control">
                              <option value="" selected="selected"><?= lang('Education'); ?></option>
                              <option value="Upto Higher secondary">Upto Higher secondary</option>
                              <option value="Graduate">Graduate</option>
                              <option value="Post Graduate">Post Graduate</option>
                              <option value="Phd">Phd</option>
                              <option value="Other">Other</option>

                            </select>
                          </div>
                      </div>

                  </div>


                 
                  <hr>
                
                  <button class="btn btn-outline  btn-block tl-btn-round-2 text-uppercase font-weight-bold mb-2" id="submit" type="submit"> <?= lang('Submit'); ?></button>

                  <div class="text-center">
                    <a class="small" href="<?= base_url();  ?>">Go To Home</a>
                  </div>

                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
