<!-- page content -->
        <div class="right_col index_page" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <?= $this->Flash->render() ?>
            <?= $this->Flash->render('auth') ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo!$user->isNew() ? __('Edit User') : __('Add User'); ?> 
                        <?php if(!$user->isNew()): ?>
                            <small><?php echo h($user->name); ?></small>
                        <?php endif; ?>
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <?php 
                       $formId = !$user->isNew() ? 'user-edit-form' : 'user-add-form';
                      echo $this->Form->create($user, ['class' => 'form-horizontal form-label-left', 
                          'templates' => ['inputContainer' => '{{content}}'], 'id' => $formId]) ?>
                      <div class="item form-group" id="role_cont">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Role <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('role_id', [
                                'div' => false, 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 
                                'empty' => __('Select any'), 'required' => true, 'id' => 'role_select',
                                'options' => $roles]); ?>
                        </div>
                      </div>
                      <div id="name_cont">
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('firstname', [
                                'div' => false, 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'required' => false]); ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('lastname', [
                                'div' => false, 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'required' => false]); ?>
                        </div>
                      </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">User Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('username', [
                                'div' => false, 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'required' => true]); ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('email', [
                                'div' => false, 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'required' => true]); ?>
                        </div>
                      </div>
                      <?php if (!$user->isNew()): ?>
                            <div class="col-md-offset-3">
                                <p class="text-success"><i class="fa fa-info-circle"></i>
                                    <?php echo __('Leave password blank, if you donot want to change.'); ?></p>
                            </div> 
                        <?php endif; ?>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('password', ['div' => false, 'id' => 'password',
                                'label' => false, 'class' => 'form-control  col-md-7 col-xs-12','autocomplete'=> 'off', 
                                'value' => '', 'required' => false]); ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('confirm_password', ['div' => false, 'label' => false, 
                                'class' => 'form-control col-md-7 col-xs-12', 'type' => 'password', 'value' => '']); ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Active <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('active', [
                                'div' => false, 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 
                                'required' => true, 'options' => [0 => 'No', 1 => 'Yes'], 'default' => 1]); ?>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                            <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="btn btn-primary">
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
        <?php $this->start('scriptBottom'); ?>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                //Validate the sign up form
                $('#user-add-form, user-edit-form').validate({
                    rules: {
                        "firstname": {
                            required: true
                        },
                        "lastname": {
                             required: true
                        }
                    }
                });
            });
        </script>
<?php $this->end(); ?>