<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> DutySlip <?= $displayName;?>
            </div>
            <?php
            if($RecordShow != 1)
            {
                ?>
                <?= $this->Form->create('',['type'=>'file','id'=>'CityForm']) ?>
                <div class="box-body" >
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="control-label col-md-4">DutySlip ID </label>
                                <div class="col-md-8">
                                    <?php echo $this->Form->control('id' , ['label' => false,'class' => 'form-control','placeholder'=>'Search by DutySlip ID','autocomplete'=>'off','valueType'=>'customer_name']); ?>                                     
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label col-md-4"> Service Name</label>
                                <div class="col-md-8"> 
                                    <?php echo $this->Form->control('service_id',['label' => false,'class' => 'form-control select2','empty'=>'Select...','options'=>$services,'autocomplete'=>'off']); ?>
                                </div>
                            </div> 
                        </div> 
                        <div class="col-md-12 space">
                            <div class="form-group col-md-6">
                                <label class="control-label col-md-4">Customer Name </label>
                                <div class="col-md-8">
                                    <?php echo $this->Form->control('customer_id',['label' => false,'class' => 'form-control select2','empty'=>'Select...','options'=>$customers,'autocomplete'=>'off']); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label col-md-4"> Driver Name</label>
                                <div class="col-md-8"> 
                                    <?php echo $this->Form->control('employee_id',['label' => false,'class' => 'form-control select2','empty'=>'Select...','options'=>$employees,'autocomplete'=>'off']); ?>
                                </div>
                            </div> 
                        </div> 
                        <div class="col-md-12 space">
                            <div class="form-group col-md-6">
                                <label class="control-label col-md-4">Date From </label>
                                <div class="col-md-8">
                                    <?php echo $this->Form->control('date_from',['label' => false,'class' => 'form-control datepickers','type'=>'text','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy','placeholder'=>'DD-MM-YYYY']); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label col-md-4"> Date To</label>
                                <div class="col-md-8"> 
                                    <?php echo $this->Form->control('date_to',['label' => false,'class' => 'form-control datepickers','type'=>'text','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy','placeholder'=>'DD-MM-YYYY']); ?>
                                </div>
                            </div> 
                        </div>       
                    </div> 
                </div>
            
                <div class="box-footer">
                    <div class="row">
                        <center>
                            <div class="col-md-12">
                                <div class="col-md-offset-3 col-md-6">  
                                    <?php echo $this->Form->button('Process',['class'=>'btn btn-success','name'=>'searchDS','value'=>'1']); ?>
                                </div>
                            </div>
                        </center>       
                    </div>
                </div>
                <?= $this->Form->end() ?>
            <?php 
            }
            else{ ?>
            <div class="box-body" >
                <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('DS ID') ?></th>
                            <th><?=  ('Guest') ?></th>
                            <th><?=  ('Service') ?></th>
                            <th><?=  ('Driver') ?></th>
                            <th><?=  ('Car') ?></th>
                            <th><?=  ('Car No.') ?></th>
                            <th><?=  ('Date') ?></th>
                            <th><?=  ('Open KM') ?></th>
                            <th><?=  ('Close KM') ?></th>
                            <th class="actions text-center"><?= __('Action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0;$i=0; foreach ($customerList as $city): 
                        ?>
                        <tr id="<?php echo ++$i; ?>" <?php if($city->billing_status=='yes'){ ?>  title="Billing have been Done" style="background-color:#DFF0D8;" <?php }
                            else if($city->waveoff_status==1) {?> title="This is waveoff ds" style="background-color:#F2DEDE;" <?php } ?>>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h(@$city->id) ?></td>
                            <td><?= h(@$city->guest_name) ?></td>
                            <td><?= h(@$city->service->name) ?></td>
                            <td><?= h(@$city->employee->name) ?></td>
                            <td><?= h(@$city->car_type->name) ?></td>
                            <td><?= h(@$city->car->name) ?></td>
                            <td><?= h(date('d-M-Y',strtotime($city->date))) ?></td>
                            <td><?= h(@$city->opening_km) ?></td>
                            <td><?= h(@$city->closing_km) ?></td>
                            <td  class="actions text-center">
                            <?php if($type == 'edt') { ?>
                                <?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>',['action' => 'edit', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-info','target'=>'_blank')); ?>
                            <?php } if($type == 'del') {?>
                                <a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $city->id; ?>" data-toggle=modal><i class="fa fa-gavel"></i></a>
                                
                            <?php } if($type == 'ser') {
                                echo $this->Html->link('<i class="fa fa-search"></i>',['action' => 'viewDutyslip', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-info','target'=>'_blank'));
                                echo "&nbsp;";
                                echo $this->Html->link('<i class="fa fa-download"></i>',['action' => 'pdf', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-success','target'=>'_blank'));
                                if($city->waveoff_status==0) {
                                ?>
                                    <a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $city->id; ?>" data-toggle=modal><i class="fa fa-gavel"></i></a>
                                <?php
                                }
                            }?> 
                            </td>
                            <div id="deletemodal<?php echo $city->id; ?>" class="modal fade" role="dialog">
                                <?= $this->Form->create('hello',['type'=>'file','id'=>'test']) ?>
                                    <div class="modal-dialog modal-md" > 
                                        <div class="modal-content">
                                          <div class="modal-header" style=" background-color: #5ea3af;color:#fff;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" >
                                                    &nbsp; Stay Attention
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group" style="padding:10px">
                                                    <label class="control-label">Waveoff Reason </label> 
                                                    <?php echo $this->Form->control('reason' , ['label' => false,'class' => 'form-control','placeholder'=>'Enter Waveoff Reason','autocomplete'=>'off','required'=>true]); ?>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <?php echo $this->Form->button('Yes',['class'=>'btn btn-success btn-sm','name'=>'deleteDS','value'=>'2']); ?>
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div> 
                                    </div>
                                    <?php echo $this->Form->hidden('dsid' , ['label' => false,'value' => $city->id]); ?>
                                <?= $this->Form->end() ?>
                                </div>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php
            }
            ?>
        </div> 
    </div>   
</section>
<?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?> 
<script>
jQuery(".loadingshow").submit(function(){
    jQuery("#loader-1").show();
});   
</script> 