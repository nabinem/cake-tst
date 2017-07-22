<!-- page content -->
        <div class="right_col index_page" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Change Password</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <?= $this->Flash->render() ?>
            <?= $this->Flash->render('auth') ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                      <?php 
                      echo $this->Form->create($user, ['class' => 'form-horizontal form-label-left', 'autocomplete' => 'off', 
                          'templates' => ['inputContainer' => '{{content}}'], 'id' => 'change_pass_form']) ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Current Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('current_password', ['autocomplete' => 'off', 'default' => '', 'value' => '', 'type' => 'password',
                                'div' => false, 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'required' => true]); ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">New Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('password', ['autocomplete' => 'off', 'value' => '', 'type' => 'password',
                                'div' => false, 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'required' => true]); ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Repeat New Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('confirm_password', ['autocomplete' => 'off', 'value' => '', 'type' => 'password',
                                'div' => false, 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'required' => true]); ?>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button id="send" type="submit" class="btn btn-success">Change Password</button>
                            <a href="<?php echo $this->request->webroot; ?>" class="btn btn-primary">
                                Cancel</a>
                          
                        </div>
                      </div>
                    <?= $this->Form->end() ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->