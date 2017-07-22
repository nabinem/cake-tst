<div class="form login_form">
  <section class="login_content">
    <?= $this->Form->create(null, ['id' => 'reset_pass_form']) ?>
      <h1><?php echo __('Reset Password'); ?></h1>
       <?php echo $this->Flash->render(); ?>
      <div class="hide">
          <?= $this->Flash->render('auth') ?>
      </div>
      <div class="form-group has-feedback">
            <?php echo $this->Form->input('password', ['div' => false, 'label' => false, 'placeholder' => 'New Password*',
                'class' => 'form-control has-feedback-left', 'required' => true, 'type' => 'password',
                'value' => '']); ?>
            <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
        </div>
        <div class="form-group has-feedback">
            <?php echo $this->Form->input('confirm_password', ['div' => false, 'label' => false, 'placeholder' => 'Repeat Password*',
                'class' => 'form-control has-feedback-left', 'required' => true, 'type' => 'password', 'value' => '']); ?>
            <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
        </div>
      <div class="pull-right">
          <button class="btn btn-default submit" id="submit_butto" data-loading-text="Please wait.." type='submit'><?php echo __('Reset'); ?></button>
      </div>
      <div class="clearfix"></div>
      <div class="separator">
        <p class="change_link pull-right">
          <a href="<?php echo $this->Url->build(['action' => 'login']); ?>" class="to_register"> Back to Login</a>
        </p>

        <div class="clearfix"></div>
        <br />
        <?php echo $this->element('copyright_text'); ?>
        
      </div>
    <?php echo $this->Form->end(); ?>
  </section>
</div>
<?php $this->start('scriptBottom'); ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
             //Validate the sign up form
            $('#reset_pass_form').validate({
                rules: {
                    password: {required: true},
                    "confirm_password": {equalTo: "#password"}
                }
            });
        });
    </script>
<?php $this->end(); ?>