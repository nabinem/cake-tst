<!-- page content -->
<div class="right_col index_page" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Set Appointment</h3>
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
                    </div>
                    <div class="x_content">
                        <?php
                        echo $this->Form->create($appointment, ['class' => 'form-horizontal form-label-left',
                            'templates' => ['inputContainer' => '{{content}}'], 'id' => 'add-appointment-form'])
                        ?>
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
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Choose Doctor</label>
                            <div class="col-md-4 col-sm-4  col-xs-12">
                                <?php echo $this->Form->input('doctor_id', [ 'div' => false, 'label' => false, 'class' => 'form-control', 'options' => $doctors]); ?>
                            </div>
                        </div>
                        <?php if ($this->AuthUser->hasRole(ROLE_ADMIN)): ?>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Choose Patient</label>
                            <div class="col-md-4 col-sm-4  col-xs-12">
                                <?php echo $this->Form->input('patient_id', [ 'div' => false, 'label' => false, 'class' => 'form-control', 'options' => $patients]); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button id="send" type="submit" class="btn btn-success" data-loading-text="Saving..">Set</button>
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