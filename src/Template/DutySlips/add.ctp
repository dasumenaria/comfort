<?php
$ldrview = $auth->User('ldrview'); 
?>
<style type="text/css">
.test label {
    padding:10px;
}
label{
    line-height: 35px;
}
</style>
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i>Dutyslip Add
            </div>
            <?= $this->Form->create($dutySlip,['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body">
                <?php 
                if($ldrview == 'Yes'){ ?>
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Billing Type</label>
                    </div>
                    <div class="col-md-4 test">
                        <?php
                        echo $this->Form->radio(
                        'billing_type',
                        [
                            ['value' => 'Normal Billing', 'text' => ' Normal Billing ','checked','onClick'=>'HideShowSection(this.value)'],
                            ['value' => 'Corporate Billing', 'text' => ' Corporate Billing ','onClick'=>'HideShowSection(this.value)'],   
                        ],
                        ['class'=>'']
                        ); ?>
                    </div>
                </div>
                <?php }
                else{
                    echo $this->Form->hidden('billing_type',['label' => false,'value'=>'Normal Billing']);  
                }
                ?>
                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Customer Name</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('customer_id' , ['label' => false,'class' => 'select2  getGST','empty'=>'Select...','options'=>$customers,'autocomplete'=>'off']); ?>
                        <label id="customer-id-error" class=" " for="customer-id"> </label>
                    </div>
                </div>
                <span class="help-block"></span>  
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Guest Name</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('guest_name',['label' => false,'type'=>'texta','class' => 'form-control','placeholder'=>'Guest Name','autocomplete'=>'on','required']); ?> 
                    </div>
                </div>
                <span class="help-block"></span>  
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Reporting Address</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('reporting_address',['label' => false,'type'=>'text','class' => 'form-control','placeholder'=>'Reporting Address','autocomplete'=>'off']); ?> 
                    </div>
                </div>
                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Mobile Number </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('mobile_no',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Mobile Number','autocomplete'=>'off']); ?> 
                    </div>
                </div>
                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Email Address</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('email_id',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Email Address','autocomplete'=>'on','type'=>'email']); ?> 
                    </div>
                </div>
                <span class="help-block"></span> 
                <div class="row container" id="gst_input" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">GST Number </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('gst_no',['label' => false,'class' => 'form-control ','placeholder'=>'GST Number','autocomplete'=>'on','type'=>'texte']); ?> 
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
                        echo $this->Form->control('photo_id',['label' => false,'class' => 'form-control ','autocomplete'=>'off','options'=>$opt,'empty'=>'Select...']); ?> 
                    </div>
                </div>

                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Detail Number </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('detail_no',['label' => false,'class' => 'form-control ','placeholder'=>'Detail Number','autocomplete'=>'off']); ?> 
                    </div>
                </div> 
                <div class="NormalBilling">
                    <span class="help-block"></span>  
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Car</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('car_type_id' , ['label' => false,'class' => 'select2  firstupercase','empty'=>'Select...','options'=>$carTypes,'autocomplete'=>'off']); ?>
                            <label id="car-type-id-error" class="error" for="car-type-id"></label>
                        </div>
                    </div>

                    <span class="help-block"></span>  
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Car Number</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('car_id' , ['label' => false,'class' => 'select2 check','empty'=>'Select...','options'=>$cars,'autocomplete'=>'off']); ?>
                        </div>
                        <div class="col-md-4 checkSHow" style ="display:none">
                            <?php echo $this->Form->control('temp_car_no' , ['label' => false,'class' => 'form-control','type'=>'texte','placeholder'=>'Enter Car Number','autocomplete'=>'on']); ?>
                        </div>
                    </div> 
                </div>
                <div class="CorporateBilling">
                    <span class="help-block"></span> 
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Ref. No. </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('ref',['label' => false,'class' => 'form-control ','placeholder'=>'Ref. No.','autocomplete'=>'off']); ?> 
                        </div>
                    </div>


                    <span class="help-block"></span> 
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Date </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('service_date',['label' => false,'class' => 'form-control datepickers','placeholder'=>'DD-MM-YYYY','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy','type'=>'text']); ?> 
                        </div>
                    </div>
                </div>

                 
                <span class="help-block"></span>    
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Service </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('service_id',['label' => false,'class' => 'form-control select2 firstupercase','empty'=>'Select...','options'=>$services,'autocomplete'=>'off']); ?>
                        <label id="service-id-error" class="error" for="service-id"> </label> 
                    </div>
                </div>
                <div class="NormalBilling">
                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Driver Name </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('employee_id',['label' => false,'class' => 'form-control select2 driver','empty'=>'Select...','options'=>$employees,'autocomplete'=>'off','required']); ?> 
                        </div>
                        <div class="col-md-4 driverSHow" style ="display:none">
                            <?php echo $this->Form->control('temp_driver_name',['label' => false,'class' => 'form-control','type'=>'texte','placeholder'=>'Enter driver name','autocomplete'=>'on']); ?>
                            <label id="employee-id-error" class="error" for="employee-id"></label> 
                        </div>
                    </div>
                </div>
                
                <span class="help-block"></span>    
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Rate </label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('rate',['label' => false,'class' => 'form-control  calculateamount','placeholder'=>'Rate','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')",'onMouseDown'=>"fetch_rate('get_rate');fetch_rate('get_km');"]); ?> 
                    </div>
                </div>
                <div class="CorporateBilling">
                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">No of Days </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('no_of_days',['label' => false,'class' => 'form-control calculateamount','type'=>'text', 'placeholder'=>'No of Days','autocomplete'=>'off']); ?> 
                        </div>
                    </div>

                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">TAXI No. / GUIDE Tkt. No.</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('texi_no',['label' => false,'class' => 'form-control  firstupercase','type'=>'text','placeholder'=>'TAXI No. / GUIDE Tkt. No.','autocomplete'=>'off' ]); ?> 
                        </div>
                    </div>
                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label"> Amount</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('cop_amounts',['label' => false,'class' => 'form-control  firstupercase','type'=>'text','placeholder'=>'Amount','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');",'autocomplete'=>'off']); ?> 
                        </div>
                    </div>
                </div> 
                <div class="NormalBilling">
                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Opening KM </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('opening_km',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Opening KM','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')",'onClick'=>"dutyslip_openclose();"]); ?> 
                        </div>
                    </div>

                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Closing KM </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('closing_km',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Closing KM','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                        </div>
                    </div>

                    <span class="help-block"></span> 
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Opening Time </label>
                        </div>
                        <div class="col-md-4"> 
                            <?php
                            for ($i=0; $i <= 23; $i++) { 
                                if($i<10){
                                    $optionTimes['0'.$i]='0'.$i;  
                                }
                                else {
                                    $optionTimes[$i]=$i; 
                                }
     
                            }
                            for ($ix=0; $ix <= 60; $ix++) {   
                                if($ix<10)
                                    $optionTimeSeconds['0'.$ix]='0'.$ix; 
                                else 
                                    $optionTimeSeconds[$ix]=$ix; 
                            }                        ?>
                            <table width="100%">
                                <tr>
                                    <td>
                                      <?php echo $this->Form->control('opening_time_hh',['label' => false,'class' => 'form-control input-small','autocomplete'=>'off','options'=>$optionTimes]); ?>  
                                    </td>
                                    <td>
                                      <?php echo $this->Form->control('opening_time_mm',['label' => false,'class' => 'form-control input-small','autocomplete'=>'off','options'=>$optionTimeSeconds]); ?>  
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <span class="help-block"></span> 
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Closing Time </label>
                        </div>
                        <div class="col-md-4"> 
                            <?php
                            for ($i=0; $i <= 23; $i++) { 
                                if($i<10){
                                    $optionTimes['0'.$i]='0'.$i;  
                                }
                                else {
                                    $optionTimes[$i]=$i; 
                                }
     
                            }
                            for ($ix=0; $ix <= 60; $ix++) {   
                                if($ix<10)
                                    $optionTimeSeconds['0'.$ix]='0'.$ix; 
                                else 
                                    $optionTimeSeconds[$ix]=$ix; 
                            }                     ?>
                            <table width="100%">
                                <tr>
                                    <td>
                                      <?php echo $this->Form->control('closing_time_hh',['label' => false,'class' => 'form-control input-small','placeholder'=>'GST Number','autocomplete'=>'off','options'=>$optionTimes]); ?>  
                                    </td>
                                    <td>
                                      <?php echo $this->Form->control('closing_time_mm',['label' => false,'class' => 'form-control input-small','placeholder'=>'GST Number','autocomplete'=>'off','options'=>$optionTimeSeconds]); ?>  
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <span class="help-block"></span> 
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Travel Date From </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('date_from',['label' => false,'class' => 'form-control datepickers','placeholder'=>'DD-MM-YYYY','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy','type'=>'text',"value"=>date("d-m-Y")]); ?> 
                        </div>
                    </div>

                    <span class="help-block"></span> 
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Travel Date To</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('date_to',['label' => false,'class' => 'form-control datepickers','placeholder'=>'DD-MM-YYYY','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy','type'=>'text',"value"=>date("d-m-Y")]); ?> 
                        </div>
                    </div>
                    <div class="NormalBilling">
                        <span class="help-block"></span>    
                        <div class="row container" style="margin: auto;">
                            <div class="col-md-2">
                                <label class="control-label">Service City</label>
                            </div>
                            <div class="col-md-4">
                                <?php 
                                    foreach ($serviceCity as $key => $value) {  
                                        $stateArray[$value]=$value;
                                    }
                                    echo $this->Form->control('city',['label' => false,'class' => 'form-control firstupercase','empty'=>'Select...','options'=>$stateArray,'autocomplete'=>'off','value'=>'Udaipur']); ?> 
                            </div>
                        </div>
                    </div>

                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Toll Tax </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('extra_chg',['label' => false,'class' => 'form-control','type'=>'text', 'placeholder'=>'Toll Tax','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                        </div>
                    </div>

                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Overtime </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('permit_chg',['label' => false,'class' => 'form-control','type'=>'text', 'placeholder'=>'Overtime','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                        </div>
                    </div>

                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Parking Charges</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('parking_chg',['label' => false,'class' => 'form-control','type'=>'text', 'placeholder'=>'Parking Charges','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                        </div>
                    </div>

                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Driver Allowance</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('otherstate_chg',['label' => false,'class' => 'form-control','type'=>'text', 'placeholder'=>'Driver Allowance','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                        </div>
                    </div>

                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Border Tax</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('guide_chg',['label' => false,'class' => 'form-control','type'=>'text', 'placeholder'=>'Border Tax','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                        </div>
                    </div>

                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Miscellaneous Charges</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('misc_chg',['label' => false,'class' => 'form-control','type'=>'text', 'placeholder'=>'Miscellaneous Charges','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                        </div>
                    </div>

                    <span class="help-block"></span>    
                    <div class="row container" style="margin: auto;">
                        <div class="col-md-2">
                            <label class="control-label">Fuel Hike</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('fuel_hike_chg',['label' => false,'class' => 'form-control','type'=>'text', 'placeholder'=>'Fuel Hike','autocomplete'=>'off','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"]); ?> 
                        </div>
                    </div> 
                </div>
                
                <span class="help-block"></span>      
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Remarks</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('remarks',['label' => false,'type'=>'texte','class' => 'form-control  firstupercase','placeholder'=>'Remarks','autocomplete'=>'on']); ?> 
                    </div>
                </div>
                <span class="help-block"></span> 
                <div class="row container" style="margin: auto;">
                    <div class="col-md-2">
                        <label class="control-label">Reason</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->control('reason',['label' => false,'type'=>'texe','class' => 'form-control ','placeholder'=>'Reason','autocomplete'=>'on']); ?> 
                    </div>
                </div>
                <span class="help-block"></span> 

                <div class="box-footer">
                    <div class="row">
                        <center>
                            <div class="col-md-12">
                                <div class="col-md-offset-1 col-md-6">  
                                    <?php echo $this->Form->button('Submit',['class'=>'btn btn-success','id'=>'submit_member']); ?>
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
    HideShowSection('Normal Billing'); 
    $(document).on('change','.getGST',function(){
        var option = $('option:selected', this).attr('gst_number');
        if(option.length >0)
        {
            $('#gst_input').hide();
        }
        else
        {   
            $('#gst_input').show();     
        }
    });
    $(document).on('change','.check',function(){
        var selected = $('option:selected', this).html();
        var res = selected.split(" ");
        var other = res[0];
        if(other == 'Other'){
            $('.checkSHow').show();
        }
        else{
            $('.checkSHow').hide();
        }
    });
    $(document).on('change','.driver',function(){
        var selected = $('option:selected', this).val();
        var res = selected.split(" ");
        var other = res[0]; 
        if(other == 25){
            $('.driverSHow').show();
        }
        else{
            $('.driverSHow').hide();
        }
    }); 
    $(document).on('keyup','.calculateamount',function(){
        var rate = $('#rate').val();
        var no_of_days = $('#no-of-days').val();
         
        if(rate.length > 0 && no_of_days.length > 0)  
        {
            var total_amount = parseInt(no_of_days) * parseInt(rate);
            $('#cop-amounts').val(total_amount);
        }
        else
        {$('#cop-amounts').val('');}
            
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
            customer_id: {
                required: true, 
            }, 
            service_id: {
                required: true, 
            },
            photo_id: {
                required: true, 
            }, 
            city: {
                required: true, 
            }, 
            car_type_id: {
                required: true, 
            }, 
            employee_id: {
                required: true, 
            }, 
            date_from: {
                required: true, 
            }, 
            date_to: {
                required: true, 
            },  
        },
        
        submitHandler: function () {
            $("#submit_member").attr('disabled','disabled');
            $("#loader-1").show();
            form.submit();
        }
    }); 

    var csrf = <?=json_encode($this->request->getParam('_csrfToken'))?>;
    $.ajaxSetup({
        headers: { 'X-CSRF-Token': csrf },
        error: function(){
        //toastr.error('ajex error');
    }
    });

});
function HideShowSection(values)
{
    if(values=='Corporate Billing')
    {
        $('.NormalBilling').hide();
        $('.CorporateBilling').show();
    }
    else if(values=='Normal Billing')
    {
        $('.NormalBilling').show();
        $('.CorporateBilling').hide();  
    }
}
function fetch_rate(value){
    if(value=='get_km')
    {    
        var car_id=$('#car-id option:selected').val(); 
        var query="?car_id=" + car_id + "&identity=" + "opening_km";
    }
    else 
    {
         var customer_id=$('#customer-id option:selected').val(); 
         var service_id=$('#service-id option:selected').val(); 
         var car_type_id=$('#car-type-id option:selected').val(); 
         
         var query="?customer_id=" + customer_id + "&service_id=" + service_id + "&car_type_id=" +car_type_id + "&identity=" + "ratefix";    
    }
    var url='<?php echo $this->Url->build(['controller'=>'DutySlips','action'=>'getRate']) ?>';
    url=url+query;   
    $.ajax({
        url: url,
    }).done(function(response) {
        
        if(value=='get_km')
            $('#opening-km').val(response); 
        else 
            $('#rate').val(response); 
    });
}
function dutyslip_openclose() 
{
    if($('#opening-km').val()==0)
    {   
        alert("Close previous DS.");
        location.reload();
    }
}
</script>
