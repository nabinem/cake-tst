<?php if ($this->Paginator->hasPage(null,2)) : ?> 
<div class="<?php echo isset($divClass)?$divClass:'paginate_custom paginator clearfix'; ?>">
        <ul class="pagination pull-right">
            <?= $this->Paginator->first('' . __('First')) ?>
            <?= $this->Paginator->prev('' . __('Previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Next')) ?>
            <?= $this->Paginator->last('' . __('Last')) ?>
        </ul>
    </div>
<?php endif; ?>