<div class="form login_form">
  <section class="login_content">
    <?= $this->Form->create(null, ['id' => 'forgot_account_form']) ?>
      <h1><?php echo __('Forgot Password'); ?></h1>
       <?php echo $this->Flash->render(); ?>
      <div class="hide">
          <?= $this->Flash->render('auth') ?>
      </div>
      <p class="change_link text-left">
        Please enter your Username to reset your password  
      </p>
      <div class="form-group has-feedback">
        <?= $this->Form->text('username',['autocomplete'=>'off','placeholder'=>__('Username'),
          'class'=>'form-control has-feedback-left', 'required' => true]) ?>
          <span class="fa  fa-user form-control-feedback left" aria-hidden="true"></span>
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
            $('#forgot_account_form').submit(function(){
                $(this).find('#submit_butto').button('loading');
            });
            
        });
    </script>
<?php $this->end(); ?>