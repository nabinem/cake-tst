<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Patient Appointment App | Log in</title>
    <!-- Bootstrap -->
    <?php echo $this->Html->css(['../vendors/bootstrap/dist/css/bootstrap.min']); ?>
    <!-- Font Awesome -->
    <?php echo $this->Html->css(['../vendors/font-awesome/css/font-awesome']); ?>
    <?php echo $this->Html->css(['../vendors/select2/dist/css/select2.min']); ?>
    <?php echo $this->Html->css(['../vendors/uniform/dist/css/default']); ?>
    <!-- Animate.css -->
    <?php echo $this->Html->css(['animate.min']); ?>

    <!-- Custom Theme Style -->
    <?php echo $this->Html->css(['../build/css/custom.min']); ?>
    <?php echo $this->Html->css(['main']); ?>
    <?= $this->fetch('css') ?>
  </head>


<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
    <!-- jQuery -->
    <?php echo $this->Html->script('../vendors/jquery/dist/jquery.min'); ?>
    <!-- Bootstrap -->
    <?php echo $this->Html->script('../vendors/bootstrap/dist/js/bootstrap.min'); ?>
    <script type="text/javascript">
        var webroot = '<?php echo $this->request->webroot; ?>';
    </script>
    <?php echo $this->Html->script([
            '../vendors/select2/dist/js/select2.min',
            '../vendors/uniform/dist/js/jquery.uniform.min',
            'jquery.validate.min', 'additional-methods.min'
        ]); ?>
    <?php echo $this->fetch('pluginJs'); ?>
    <?php echo $this->Html->script('main'); ?> 
    <?php echo $this->fetch('scriptBottom'); ?>
</body>
</html>