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
            <?php
            if($showRecord != 1)
            { ?>
            <div class="box-header with-border hide_print">
                <i class="fa fa-plus"></i> Billing
            </div>
                <?= $this->Form->create('',['class'=>'loadingshow','id'=>'CityForm']) ?>
                <div class="box-body hide_print" >
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label"> Invoice Type</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('invoice_type_id',['label' => false,'class' => 'form-control','options'=>$invoiceTypes,'autocomplete'=>'off']); ?>
                        </div>
                    </div>
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label"> Customer Name</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('customer_id',['label' => false,'class' => 'form-control select2','empty'=>'Select Customer...','options'=>$customers,'autocomplete'=>'off','required']); ?>
                        </div>
                    </div>
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label"> Payment Type</label>
                        </div>
                        <div class="col-md-4 ">
                            <?php 
                            $opt['Cash']='Cash';
                            $opt['Credit']='Credit';
                            echo $this->Form->control('payment_type',['label' => false,'class' => 'form-control','options'=>$opt,'autocomplete'=>'off']); ?>
                        </div>
                    </div>
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label"> Billed Complimenatry Charges</label>
                        </div>
                        <div class="col-md-4 test">
                         <?php
                            echo $this->Form->radio(
                            'complimenatry_status',
                            [
                                ['value' => 1, 'text' => ' Yes '],
                                ['value' => 0, 'text' => ' No ','checked'],   
                            ],
                            ['class'=>'']
                            ); ?>
                        </div>
                    </div>
                    <span class="help-block"></span> 
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">Remarks </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('remarks',['label' => false,'class' => 'form-control','placeholder'=>'Remarks','autocomplete'=>'off']);?> 
                        </div>
                    </div>
                    <span class="help-block"></span>
                </div>
            
                <div class="box-footer">
                    <div class="row">
                        <center>
                            <div class="col-md-12">
                                <div class="col-md-offset-1 col-md-6">  
                                    <?php echo $this->Form->button('Process',['class'=>'btn btn-success','name'=>'searchDS','value'=>'1']); ?>
                                </div>
                            </div>
                        </center>       
                    </div>
                </div>
                <?= $this->Form->end() ?>
            <?php 
            }
            else{ 
                    $date = date('d-m-Y');
                    $DBdate = date('Y-m-d');
                ?>
                <?= $this->Form->create($invoice,['class'=>'loadingshow','id'=>'CityForm']) ?>
                <?= $this->Form->hidden('payment_type' , ['label' => false,'value'=>$payment_type]); ?>
                <?= $this->Form->hidden('remarks' , ['label' => false,'value'=>$remarks]); ?>
                <?= $this->Form->hidden('customer_id' , ['label' => false,'value'=>$customer_id]); ?>
                <?= $this->Form->hidden('tax_type' , ['label' => false,'value'=>$tax_type]); ?>
                <?= $this->Form->hidden('invoice_type_id' , ['label' => false,'value'=>$invoice_type_id]); ?>
                <?= $this->Form->hidden('complimenatry_status' , ['label' => false,'value'=>$complimenatry_status,'id'=>'comple']); ?>
                <?= $this->Form->hidden('servicetax_status' , ['label' => false,'value'=>$customerData->servicetax_status,'id'=>'servicetax_status']); ?>
                <?= $this->Form->hidden('invoice_date' , ['label' => false,'value'=>$DBdate]); ?> 
                <?= $this->Form->hidden('isRoundofType' , ['label' => false,'value'=>0,'id'=>'isRoundofType']); ?> 

                <div class="box-header with-border hide_print">
                    <i class="fa fa-plus"></i> Result of <?= $customerData->name;?>
                </div>
                <div class="box-body">
                   <table width="100%" class="table table-bordered table"  style="border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th>Invoice Type</th>
                            <th colspan="3">Customer Name</th>
                            <th>Date</th>
                            <th>Payment Type</th>
                            <th colspan="3">Remarks</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $invoiceTypeData->name; ?></td>
                            <td colspan="3"><?= $customerData->name;?></td>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $payment_type; ?></td>
                            <td colspan="3"><?php echo $remarks; ?></td>
                        </tr>
                        <?php $k=0;
                        foreach ($dutySlipData as $dutySlip) { 
                            $k++;
                            ?>
                            <tr>
                                <td colspan="9" style="text-align: center;">-------------------------------Duty------------------------------------</td>
                            </tr>
                            <tr>
                                <th>DS No.</th>
                                <th>Guest Name</th>
                                <th>Car</th>
                                <th>Service</th>
                                <th>Car Number</th>
                                <th>Open. KM</th>
                                <th>Clos. KM</th>
                                <th>Total Ch.</th>
                                <th style="text-align:center;">Process ?</th>
                            </tr>
                            <tr id="fillme<?php echo $k; ?>">
                                <td><a class="tooltips" data-placement="bottom" title="Edit Duty Slip From Here" target="_blank"><?php echo $dutySlip->id; ?></a></td>
                                <td><?php echo $dutySlip->guest_name; ?></td>
                                <td><?php echo @$dutySlip->car_type->name; ?></td>
                                <td><?php echo @$dutySlip->service->name; ?></td> 
                                <td><?php echo @$dutySlip->car->name; ?></td> 
                                <td><?php echo $dutySlip->opening_km; ?></td>
                                <td><?php echo $dutySlip->closing_km; ?></td>
                                <td><?php echo $dutySlip->tot_amnt; ?></td>
                                <td style="text-align:center;">
                                    <?php echo $this->Form->input('ds_idd'.$k, array(
                                          'type'=>'checkbox',
                                          'id'=> 'check'.$k,
                                          'class'=>'roomselect',
                                          'onClick'=>'amount_validation(this.id),cal_amount();',
                                          'value'=>$dutySlip->id,
                                          'label' => false
                                         ) ); ?> 
                                </td>  
                            </tr>
                            <?php 
                            if(!empty($dutySlip->extra))
                            {
                                $extra_rate=ceil($dutySlip->extra_amnt/$dutySlip->extra_details);
                                ?>
                                <tr id="fillme_sub<?php echo $k; ?>">
                                    <td colspan="4">&nbsp;</td>
                                    <th>Extra <?php echo $dutySlip->extra; ?></th>
                                    <td>
                                        <?php echo $this->Form->control('extra'.$k,['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>$dutySlip->extra_details,'id'=>'extra'.$k,'onKeyUp'=>'GetExtraChargeKM(this.value,'.$k.')']); ?>  
                                    </td>
                                    <td>
                                        <?php echo $this->Form->control('extra_amnt'.$k,['label' => false,'class' => 'form-control  firstupercase','autocomplete'=>'off','type'=>'text','value'=>$dutySlip->extra_amnt,'id'=>'extra_amnt'.$k]); ?> 
                                    </td>
                                    <td colspan="2">
                                        <?php echo $this->Form->hidden('extrarate'.$k , ['label' => false,'value' => $extra_rate,'id'=>'extrarate'.$k]); ?> 
                                    </td>
                                </tr>
                            <?php
                            }
                            else
                            {
                                echo $this->Form->hidden('fillme_sub'.$k , ['label' => false]);
                                echo $this->Form->hidden('extra'.$k , ['label' => false,'value' => $dutySlip->extra_rate,'id'=>'extra'.$k,'onKeyUp'=>'GetExtraChargeKM(this.value,'.$k.')','value'=>$dutySlip->extra_details,]);

                                echo $this->Form->hidden('extra_amnt'.$k , ['label' => false,'value' => $dutySlip->extra_amnt,'id'=>'extra_amnt'.$k]);

                                echo $this->Form->hidden('extrarate'.$k , ['label' => false,'value' => $dutySlip->extra_rate,'id'=>'extrarate'.$k]); 
                            }
                            echo $this->Form->hidden('main_amnt'.$k , ['label' => false,'value' => $dutySlip->tot_amnt,'id'=>'main_amnt'.$k]); 

                            echo $this->Form->hidden('extra_chg'.$k , ['label' => false,'value' => $dutySlip->extra_chg,'id'=>'extra_chg'.$k]);

                            echo $this->Form->hidden('permit_chg'.$k , ['label' => false,'value' => $dutySlip->permit_chg,'id'=>'permit_chg'.$k]);

                            echo $this->Form->hidden('parking_chg'.$k , ['label' => false,'value' => $dutySlip->parking_chg,'id'=>'parking_chg'.$k]);

                            echo $this->Form->hidden('otherstate_chg'.$k , ['label' => false,'value' => $dutySlip->otherstate_chg,'id'=>'otherstate_chg'.$k]); 

                            echo $this->Form->hidden('guide_chg'.$k , ['label' => false,'value' => $dutySlip->guide_chg,'id'=>'guide_chg'.$k]);

                            echo $this->Form->hidden('misc_chg'.$k , ['label' => false,'value' => $dutySlip->misc_chg,'id'=>'misc_chg'.$k]);

                            echo $this->Form->hidden('fuel_hike_chg'.$k , ['label' => false,'value' => $dutySlip->fuel_hike_chg,'id'=>'fuel_hike_chg'.$k]); 
                        }
                             
                            /*<!-- Tax Data -->*/
                        $h=0;
                        $ZZ=0;
                        
                        if($tax_type == 0){
                            $twoTax = $gstData->tax_percentage/2;
                            echo $this->Form->hidden('tax_rate1', ['label' => false,'value' => $twoTax,'id'=>'tax_rate1']);   
                            
                            echo $this->Form->hidden('tax_rate2', ['label' => false,'value' => $twoTax,'id'=>'tax_rate2']); 
                            $ZZ=2;  
                        }
                        else{
                            echo $this->Form->hidden('tax_rate1', ['label' => false,'value' => $gstData->tax_percentage,'id'=>'tax_rate1']); 
                            $ZZ=1;  
                        }  

                        echo $this->Form->hidden('total_tax_count', ['label' => false,'value' => $ZZ,'id'=>'total_tax_count']);   
                        
                        echo $this->Form->hidden('count', ['label' => false,'value' => $k,'id'=>'count']);

                        echo $this->Form->hidden('discout_final', ['label' => false,'id'=>'discout_final']);
                        ?>

                            <tr>
                                <th colspan="8" class="centerme">Total</th>
                                <td>
                                    <?php echo $this->Form->control('total',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'total','readonly']); ?>  
                                </td>
                            </tr>
                            <tr>
                                <th colspan="6" class="centerme" style="padding-left: 17%;">Discount</th>
                                <td colspan="2" class="test">
                                    <?php
                                        echo $this->Form->radio(
                                        'discount',
                                        [
                                            ['value' => 1, 'text' => ' Per ','onClick'=>'cal_amount()','id'=>'per'],
                                            ['value' => 0, 'text' => ' Amount ','checked','onClick'=>'cal_amount()','id'=>'amount'],   
                                        ],
                                        ['class'=>'']
                                        ); 
                                    ?>   
                                <td>
                                    <?php echo $this->Form->control('discount',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'discount','onKeyUp'=>'cal_amount()','required']); ?> 
                                </td>
                            </tr>
                            <tr>
                                <th colspan="8" class="centerme">Other Charges</th>
                                <td>
                                    <?php echo $this->Form->control('other_charges',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'other_charges','readonly']); ?>  
                                </td>
                            </tr> 

                            <!-- Tax List and taxt box -->
                            <?php 
                            if($customerData->servicetax_status=='yes' && $complimenatry_status!='1')
                            {
                                if($tax_type == 0){
                                    $twoTax = $gstData->tax_percentage/2;
                                    ?>
                                    <tr>
                                        <th colspan="8" class="centerme">SGST</th>
                                        <td>
                                            <?php echo $this->Form->control('taxation1',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'taxation1','readonly']); ?> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="8" class="centerme">CGST</th>
                                        <td>
                                            <?php echo $this->Form->control('taxation2',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'taxation2','readonly']); ?>
                                        </td>
                                    </tr> 
                                    <?php 
                                }
                                else{
                                    ?>
                                    <tr>
                                        <th colspan="8" class="centerme">IGST</th>
                                        <td>
                                            <?php echo $this->Form->control('taxation1',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'taxation1','readonly']); ?> 
                                        </td>
                                    </tr>
                                <?php 
                                }   
                            }
                            else
                            {
                              echo $this->Form->control('taxation1',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'hidden','value'=>0,'id'=>'taxation1','readonly']);
                              echo $this->Form->control('taxation2',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'hidden','value'=>0,'id'=>'taxation2','readonly']);
                              echo $this->Form->control('taxation3',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'hidden','value'=>0,'id'=>'taxation3','readonly']);   
                            }
                            ?>
                            <tr>
                                <th colspan="8" class="centerme">Round Off</th>
                                <td>
                                    <?php echo $this->Form->control('round_off',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'round_off','readonly']); ?>   
                                </td>
                            </tr>

                            <tr>
                                <th colspan="8" class="centerme">Grand Total</th>
                                <td>
                                    <?php echo $this->Form->control('grand_total',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'grand_total','readonly']); ?>   
                                </td>
                            </tr>
                            <tr>
                                <td colspan="9" style="text-align:center">
                                     <?php echo $this->Form->button('Submit',['class'=>'btn btn-success','name'=>'invoiceReg','value'=>'2']); ?>
                                </td>
                            </tr>
                        </table>

                </div>
                <?= $this->Form->end() ?>
            <?php
            }
            ?>
        </div> 
    </div>   
