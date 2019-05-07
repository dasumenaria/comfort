<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i>Dutyslip Add
            </div>
            <?= $this->Form->create($dutySlip,['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body">

                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Billing Type</label>
                    </div>
                    <div class="col-md-4">
                        <?php
                        echo $this->Form->radio(
                        'billing_type',
                        [
                            ['value' => 'Normal Billing', 'text' => ' Normal Billing ','checked'],
                            ['value' => 'Corporate Billing', 'text' => ' Corporate Billing '],
                            
                        ],
                        ['class'=>' ']
                        ); ?>
                    </div>
                </div>
                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Customer Name</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('customer_id' , ['label' => false,'class' => 'select2  supplierType','empty'=>'Select...','options'=>$customers,'autocomplete'=>'off']); ?>
                    </div>
                </div>
                <span class="help-block"></span>  
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Guest Name</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('extra_hour_rate',['label' => false,'type'=>'text','class' => 'form-control','placeholder'=>'Guest Name','autocomplete'=>'off']); ?> 
                    </div>
                </div>
                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Mobile Number </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('mobile_no',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Mobile Number','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                    </div>
                </div>
                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Email Address</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('email_id',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Email Address','autocomplete'=>'off','type'=>'text']); ?> 
                    </div>
                </div>
                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">GST Number </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('gst_no',['label' => false,'class' => 'form-control ','placeholder'=>'GST Number','autocomplete'=>'off']); ?> 
                    </div>
                </div>
                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Photo Id </label>
                    </div>
                    <div class="col-md-4"> 
                        <?php 
                        $opt['Passport Number']='Passport Number';
                        $opt['Driving Licence']='Driving Licence';
                        $opt['EC Card']='EC Card';
                        $opt['Pan Card']='Pan Card';
                        $opt['Others']='Others';
                        echo $this->Form->control('photo_id',['label' => false,'class' => 'form-control ','placeholder'=>'GST Number','autocomplete'=>'off','options'=>$opt,'empty'=>'Select...']); ?> 
                    </div>
                </div>

                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Detail Number </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('gst_no',['label' => false,'class' => 'form-control ','placeholder'=>'Detail Number','autocomplete'=>'off']); ?> 
                    </div>
                </div> 

                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Ref. No. </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('gst_no',['label' => false,'class' => 'form-control ','placeholder'=>'Ref. No.','autocomplete'=>'off']); ?> 
                    </div>
                </div>


                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Date </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('date',['label' => false,'class' => 'form-control date-picker','placeholder'=>'DD-MM-YYYY','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                    </div>
                </div>

                <!-- <span class="help-block"></span>  
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Car</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('car_type_id' , ['label' => false,'class' => 'select2  firstupercase','empty'=>'Select...','options'=>$carTypes,'autocomplete'=>'off']); ?>
                    </div>
                </div> -->
                <span class="help-block"></span>    
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Service </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('service_id',['label' => false,'class' => 'form-control select2 firstupercase','empty'=>'Select...','options'=>$services,'autocomplete'=>'off']); ?> 
                    </div>
                </div>

                <span class="help-block"></span>    
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Rate </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('rate',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Rate','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                    </div>
                </div>
                <span class="help-block"></span>    
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">No of Days </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('minimum_chg_km',['label' => false,'class' => 'form-control  firstupercase','type'=>'text', 'placeholder'=>'No of Days','autocomplete'=>'off']); ?> 
                    </div>
                </div>
                <span class="help-block"></span>    
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">TAXI No. / GUIDE Tkt. No.</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('extra_km_rate',['label' => false,'class' => 'form-control  firstupercase','type'=>'text','placeholder'=>'TAXI No. / GUIDE Tkt. No.','autocomplete'=>'off' ]); ?> 
                    </div>
                </div>
                <span class="help-block"></span>    
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label"> Amount</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('amount',['label' => false,'class' => 'form-control  firstupercase','type'=>'text','placeholder'=>'Amount','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');",'autocomplete'=>'off']); ?> 
                    </div>
                </div>
                <span class="help-block"></span>      
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Remarks</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('remarks',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Remarks','autocomplete'=>'off']); ?> 
                    </div>
                </div>
                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Reason</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('reason',['label' => false,'type'=>'text','class' => 'form-control ','placeholder'=>'Reason','autocomplete'=>'off']); ?> 
                    </div>
                </div>
                <span class="help-block"></span> 

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
