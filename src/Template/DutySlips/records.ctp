
<section class="content">
    <?php
            if($RecordShow ==1)
            { ?>
                <div>
                    <a href="" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    
                    <button class="btn btn-warning" onclick="window.print();"><i class="fa fa-print" aria-hidden="true"></i></button>
                    
                    <button class="btn btn-danger "><i class="fa fa-download " aria-hidden="true"></i></button>
                </div>
                <span class="help-block"></span>
                    <?php
            }
            ?>
<div class="row">

    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i>Records
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
                                <label class="control-label col-sm-4">Counter Name:</label>
                                <div class="col-sm-4">
                                   
                                <?php echo $this->Form->control('date_from',['label' => false,'class' => 'form-control select2','options'=>$counterList,'empty'=>'Select...','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                        </div>
                            
                        <div class="col-md-12 space">
                            <div class="col-md-12 ">
                                <label class="control-label col-sm-4">Login Name:</label>
                                <div class="col-sm-4">
                                   
                                <?php echo $this->Form->control('date_from',['label' => false,'class' => 'form-control select2','options'=>$login,'empty'=>'Select...','autocomplete'=>'off']); ?>
                                </div>
                            </div> 
                    
                        </div>
                        <div class="col-md-12 space">
                            <div class="col-md-12 ">
                                <label class="control-label col-sm-4">Type:</label>
                                <div class="col-sm-4">
                                   
                                <?php 
                                    $values['1'] = 'Duty Slip';
                                    $values['0'] = 'Invoice';
                                    echo $this->Form->control('date_from',['label' => false,'class' => 'form-control select2','options'=>$values,'empty'=>'Select...','autocomplete'=>'off']); ?>
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
                
                if ($dutyslip==1) {?>
                   <table class="table table-bordered table-striped">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('DS No .') ?></th> 
                            <th><?=  ('Waveoff Status') ?></th>
                            <th><?=  ('Billing Status') ?></th>
                            <th><?=  ('View') ?></th>
                            <th><?=  ('Pdf') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0; foreach ($waveoffds as $city):
                            
                        ?>  
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h($city->id) ?></td> 
                            <td><?= h($city->customer->name) ?></td> 
                            <td><?= h($city->guest_name) ?></td>
                            <td><?= h($city->service->name) ?></td>
                            <td><?= h($city->car_type->name) ?></td>
                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                            
                    
            </table>
            <?php
                }
                else{?>

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('DS No .') ?></th> 
                            <th><?=  ('yohems Status') ?></th>
                            <th><?=  ('Billing Status') ?></th>
                            <th><?=  ('View') ?></th>
                            <th><?=  ('Pdf') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0; foreach ($waveoffds as $city):
                            
                        ?>  
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h($city->id) ?></td> 
                            <td><?= h($city->customer->name) ?></td> 
                            <td><?= h($city->guest_name) ?></td>
                            <td><?= h($city->service->name) ?></td>
                            <td><?= h($city->car_type->name) ?></td>
                            
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

