<div class="form login_form">
  <section class="login_content">
    <?= $this->Form->create(null, ['id' => 'login_account_form']) ?>
      <h1><?php echo __('Log In'); ?></h1>
       <?php echo $this->Flash->render(); ?>
      <div class="hide">
          <?= $this->Flash->render('auth') ?>
      </div>
      <div class="form-group has-feedback">
        <?= $this->Form->text('username',['autocomplete'=>'off','placeholder'=>__('Username'),
          'class'=>'form-control has-feedback-left', 'required' => true]) ?>
          <span class="fa  fa-user form-control-feedback left" aria-hidden="true"></span>
      </div>
      <div class="form-group has-feedback">
        <?= $this->Form->password('password',['autocomplete'=>'off','placeholder'=>__('Password'),
          'class'=>'form-control has-feedback-left', 'required' => true]) ?>
          <span class="fa fa fa-lock form-control-feedback left" aria-hidden="true"></span>
      </div>
      <div class="pull-right">
          <button class="btn btn-default submit" type='submit'><?php echo __('Log in'); ?></button>
      </div>

      <div class="clearfix"></div>

      <div class="separator">
        <p class="change_link pull-left">
          <a class="" href="<?php echo $this->Url->build(['action' => 'forgotPassword']); ?>">Forgot your password?</a>
        </p>
        <p class="change_link pull-right">
          <a href="<?php echo $this->Url->build(['action' => 'register']); ?>" class="to_register"> Sign Up As Patient </a>
        </p>

        <div class="clearfix"></div>
        <br />
        <?php echo $this->element('copyright_text'); ?>
        
      </div>
    <?php echo $this->Form->end(); ?>
  </section>
</div>