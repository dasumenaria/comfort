
<section class="content">
<?php
if($RecordShow == 1)
{ ?>
    <table class="hide_print">
        <tr>
            <td>
                <a href="" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </td>
            <td>&nbsp;
            <button class="btn btn-warning" onclick="window.print();"><i class="fa fa-print" aria-hidden="true"></i></button>
            </td>
            <td>
            <?= $this->Form->create(null, ['url' => [
                    'controller' => 'DutySlips',
                    'action' => 'recordexcel'
                ]]); ?>  
            <?php echo $this->Form->hidden('counter_id' , ['label' => false,'value' => $counter_id]); ?> 
            <?php echo $this->Form->hidden('login_id' , ['label' => false,'value' => $login_id]); ?> 
            <?php echo $this->Form->hidden('type' , ['label' => false,'value' => $type]); ?>

            &nbsp;<?php echo $this->Form->button('<i class="fa fa-download"></i>',['class'=>'btn btn-danger','title'=>'Click here to download Excel']); ?> 
            <?= $this->Form->end() ?>
            </td>
        </tr>
    </table>
<?php } ?>
<div class="row">

    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border hide_print">
                <i class="fa fa-plus"></i>Records
            </div>
            <?php
            if($RecordShow != 1)
            {
                ?>
            <?= $this->Form->create('df',['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body " >
                <div class="row hide_print">
                    <div class="">
                        <div class="col-md-12">
                        <div class="col-md-12 space">
                            <div class="col-md-12 ">
                                <label class="control-label col-sm-4">Counter Name:</label>
                                <div class="col-sm-4">
                                   
                                <?php echo $this->Form->control('counter_id',['label' => false,'class' => 'form-control select2','options'=>$counterList,'empty'=>'Select...','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                        </div>
                            
                        <div class="col-md-12 space">
                            <div class="col-md-12 ">
                                <label class="control-label col-sm-4">Login Name:</label>
                                <div class="col-sm-4">
                                   
                                <?php echo $this->Form->control('login_id',['label' => false,'class' => 'form-control select2','options'=>$login,'empty'=>'Select...','autocomplete'=>'off']); ?>
                                </div>
                            </div> 
                    
                        </div>
                        <div class="col-md-12 space">
                            <div class="col-md-12 ">
                                <label class="control-label col-sm-4">Type:</label>
                                <div class="col-sm-4">
                                   
                                <?php 
                                    $values['1'] = 'Duty Slip';
                                    $values['2'] = 'Invoice';
                                    echo $this->Form->control('type',['label' => false,'class' => 'form-control select2','options'=>$values,'autocomplete'=>'off']); ?>
                                </div>
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
                                <?php echo $this->Form->button('Generate',['class'=>'btn btn-success','id'=>'submit_member']); ?>
                            </div>
                        </div>
                    </center>       
                </div>
            </div>
        <?= $this->Form->end() ?>

        <?php 
            }
            else{ 
                
                if ($type == 1) {?>
                <div class="box-body" >
                   <table class="table table-bordered table-condensed" id="example">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('DS No .') ?></th> 
                            <th><?=  ('Waveoff Status') ?></th>
                            <th><?=  ('Billing Status') ?></th>
                            <th><?=  ('View') ?></th>
                            <th  class="actions text-center hide_print"><?=  ('Pdf') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0; foreach ($recordList as $city):
                            
                        ?>  
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h($city->id) ?></td> 
                            <td><?php 
                                    if ($city->waveoff_status=='1') {?>
                                    <span class="badge bg-green">Yes</span>
                                 <?php   
                                    }
                                    else
                                    {?>
                                        <span class="badge bg-red">No</span>
                                    <?php    
                                    }
                            ?></td> 
                            <td>
                                    <?php 
                                    if ($city->billing_status=='yes') {?>
                                     <span class="badge bg-green">Yes</span>
                                    <?php   
                                    }
                                    else
                                    {?>
                                        <span class="badge bg-red">No</span>
                                     <?php    
                                     }
                            ?>
                            </td>
                            <td>
                                <?php
                                 echo $this->Html->link('<i class="fa fa-search"></i>',['action' => 'viewDutyslip', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-info','target'=>'_blank'));
                                ?>
                            </td>
                            <td  class="actions text-center hide_print">
                                <?php
                                    echo $this->Html->link('<i class="fa fa-download"></i>',['action' => 'pdf', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-success','target'=>'_blank'));

                                ?>
                            </td>
                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>     
                </table>
            </div>
            <?php
                }
                else{?>
                <div class="box-body" >
                    <table class="table table-bordered table-condensed" id="example">
                        <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('Invoice No.') ?></th> 
                            <th><?=  ('Waveoff Status') ?></th>
                            <th><?=  ('Payment Status') ?></th>
                            <th  class="actions text-center hide_print"><?=  ('View | Pdf') ?></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0; foreach ($recordList as $city):
                            
                        ?>  
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= $city->invoice_no; ?></td> 
                            <td>
                                <?php 
                                if ($city->waveoff_status=='1') {?>
                                    <span class="badge bg-green">Yes</span>
                                <?php   
                                }
                                else
                                {?>
                                    <span class="badge bg-red">No</span>
                                <?php    
                                }
                                ?>
                            </td> 
                            <td>
                                <?php 
                                if ($city->payment_status=='yes') {?>
                                    <span class="badge bg-green">Yes</span>
                                <?php   
                                }
                                else
                                {?>
                                    <span class="badge bg-red">No</span>
                                <?php    
                                }
                                ?>
                            </td>
                            <td  class="actions text-center hide_print"><?= $this->Html->link('<i class="fa fa-search"></i>',['controller'=>'Invoices','action' => 'view', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-info','target'=>'_blank'));?></td> 
                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>     
                </table>
            </div>
        <?php
                }
            
            }
            ?>
            </div> 
        </div>  
    </div>
</div>
</section>
<?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?> 
<script>
jQuery(".loadingshow").submit(function(){
    jQuery("#loader-1").show();
}); 
$(document).ready(function() {
    
    $(document).on('change','.hello',function(){
        var selected = $('option:selected', this).val();

        if(selected == 'driver'){
            $('.lname').html('Driver Name');
            $('.dmobile').html('Driver Mobile No.:');
            $('.qualification').html('Driver Qualification:');
        }
        else{
            $('.lname').html('Employee Name');  
            $('.dmobile').html('Employee Mobile No');  
            $('.qualification').html('Employee Qualification:');  
        }     
    });
         
    $.validator.addMethod("specialChars", function( value, element ) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = value;

        if (!regex.test(key)) {
           return false;
        }
        return true;
    }, "please use only alphabetic characters");
     $("#CityForm").validate({ 
        rules: {
            name: {
                required: true, 
            }, 
             
             
        },
        
        submitHandler: function () {
            $("#submit_member").attr('disabled','disabled');
            $("#loader-1").show();
            form.submit();
        }
    }); 

});
</script>

