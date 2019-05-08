<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i>Employee Add
            </div>
            <?= $this->Form->create($employee,['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body" >
                <div class="row">
                    <div class="">
                        <div class="col-md-12">
                         <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Employee/Driver:</label>
                                <?php
                                $values['driver'] = 'Driver';
                                $values['employee'] = 'Employee';
                                ?>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('employee_type' , ['label' => false,'class' => 'form-control hello','options'=>$values,'autocomplete'=>'off']); ?>
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4 lname">Driver Name:</label>
                                <div class="col-sm-8">
                                
                                <?php echo $this->Form->control('name' , ['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Name','autocomplete'=>'off']); ?>
                                
                                </div>
                            </div>
                        </div> 
                            

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label dmobile col-sm-4">Driver Mobile No.:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('mobile_no',['label' => false,'class' => 'form-control    firstupercase','placeholder'=>'Mobile No.','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Present Address. :</label>
                                <div class="col-sm-8">
                                <?php echo $this->Form->control('present_add',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Present Address','type'=>'textarea','rows'=>'2','autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div> 
                        

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Father Name :</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('father_name',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Father Name','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label qualification col-sm-4">  Driver Qualification :</label>
                                <div class="col-sm-8">
                                 <?php echo $this->Form->control('qualification',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Qualification','autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div> 
                        

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Permanent Address :</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('address',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Permanent Address','type'=>'textarea','rows'=>'2','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Date of Birth:</label>
                                <div class="col-sm-8">
                                 <?php echo $this->Form->control('dob',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'dd-mm-yy','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                                </div>
                            </div>
                        </div> 
                        


                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">ESIC Number:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('esi_no',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'ESIC Number','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">PF Number:</label>
                                <div class="col-sm-8">
                                  <?php echo $this->Form->control('pf_no',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'PF Number','autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div> 
                        


                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Designation:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('designation',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Designation','autocomplete'=>'off']); ?>    
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Basic Salary:</label>
                                <div class="col-sm-8">
                                  <?php echo $this->Form->control('basicsalary',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Basic Salary','autocomplete'=>'off']); ?>
                                </div>
                            </div>
                        </div> 
                        


                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Dearness:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('dearness',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Dearness','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">House Rent:</label>
                                <div class="col-sm-8">
                                  <?php echo $this->Form->control('houserent',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'House Rent']); ?> 
                                </div>
                            </div>
                        </div> 
                        


                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Conveyance:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->control('conveyance',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Conveyance']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Phone Amount:</label>
                                <div class="col-sm-8">
                                  <?php echo $this->Form->control('phone_amnt',['label' => false,'type'=>'text','class' => 'form-control  firstupercase','placeholder'=>'Phone Amount']); ?>
                                </div>
                            </div>
                        </div> 



                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Medical Amount:</label>
                                <div class="col-sm-8">
                                    <?php 
                                echo $this->Form->control('medical_amnt' , ['label' => false,'class' => 'form-control firstupercase','placeholder'=>'Medical Amount','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Profession Tax:</label>
                                <div class="col-sm-8">
                                   <?php 
                                echo $this->Form->control('professiontax' , ['label' => false,'class' => 'form-control firstupercase','placeholder'=>'Profession Tax','autocomplete'=>'off']); ?>    
                                </div>
                            </div>
                        </div> 
                        


                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Provident Fund:</label>
                                <div class="col-sm-8">
                                   
                                <?php echo $this->Form->control('providentfund',['label' => false,'class' => 'form-control   firstupercase','placeholder'=>'Provident Fund','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">F.P.F:</label>
                                <div class="col-sm-8">
                                  
                                <?php echo $this->Form->control('fpf',['label' => false,'class' => 'form-control   firstupercase','placeholder'=>'F.P.F','autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div> 


                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">E.S.I.C:</label>
                                <div class="col-sm-8">
                                   
                                <?php echo $this->Form->control('esic',['label' => false,'class' => 'form-control   firstupercase','placeholder'=>'E.S.I.C','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Income Tax-TDS:</label>
                                <div class="col-sm-8">
                                  
                                <?php echo $this->Form->control('incometaxtds',['label' => false,'class' => 'form-control   firstupercase','placeholder'=>'Income Tax-TDS:','autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div> 

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Bank Account Number:</label>
                                <div class="col-sm-8">
                                   
                                <?php echo $this->Form->control('bank_account_number',['label' => false,'class' => 'form-control   firstupercase','placeholder'=>'Bank Account Number','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Bank Name:</label>
                                <div class="col-sm-8">
                                  
                                <?php echo $this->Form->control('bank_name',['label' => false,'class' => 'form-control   firstupercase','placeholder'=>'Bank Name','autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div> 

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Date of Joining:</label>
                                <div class="col-sm-8">
                                   
                                <?php echo $this->Form->control('driver_doj',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'dd-mm-yy','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Blood Group:</label>
                                <div class="col-sm-8">
                                  <?php

                                   $options['O+'] = 'O+';
                                   $options['A+'] = 'A+';
                                   $options['B+'] = 'B+';
                                   $options['AB+'] = 'AB+';

                                   $options['O-'] = 'O-';
                                   $options['A-'] = 'A-';
                                   $options['B-'] = 'B-';
                                   $options['AB-'] = 'AB-';
                                   echo $this->Form->control('blood_group',['label' => false,'class' => 'form-control   firstupercase','empty'=>'Select...','options'=>$options,'autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div> 
                        

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Reference Person Name:</label>
                                <div class="col-sm-8">
                                   
                                <?php echo $this->Form->control('ref_name',['label' => false,'class' => 'form-control   firstupercase','placeholder'=>'Reference Person Name:','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Licence Number</label>
                                <div class="col-sm-8">
                                  
                                <?php echo $this->Form->control('lic_no',['label' => false,'class' => 'form-control   firstupercase','placeholder'=>'Licence Number','autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Licence Issue Date:</label>
                                <div class="col-sm-8">
                                   
                                <?php echo $this->Form->control('lic_issue_date',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'dd-mm-yy','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Licence Issue Place</label>
                                <div class="col-sm-8">
                                  
                                <?php echo $this->Form->control('lic_issue_place',['label' => false,'class' => 'form-control   firstupercase','placeholder'=>'Licence Issue Place','autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Licence Expiry Date:</label>
                                <div class="col-sm-8">
                                   
                                <?php echo $this->Form->control('lic_exp_date',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'dd-mm-yy','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Badge Number:</label>
                                <div class="col-sm-8">
                                  
                                <?php echo $this->Form->control('badge_no',['label' => false,'class' => 'form-control   firstupercase','placeholder'=>'Badge Number','autocomplete'=>'off']); ?> 
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 space">
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Date Of Leaving:</label>
                                <div class="col-sm-8">
                                   
                                <?php echo $this->Form->control('dob_leave',['label' => false,'class' => 'form-control  datepickers','type'=>'text','placeholder'=>'dd-mm-yy','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                                </div>
                            </div> 
                            <div class="col-md-6 ">
                                <label class="control-label col-sm-4">Reason Of Leaving:</label>
                                <div class="col-sm-8">
                                  
                                <?php echo $this->Form->control('leave_reason',['label' => false,'class' => 'form-control   firstupercase','placeholder'=>'Reason Of Leaving','autocomplete'=>'off']); ?> 
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
