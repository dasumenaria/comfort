<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <!-- <div class="col-lg-3 col-xs-6"> 
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>150</h3> 
          <p>New Booking</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div> -->
    <!-- ./col -->
    <div class="col-lg-6 col-xs-6"> 
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $opendsCount ; ?></h3>

          <p>Open DS</p>
        </div>
        <div class="icon">
          <i class="fa fa-book"></i>
        </div>
        <?php echo $this->Html->link('More info <i class="fa fa-arrow-circle-right"></i>',['controller'=>'DutySlips','action' => 'openDs'],array('escape'=>false,'class'=>'small-box-footer')); ?> 
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $unBilledds ; ?></h3>

          <p>UnBilled DS</p>
        </div>
        <div class="icon">
          <i class="fa fa-book"></i>
        </div>
        <?php echo $this->Html->link('More info <i class="fa fa-arrow-circle-right"></i>',['controller'=>'DutySlips','action' => 'Unbilledds'],array('escape'=>false,'class'=>'small-box-footer')); ?> 
      </div>
    </div>
    <!-- ./col -->
    <!-- <div class="col-lg-3 col-xs-6"> 
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>

          <p>Invoice Due List</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div> -->
    <!-- ./col -->
  </div>
</section>