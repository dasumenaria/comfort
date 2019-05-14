<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Corporate <?= $displayName;?>
            </div>
            <?php
            if($RecordShow != 1)
            {
                ?>
                <?= $this->Form->create('',['type'=>'file','id'=>'CityForm']) ?>
                <div class="box-body" >
                    <div class="row">
                        <div class="">
                            <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label class="control-label">Invoice No</label>
                                <?php echo $this->Form->control('invoice_no' , ['label' => false,'class' => 'form-control autocompleted selectedAutoCompleted','placeholder'=>'Search by Invoice No','autocomplete'=>'off','valueType'=>'supplier_name']); ?>                               <div class="suggesstion-box" style="margin-top:-10px;"></div> 
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label">Customer Name</label>
                                <?php echo $this->Form->control('customer_id' , ['label' => false,'class' => 'select2  supplierType','empty'=>'Select...','options'=>$customerList,'autocomplete'=>'off']); ?>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label">Date </label>
                                <?php echo $this->Form->control('date' , ['label' => false,'class' => 'form-control datepickers','type'=>'text','data-date-format'=>'dd/mm/yyyy','autocomplete'=>'off','placeholder'=>'dd/mm/yy']); ?>
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
                                    <?php echo $this->Form->button('Submit',['class'=>'btn btn-primary','id'=>'submit_member']); ?>
                                </div>
                            </div>
                        </center>       
                    </div>
                </div>
                <?= $this->Form->end() ?>
            <?php 
            }
            else{ ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('SL.') ?></th> 
                            <th><?=  ('Date') ?></th>
                            <th><?=  ('Invoice No.') ?></th>
                            <th><?=  ('Customer Name') ?></th>
                            <th><?=  ('Guest Name') ?></th>
                            <th><?=  ('Grand Total') ?></th>
                            <th class="actions text-center"><?= __('Action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
<?php $page_no=0;$i=0; foreach ($customerLists as $city): 
                        ?>
                        <tr id="<?php echo ++$i; ?>" <?php if($city->billing_status=='yes'){ ?>  title="Billing have been Done" style="background-color:#DFF0D8;" <?php }
                            else if($city->waveoff_status==1) {?> title="This is Waveoff Corporate " style="background-color:#F2DEDE;" <?php } ?>>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h(date('d-M-Y',strtotime($city->date))) ?></td>
                            <td><?= h(@$city->invoice_no) ?></td>
                            <td><?= h(@$city->customer->name) ?></td>
                            <td><?= h(@$city->guest_name) ?></td>
                            <td></td>
                            <td  class="actions text-center">
                            <?php if($type == 'edt') { ?>
                                <?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>',['action' => 'edit', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-danger','target'=>'_blank')); ?>
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
                                                    <?php echo $this->Form->control('waveoff_reason' , ['label' => false,'class' => 'form-control','placeholder'=>'Enter Waveoff Reason','autocomplete'=>'off','required'=>true]); ?>
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
                </table>
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
$(document).ready(function() {
    $(document).on('blur',".autocompleted",function(){ 
        $('.suggesstion-box').delay(1000).fadeOut(500);
    }); 


    $("#CityForm").validate({ 
        
        submitHandler: function () {
            $("#submit_member").attr('disabled','disabled');
            $("#loader-1").show();
            form.submit();
        }
    }); 

    
});
    
</script>
