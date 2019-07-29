<style>
    body {
    font-family: 'Raleway', sans-serif !important;
    font-size: 13px !important;
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
        <span class="help-block"></span>
    <?php
    }
?>
<div class="row">

    <div class="col-md-12">
        <div class="box box-primary"> 
            
            <?php
            if($RecordShow != 1)
            {
                ?>
                <div class="box-header with-border hide_print">
                <i class="fa fa-plus"></i>Total Billing Report
            </div>
            <?= $this->Form->create('df',['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body" > 
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="col-md-12 space">
                            <div class="col-md-12 ">
                                <label class="control-label col-sm-4">Customer Name:</label>
                                <div class="col-sm-4">
                                   
                                <?php echo $this->Form->control('customer_id',['label' => false,'class' => 'select2 ','options'=>$customerlist,'empty'=>'Select...','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                        </div> 
                    </div> 
                </div>
                <div class="row">
                    <div class="">
                        <div class="col-md-12">
                        <div class="col-md-12 space">
                            <div class="col-md-12 ">
                                <label class="control-label col-sm-4">Date From:</label>
                                <div class="col-sm-4">
                                   
                                <?php echo $this->Form->control('date_from',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'DD-MM-YYYY','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                                </div>
                            </div> 
                        </div>
                            
                        <div class="col-md-12 space">
                            <div class="col-md-12 ">
                                <label class="control-label col-sm-4">Date to:</label>
                                <div class="col-sm-4">
                                <?php echo $this->Form->control('date_to',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'DD-MM-YYYY','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
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
            <?php $city_name=''; foreach ($waveoffds as $city){ if(!empty($city->invoices)){ $city_name = $city->name; } } ?>
            <div class="box-header with-border hide_print">
                <i class="fa fa-plus"></i>Result for <?= $city_name ?> Total Billing From <?php echo date('d-m-Y',strtotime($date_from)); ?> To <?php echo date('d-m-Y',strtotime($date_to)); ?>
            </div>
            <div id='main_data'>
                <table class="table table-bordered table-striped" border="1">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th>SL.</th>
                            <th>Date</th>
                            <th>In.No.</th>
                            <th>Ds.No.</th>
                            <th>Guest</th>
                            <th>Service</th>
                            <th>Ds.Amt</th>
                            <th>Gross</th>
                            <th>TAX</th>
                            <th>Discount</th>
                            <th>TotalAmt</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $page_no=0; 
                        $total_amount=0; 
                        foreach ($waveoffds as $city): 
                        if($city->invoices){
                            ?> 
                            <?php $x=0;
                            $count=0;
                            foreach ($city->invoices as $value) { 
                                $count = sizeof($value->invoice_details);
                                $xx=0;
                                 $count_n=0;
                             $count_b=0;
                             $count_c=0;$count_d=0;
                                            foreach ($value->invoice_details as $details) {  $xx++; 
                                ?>
                                <tr>
                                     <?php if($count_n != $count){ $count_n=$count; ?>
                                    <td rowspan="<?php echo $count; ?>" style="vertical-align: middle;"><?= ++$x?></td> 
                                    <?php }
                                      else
                                      {
                                        ?>
                                        
                                        <?php
                                      }
                                      ?>
                                      <?php if($count_d != $count){ $count_d=$count; ?>
                                    <td rowspan="<?php echo $count; ?>" style="vertical-align: middle;"><?= date('d-M-Y',strtotime($value->date));?></td>
                                    <?php }
                                      else
                                      {
                                        ?>
                                       
                                        <?php
                                      }
                                      ?>
                                      <?php if($count_b != $count){ $count_b=$count; ?>
                                    <td rowspan="<?php echo $count; ?>" style="vertical-align: middle;"><?= $value->invoice_no;?></td>
                                    <?php }
                                      else
                                      {
                                        ?>
                                       
                                        <?php
                                      }
                                      ?>
                                    
                                    
                                    
                                    <td><?= $value->invoice_no;?></td>
                                    <td><?= $details->duty_slip_id?></td>
                                    <td><?= $details->duty_slip->guest_name?></td>
                                    <td><?= $details->duty_slip->service->name?></td>
                                    <td><?= $details->duty_slip->tot_amnt?></td>
                                    <td><?= $value->total;?></td>
                                    <td><?= $value->tax;?></td>
                                    <td><?= $value->discount;?></td>
                                     <?php if($count_c != $count){ $count_c=$count; ?>
                                    <td rowspan="<?php echo $count; ?>" style="vertical-align: middle;"><?= $value->grand_total;
                                   
                                    ?></td> 
                                      <?php
                                          }
                                          else
                                          {
                                            ?>
                                        
                                            <?php
                                          }
                                          ?>  
                                </tr>
                            <?php
                            }  $total_amount+=$value->grand_total;
                             }
                        }
                        ?> 
                        <?php endforeach; ?> 
                        <tfoot>
                            <tr><th colspan="11"><?= $NumbersComponent->convertNumberToWord($total_amount);?> Only</th>
                                <th><?= $total_amount?></th>
                            </tr>
                        </tfoot>
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

