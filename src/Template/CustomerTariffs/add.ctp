 
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i>Customer Tariff Rate
            </div>
            <?= $this->Form->create($customerTariff,['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body" >
                <div class="row">
                    <div class="">
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label class="control-label">Customer Name <span class="required" aria-required="true">*</span></label>
                                <?php echo $this->Form->control('supplier_id' , ['label' => false,'class' => 'select2  supplierType','empty'=>'Select...','options'=>$customers,'autocomplete'=>'off']); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Car: <span class="required" aria-required="true">*</span></label>
                                <div class="NewSubData">
                                <?php echo $this->Form->control('car_type_id' , ['label' => false,'class' => 'select2  firstupercase','empty'=>'Select...','options'=>$carTypes,'autocomplete'=>'off']); ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label">Service</label>
                                <?php echo $this->Form->control('service_id',['label' => false,'class' => 'form-control select2 firstupercase','empty'=>'Select...','options'=>$services,'autocomplete'=>'off']); ?> 
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label class="control-label">Rate</label>
                                <?php echo $this->Form->control('rate',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Rate','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label">Charged KM </label>
                                <?php echo $this->Form->control('minimum_chg_km',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Charged KM','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label">Extra KM Rate</label>
                                <?php echo $this->Form->control('extra_km_rate',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Extra KM Rate.','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"]); ?> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label class="control-label"> Minimum Charges Hourly</label>
                                <?php echo $this->Form->control('minimum_chg_hourly',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>' Minimum Charges Hourly','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');",'autocomplete'=>'off']); ?> 
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Extra Hour Rate</label>
                                <?php echo $this->Form->control('extra_hour_rate',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Extra Hour Rate','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                            </div>
                        </div>
                    </div> 
                </div>
            </fieldset>
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
            mobile_no: {
                required: true,
                digits: true,
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
