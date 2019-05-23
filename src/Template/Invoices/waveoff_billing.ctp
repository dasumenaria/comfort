
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
            <div class="box-header with-border hide_print">
                <i class="fa fa-plus"></i>Waveoff Billing
            </div>
            <?php
            if($RecordShow != 1)
            {
                ?>
            <?= $this->Form->create('df',['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body" >
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
            <div id='main_data'>
                <table class="table table-bordered table-striped" border="1">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('Duty Slip No.') ?></th> 
                            <th><?=  ('Invoice No.') ?></th> 
                            <th><?=  ('Date') ?></th> 
                            <th><?=  ('Customer Name') ?></th>  
                            <th><?=  ('Reason') ?></th>
                            <th><?=  ('login Name') ?></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0; foreach ($waveoffds as $city):
                        $dsData=array();
                        foreach ($city->invoice_details as $value) {
                        	$dsData[]=$value->duty_slip_id;
                        }
                        $dutyslips = implode(', ',$dsData)
                        ?>  
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h($dutyslips) ?></td> 
                            <td><?= h($city->invoice_no) ?></td> 
                            <td><?= h(date('d-M-Y',strtotime($city->date))) ?></td> 
                            <td><?= h(@$city->customer->name) ?></td>  
                            <td><?= h(@$city->waveoff_reason) ?></td>
                            <td><?= h(@$city->login->name) ?></td>
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

