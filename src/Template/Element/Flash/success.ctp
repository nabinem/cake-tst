<?php 
$fadeClass = 'flash_fade';
if (isset($params['fade']) && $params['fade'] === false){
   $fadeClass = ''; 
} ?>
<div  class="alert alert-success  alert-dismissible fade in <?=$fadeClass?>">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <i class="fa-lg fa fa-check"></i>
    <?= $message ?>
</div>
