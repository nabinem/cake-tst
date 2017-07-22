<!-- page content -->
<div class="right_col index_page" role="main">
  <div class="">
      <div class="page-title">
      <div class="title_left">
        <h3>Postpone Appointment</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
                    <div class="x_content">
                          <div class="btn-group">
                              <a class="btn btn-primary" href="<?php echo $this->Url->build(['action' => 'index']); ?>">
                                <i class="fa fa fa-reply"></i> Appointments Lists</a>
                          </div>
                        <?php if ($this->AuthUser->hasAccess(['controller' => 'Appointments', 'action' => 'delete'])): ?>
                            <div class="btn-group"> 
                                <?= $this->Form->postLink('<i class="fa fa-trash-o"></i> '. __('Delete'), ['action' => 'delete', $appointment->id],
                                  ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->id),
                                  'class' => 'btn btn-danger', 'escape' => false]) ?>
                              </div>
                        <?php endif; ?>
                      </div>
                      <div class="x_content">
                      <?php
                      echo $this->Form->create($appointment, ['class' => 'form-horizontal form-label-left', 
                          'templates' => ['inputContainer' => '{{content}}'], 
                          'id' => 'edit-appointment-form']) ?>
                          <div class="item form-group" style="margin-top: 8px;">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Appointment Date/Time</label>
                            <div class="col-md-3 col-sm-3 col-xs-12 input-group date" id='appointment_time_cont' style="padding-left: 10px;">
                                <?php echo $this->Form->input('appt_date', ['id' => 'requested_appointment_time', 'div' => false, 'label' => false,
                                    'class' => 'form-control col-md-7 col-xs-12', 'type' => 'text', 'required' => true]);
                                ?>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                   <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-md-offset-2">
          <button id="send" type="submit" class="btn btn-success" data-loading-text="Saving..">Postpone</button>
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
<?php  $this->start('pluginJs'); ?>
    <?php echo $this->Html->script(['../vendors/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min']); ?>
<?php $this->end(); ?>
<?php $this->start('scriptBottom'); ?>
<script type="text/javascript">
    $(document).ready(function() {
      $('#appointment_time_cont').datetimepicker({useCurrent: false});
    });
</script>
<?php $this->end(); ?>