</section>
<?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?> 
<script>
jQuery(".loadingshow").submit(function(){
    jQuery("#loader-1").show();
});   
</script> 
<script>  
function amount_validation(check_id)
{ 
    var total=0;
    var j=0;
    var total_other=0;
    var discount_rate=eval($('#discount').val());
    var _total=eval($('#total').val());
    
    var i = check_id.substr(5);  // returns "cde"

    if($('#'+check_id).prop("checked")==true)
    {    
        var extra_amnt=eval($('#extra_amnt'+i).val());
        var main_amnt=eval($('#main_amnt'+i).val());
         
        total+=extra_amnt+main_amnt; 
        
        var extra_chg=eval($('#extra_chg'+i).val());
        var permit_chg=eval($('#permit_chg'+i).val());
        var parking_chg=eval($('#parking_chg'+i).val());
        var otherstate_chg=eval($('#otherstate_chg'+i).val());
        var guide_chg=eval($('#guide_chg'+i).val());
        var misc_chg=eval($('#misc_chg'+i).val());
        var fuel_hike_chg=eval($('#fuel_hike_chg'+i).val());
        
        total_other+=extra_chg+permit_chg+parking_chg+otherstate_chg+guide_chg+misc_chg+fuel_hike_chg;  
        if($('#per').prop("checked")==true)
        {
            var discount_amnt=Math.round((total)*discount_rate/100);
        }
        else
        {
            var discount_amnt=discount_rate;
        }
        var total_tax_amnt=0;

        if(($('#servicetax_status').val()=='yes')&&($('#comple').val()!='1'))
        {  
         
            var val=(total-(discount_amnt)-total_other);
             
            var tax=0;
            var tax_amnt=0;
            var total_tax_count = eval($('#total_tax_count').val());
            for(var t=1; t<=total_tax_count; t++)
            {
                tax=eval($('#tax_rate'+ t).val());
                tax_amnt= val*tax/100;
                total_tax_amnt+=tax_amnt; 
            }
        }
    
        var grand_total=(total+total_other+total_tax_amnt)-discount_amnt; 
        if(_total>0)
        {
            
        }
        else if(grand_total<=0)
        {
            $('#'+check_id).prop("checked")=false;
        }
    }
} 


