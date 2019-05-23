<style type="text/css">
.test label {
    padding:10px;
}
</style>
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
                    'controller' => 'Invoices',
                    'action' => 'excel'
                ]]); ?>  
            <?php echo $this->Form->control('pdfData' , ['label' => false,'value' => '','type'=>'textarea','id'=>'pdfData','style'=>'display:none']); ?> &nbsp;
            <?php echo $this->Form->button('<i class="fa fa-download"></i>',['class'=>'btn btn-danger','title'=>'Click here to download Excel']); ?> 
            <?= $this->Form->end() ?>
            </td>
        </tr>
    </table>
<?php } ?>
<div class="row">

    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border hide_print">
                <i class="fa fa-plus"></i>Pending Dues
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
                                <label class="control-label col-sm-4">Type:</label>
                                <div class="col-sm-4 test">   
                                <?php
                                    echo $this->Form->radio(
                                    'billing_type',
                                    [
                                        ['value' => 'Invoices', 'text' => ' Invoice ','checked'],
                                     ['value' => 'DutySlips', 'text' => ' Duty Slip '],   
                                    ],
                                 ['class'=>'']
                                ); ?>
                                </div>
                            </div> 
                        </div>
                            
                        <div class="col-md-12 space">
                            <div class="col-md-12 ">
                                <label class="control-label col-sm-4">Customer Name:</label>
                                <div class="col-sm-4">
                                   
                                <?php echo $this->Form->control('customer_id',['label' => false,'class' => 'form-control select2','options'=>$customerList,'empty'=>'Select...','autocomplete'=>'off']); ?>
                                </div>
                            </div> 
                    
                        </div>
                        <div class="col-md-12 space">
                            <div class="col-md-12 ">
                                <label class="control-label col-sm-4">Date From:</label>
                                <div class="col-sm-4">
                                   
                                <?php 
                                    echo $this->Form->control('date_from',['label' => false,'class' => 'form-control datepickers','type'=>'text','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy','placeholder'=>'DD-MM-YYYY']); ?>
                                </div>
                            </div> 
                    
                        </div>
                        <div class="col-md-12 space">
                            <div class="col-md-12 ">
                                <label class="control-label col-sm-4">Date to:</label>
                                <div class="col-sm-4">
                                   
                                <?php 
                                    echo $this->Form->control('date_to',['label' => false,'class' => 'form-control datepickers','type'=>'text','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy','placeholder'=>'DD-MM-YYYY']); ?>
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
            echo"<div id='main_data'>";   
            if ($billing_type == 'DutySlips') {?>
               <table class="table table-bordered table-striped" border="1">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('Duty Slip No .') ?></th> 
                            <th><?=  ('Customer Name') ?></th>
                            <th><?=  ('Date') ?></th>
                            <th><?=  ('Grand Total') ?></th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0; foreach ($recordList as $city): ?>  
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?php echo $this->Html->link('&nbsp;'.$city->id.'&nbsp;',['action' => 'viewDutyslip', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-success','target'=>'_blank','title'=>'View Duty Slip')); ?></td> 
                            <td><?= $city->customer->name?></td> 
                            <td><?= date('d-M-Y',strtotime($city->date));?></td>
                            <td><?= $city->tot_amnt;?></td> 
                        </tr>
                        <?php endforeach; ?>
                    </tbody>  
                </table>
                <?php
            }
            else{?>

                <table class="table table-bordered table-striped"  border="1">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('Invoice No.') ?></th> 
                            <th><?=  ('Customer Name') ?></th>
                            <th><?=  ('Date') ?></th>
                            <th><?=  ('Grand Total') ?></th>
                            <th><?=  ('Recived Amt.') ?></th>
                            <th><?=  ('Due Amt.') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0; foreach ($recordList as $city):
                        $refDetails = $DateConvert->refDetails($city->id);     
                        ?>  
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?php echo $this->Html->link('&nbsp;'.$city->invoice_no.'&nbsp;',['controller'=>'Invoices','action' => 'view', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-success','target'=>'_blank','title'=>'View Invoice')); ?></td> 
                            <td><?= $city->customer->name?></td> 
                            <td><?= date('d-M-Y',strtotime($city->date));?></td>
                            <td><?= $city->grand_total;?></td>
                            <td></td>
                            <td></td> 
                        </tr>
                        <?php endforeach; ?>
                    </tbody>    
            </table>
        <?php
                }
            
            }
            ?>
            </div> 
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
    $('#pdfData').html($('#main_data').html());
});
</script>

