<%
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
%>
<!-- page content -->
<div class="right_col index_page" role="main">
  <div class="">
      <div class="page-title">
      <div class="title_left">
        <h3><?php echo !$<%= $singularVar %>->isNew() ? __('Edit <%= $singularHumanName %>') : __('Add <%= $singularHumanName %>'); ?></h3>
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
                                <i class="fa fa fa-reply"></i> <%= $pluralHumanName %> Lists</a>
                          </div>
                        <?php if (!$<%= $singularVar %>->isNew() && $this->AuthUser->hasRole(ROLE_ADMIN)): ?>
                            <div class="btn-group"> 
                                <?= $this->Form->postLink('<i class="fa fa-trash-o"></i> '. __('Delete'), ['action' => 'delete', $<%= $singularVar %>->id],
                                  ['confirm' => __('Are you sure you want to delete # {0}?', $<%= $singularVar %>->id),
                                  'class' => 'btn btn-danger', 'escape' => false]) ?>
                              </div>
                        <?php endif; ?>
                        <?php if (!$<%= $singularVar %>->isNew()): ?>
                            <div class="btn-group">
                              <a class="btn btn-info" href="<?php echo $this->Url->build(['action' => 'view', $<%= $singularVar %>->id]); ?>">
                                <i class="fa fa-eye"></i> View</a>
                            </div>
                        <?php endif; ?>
                      </div>
                      <div class="x_content">
                      <?php
                      echo $this->Form->create($<%= $singularVar %>, ['class' => 'form-horizontal form-label-left', 
                          'templates' => ['inputContainer' => '{{content}}'], 
                          'id' => $<%= $singularVar %>->isNew() ? 'add-<%= $singularVar %>-form' : 'edit-<%= $singularVar %>-form']) ?>
                        <%
                            foreach ($fields as $field) {
                                if (in_array($field, $primaryKey)) {
                                    continue;
                                }
                        %>
                            <% if (isset($keyFields[$field])) { %>
                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-12 col-xs-12"><%= Inflector::humanize($field) %></label>
                                <div class="col-md-10 col-sm-12  col-xs-12">
                            <%  $fieldData = $schema->column($field);
                                if (!empty($fieldData['null'])) { %>
                                <?php echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true, 'div' => false, 'label' => false, 'class' => 'form-control']); ?>
                            <% } else { %>
                            <?php echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'div' => false, 'label' => false, 'class' => 'form-control']); ?>
                            <% } %>
                                </div>
                            </div>
                        <% continue; 
                        }
                        if (!in_array($field, ['created', 'modified', 'updated'])) { %>
                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-12 col-xs-12"><%= Inflector::humanize($field) %></label>
                                <div class="col-md-10 col-sm-12  col-xs-12">
                            <% $fieldData = $schema->column($field);
                                if (in_array($fieldData['type'], ['date', 'datetime', 'time']) && (!empty($fieldData['null']))) {
                                 %>
                                <?php echo $this->Form->input('<%= $field %>', ['empty' => true,  'div' => false, 'label' => false, 'class' => 'form-control']); ?>
                            <% } else { %>
                                <?php echo $this->Form->input('<%= $field %>', [ 'div' => false, 'label' => false, 'class' => 'form-control']); ?>
                            <% } %>
                                </div>
                            </div> 
                    <%  } 
                    } 
                if (!empty($associations['BelongsToMany'])) {
                    foreach ($associations['BelongsToMany'] as $assocName => $assocData) { %>
                        <div class="item form-group">
                            <label class="control-label col-md-2 col-sm-12 col-xs-12"><%= Inflector::humanize($assocData['property']) %></label>
                            <div class="col-md-10 col-sm-12  col-xs-12">
                            <?php echo $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>]); ?>
                            </div>
                        </div>
                    <% }
                    } %>
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