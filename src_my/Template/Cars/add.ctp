<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Add Car
            </div>
            <?= $this->Form->create($car,['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body" >
                <div class="row">
                    <div class="">
                        <div class="col-md-12">
                         <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Car: </label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('car_type_id' , ['label' => false,'class' => 'select2  supplierType','empty'=>'Select...','options'=>$carTypes,'autocomplete'=>'off']); ?>
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Vehicle Number:</label>
                                <div class="col-sm-8">
                                
                               <?php echo $this->Form->control('name',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Vehicle Number','autocomplete'=>'off']); ?> 
                                
                                </div>
                            </div>
                        </div> 
                            

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Supplier Name: </label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('supplier_id',['label' => false,'class' => 'form-control select2  firstupercase','options' => $suppliers,'empty'=>'Select...','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">  Engine Number:</label>
                                <div class="col-sm-8">
                                <?php echo $this->Form->control('engine_no',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Engine Number','type'=>'text','autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div> 
                        
                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Chasis Number:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('chasis_no',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Chasis Number','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">RTO Tax Date:</label>
                                <div class="col-sm-8">
                                 <?php echo $this->Form->control('rto_tax_date',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'dd-mm-yy','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                                </div>
                            </div>
                        </div> 
                        

                       <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Insurance Starting Date:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('insurance_date_from',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'dd-mm-yy','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">  Insurance Ending Date:</label>
                                <div class="col-sm-8">
                                 <?php echo $this->Form->control('insurance_date_to',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'dd-mm-yy','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                                </div>
                            </div>
                        </div> 
                        
                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Authorization Detail Date:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('authorization_date',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'dd-mm-yy','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Permit Date:</label>
                                <div class="col-sm-8">
                                  <?php echo $this->Form->control('permit_date',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'dd-mm-yy','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                                </div>
                            </div>
                        </div> 
                        
                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Fitness Date:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('fitness_date',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'dd-mm-yy','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?>     
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">PUC Date:</label>
                                <div class="col-sm-8">
                                  <?php echo $this->Form->control('puc_date',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'dd-mm-yy','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?>     
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
                            <?php echo $this->Form->button('Submit',['class'=>'btn btn-primary','id'=>'submit_member']); ?>
                        </div>
                    </div>
                </center>       
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
