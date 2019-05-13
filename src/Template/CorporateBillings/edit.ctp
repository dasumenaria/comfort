<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Edit Corporate Billing
            </div>
            <?= $this->Form->create($corporateBilling,['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body" >
                <div class="row">
                    <div class="">
                        <div class="col-md-12">
                         <div class="col-md-12 space">
                                <div>
                                    <b>CUSTOMER DETAIL:</b>
                                </div>
                            <div class="col-md-6 space">
                                
                                <label class="control-label col-sm-4">Customer Name</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('customer_id    ' , ['label' => false,'class' => 'select2  supplierType','empty'=>'Select...','options'=>$customerList,'autocomplete'=>'off']); ?>
                                </div>
                            </div> 
                            <div class="col-md-6 space">
                                <label class="control-label col-sm-4">  Name of Guest</label>
                                <div class="col-sm-8">
                                
                               <?php echo $this->Form->control('guest_name',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Name of Guest','autocomplete'=>'off']); ?> 
                                
                                </div>
                            </div>
                        </div> 
                            

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">REF. </label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('ref',['label' => false,'class' => 'form-control firstupercase','autocomplete'=>'off','type'=>'text']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">  Date</label>
                                <div class="col-sm-8">
                                <?php echo $this->Form->control('date',['label' => false,'class' => 'form-control datepickers firstupercase','placeholder'=>'dd-mm-yy','type'=>'text','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                                </div>
                            </div>
                        </div> 

                        <div class="col-md-12 space">
                            <b>SERVICES DETAIL:</b>
                        </div>

                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-hover table-condensed">
                             <thead>
                                <tr style="table-layout: fixed;">
                                    <th style="width: 12%"><?=  ('DATE') ?></th> 
                                    <th><?=  ('SERVICE NAME/HOURS') ?></th>
                                    <th style="width: 13%;"><?=  ('RATE (RS)') ?></th>
                                    <th style="width: 12%;"> <?=  ('NO. OF DAYS') ?></th>
                                    <th><?=  (' TAXI No. / GUIDE Tkt. No.') ?></th>
                                    <th><?=  ('Amount') ?></th>
                                    <th class="actions text-center"><?= __('Action') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <?php echo $this->Form->control('service_date',['label' => false,'class' => 'form-control datepickers firstupercase','placeholder'=>'dd-mm-yy','type'=>'text','data-date-format'=>'dd-mm-yyyy','autocomplete'=>'off']); ?> 
                                    </td>
                                    <td>
                                    <?php echo $this->Form->control('service',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Service Name','autocomplete'=>'off']); ?> 
                                    </td>
                                    <td>
                                     <?php echo $this->Form->control('rate',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Rate','autocomplete'=>'off']); ?> 
                                    </td>
                                    <td>
                                     <?php echo $this->Form->control('no_of_days',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'No. of Days','autocomplete'=>'off']); ?> 
                                    </td>
                                    <td>
                                    
                                    <?php echo $this->Form->control('taxi_no',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'TAXI/Guide No.','autocomplete'=>'off']); ?> 
                                    </td>
                                    <td>
                                        <?php echo $this->Form->control('amount',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Amount','autocomplete'=>'off']); ?> 
                                    </td>

                                    <td>
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                    
                                <tr>
                                   <td colspan="4"></td>
                                   <th>TOTAL AMOUNT</th>
                                   <td>
                                    <?php echo $this->Form->control('tot_amnts',['label' => false,'class' => 'form-control  firstupercase','autocomplete'=>'off','readonly']); ?> 
                                   </td>
                                </tr>

                                <tr>
                                    <td colspan="4"></td>

                                    <td>
                                        <b style="float: left;">SERVICE TAX</b>
                                        <?php echo $this->Form->control('tax',['label' => false,'class' => 'form-control  firstupercase','autocomplete'=>'off','style'=>'width:27%; float:right','placeholder'=>'%']); ?> 
                                    </td>

                                    <td>
                                        
                                        <?php echo $this->Form->control('service_tax',['label' => false,'class' => 'form-control  firstupercase','autocomplete'=>'off','readonly']); ?> 
                                   </td>    
                                </tr>

                                <tr>
                                    <td colspan="4"></td>
                                    <th>DISCOUNT</th>
                                    <td>
                                        <?php echo $this->Form->control('discount',['label' => false,'class' => 'form-control  firstupercase','autocomplete'=>'off']); ?> 
                                   </td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <th>NET AMOUNT</th>
                                   
                                    <td>
                                        <?php echo $this->Form->control('net_amnt',['label' => false,'class' => 'form-control  firstupercase','autocomplete'=>'off','readonly']); ?> 
                                   </td>
                                    
                                </tr>

                                <tr>
                                    <td colspan="7">
                                        <?php echo $this->Form->button('Add Row',['class'=>'btn btn-warning fa fa-print','id'=>'submit_member','id'=>'addMore']); ?>
                                        
                                        <?php echo $this->Form->button('Save & Print',['class'=>'btn btn-primary fa fa-print','id'=>'submit_member']); ?>

                                        <?php echo $this->Form->button('Reset All',['class'=>'btn btn-default fa fa-retweet','type'=>'reset']); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div> 
            </div>
        <div class="box-footer">
            <div class="row">
                
            </div>
        </div>
        <?= $this->Form->end() ?>
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
