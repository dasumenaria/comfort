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
            <li><a href="<?php echo $this->Url->build(["controller" => "Counters",'action'=>'add']); ?>"><i class="fa fa-book"></i> Counter</a></li> 
            <li><a href="<?php echo $this->Url->build(["controller" => "CarTypes",'action'=>'index']); ?>"><i class="fa fa-book"></i> Car Type</a></li>
            

            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Service</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(["controller" => "Services",'action'=>'add']); ?>"><i class="fa fa-circle-o"></i> Add</a></li> 

                <li><a href="<?php echo $this->Url->build(["controller" => "Services",'action'=>'index']); ?>"><i class="fa fa-circle-o"></i> Edit | Delete | View</a></li>
              </ul>
            </li>
 
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Customer</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(["controller" => "Customers",'action'=>'add']); ?>"><i class="fa fa-circle-o"></i> Add</a></li> 

                <li><a href="<?php echo $this->Url->build(["controller" => "Customers",'action'=>'index','edt']); ?>"><i class="fa fa-circle-o"></i> Edit </a></li>

                <li><a href="<?php echo $this->Url->build(["controller" => "Customers",'action'=>'index','del']); ?>"><i class="fa fa-circle-o"></i> Delete </a></li>

                <li><a href="<?php echo $this->Url->build(["controller" => "Customers",'action'=>'index','ser']); ?>"><i class="fa fa-circle-o"></i> Search </a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Supplier</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(["controller" => "SupplierTypes",'action'=>'index']); ?>"><i class="fa fa-circle-o"></i> Supplier Type</a></li> 
                
                <li><a href="<?php echo $this->Url->build(["controller" => "SupplierTypes",'action'=>'supplier']); ?>"><i class="fa fa-circle-o"></i> Sub Supplier Type</a></li> 
                
                <li><a href="<?php echo $this->Url->build(["controller" => "Suppliers",'action'=>'add']); ?>"><i class="fa fa-circle-o"></i> Add</a></li> 

                <li><a href="<?php echo $this->Url->build(["controller" => "Suppliers",'action'=>'index','edt']); ?>"><i class="fa fa-circle-o"></i> Edit </a></li>

                <li><a href="<?php echo $this->Url->build(["controller" => "Suppliers",'action'=>'index','del']); ?>"><i class="fa fa-circle-o"></i> Delete </a></li>

                <li><a href="<?php echo $this->Url->build(["controller" => "Suppliers",'action'=>'index','ser']); ?>"><i class="fa fa-circle-o"></i> Search </a></li>
              </ul>
            </li> 

            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Supplier Tariff</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(["controller" => "SupplierTariffs",'action'=>'add']); ?>"><i class="fa fa-circle-o"></i> Add</a></li> 

                <li><a href="<?php echo $this->Url->build(["controller" => "SupplierTariffs",'action'=>'index','edt']); ?>"><i class="fa fa-circle-o"></i> Edit </a></li>

                <li><a href="<?php echo $this->Url->build(["controller" => "SupplierTariffs",'action'=>'index','del']); ?>"><i class="fa fa-circle-o"></i> Delete </a></li>

                <li><a href="<?php echo $this->Url->build(["controller" => "SupplierTariffs",'action'=>'index','ser']); ?>"><i class="fa fa-circle-o"></i> Search </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Customer Tariff</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(["controller" => "CustomerTariffs",'action'=>'add']); ?>"><i class="fa fa-circle-o"></i> Add</a></li> 

                <li><a href="<?php echo $this->Url->build(["controller" => "CustomerTariffs",'action'=>'index','edt']); ?>"><i class="fa fa-circle-o"></i> Edit </a></li>

                <li><a href="<?php echo $this->Url->build(["controller" => "CustomerTariffs",'action'=>'index','del']); ?>"><i class="fa fa-circle-o"></i> Delete </a></li>

                <li><a href="<?php echo $this->Url->build(["controller" => "CustomerTariffs",'action'=>'index','ser']); ?>"><i class="fa fa-circle-o"></i> Search </a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Employee</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(["controller" => "Employees",'action'=>'add']); ?>"><i class="fa fa-circle-o"></i> Add</a></li> 

                <li><a href="<?php echo $this->Url->build(["controller" => "Employees",'action'=>'index','edt']); ?>"><i class="fa fa-circle-o"></i> Edit </a></li>

                <li><a href="<?php echo $this->Url->build(["controller" => "Employees",'action'=>'index','del']); ?>"><i class="fa fa-circle-o"></i> Delete </a></li>

                <li><a href="<?php echo $this->Url->build(["controller" => "Employees",'action'=>'index','ser']); ?>"><i class="fa fa-circle-o"></i> Search </a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Car</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(["controller" => "Cars",'action'=>'add']); ?>"><i class="fa fa-circle-o"></i> Add</a></li> 

                <li><a href="<?php echo $this->Url->build(["controller" => "Cars",'action'=>'index','edt']); ?>"><i class="fa fa-circle-o"></i> Edit </a></li>

                <li><a href="<?php echo $this->Url->build(["controller" => "Cars",'action'=>'index','del']); ?>"><i class="fa fa-circle-o"></i> Delete </a></li>

                <li><a href="<?php echo $this->Url->build(["controller" => "Cars",'action'=>'index','ser']); ?>"><i class="fa fa-circle-o"></i> Search </a></li>
              </ul>
            </li>
        </ul>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Duty Slip</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu"> 
            <li><a href="<?php echo $this->Url->build(["controller" => "DutySlips",'action'=>'add']); ?>"><i class="fa fa-circle-o"></i> Add</a></li> 

            <li><a href="<?php echo $this->Url->build(["controller" => "DutySlips",'action'=>'index','edt']); ?>"><i class="fa fa-circle-o"></i> Edit </a></li>

            <li><a href="<?php echo $this->Url->build(["controller" => "DutySlips",'action'=>'index','del']); ?>"><i class="fa fa-circle-o"></i> Delete </a></li>

            <li><a href="<?php echo $this->Url->build(["controller" => "DutySlips",'action'=>'index','ser']); ?>"><i class="fa fa-circle-o"></i> Search </a></li>
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
        </li>
    </ul>
    </section>
    </aside>