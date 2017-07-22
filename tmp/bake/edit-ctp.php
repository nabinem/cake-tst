<?php
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });

if (isset($modelObject) && $modelObject->behaviors()->has('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}
?>
<!-- page content -->
<div class="right_col index_page" role="main">
  <div class="">
      <div class="page-title">
      <div class="title_left">
        <h3><CakePHPBakeOpenTagphp echo !$<?= $singularVar ?>->isNew() ? __('Edit <?= $singularHumanName ?>') : __('Add <?= $singularHumanName ?>'); CakePHPBakeCloseTag></h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <CakePHPBakeOpenTag= $this->Flash->render() CakePHPBakeCloseTag>
    <CakePHPBakeOpenTag= $this->Flash->render('auth') CakePHPBakeCloseTag>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
                    <div class="x_content">
                          <div class="btn-group">
                              <a class="btn btn-primary" href="<CakePHPBakeOpenTagphp echo $this->Url->build(['action' => 'index']); CakePHPBakeCloseTag>">
                                <i class="fa fa fa-reply"></i> <?= $pluralHumanName ?> Lists</a>
                          </div>
                        <CakePHPBakeOpenTagphp if (!$<?= $singularVar ?>->isNew() && $this->AuthUser->isAdmin()): CakePHPBakeCloseTag>
                            <div class="btn-group"> 
                                <CakePHPBakeOpenTag= $this->Form->postLink('<i class="fa fa-trash-o"></i> '. __('Delete'), ['action' => 'delete', $<?= $singularVar ?>->id],
                                  ['confirm' => __('Are you sure you want to delete # {0}?', $<?= $singularVar ?>->id),
                                  'class' => 'btn btn-danger', 'escape' => false]) CakePHPBakeCloseTag>
                              </div>
                        <CakePHPBakeOpenTagphp endif; CakePHPBakeCloseTag>
                        <CakePHPBakeOpenTagphp if (!$<?= $singularVar ?>->isNew()): CakePHPBakeCloseTag>
                            <div class="btn-group">
                              <a class="btn btn-info" href="<CakePHPBakeOpenTagphp echo $this->Url->build(['action' => 'view', $<?= $singularVar ?>->id]); CakePHPBakeCloseTag>">
                                <i class="fa fa-eye"></i> View</a>
                            </div>
                        <CakePHPBakeOpenTagphp endif; CakePHPBakeCloseTag>
                      </div>
                      <div class="x_content">
                      <CakePHPBakeOpenTagphp
                      echo $this->Form->create($<?= $singularVar ?>, ['class' => 'form-horizontal form-label-left', 
                          'templates' => ['inputContainer' => '{{content}}'], 
                          'id' => $<?= $singularVar ?>->isNew() ? 'add-<?= $singularVar ?>-form' : 'edit-<?= $singularVar ?>-form']) CakePHPBakeCloseTag>
                        <?php
                            foreach ($fields as $field) {
                                if (in_array($field, $primaryKey)) {
                                    continue;
                                }
                        ?>
                            <?php if (isset($keyFields[$field])) { ?>
                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-12 col-xs-12"><?= Inflector::humanize($field) ?></label>
                                <div class="col-md-10 col-sm-12  col-xs-12">
                            <?php  $fieldData = $schema->column($field);
                                if (!empty($fieldData['null'])) { ?>
                                <CakePHPBakeOpenTagphp echo $this->Form->input('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>, 'empty' => true, 'div' => false, 'label' => false, 'class' => 'form-control']); CakePHPBakeCloseTag>
                            <?php } else { ?>
                            <CakePHPBakeOpenTagphp echo $this->Form->input('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>, 'div' => false, 'label' => false, 'class' => 'form-control']); CakePHPBakeCloseTag>
                            <?php } ?>
                                </div>
                            </div>
                        <?php continue; 
                        }
                        if (!in_array($field, ['created', 'modified', 'updated'])) { ?>
                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-12 col-xs-12"><?= Inflector::humanize($field) ?></label>
                                <div class="col-md-10 col-sm-12  col-xs-12">
                            <?php $fieldData = $schema->column($field);
                                if (in_array($fieldData['type'], ['date', 'datetime', 'time']) && (!empty($fieldData['null']))) {
                                 ?>
                                <CakePHPBakeOpenTagphp echo $this->Form->input('<?= $field ?>', ['empty' => true,  'div' => false, 'label' => false, 'class' => 'form-control']); CakePHPBakeCloseTag>
                            <?php } else { ?>
                                <CakePHPBakeOpenTagphp echo $this->Form->input('<?= $field ?>', [ 'div' => false, 'label' => false, 'class' => 'form-control']); CakePHPBakeCloseTag>
                            <?php } ?>
                                </div>
                            </div> 
                    <?php  } 
                    } 
                if (!empty($associations['BelongsToMany'])) {
                    foreach ($associations['BelongsToMany'] as $assocName => $assocData) { ?>
                        <div class="item form-group">
                            <label class="control-label col-md-2 col-sm-12 col-xs-12"><?= Inflector::humanize($assocData['property']) ?></label>
                            <div class="col-md-10 col-sm-12  col-xs-12">
                            <CakePHPBakeOpenTagphp echo $this->Form->input('<?= $assocData['property'] ?>._ids', ['options' => $<?= $assocData['variable'] ?>]); CakePHPBakeCloseTag>
                            </div>
                        </div>
                    <?php }
                    } ?>
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-md-offset-2">
          <button id="send" type="submit" class="btn btn-success" data-loading-text="Saving..">Save</button>
          <a href="<CakePHPBakeOpenTagphp echo $this->Url->build(['action' => 'index']); CakePHPBakeCloseTag>" class="btn btn-primary">
              Cancel</a>

      </div>
    </div>
    <CakePHPBakeOpenTag= $this->Form->end() CakePHPBakeCloseTag>
        </div>
    </div>
          
              </div>
            </div>
          </div>
        </div>