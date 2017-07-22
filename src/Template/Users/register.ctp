<?php use Cake\Core\Configure; ?>  
<div id="register" class="form registration_form">
          <section class="login_content">
            <?= $this->Form->create($user, ['id' => 'patient-signup-form', 'class' => 'form-horizontal form-label-left input_mask',
                'templates' => ['inputContainer' => '{{content}}']]) ?>
              <h1>Create Account</h1>
              <?php echo $this->Flash->render(); ?>
              <?= $this->Flash->render('auth') ?>
              <div class="separator"></div>
              <div class="row">
                    <div class="col-md-6 form-group">
                        <?php echo $this->Form->input('firstname', ['placeholder' => 'First Name*',
                                'div' => false, 'label' => false, 'class' => 'form-control has-feedback-left', 'required' => true]); ?>
                        <span class="fa  fa-font form-control-feedback left firstname" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 form-group">
                        <?php echo $this->Form->input('lastname', ['placeholder' => 'Last Name*',
                                'div' => false, 'label' => false, 'class' => 'form-control has-feedback-right', 'required' => true]); ?>
                        <span class="fa  fa-font form-control-feedback right" aria-hidden="true"></span>
                    </div>
              </div>
              <div class="form-group has-feedback">
                  <?php echo $this->Form->input('email', ['div' => false, 'label' => false, 'placeholder' => 'Email*',
                      'class' => 'form-control has-feedback-left', 'required' => true]); ?>
                  <span class="fa  fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="form-group has-feedback">
                  <?php echo $this->Form->input('username', ['div' => false, 'label' => false, 'placeholder' => 'Username*',
                      'class' => 'form-control has-feedback-left', 'required' => true]); ?>
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="form-group has-feedback">
                  <?php echo $this->Form->input('password', ['div' => false, 'label' => false, 'placeholder' => 'Password*',
                      'class' => 'form-control has-feedback-left', 'required' => true, 'type' => 'password']); ?>
                  <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="form-group has-feedback">
                  <?php echo $this->Form->input('confirm_password', ['div' => false, 'label' => false, 'placeholder' => 'Repeat Password*',
                      'class' => 'form-control has-feedback-left', 'required' => true, 'type' => 'password']); ?>
                  <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="checkbox" style="margin-bottom: 10px;padding-top: 0;text-align: left;">
                  <label style="padding-left: 0;">
                      <?php echo $this->Form->input('agree_terms', ['div' => false, 'label' => false, 'required' => true,
                      'class' => 'uniform_input', 'required' => true, 'type' => 'checkbox', 'hiddenField' => false]); ?>
                      I agree to the Terms of Service & Privacy Policy
                  </label>
              </div>
              <div class="clearfix"></div>
              <div class="pull-right">
                  <button type="submit" class="btn btn-default submit"><?php echo __('Sign Up'); ?></button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link pull-right">Already a member ?
                  <a href="<?php echo $this->Url->build(['action' => 'login']); ?>" class="to_register"> Log in </a>
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
            $(".select2_single").select2({
                placeholder: "Select a Country",
                allowClear: true
            });
            //Validate the sign up form
            $('#patient-signup-form').validate({
                ignore: [],
                rules: {
                    "first_name": {required: true},
                    "last_name": {required: true},
                    "user_profile[zip]": {required: true},
                    "confirm_password": {equalTo: "#password"},
                     agree_terms: {required: true},
                     username: {required: true, nowhitespace: true}
                },
                 errorPlacement: function (error, element) {
                    if ($.inArray($(element).attr('name'), ["user_profile[country]"]) > -1) {
                        $(element).closest('.form-group').append(error);
                    } else if (element.attr("name") == "agree_terms") { // insert checkbox errors after the container                  
                        $(element).closest('.checkbox').append(error);
                    } else {
                        error.insertAfter(element);
                    }
                },
                messages: {
                    agree_terms: 'You must agree to the Terms of Service & Privacy Policy'
                }
            });
            $('#country_drp').change(function(){
                $(this).valid();
            });
            
        });
    </script>
<?php $this->end(); ?>
<?php $this->start('css'); ?>
    <style type="text/css">
      #patient-signup-form .form-group{margin-bottom: 5px;}
      .has-error help-block{text-align: left;}
    </style>
<?php $this->end(); ?>