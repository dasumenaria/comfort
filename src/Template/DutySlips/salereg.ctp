
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
                <i class="fa fa-plus"></i>Sales Registrar
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
            else{ ?>
                
                <div id='main_data'>
                   <table class="table table-bordered table-striped" border="1">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('Customer Name.') ?></th> 
                            <th><?=  ('Date') ?></th>
                            <th><?=  ('Invoice No') ?></th>
                            <th><?=  ('Other Charges') ?></th>
                            <th><?=  ('Total Amount') ?></th>
                            <th><?=  ('Discount') ?></th>
                            <th><?=  ('TAX') ?></th>
                            <th><?=  ('Grand Total') ?></th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0; foreach ($recordList as $city): 
                        if($city->invoices){
                            ?> 
                            <tr style="background-color:#eee;">
                                <th style="text-align:center" colspan="10">Customer: <?= $city->name?></th>
                            </tr>
                            <?php $x=0;
                            foreach ($city->invoices as $value) {
                                $otherCharge= 0;
                                foreach ($value->invoice_details as $daataa) {

                                   $otherCharge+=$daataa->duty_slip->extra_chg;
                                   $otherCharge+=$daataa->duty_slip->permit_chg;
                                   $otherCharge+=$daataa->duty_slip->parking_chg;
                                   $otherCharge+=$daataa->duty_slip->otherstate_chg;
                                   $otherCharge+=$daataa->duty_slip->guide_chg ;
                                   $otherCharge+=$daataa->duty_slip->misc_chg ;
                                   $otherCharge+=$daataa->duty_slip->fuel_hike_chg ;
                                } 
                                ?>
                                <tr>
                                    <td><?= ++$x?></td>
                                    <td><?= $city->name;?></td>
                                    <td><?= date('d-M-Y',strtotime($value->date));?></td>
                                    <td><?= $value->invoice_no;?></td>
                                    <td><?= $otherCharge;?></td>
                                    <td><?= $value->total;?></td>
                                    <td><?= $value->discount;?></td>
                                    <td><?= $value->tax;?></td>
                                    <td><?= $value->grand_total;?></td>  
                                </tr>
                            <?php
                            }
                        }
                        ?> 
                        <?php endforeach; ?> 
                    </tbody>  
            </table>
             </div> 
            <?php
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
    $('#pdfData').html($('#main_data').html());
});
</script>

