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
    <?php  $this->Html->css('/assets/plugins/bootstrap-datepicker/css/datepicker3.css'); ?> 
    <?php echo $this->Html->css('/assets/datepicker.css'); ?> 
    <?php echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'); ?> 
    <?php echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'); ?> 
    <?php echo $this->Html->css('/assets/plugins/datatables/dataTables.bootstrap.css'); ?> 
    <?php echo $this->Html->css('/assets/plugins/select2/select2.min.css'); ?> 
    <?php echo $this->Html->css('/assets/dist/css/AdminLTE.min.css'); ?>
    <?php echo $this->Html->css('/assets/dist/css/skins/skin-blue.min.css'); ?>   
    <?php echo $this->Html->css('/assets/loader-1.css'); ?>
    <?php  $this->Html->css('https://fonts.googleapis.com/css?family=Raleway'); ?> 
    <?php  echo $this->Html->css('/assets/scroll/jquery/jquery-ui.css'); ?>
    <?php  echo $this->Html->css('/assets/custom.css'); ?>    
</head>
<!--<body class="hold-transition skin-blue fixed sidebar-mini">-->
<body class="hold-transition skin-blue fixed sidebar-mini">
<div id="wrapper">
    <header class="main-header  no-print">
        <!-- Logo background: #1295a2; -->
        <a style="line-height: 56px;" href="<?php echo $this->Url->build(["controller" => "Logins",'action'=>'index']); ?>" class="logo outnav" >
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
        <a style="line-height: 60px;" href="<?php echo $this->Url->build(["controller" => "Logins",'action'=>'index']); ?>" class="logo innav" >
          <span class="logo-mini" style="font-size:0px !important;"><?php echo $this->Html->image('/img/logo.jpg', ['style'=>'width:80%;']) ?></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg" style="font-size:0px !important;"><?php echo $this->Html->image('/img/logo.jpg', ['style'=>'width:23%;','class'=>'image-responsive']) ?></span>
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
<?php echo $this->Html->script('/assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>
<?php echo $this->Html->script('/assets/bootstrap/js/bootstrap.min.js'); ?> 

<?php echo $this->Html->script('/assets/plugins/datatables/jquery.dataTables.min.js'); ?> 
<?php echo $this->Html->script('/assets/plugins/datatables/dataTables.bootstrap.min.js'); ?> 


<?php echo $this->Html->script('/assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>
<?php echo $this->Html->script('/assets/plugins/fastclick/fastclick.js'); ?>
   
<?php echo $this->Html->script('/assets/dist/js/app.js'); ?>
<?php echo $this->Html->script('/assets/dist/js/demo.js'); ?> 
<?php echo $this->Html->script('/assets/plugins/jquery-validation/dist/jquery.validate.js'); ?>
<?php echo $this->Html->script('/assets/datepicker.js'); ?>  
<?php echo $this->Html->script('/assets/plugins/select2/select2.full.min.js'); ?>
   
<script>
  $(function () {
    $("#example").DataTable();
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script> 

<script>
$(window).load(function(){
    var menuSelect=$("a[href='<?php echo $this->request->getAttribute('here');  ?>']"); 
    menuSelect.parents('li:not(.first,.prev,.next,.last,.paginator-number)').addClass('active');
});
</script>
<script>
    $('.select2').select2();
    var date = new Date(); 
    date.setDate(date.getDate());
    $('.date-picker').datepicker({
        minDate:0,
        startDate: date,
        setDate: date,
        autoclose:true
    });
    $('.datepicker').datepicker({
        minDate:0,
        startDate: date,
        setDate: date,
        autoclose:true
    }); 
    
    $('.datepickers').datepicker({autoclose:true});

    $('input[type="text"]'). attr("autocomplete", "off");
   
    
    function round(value, exp) {
        if (typeof exp === 'undefined' || +exp === 0)
        return Math.round(value);

        value = +value; 
        exp = +exp;

        if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0))
        return 0;

        // Shift
        value = value.toString().split('e');
        value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp)));

        // Shift back
        value = value.toString().split('e');
        return +(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp));
    }
</script>
<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> 
<script>
$(document).ready(function() {
    $('#example').DataTable();
    //$('input[type="search"]').addClass('form-control');
} ); 
</script>-->

<?= $this->fetch('scriptBottom'); ?>  
</body>
</html>