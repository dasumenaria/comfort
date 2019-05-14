
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
            <?php echo $this->Form->hidden('customer_id' , ['label' => false,'value' => $customer_id]); ?> 
            <?php echo $this->Form->hidden('waveoff_status' , ['label' => false,'value' => 0]); ?> 
            <?php echo $this->Form->hidden('billing_status' , ['label' => false,'value' => 'no']); ?>
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
                <i class="fa fa-plus"></i>Unbilled DS
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
                                    <label class="control-label col-sm-4">Customer Name:</label>
                                    <div class="col-sm-4">
                                       
                                    <?php echo $this->Form->control('customer_id',['label' => false,'class' => 'select2 ','options'=>$opends,'empty'=>'Select...','autocomplete'=>'off']); ?> 
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="box-footer space">
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
            
        <table class="table table-bordered table-striped">
            <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('Duty Slip No .') ?></th> 
                            <th><?=  ('Car No.') ?></th>
                            <th><?=  ('Service Name') ?></th>
                            <th><?=  ('Customer Name') ?></th>
                            <th><?=  ('Date') ?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0; foreach ($opendsList as $city):
                            
                        ?>  
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h($city->id) ?></a></td> 
                            <td><?= h(@$city->car->name) ?></td>
                            <td><?= h(@$city->service->name) ?></td>
                            <td><?= h(@$city->customer->name) ?></td> 
                            <td>
                               <?php
                               if (!empty(@$city->date)) {?>
                                   <?= h(@$city->date)?>

                                <?php
                               }
                               else
                               {
                                    echo "N/A";
                               }

                               ?> 
                                    
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>
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
