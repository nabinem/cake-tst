<?php 
$fadeClass = 'flash_fade';
if (isset($params['fade']) && $params['fade'] === false){
   $fadeClass = ''; 
} ?>

<div  class="alert alert-danger <?=$fadeClass?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span aria-hidden="true">×</span></button><i class="fa-lg fa fa-warning"></i>
    <?= $message ?><br/>
    <?php // debug($params['validationErrors']);
//    if (!empty($params['validationErrors'])){
//          foreach($params['validationErrors'] as $errorGroup){
//              foreach($errorGroup as $error){
//                   echo $error.'<br/>';
//              }
//          }
//    } ?>
</div>