<!DOCTYPE html>
<html lang="en">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Doctor Patient Appointment App</title>
      <!-- Bootstrap -->
      <?php echo $this->Html->css(['../vendors/bootstrap/dist/css/bootstrap.min']); ?>
      <!-- Font Awesome -->
      <?php echo $this->Html->css(['../vendors/font-awesome/css/font-awesome']); ?>
      <!-- Custom Theme Style -->
      <?php echo $this->Html->css(['../vendors/uniform/dist/css/default']); ?>
      <?php echo $this->Html->css(['../vendors/toastr/build/toastr.min']); ?>
      <?php echo $this->fetch('pluginCss'); ?>
      <?php echo $this->Html->css(['../build/css/custom.min']); ?>
      <?php echo $this->Html->css(['main']); ?>
      <?= $this->fetch('css') ?>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php echo $this->element('sidebar_navigation'); ?>
                <?php echo $this->element('top_navigation'); ?>
                <?= $this->fetch('content') ?> 
                 <!-- footer content -->
                <footer>
                  <?php echo $this->element('copyright_text'); ?>
                  <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        <!-- jQuery -->
        <?php echo $this->Html->script('../vendors/jquery/dist/jquery.min'); ?>
        <?php echo $this->fetch('beforeBootstrapJs'); ?>
        <!-- Bootstrap -->
        <?php echo $this->Html->script('../vendors/bootstrap/dist/js/bootstrap.min'); ?>
        <script type="text/javascript">
            var webroot = '<?php echo $this->request->webroot; ?>';
        </script>
        <?php echo $this->Html->script([
            '../vendors/fastclick/lib/fastclick',
            '../vendors/bootstrap-progressbar/bootstrap-progressbar.min',
            'moment/moment.min.js', '../build/js/custom.min', 'jquery.validate.min', 'additional-methods.min',
            '../vendors/uniform/dist/js/jquery.uniform.min', '../vendors/toastr/build/toastr.min'
            ]); ?>
        <?php echo $this->fetch('pluginJs'); ?>
        <?php echo $this->Html->script('main'); ?> 
        <?php echo $this->fetch('scriptBottom'); ?>
    </body>
</html>