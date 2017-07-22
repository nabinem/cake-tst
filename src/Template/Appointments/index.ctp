<!-- page content -->
<div class="right_col index_page" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><?= __('Appointments') ?><small> (list of all <?= __('Appointments') ?>) </small></h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
                <?php if ($this->AuthUser->hasAccess(['controller' => 'Appointments', 'action' => 'add'])): ?>
                <div class="btn-group"> 
                    <?= $this->Html->link('<i class="fa fa-plus"></i> '.__('Set New Appointment'), ['action' => 'add'],[ 'escape' => false, 'class' => 'btn btn-primary btn-sm']); ?>
                </div>
                <?php endif; ?>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered sticky_thead">
                <thead>
                    <tr>
                                            <th><?= $this->Paginator->sort('id') ?></th>
                                            <th><?= $this->Paginator->sort('appt_date') ?></th>
                                            <th><?= $this->Paginator->sort('patient_id', 'Patient') ?></th>
                                            <th><?= $this->Paginator->sort('doctor_id') ?></th>
                                            <th><?= $this->Paginator->sort('is_confirmed', 'Confirmed?') ?></th>
                                            <th width="15%" class="actions">Actions</th>
                  </tr>
                </thead>
                 <tbody>
            <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?= $this->Number->format($appointment->id) ?></td>
                <td><?= h($appointment->appt_date) ?></td>
                <td><?= $appointment->has('doctor') ? $appointment->patient->full_name : ''?></td>
                <td><?= $appointment->has('patient') ? $appointment->doctor->full_name : ''?></td>
                <td align="center">
                    <?php if ($appointment->is_confirmed): ?>
                        <?php if ($this->AuthUser->hasAccess(['controller' => 'Appointments', 'action' => 'toggleConfirmed'])): ?>
                            <a href="<?php echo $this->Url->build(['action' => 'toggleConfirmed', $appointment->id, 0]); ?>" data-toggle="tooltip" title="Click to confirm Appointment">
                                <i class="fa fa-check text-success"></i>
                            </a>
                        <?php else: ?>
                            <i class="fa fa-check text-success"></i>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if ($this->AuthUser->hasAccess(['controller' => 'Appointments', 'action' => 'toggleConfirmed'])): ?>
                            <a href="<?php echo $this->Url->build(['action' => 'toggleConfirmed', $appointment->id, 1]); ?>" data-toggle="tooltip" title=" Click to unconfirm Appointment">
                                <i class="fa fa-times text-danger"></i>
                            </a>
                        <?php else: ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                <td class="actions" style="white-space: nowrap;">
                    <?= $this->Html->link('<i class="fa fa-pencil"></i> '.__('Postpone/Edit'), ['action' => 'edit', $appointment->id],[ 'escape' => false, 'class' => 'btn btn-dark btn-xs']); ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o"></i> '. __('Delete'), ['action' => 'delete', $appointment->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->id),
                        'class' => 'btn btn-danger btn-xs', 'escape' => false]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo $this->element('pagination'); ?>
</div>
</div>