<?php
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    });

if (isset($modelObject) && $modelObject->behaviors()->has('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}

if (!empty($indexColumns)) {
    $fields = $fields->take($indexColumns);
}

?>
<!-- page content -->
<div class="right_col index_page" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><CakePHPBakeOpenTag= __('<?= $pluralHumanName ?>') CakePHPBakeCloseTag> List<small> (list of all <CakePHPBakeOpenTag= __('<?= $pluralHumanName ?>') CakePHPBakeCloseTag>) </small></h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <CakePHPBakeOpenTag= $this->Flash->render() CakePHPBakeCloseTag>
    <CakePHPBakeOpenTag= $this->Flash->render('auth') CakePHPBakeCloseTag>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
                <div class="btn-group"> 
                    <CakePHPBakeOpenTag= $this->Html->link('<i class="fa fa-plus"></i> '.__('Add New'), ['action' => 'add'],[ 'escape' => false, 'class' => 'btn btn-primary btn-sm']); CakePHPBakeCloseTag>
                </div>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered sticky_thead">
                <thead>
                    <tr>
                    <?php foreach ($fields as $field): ?>
                        <th><CakePHPBakeOpenTag= $this->Paginator->sort('<?= $field ?>') CakePHPBakeCloseTag></th>
                    <?php endforeach; ?>
                    <th width="15%" class="actions">Actions</th>
                  </tr>
                </thead>
                 <tbody>
            <CakePHPBakeOpenTagphp foreach ($<?= $pluralVar ?> as $<?= $singularVar ?>): CakePHPBakeCloseTag>
            <tr>
<?php        foreach ($fields as $field) {
            $isKey = false;
            if (!empty($associations['BelongsTo'])) {
                foreach ($associations['BelongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                        $isKey = true;
?>
                <td><CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag></td>
<?php
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
?>
                <td><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
<?php
                } else {
?>
                <td><CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
<?php
                }
            }
        }

        $pk = '$' . $singularVar . '->' . $primaryKey[0];
?>
                <td class="actions">
                    <CakePHPBakeOpenTag= $this->Html->link('<i class="fa fa-eye"></i> '.__('View'), ['action' => 'view', <?= $pk ?>],[ 'escape' => false, 'class' => 'btn btn-dark btn-xs']); CakePHPBakeCloseTag>
                    <CakePHPBakeOpenTag= $this->Html->link('<i class="fa fa-pencil"></i> '.__('Edit'), ['action' => 'edit', <?= $pk ?>],[ 'escape' => false, 'class' => 'btn btn-dark btn-xs']); CakePHPBakeCloseTag>
                    <CakePHPBakeOpenTag= $this->Form->postLink('<i class="fa fa-trash-o"></i> '. __('Delete'), ['action' => 'delete', <?= $pk ?>],
                        ['confirm' => __('Are you sure you want to delete # {0}?', <?= $pk ?>),
                        'class' => 'btn btn-danger btn-xs', 'escape' => false]) CakePHPBakeCloseTag>
                </td>
            </tr>
            <CakePHPBakeOpenTagphp endforeach; CakePHPBakeCloseTag>
        </tbody>
    </table>
        </div>
        </div>
      </div>
    </div>
  </div>
  <CakePHPBakeOpenTagphp echo $this->element('pagination'); CakePHPBakeCloseTag>
</div>
</div>
<!-- /page content -->
<CakePHPBakeOpenTagphp echo $this->Html->script(['jquery.floatThead.min'], ['block' => 'pluginJs']); CakePHPBakeCloseTag>