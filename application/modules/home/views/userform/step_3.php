 <div class="container">
    <div class="row no-gutter">
      <div class="col-md-12">
        <div class="login py-5">
            <div class="row">
              <div class="col-md-8 offset-col-2 mx-auto d-block login-page">
                <div class="login-page">
                    <h4 class="title"><?= lang('User_Form'); ?> (Step-3)</h4>
                    <p class="sub_title text-center"><!-- Already have an account? --> 
                    	<a class="color-litegreen" href="javascript:void(0);" type="button"  data-toggle="modal" data-target=".bd-example-modal-lg">फॉर्म को भरने हेतु निर्देश</a></p>
                </div>
                
                <form id="user-add-form1" method="post" class="login-form-t" novalidate="novalidate"  novalidate="novalidate" autocomplete="off">
                  <div class="row">
                      <div class="col-md-12">
                          <header>
                          <b><?= lang('other_Information'); ?></b>
                          <input type="hidden" name="id" value="0">

                          </header>
                          <hr>
                      </div>
                    
                      <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="email"><?= lang('email'); ?></label>
                            <input type="email" id="email" class="form-control" placeholder="<?= lang('email'); ?>"  name="email" >
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
                          
                           <input type="text" name="education" class="form-control" id="education" placeholder="<?= lang('Education'); ?>">
                          </div>
                      </div>

                  </div>


                 
                  <hr>
                
                  <button class="btn btn-outline  btn-block tl-btn-round-2 text-uppercase font-weight-bold mb-2" type="submit"> <?= lang('Submit'); ?></button>

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
