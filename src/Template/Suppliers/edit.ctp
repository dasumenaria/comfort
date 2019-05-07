<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Add Supplier
            </div>
            <?= $this->Form->create($supplier,['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body" >
                <div class="row">
                    <div class="">
                        <div class="col-md-12">
                         <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Supplier Type: </label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('supplier_type_id' , ['label' => false,'class' => 'select2  supplierType','empty'=>'Select...','options'=>$supplierTypes,'autocomplete'=>'off']); ?>
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Supplier Category:</label>
                                <div class="col-sm-8">
                                <div class="NewSubData">
                                <?php echo $this->Form->control('supplier_type_sub_id' , ['label' => false,'class' => 'select2  firstupercase','empty'=>'Select...','options'=>'','autocomplete'=>'off']); ?>
                                </div>
                                </div>
                            </div>
                        </div> 
                            

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Supplier Name: </label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('name',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Supplier Name.','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Address :</label>
                                <div class="col-sm-8">
                                <?php echo $this->Form->control('address',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Address','type'=>'textarea','rows'=>'2','autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div> 
                        

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Contact Name.:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('contact_name',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Contact Name.','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Office Number:</label>
                                <div class="col-sm-8">
                                 <?php echo $this->Form->control('office_no',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Office Number.','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"]); ?> 
                                </div>
                            </div>
                        </div> 
                        

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Residence Number :</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('residence_no',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>' Residence Number','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');",'autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Mobile Number:</label>
                                <div class="col-sm-8">
                                 <?php echo $this->Form->control('mobile_no',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Mobile Number','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')",'maxlength'=>10,'minlength'=>10]); ?> 
                                </div>
                            </div>
                        </div> 
                        


                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Email Id:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('email_id',['label' => false,'type'=>'email','class' => 'form-control  firstupercase','placeholder'=>'Email Id','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Fax Number::</label>
                                <div class="col-sm-8">
                                  <?php echo $this->Form->control('fax_no',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Fax No.','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')",'autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div> 
                        


                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Opening Balance:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('opening_bal',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Opening Balance','autocomplete'=>'off']); ?>    
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Closeing Balance:</label>
                                <div class="col-sm-8">
                                  <?php echo $this->Form->control('close',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Closeing Balance','autocomplete'=>'off','disabled']); ?>
                                </div>
                            </div>
                        </div> 
                        


                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Due Days:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('due_days',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Due Days','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Service Tax Number:</label>
                                <div class="col-sm-8">
                                  <?php echo $this->Form->control('servicetax_no',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Service Tax  Number']); ?> 
                                </div>
                            </div>
                        </div> 
                        


                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Pan Number:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('pan_no',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Pan Number']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Bank Account Number:</label>
                                <div class="col-sm-8">
                                  <?php echo $this->Form->control('account_no',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Account Number']); ?>
                                </div>
                            </div>
                        </div> 



                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Service Tax Applicability:</label>
                                <div class="col-sm-8">
                                    <?php 
                                $option['yes']='Yes';
                                $option['no']='No';
                                echo $this->Form->control('servicetax_status' , ['label' => false,'class' => 'form-control firstupercase','empty'=>'Select...','options'=>$option,'autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <!-- <label class="control-label col-sm-4">Copy Tariff Rate From:</label>
                                <div class="col-sm-8">
                                   <?php 
                               // echo $this->Form->control('cop_custtariff' , ['label' => false,'class' => 'select2  firstupercase','empty'=>'Select...','options'=>$copysupplier,'autocomplete'=>'off']); ?>    
                                </div> -->
                                <label class="control-label col-sm-4">Credit/Debit:</label>
                                <div class="col-sm-8">
                                    <?php
                                $value['credit'] = 'Credit';
                                $value['debit']= 'Debit';
                                ?>
                                <?php echo $this->Form->control('credit_debit',['label' => false,'class' => 'form-control   firstupercase','empty'=>'Select...','options'=>$value,'autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div> 
                        


                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Bill to Bill:</label>
                                <div class="col-sm-8">
                                  <?php
                                $values['no'] = 'No';
                                $values['yes']= 'Yes';
                                ?>
                                <?php echo $this->Form->control('bill_to_bill',['label' => false,'class' => 'form-control   firstupercase','options'=>$values,'autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                
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
    
    $(document).on('change','.supplierType',function(){
        var selected = $('option:selected', this).val();

        var url='<?php echo $this->Url->build(['controller'=>'Suppliers','action'=>'autoFetchSubType']) ?>';
            url=url+'?supplier_type_id='+selected;
        $.ajax({
            url: url,
        }).done(function(response) {
            $('.NewSubData').html(response);
            $('.select2').select2();
        });
         
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
