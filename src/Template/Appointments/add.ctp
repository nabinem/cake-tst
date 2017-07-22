<!-- page content -->
<div class="right_col index_page" role="main">
  <div class="">
      <div class="page-title">
      <div class="title_left">
        <h3><?php echo !$appointment->isNew() ? __('Edit Appointment') : __('Add Appointment'); ?></h3>
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
                        <?php if (!$appointment->isNew() && $this->AuthUser->hasRole(ROLE_ADMIN)): ?>
                            <div class="btn-group"> 
                                <?= $this->Form->postLink('<i class="fa fa-trash-o"></i> '. __('Delete'), ['action' => 'delete', $appointment->id],
                                  ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->id),
                                  'class' => 'btn btn-danger', 'escape' => false]) ?>
                              </div>
                        <?php endif; ?>
                        <?php if (!$appointment->isNew()): ?>
                            <div class="btn-group">
                              <a class="btn btn-info" href="<?php echo $this->Url->build(['action' => 'view', $appointment->id]); ?>">
                                <i class="fa fa-eye"></i> View</a>
                            </div>
                        <?php endif; ?>
                      </div>
                      <div class="x_content">
                      <?php
                      echo $this->Form->create($appointment, ['class' => 'form-horizontal form-label-left', 
                          'templates' => ['inputContainer' => '{{content}}'], 
                          'id' => $appointment->isNew() ? 'add-appointment-form' : 'edit-appointment-form']) ?>
                                                                                <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-12 col-xs-12">Appt Date</label>
                                <div class="col-md-10 col-sm-12  col-xs-12">
                                                            <?php echo $this->Form->input('appt_date', ['empty' => true,  'div' => false, 'label' => false, 'class' => 'form-control']); ?>
                                                            </div>
                            </div> 
                                                                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-12 col-xs-12">User Id</label>
                                <div class="col-md-10 col-sm-12  col-xs-12">
                                                        <?php echo $this->Form->input('user_id', ['options' => $users, 'div' => false, 'label' => false, 'class' => 'form-control']); ?>
                                                            </div>
                            </div>
                                                                                <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-12 col-xs-12">Doctor Id</label>
                                <div class="col-md-10 col-sm-12  col-xs-12">
                                                            <?php echo $this->Form->input('doctor_id', [ 'div' => false, 'label' => false, 'class' => 'form-control']); ?>
                                                            </div>
                            </div> 
                                                                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-12 col-xs-12">Is Confirmed</label>
                                <div class="col-md-10 col-sm-12  col-xs-12">
                                                            <?php echo $this->Form->input('is_confirmed', [ 'div' => false, 'label' => false, 'class' => 'form-control']); ?>
                                                            </div>
                            </div> 
                                                                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-12 col-xs-12">Created By</label>
                                <div class="col-md-10 col-sm-12  col-xs-12">
                                                            <?php echo $this->Form->input('created_by', [ 'div' => false, 'label' => false, 'class' => 'form-control']); ?>
                                                            </div>
                            </div> 
                                                                                <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-md-offset-2">
          <button id="send" type="submit" class="btn btn-success" data-loading-text="Saving..">Save</button>
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