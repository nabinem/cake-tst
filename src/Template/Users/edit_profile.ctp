<?php use Cake\Core\Configure; ?>  
<!-- page content -->
        <div class="right_col index_page" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Profile</h3>
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
                      echo $this->Form->create($user, ['class' => 'form-horizontal form-label-left', 
                          'templates' => ['inputContainer' => '{{content}}'], 'id' => 'profile-edit-form']) ?>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('firstname', [
                                'div' => false, 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'required' => true]); ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('lastname', [
                                'div' => false, 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'required' => true]); ?>
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
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
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
        <?php $this->start('pluginCss'); ?>
            <?php echo $this->Html->css(['../vendors/select2/dist/css/select2.min']); ?>
        <?php $this->end(); ?>
        <?php $this->start('pluginJs'); ?>
            <?php echo $this->Html->script([
                '../vendors/select2/dist/js/select2.min'
            ]); ?>
        <?php $this->end(); ?>
        <?php $this->start('scriptBottom'); ?>
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    $(".select2_single").select2({
                        placeholder: "Select a Country",
                        allowClear: true
                    });
                });
            </script>
        <?php $this->end(); ?>