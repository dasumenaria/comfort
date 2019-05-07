<?php 
//pr($this->request->webroot); exit;?>

<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<title>Comfort</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="Dsu Menaria">
<meta content="Dsu Menaria" name="description">
<meta content="Dsu Menaria" name="author">
    <?php  echo $this->Html->css('/assets/bootstrap/css/bootstrap.min.css'); ?>
    <?php echo $this->Html->css('/assets/plugins/bootstrap-datepicker/css/datepicker3.css'); ?> 
    <?php echo $this->Html->css('/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css'); ?> 
    <?php echo $this->Html->css('/assets/plugins/datatables/dataTables.bootstrap.css'); ?> 
    <?php echo $this->Html->css('/assets/plugins/timepicker/bootstrap-timepicker.min.css'); ?> 
    <?php echo $this->Html->css('/assets/plugins/jquery-validation/demo/css/screen.css'); ?> 
    <?php echo $this->Html->css('/assets/plugins/iCheck/all.css'); ?> 
    <?php echo $this->Html->css('/assets/font-awesome/css/font-awesome.min.css'); ?> 
    <?php echo $this->Html->css('/assets/ionicons/css/ionicons.min.css'); ?> 
    <?php echo $this->Html->css('/assets/plugins/select2/select2.min.css'); ?>
    <?php echo $this->Html->css('/assets/plugins/bootstrap-editable/css/bootstrap-editable.css'); ?>
    <?php echo $this->Html->css('/assets/dist/css/AdminLTE.min.css'); ?>
    <?php echo $this->Html->css('/assets/dist/css/skins/skin-blue.min.css'); ?> 
    <?php echo $this->Html->css('/assets/plugins/WYSIWYG/editor.css'); ?>
    <?php echo $this->Html->css('/assets/demo-styles.css'); ?>
    <?php echo $this->Html->css('/assets/loader-1.css'); ?>
    <?php echo $this->Html->css('https://fonts.googleapis.com/css?family=Raleway'); ?>
    <?php echo $this->Html->css('//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'); ?>
    <?php  echo $this->Html->css('/assets/scroll/jquery/jquery-ui.css'); ?>
    <?php  echo $this->Html->css('/assets/scroll/css/styles.css'); ?>
    <?php  echo $this->Html->css('/assets/scroll/css/fixed_table_rc.css'); ?> 
    <?php  echo $this->Html->css('/assets/custom.css'); ?> 
     
    <link rel="stylesheet" href="">
     <?php
        echo $this->Html->meta(
        'favicon.ico',
        '/images/shortcut_icon/favicon.ico',
        ['type' => 'icon']
    ); ?>  
</head>
<!--<body class="hold-transition skin-blue fixed sidebar-mini">-->
<body class="hold-transition skin-blue fixed sidebar-mini">
<div id="wrapper">
    <header class="main-header  no-print">
        <!-- Logo background: #1295a2; -->
        <a style="line-height: 56px;" href="<?php echo $this->Url->build(["controller" => "AdminUsers",'action'=>'index']); ?>" class="logo outnav" >
          <span class="logo-mini" style="font-size:0px !important;"><?php echo $this->Html->image('/img/logo.jpg', ['style'=>'width:90%;']) ?></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg" style="font-size:0px !important;"><?php echo $this->Html->image('/img/logo.jpg', ['style'=>'width:90%;','class'=>'image-responsive']) ?></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
        <a href="#" style="font-size: 16px;margin-top:0px !important" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <a style="line-height: 60px;" href="<?php echo $this->Url->build(["controller" => "AdminUsers",'action'=>'index']); ?>" class="logo innav" >
          <span class="logo-mini" style="font-size:0px !important;"><?php echo $this->Html->image('/img/logowhite.png', ['style'=>'width:80%;']) ?></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg" style="font-size:0px !important;"><?php echo $this->Html->image('/img/logowhite.png', ['style'=>'width:23%;','class'=>'image-responsive']) ?></span>
        </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav" style="padding-top: 2px !important;">
            <li>
                <a href="<?php echo $this->Url->build(["controller" => "Logins",'action'=>'logout']); ?>"><i style="font-size: 20px;" class="fa fa-power-off"></i></a>
            </li>           
            </ul>
          </div>
        </nav>
      </header>
    
      <?= $this->element('menu')?>
    <div class="content-wrapper">
         <section class="content">
            <div class="row">
                <?php echo $this->Flash->render(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
         </section>
    </div>
</div>
<div class="loader-wrapper" style="width: 100%;height: 100%;  display: none;  position: fixed; top: 0px; left: 0px;    background: rgba(0,0,0,0.25); display: none; z-index: 1000;" id="loader-1">
    <div id="loader"></div>
</div>
<footer class="main-footer hide_print">
    2018 &copy; <a href="http://www.phppoets.com" target="_blank"> PHPPoets.</a> All Rights Reserved.
</footer>
<?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?>
<?php echo $this->Html->script('/assets/bootstrap/js/bootstrap.min.js'); ?>
<?php echo $this->Html->script('/assets/plugins/datatables/jquery.dataTables.min.js'); ?>
<?php echo $this->Html->script('/assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>

<?php echo $this->Html->script('/assets/plugins/jquery-validation/lib/jquery.js'); ?>
<?php echo $this->Html->script('/assets/plugins/jquery-validation/dist/jquery.validate.js'); ?>
<?php echo $this->Html->script('/assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>
<?php echo $this->Html->script('/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>
<?php echo $this->Html->script('/assets/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>
<?php echo $this->Html->script('/assets/plugins/timepicker/bootstrap-timepicker.min.js'); ?>
<?php echo $this->Html->script('/assets/plugins/select2/select2.full.min.js'); ?> 
<?php echo $this->Html->script('/assets/plugins/bootstrap-editable/js/bootstrap-editable.min.js'); ?>
<?php echo $this->Html->script('/assets/plugins/iCheck/icheck.min.js'); ?>
<?php echo $this->Html->script('/assets/plugins/fastclick/fastclick.js'); ?>
<?php echo $this->Html->script('/assets/dist/js/app.js'); ?>
<?php echo $this->Html->script('/assets/dist/js/demo.js'); ?> 
<?php echo $this->Html->script('/assets/plugins/WYSIWYG/editor.js'); ?>
<?php echo $this->Html->script('/assets/scroll/js/fixed_table_rc.js'); ?>
 
<script>
    $('.select2').select2();
    var date = new Date();
    date.setDate(date.getDate());
    $('.date-picker').datepicker({
        minDate:0,
        startDate: date,
        autoclose:true
    });
    $('.datepicker').datepicker({
        minDate:0,
        startDate: date,
        autoclose:true
    });
    $('.datepickers').datepicker({autoclose:true});
     
    $('input[type="text"]'). attr("autocomplete", "off");

    $(".txtEditor").Editor({
        'source':true,
        'togglescreen':false,
        'rm_format':false,
        'insert_img':false,
    }); 
    $("#example1").DataTable();
</script>   
</body>
</html>