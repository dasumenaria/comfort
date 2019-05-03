<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Add Customer
            </div>
            <?= $this->Form->create($customer,['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body" >
                <div class="row">
                    <div class="">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="control-label">Customer Name <span class="required" aria-required="true">*</span></label>
                                <?php echo $this->Form->control('name' , ['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Customer Name','autocomplete'=>'off']); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Contact Person Name <span class="required" aria-required="true">*</span></label>
                                <?php echo $this->Form->control('email' , ['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Contact Person Name','autocomplete'=>'off']); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="control-label">Office No.</label>
                                <?php echo $this->Form->control('phonenumber',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Enter Office No.','autocomplete'=>'off','maxlength'=>10,'minlength'=>10]); ?> 
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Residence No.</label>
                                <?php echo $this->Form->control('password',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Residence No.','autocomplete'=>'off']); ?> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="control-label">Mobile No.</label>
                                <?php echo $this->Form->control('latitude',['label' => false,'type'=>'number','class' => 'form-control  firstupercase','placeholder'=>'Mobile No.','autocomplete'=>'off']); ?> 
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label"> Customer Email Id</label>
                                <?php echo $this->Form->control('longitude',['label' => false,'type'=>'number','class' => 'form-control  firstupercase','placeholder'=>' Customer Email Id','autocomplete'=>'off']); ?> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="control-label">Customer Fax No.</label>
                                <?php echo $this->Form->control('rating',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Customer Fax No.','autocomplete'=>'off']); ?> 
                            </div>
                             
                            <div class="form-group col-md-6">
                                <label class="control-label">Customer Opening Balance</label>
                                <?php echo $this->Form->control('rating',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Customer Opening Balance','autocomplete'=>'off']); ?> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="control-label">Customer Closing Balance</label>
                                <?php echo $this->Form->control('rating',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Customer Closing Balance','autocomplete'=>'off']); ?> 
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Service Tax Reg Number</label>
                                <?php echo $this->Form->control('address',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Service Tax Reg Number']); ?> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="control-label">Credit Limit</label>
                                <?php echo $this->Form->control('rating',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Credit Limit','autocomplete'=>'off']); ?> 
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Service Tax Applicability</label>
                                <?php 
                                $option[]='Yes';
                                $option[]='No';
                                echo $this->Form->control('address',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','empty'=>'select...','options'=>$option]); ?> 
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="control-label">Pan Number</label>
                                <?php echo $this->Form->control('rating',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Pan Number','autocomplete'=>'off']); ?> 
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Customer Address</label>
                                <?php echo $this->Form->control('address',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Service Tax Applicability']); ?> 
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="control-label">Copy Tariff Rate From</label>
                                <?php echo $this->Form->control('rating',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Copy Tariff Rate From','autocomplete'=>'off']); ?> 
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">GST Number</label>
                                <?php echo $this->Form->control('address',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'GST Number']); ?> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="control-label">State</label>
                                <?php echo $this->Form->control('rating',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Copy Tariff Rate From','autocomplete'=>'off']); ?> 
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">City</label>
                                <?php echo $this->Form->control('city',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'City']); ?> 
                            </div>
                        </div> 
                    </div>
                </div> 
            </div>
        </fieldset>
        <div align="center">
            <button type="submit" class="btn btn-primary">Submit
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
            phonenumber: {
                required: true,
                digits: true,
            }, 
            password: {
                required: true,                 
            },
            email: {
                required: true, 
            },
            rating: {
                required: true, 
            },
            logo: {
                required: true, 
            },
            store_image: {
                required: true, 
            },
            address: {
                required: true, 
            }, 
            latitude: {
                required: true, 
            }, 
            longitude: {
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
