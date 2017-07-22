<?php use Cake\Core\Configure; ?>
<!-- page content -->
        <div class="right_col index_page" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users List<small> (list of all users) </small></h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <?= $this->Flash->render() ?>
            <?= $this->Flash->render('auth') ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Users</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered sticky_thead">
                      <thead>
                        <tr>
                          <th><?php echo $this->Paginator->sort('firstname', 'First Name'); ?></th>
                          <th><?php echo $this->Paginator->sort('lastname', 'Last Name'); ?></th>
                          <th><?php echo $this->Paginator->sort('username'); ?></th>
                          <th><?php echo $this->Paginator->sort('email'); ?></th>
                          <th><?php echo $this->Paginator->sort('role_id', 'Role'); ?></th>
                          <th><?php echo $this->Paginator->sort('active'); ?></th>
                          <th><?php echo $this->Paginator->sort('created'); ?></th>
                          <th width="15%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= h($user->firstname) ?></td>
                                    <td><?= h($user->lastname) ?></td>
                                    <td><?= h($user->username) ?></td>
                                    <td><?= h($user->email) ?></td>
                                    <td><?php echo array_search($user->role_id, Configure::read('Roles')); ?>
                                    <td align="center">
                                        <?php if ($user->active): ?>
                                            <a href="<?php echo $this->Url->build(['action' => 'toggleStatus', $user->id, 'inactive']); ?>" data-toggle="tooltip" title="Click to deactivate User Account">
                                                <i class="fa fa-check text-success"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo $this->Url->build(['action' => 'toggleStatus', $user->id, 'active']); ?>" data-toggle="tooltip" title=" Click to activate User Account">
                                                <i class="fa fa-times text-danger"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= h($user->created) ?></td>
                                    <td class="actions">
                                        <?php 
                                            echo $this->Html->link('<i class="fa fa-pencil"></i> '.__('Edit'), ['action' => 'edit', $user->id],[ 'escape' => false, 'class' => 'btn btn-dark btn-xs']);
                                        ?>
                                        <?= $this->Form->postLink('<i class="fa fa-trash-o"></i> '. __('Delete'), ['action' => 'delete', $user->id],
                                                ['confirm' => __('Are you sure you want to delete user  {0}?', $user->firstname),
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