<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Edit Customer
            </div>
            <?= $this->Form->create($customer,['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body" >
                <div class="row">
                    <div class="">
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label class="control-label">Customer Name <span class="required" aria-required="true">*</span></label>
                                <?php echo $this->Form->control('name' , ['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Customer Name','autocomplete'=>'off']); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Contact Person Name <span class="required" aria-required="true">*</span></label>
                                <?php echo $this->Form->control('contact_person' , ['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Contact Person Name','autocomplete'=>'off']); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Office No.</label>
                                <?php echo $this->Form->control('office_no',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Enter Office No.','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"]); ?> 
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label class="control-label">Residence No.</label>
                                <?php echo $this->Form->control('residence_no',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Residence No.','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"]); ?> 
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Mobile No.</label>
                                <?php echo $this->Form->control('mobile_no',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Mobile No.','autocomplete'=>'off','maxlength'=>10,'minlength'=>10,'oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"]); ?> 
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label"> Customer Email Id</label>
                                <?php echo $this->Form->control('email_id',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>' Customer Email Id','autocomplete'=>'off']); ?> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label class="control-label">Customer Fax No.</label>
                                <?php echo $this->Form->control('fax_no',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Customer Fax No.','autocomplete'=>'off']); ?> 
                            </div>
                             
                            <div class="form-group col-md-4">
                                <label class="control-label">Customer Opening Balance</label>
                                <?php echo $this->Form->control('opening_bal',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Customer Opening Balance','autocomplete'=>'off']); ?> 
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Credit Debit</label>
                                <?php 
                                $options['credit']='Credit';
                                $options['debit']='Debit';
                                echo $this->Form->control('credit_debit',['label' => false,'type'=>'select','class' => 'form-control','empty'=>'select...','options'=>$options]); ?>
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label class="control-label">Service Tax Reg Number</label>
                                <?php echo $this->Form->control('srvctaxregno',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Service Tax Reg Number']); ?> 
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Credit Limit</label>
                                <?php echo $this->Form->control('creditlimit',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Credit Limit','autocomplete'=>'off']); ?> 
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Service Tax Applicability</label>
                                <?php 
                                $option['yes']='Yes';
                                $option['no']='No';
                                echo $this->Form->control('servicetax_status',['label' => false,'type'=>'select','class' => 'form-control  firstupercase','empty'=>'select...','options'=>$option]); ?> 
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label class="control-label">Pan Number</label>
                                <?php echo $this->Form->control('panno',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Pan Number','autocomplete'=>'off']); ?> 
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Customer Address</label>
                                <?php echo $this->Form->control('address',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Address']); ?> 
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Bill to Bill</label>  
                                <?php 
                                 $statusArray['no']='No';
                                 $statusArray['yes']='Yes';
                                echo $this->Form->control('bill_to_bill',['label' => false,'type'=>'select','class' => 'form-control','options'=>$statusArray,'value'=>'no']); ?> 
                            </div>    
                        </div>  
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label class="control-label">GST Number</label>
                                <?php echo $this->Form->control('gst_number',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'GST Number']); ?> 
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">State</label>  
                                <?php 
                                foreach ($statesList as $key => $value) {  
                                    $stateArray[$value]=$value;
                                }
                                echo $this->Form->control('state',['label' => false,'type'=>'select','class' => 'form-control  select2','empty'=>'Select...','options'=>$stateArray,'value'=>$customer->state]); ?> 
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">City</label>
                                <?php echo $this->Form->control('city',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'City']); ?> 
                            </div>
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
            contact_person: {
                required: true, 
            }, 
            mobile_no: {
                required: true,                 
            }
        },
        
        submitHandler: function () {
            $("#submit_member").attr('disabled','disabled');
            $("#loader-1").show();
            form.submit();
        }
    }); 

});
</script>
