<aside class="main-sidebar no-print" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="" align="center" style="margin-top:14px" >
    
    </div>      
    <ul class="sidebar-menu">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Logins",'action'=>'index']); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i>
            <span>Masters</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build(["controller" => "Counters",'action'=>'index']); ?>"><i class="fa fa-book"></i> Counter</a></li>            
            <li><a href="<?php echo $this->Url->build(["controller" => "CarTypes",'action'=>'index']); ?>"><i class="fa fa-book"></i> Car Type</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "SupplierTypes",'action'=>'index']); ?>"><i class="fa fa-book"></i> Supplier Type</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "SupplierTypes",'action'=>'supplier']); ?>"><i class="fa fa-book"></i> Supplier</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Customers",'action'=>'add']); ?>"><i class="fa fa-book"></i> Customer </a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Services",'action'=>'index']); ?>"><i class="fa fa-book"></i> Services </a></li>            
          </ul>
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu"> 
            <li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-book']).' Check-In', '/CheckInDetails/checkinreport',['escape' => false]); ?></li>
          </ul>
    </ul>
    </section>
    </aside>