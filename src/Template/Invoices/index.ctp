<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border hide_print">
                <i class="fa fa-plus"></i> Invoice <?= $displayName;?> 
            </div>
            <?php
            if($RecordShow != 1)
            {
                ?>
                <?= $this->Form->create('',['class'=>'loadingshow','id'=>'CityForm']) ?>
                <div class="box-body hide_print" >
                    <div class="row">  
                        <div class="form-group col-md-12">
                            <label class="control-label col-md-2">Invoice No. </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->control('id' , ['label' => false,'class' => 'form-control','placeholder'=>'Search by Invoice No.','autocomplete'=>'off']); ?>
                            </div>
                        </div> 
                        <div class="form-group col-md-12">
                            <label class="control-label col-md-2"> DutySlip No.</label>
                            <div class="col-md-6"> 
                                 <?php echo $this->Form->control('dutyslip_id' , ['label' => false,'class' => 'form-control','placeholder'=>'Search by DutySlip No.','autocomplete'=>'off','type'=>'text']); ?>
                            </div>
                        </div>  
                        <div class="form-group col-md-12">
                            <label class="control-label col-md-2">Customer Name </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->control('customer_id',['label' => false,'class' => 'form-control select2','empty'=>'Select...','options'=>$customers,'autocomplete'=>'off']); ?>
                            </div>
                        </div>
                        <!-- <div class="form-group col-md-12">
                            <label class="control-label col-md-2"> Guest Name</label>
                            <div class="col-md-6"> 
                               <?php echo $this->Form->control('guest_name' , ['label' => false,'class' => 'form-control','placeholder'=>'Search by Guest Name','autocomplete'=>'off']); ?>
                            </div>
                        </div> -->
                        <div class="form-group col-md-12">
                            <label class="control-label col-md-2">Date of Billing </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->control('date',['label' => false,'class' => 'form-control datepickers','type'=>'text','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy','placeholder'=>'DD-MM-YYYY']); ?>
                            </div>
                        </div>   
                        <div class="form-group col-md-12">
                            <label class="control-label col-md-2">Date From </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->control('date_from',['label' => false,'class' => 'form-control datepickers','type'=>'text','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy','placeholder'=>'DD-MM-YYYY']); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label col-md-2"> Date To</label>
                            <div class="col-md-6"> 
                                <?php echo $this->Form->control('date_to',['label' => false,'class' => 'form-control datepickers','type'=>'text','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy','placeholder'=>'DD-MM-YYYY']); ?>
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
                            <th>SL.</th>
                            <th>Invoice No.</th>
                            <th>Duty Slip ID</th>
                            <th>Guest Name</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Grand Total</th>
                            <th class="actions text-center hide_print"><?= __('Action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0;$i=0; foreach ($customerList as $city): 
                        //pr($city);
                        $dutySlipArray=array();
                        $guestName=array(); 
                        foreach ($city->invoice_details as $value) {
                            $dutySlipArray[]=$value->duty_slip_id;
                            $guestName[]=$value->duty_slip->guest_name;
                        }
                        $dsIds = implode(',',$dutySlipArray);
                        $showName = implode(',',$guestName);
                        ?>
                        <tr id="<?php echo ++$i; ?>" <?php if($city->payment_status=='yes'){ ?>  title="Billing have been Done" style="background-color:#DFF0D8;" <?php }
                            else if($city->waveoff_status==1) {?> title="This is waveoff Bill" style="background-color:#F2DEDE;" <?php } ?>>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h(@$city->invoice_no) ?></td>
                            <td><span class="label label-info popovers" data-placement="right" data-title="<?php if($city->waveoff_status=='1'){ ?> Waveoff invoice <?php } else if($city->payment_status=='yes'){ ?> Payment have been Done <?php } ?>"  data-trigger="hover"  data-content="<?php echo $dsIds; ?>">dutyslip id</span></td>
                            <td><?= $showName ;?></td>
                            <td><?= h(@$city->customer->name) ?></td> 
                            <td><?= h(date('d-M-Y',strtotime($city->current_date))) ?></td>
                            <td><?= h(@$city->grand_total) ?></td> 

                            <td  class="actions text-center hide_print">
                            <?php if($type == 'edt') { ?>
                                <?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>',['action' => 'edit', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-danger','target'=>'_blank')); ?>
                            <?php } if($type == 'del') {?>
                                <a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $city->id; ?>" data-toggle=modal><i class="fa fa-gavel"></i></a>
                                
                            <?php } if($type == 'ser') {
                                $this->Html->link('<i class="fa fa-search"></i>',['action' => 'viewDutyslip', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-info','target'=>'_blank'));
                                echo "&nbsp;";
                                $this->Html->link('<i class="fa fa-download"></i>',['action' => 'pdf', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-success','target'=>'_blank'));
                                if($city->waveoff_status==0) {
                                ?>
                                    <a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $city->id; ?>" data-toggle=modal><i class="fa fa-gavel"></i></a>
                                <?php
                                }
                            }?> 
                            </td>
                            <div id="deletemodal<?php echo $city->id; ?>" class="modal fade" role="dialog">
                                <?= $this->Form->create('hello',['class'=>'loadingshow','id'=>'test']) ?>
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