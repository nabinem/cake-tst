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
                <div class="btn-group"> 
                    <?= $this->Html->link('<i class="fa fa-plus"></i> '.__('Add New'), ['action' => 'add'],[ 'escape' => false, 'class' => 'btn btn-primary btn-sm']); ?>
                </div>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered sticky_thead">
                <thead>
                    <tr>
                                            <th><?= $this->Paginator->sort('id') ?></th>
                                            <th><?= $this->Paginator->sort('appt_date') ?></th>
                                            <th><?= $this->Paginator->sort('user_id', 'Patient') ?></th>
                                            <th><?= $this->Paginator->sort('doctor_id') ?></th>
                                            <th><?= $this->Paginator->sort('is_confirmed', 'Confirmed?') ?></th>
                                            <th><?= $this->Paginator->sort('created') ?></th>
                                            <th><?= $this->Paginator->sort('modified') ?></th>
                                        <th width="15%" class="actions">Actions</th>
                  </tr>
                </thead>
                 <tbody>
            <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?= $this->Number->format($appointment->id) ?></td>
                <td><?= h($appointment->appt_date) ?></td>
                <td><?= $appointment->has('user') ? $this->Html->link($appointment->user->id, ['controller' => 'Users', 'action' => 'view', $appointment->user->id]) : '' ?></td>
                <td><?= $this->Number->format($appointment->doctor_id) ?></td>
                <td><?= h($appointment->is_confirmed) ?></td>
                <td><?= $this->Number->format($appointment->created_by) ?></td>
                <td><?= h($appointment->created) ?></td>
                <td><?= h($appointment->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-eye"></i> '.__('View'), ['action' => 'view', $appointment->id],[ 'escape' => false, 'class' => 'btn btn-dark btn-xs']); ?>
                    <?= $this->Html->link('<i class="fa fa-pencil"></i> '.__('Edit'), ['action' => 'edit', $appointment->id],[ 'escape' => false, 'class' => 'btn btn-dark btn-xs']); ?>
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