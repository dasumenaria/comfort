
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
                        'action' => 'reportexcel'
                    ]]); ?>  
                <?php echo $this->Form->hidden('waveoff_status' , ['label' => false,'value' =>1]); ?> 
                <?php echo $this->Form->hidden('date_to' , ['label' => false,'value' => $date_to]); ?> 
                <?php echo $this->Form->hidden('date_from' , ['label' => false,'value' => $date_from]); ?>
                &nbsp;<?php echo $this->Form->button('<i class="fa fa-download"></i>',['class'=>'btn btn-danger','title'=>'Click here to download Excel']); ?> 
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
                <i class="fa fa-plus"></i>Waveoff DS
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
            <div class="box-body" >
                <table class="table table-bordered table-condensed" id="example">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('DS No .') ?></th> 
                            <th><?=  ('Customer Name') ?></th>
                            <th><?=  ('Guest Name') ?></th>
                            <th><?=  ('Service') ?></th>
                            <th><?=  ('Car') ?></th>
                            <th><?=  ('Car No.') ?></th>
                            <th><?=  ('Opening KM') ?></th>
                            <th><?=  ('Closing KM') ?></th>
                            <th><?=  ('Reason') ?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0; foreach ($waveoffds as $city):
                        ?>  
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h($city->id) ?></td> 
                            <td><?= h(@$city->customer->name) ?></td> 
                            <td><?= h(@$city->guest_name) ?></td>
                            <td><?= h(@$city->service->name) ?></td>
                            <td><?= h(@$city->car_type->name) ?></td>
                            <td><?= h(@$city->car->name) ?></td>
                            <td><?= h(@$city->opening_km)?></td>
                            <td><?= h(@$city->closing_km)?></td>
                            <td><?= h(@$city->waveoff_reason) ?></td>
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