function cal_amount()
{
    var total=0;
    var j=0;
    var total_other=0;
    var total_amtt=0;
    var count=eval($("#count").val());
    var discount_rate=eval($('#discount').val());
    for(var i=1; i<=count; i++)
    {
        if($('#check'+i).prop("checked")==true)
        {   
            $("#fillme"+i).css('background-color','rgb(255, 255, 204)');
            $("#fillme_sub"+i).css('background-color','rgb(255, 255, 204)');
            $('#extra'+i).removeAttr('readonly');  
            $('#extra_amnt'+i).removeAttr('readonly'); 
                   
            var extra_amnt=eval($('#extra_amnt'+i).val());
            var main_amnt=eval($('#main_amnt'+i).val());
            total+=extra_amnt+main_amnt;
         
            var extra_chg=eval($('#extra_chg'+i).val());
            var permit_chg=eval($('#permit_chg'+i).val());
            var parking_chg=eval($('#parking_chg'+i).val());
            var otherstate_chg=eval($('#otherstate_chg'+i).val());
            var guide_chg=eval($('#guide_chg'+i).val());
            var misc_chg=eval($('#misc_chg'+i).val());
            var fuel_hike_chg=eval($('#fuel_hike_chg'+i).val());
            total_other+=extra_chg+permit_chg+parking_chg+otherstate_chg+guide_chg+misc_chg+fuel_hike_chg; 
            var total_amtt = total-total_other;
             
            if($('#per').prop("checked")==true)
            {
                var discount_amnt=Math.round((total_amtt)*discount_rate/100);
            }
            else
            {
                var discount_amnt=discount_rate;
            } 

            if(total_other!=0)
            {
                $("#other_charges").val(total_other);
            }
            else{
                $("#other_charges").val(0); 
            }
            $("#discout_final").val(discount_amnt);
            
            var total_tax_amnt=0;
            var valu=0;
         
             
            if(($('#servicetax_status').val()=='yes')&&($('#comple').val()!='1'))
            {
                 
                 valu=(total_amtt-(discount_amnt))+total_other;
                    
                var tax=0;
                var tax_amnt=0;
                var total_tax_count = eval($('#total_tax_count').val());
                for(var t=1; t<=total_tax_count; t++)
                { 
                    tax=eval($('#tax_rate'+ t).val());
                    tax_amnt= valu*tax/100 ;
                    total_tax_amnt+=tax_amnt;
                    var taxx = tax_amnt.toFixed(2);
                    $('#taxation'+ t).val(taxx);
                }
            }
            if(discount_amnt>0){
             var after_dis=(total_amtt-(discount_amnt));    
              
            }else
            {
            var after_dis=total_amtt;
            }

            var total = parseFloat(after_dis+total_other+total_tax_amnt);
            var roundOff1 = round(total);
            var isRoundofType =0;
            if(total<roundOff1)
            {
                round_of=parseFloat(roundOff1)-parseFloat(total);
                isRoundofType='0';
            }
            if(total>roundOff1)
            {
                round_of=parseFloat(roundOff1)-parseFloat(total);
                isRoundofType='1';
            }
            if(total==roundOff1)
            {
                round_of=parseFloat(total)-parseFloat(roundOff1);
                isRoundofType='0';
            }
            
             
            $('#round_off').val(round_of.toFixed(2));
            $('#isRoundofType').val(isRoundofType);
            $("#grand_total").val(round(total));
            j=1;
        }
        else if(j==0)
        {
            $('#extra'+i).removeAttr('readonly');  
            $('#extra_amnt'+i).removeAttr('readonly');                 
            $("#fillme"+i).css('background-color','');
            $("#fillme_sub"+i).css('background-color','');
            $("#other_charges").val(0);  
        }
    }
    if(total==0)
    {
            var total_tax_count = eval($('#total_tax_count').val());
            for(var t=1; t<=total_tax_count; t++)
            {
                $('#taxation'+ t).val(0);
            }  
            
            $("#grand_total").val(0);
            $("#discount").val(0);
    }
    
    $("#total").val(total_amtt);
}
</script>