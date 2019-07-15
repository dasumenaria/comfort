<style type="text/css">
.test label {
    padding:10px;
}
label{
    line-height: 35px;
}
</style>
<style type="text/css">
td{
    padding-left: 5px; 
}
th {
    text-align: center;
}
</style>
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">   

    <?php  //pr($row_invoice);exit;
        $tax_type=1;  
        $gst_number=$row_invoice->customer->gst_number;
        $state=$row_invoice->customer->state;
        if($state=='rajasthan' || $state=='Rajasthan' || $state=='RAJASTHAN')
        {
            $tax_type=0;
        }
        
        $guest_name =array();    
        foreach ($row_invoice->invoice_details as $inv_Details) {
            $duty_slip_id[]=$inv_Details->duty_slip_id;
            $guest_name=$inv_Details->duty_slip->guest_name;
        }
        $ds=@implode(",",$duty_slip_id); 
        ?>
        <?= $this->Form->create($row_invoice,['class'=>'loadingshow','id'=>'CityForm']) ?>
             <?= $this->Form->hidden('tax_type' , ['label' => false,'value'=>$tax_type]); ?>
            <?= $this->Form->hidden('invoice_date' , ['label' => false,'value'=>$row_invoice->invoice_date]); ?> 

        <div style="width:100%; overflow-x:scroll; overflow-y:hidden;">
            <table width="100%"  cellpadding="0" cellspacing="0"  style="border-collapse:collapse;">
                <tr>
                    <td> 
                        <?php echo $this->Html->image('/img/logo.jpg', ['style'=>'float:left; border:2px solid #2E3192;']) ?>
                    </td>
                    <td style="font-size:24px"><strong>Tax Invoice</strong></td>
                    <td style="float:right;color:#0872BA;">
                        <span style="font-size:16px !important;"><b>Comfort Travels &amp; Tours</b></span>
                        <br/><span>"Akruti", 4-New Fatehpura, Opp. Saheliyo ki Badi,</span><br/>
                        <span>UDAIPUR-313004 Fax: +91-294-2422131</span><br/>
                        <span><i class="icon-phone"></i> +91-294-2411661/62</span> 
                    </td>
                </tr>
            </table> 
        
            <table width="100%" style="margin-top:1%;" class="table table-bordered table-condensed flip-content">
                <tr> 
                    <td width="15%">Bill To M/s.</td>
                    <td width="45%"> 
                     <?php echo $this->Form->control('customer_id',['label' => false,'class' => 'form-control select2','empty'=>'Select Customer...','options'=>$customers,'autocomplete'=>'off','required']); ?>
                    </td>
                    <td width="15%">Invoice No.</td>
                    <td width="15%"><?php echo $row_invoice->invoice_no; ?></td>
                </tr>
                
               
                
                <tr> 
                <td>Guest Name</td>
                <td>
                    <?php echo $this->Form->control('guest_name',['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$guest_name]); ?> 
                </td>
                <td>Date</td>
                <td>  
                    <?php echo $this->Form->control('date',['label' => false,'class' => 'form-control','type'=>'text','autocomplete'=>'off','value'=>date('d-m-Y',strtotime($row_invoice->date)),'readonly']); ?>
                </td>
                </tr>
                <?php if($row_invoice->customer_id==3 || $row_invoice->customer_id==5) 
                {
                    ?>
                    <tr>
                        <td>GST No.</td>
                        <td colspan="3">
                        <?php $fill_type = '';
                        if(!empty($gst_number)){$fill_type="readonly";}
                            echo $this->Form->control('invoice_gst',['label' => false,'class' => 'form-control','type'=>'text','autocomplete'=>'off','value'=>$gst_number,$fill_type]); ?>
                        </td>
                    </tr>
                    <?php 
                } 
                ?> 
                
                <tr>
                    <td>Billing GST</td>
                    <td colspan="3">
                        <?php echo $this->Form->control('invoice_gst',['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$row_invoice->invoice_gst,'required'=>false]); ?>  
                    </td>
                </tr>
                <tr>
                    <td>Remarks.</td>
                    <td colspan="3">
                        <?php echo $this->Form->control('remarks',['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$row_invoice->remarks,'required'=>false]); ?>  
                    </td>
                </tr>
                <tr>
                    <td>REF.</td>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <?php
                    $x=0; 
                    //pr($row_invoice);exit;
                    foreach ($row_invoice->invoice_details as $invoiceData) 
                    { 
                        $x++;
  
                            if($x==1)
                            {
                                ?>
                                    <th colspan="2">Description</th>
                                    <th></th>
                                    <th colspan="2">Amount in INR</th>
                                </tr>
                                <?php
                            }

                            if(!empty($invoiceData->duty_slip->temp_car_no))
                                $car_no=@$invoiceData->duty_slip->temp_car_no;
                            else
                                $car_no=@$invoiceData->duty_slip->car->name;

                            $main_amnt=($invoiceData->duty_slip->tot_amnt-($invoiceData->duty_slip->extra_chg+$invoiceData->duty_slip->permit_chg+$invoiceData->duty_slip->otherstate_chg+$invoiceData->duty_slip->guide_chg+$invoiceData->duty_slip->misc_chg+$invoiceData->duty_slip->parking_chg+$invoiceData->duty_slip->fuel_hike_chg));
                            $ctyName='Udaipur';

                            if(!empty($invoiceData->city)){$ctyName=$invoiceData->city;}
                            $tariffData = $DateConvert->tariffData($invoiceData->duty_slip->service_id,$invoiceData->duty_slip->customer_id,$invoiceData->duty_slip->car_type_id);
                            $minimum_chg_hourly = @$tariffData->minimum_chg_hourly;
                            $minimum_chg_km = @$tariffData->minimum_chg_km;
                            ?>
                            <tr class="ad">
                                <td colspan="2" style="text-align:left"><?php echo "Duty Slip No. ".$invoiceData->duty_slip->id." dated on ".date('d-M-Y', strtotime($invoiceData->duty_slip->date))." "."towards the cost of transport used in ".$ctyName." for the Service ". @$invoiceData->duty_slip->service->name." (".$minimum_chg_hourly." hrs / ".$minimum_chg_km." kms) by ".@$invoiceData->duty_slip->car_type->name." ".$car_no ?></td>
                                <td width="15%" align="center"> </td>
                                <th colspan="2">
                                    <?php echo $this->Form->control('main_amnt'.$x,['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$main_amnt,'id'=>'main_amnt'.$x,'onKeyUp'=>'cal_amount()']); ?>  
                                </th>
                            </tr>
                            <?php
                            if(!empty($invoiceData->duty_slip->extra))
                            {
                                ?>
                                    <tr>
                                        <th colspan="2">Extra <?php echo $invoiceData->duty_slip->extra; ?>: <?php echo $invoiceData->duty_slip->extra_details; ?></th>
                                        <td></td>
                                        <th colspan=" ">
                                           <?php echo $this->Form->control('extra_amnt'.$x,['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$invoiceData->duty_slip->extra_amnt,'id'=>'extra_amnt'.$x,'onKeyUp'=>'cal_amount()']); ?>  
                                        </th>
                                    </tr>
                                <?php
                            }
                            else
                            {
                                echo $this->Form->hidden('extra_amnt'.$x , ['label' => false,'value' => 0,'id'=>'extra_amnt'.$x]);
                            }

                            if(!empty($invoiceData->duty_slip->extra_chg))
                            {
                                ?>
                                    <tr>
                                        <th colspan="2">Toll Tax </th>
                                        <td></td>
                                        <th colspan=" ">
                                           <?php echo $this->Form->control('extra_chg'.$x,['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$invoiceData->duty_slip->extra_chg,'id'=>'extra_chg'.$x,'onKeyUp'=>'cal_amount()']); ?>  
                                        </th>
                                    </tr>
                                <?php
                            }
                            else
                            {
                                echo $this->Form->hidden('extra_chg'.$x , ['label' => false,'value' => 0,'id'=>'extra_chg'.$x]);
                            }

                            if(!empty($invoiceData->duty_slip->permit_chg))
                            {
                                ?>
                                    <tr>
                                        <th colspan="2">Overtime</th>
                                        <td></td>
                                        <th colspan=" ">
                                           <?php echo $this->Form->control('permit_chg'.$x,['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$invoiceData->duty_slip->permit_chg,'id'=>'permit_chg'.$x,'onKeyUp'=>'cal_amount()']); ?>  
                                        </th>
                                    </tr>
                                <?php
                            }
                            else
                            {
                                echo $this->Form->hidden('permit_chg'.$x , ['label' => false,'value' => 0,'id'=>'permit_chg'.$x]);
                            }

                            if(!empty($invoiceData->duty_slip->parking_chg))
                            {
                                ?>
                                    <tr>
                                        <th colspan="2">Parking Charges</th>
                                        <td></td>
                                        <th colspan=" ">
                                           <?php echo $this->Form->control('parking_chg'.$x,['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$invoiceData->duty_slip->parking_chg,'id'=>'parking_chg'.$x,'onKeyUp'=>'cal_amount()']); ?>  
                                        </th>
                                    </tr>
                                <?php
                            }
                            else
                            {
                                echo $this->Form->hidden('parking_chg'.$x , ['label' => false,'value' => 0,'id'=>'parking_chg'.$x]);
                            }

                            if(!empty($invoiceData->duty_slip->otherstate_chg))
                            {
                                ?>
                                    <tr>
                                        <th colspan="2">Driver Allowance </th>
                                        <td></td>
                                        <th colspan=" ">
                                           <?php echo $this->Form->control('otherstate_chg'.$x,['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$invoiceData->duty_slip->otherstate_chg,'id'=>'otherstate_chg'.$x,'onKeyUp'=>'cal_amount()']); ?>  
                                        </th>
                                    </tr>
                                <?php
                            }
                            else
                            {
                                echo $this->Form->hidden('otherstate_chg'.$x , ['label' => false,'value' => 0,'id'=>'otherstate_chg'.$x]);
                            }

                            if(!empty($invoiceData->duty_slip->guide_chg))
                            {
                                ?>
                                    <tr>
                                        <th colspan="2">Border Tax </th>
                                        <td></td>
                                        <th colspan=" ">
                                           <?php echo $this->Form->control('guide_chg'.$x,['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$invoiceData->duty_slip->guide_chg,'id'=>'guide_chg'.$x,'onKeyUp'=>'cal_amount()']); ?>  
                                        </th>
                                    </tr>
                                <?php
                            }
                            else
                            {
                                echo $this->Form->hidden('guide_chg'.$x , ['label' => false,'value' => 0,'id'=>'guide_chg'.$x]);
                            }
                            if(!empty($invoiceData->duty_slip->misc_chg))
                            {
                                ?>
                                    <tr>
                                        <th colspan="2">Miscellaneous Charges </th>
                                        <td></td>
                                        <th colspan=" ">
                                           <?php echo $this->Form->control('misc_chg'.$x,['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$invoiceData->duty_slip->misc_chg,'id'=>'misc_chg'.$x,'onKeyUp'=>'cal_amount()']); ?>  
                                        </th>
                                    </tr>
                                <?php
                            }
                            else
                            {
                                echo $this->Form->hidden('misc_chg'.$x , ['label' => false,'value' => 0,'id'=>'misc_chg'.$x]);
                            }
                            if(!empty($invoiceData->duty_slip->fuel_hike_chg))
                            {
                                ?>
                                    <tr>
                                        <th colspan="2">Fuel Hike </th>
                                        <td></td>
                                        <th colspan=" ">
                                           <?php echo $this->Form->control('fuel_hike_chg'.$x,['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$invoiceData->duty_slip->fuel_hike_chg,'id'=>'fuel_hike_chg'.$x,'onKeyUp'=>'cal_amount()']); ?>  
                                        </th>
                                    </tr>
                                <?php
                            }
                            else
                            {
                                echo $this->Form->hidden('fuel_hike_chg'.$x , ['label' => false,'value' => 0,'id'=>'fuel_hike_chg'.$x]);
                            }
                            echo $this->Form->hidden('duty_slip_id'.$x , ['label' => false,'value' => $invoiceData->duty_slip->id,'id'=>'extra_amnt'.$x]);

                            echo $this->Form->hidden('invoice_detail_id'.$x , ['label' => false,'value' => $invoiceData->id,'id'=>'invoice_detail_id'.$x]); 
                         
                    }   
                    ?>  
                    <tr>
                        <th colspan="2" style="padding-left: 17%;">Total</th>
                        <td></td>
                        <th colspan="">
                            <?php echo $this->Form->control('total',['label' => false,'class' => 'form-control ','autocomplete'=>'off','type'=>'text','value'=>$row_invoice->total,'id'=>'total','onKeyUp'=>'cal_amount()','readonly']); ?> 
                        </th>
                    </tr> 
                    <tr>
                        <th colspan="2" class="centerme" style="padding-left: 17%;">Discount</th>
                        <td colspan="" class="test">
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
                            <?php echo $this->Form->control('discount',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>$row_invoice->discount,'id'=>'discount','onKeyUp'=>'cal_amount()','required']); ?> 
                        </td>
                        <?php echo $this->Form->hidden('discout_final' , ['label' => false,'id'=>'discout_final'])?> 
                    </tr>
                             
                    <tr>
                        <th colspan="2" style="padding-left: 17%;">Other Charges</th>
                        <td></td>
                        <th colspan=" ">
                            <?php echo $this->Form->control('other_charges',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'other_charges','readonly']); ?>  
                        </th>
                    </tr>
                    <?php
                    if(!empty($row_invoice->tax))
                    { 
                        if($tax_type == 0){
                            $twoTax = $gstData->tax_percentage/2;
                            ?>
                            <tr>
                                <th colspan="3" class="centerme">SGST</th>
                                <td>
                                    <?php echo $this->Form->control('taxation1',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'taxation1','readonly']); ?> 
                                </td>
                            </tr>
                            <tr>
                                <th colspan="3"  class="centerme">CGST</th>
                                <td>
                                    <?php echo $this->Form->control('taxation2',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'taxation2','readonly']); ?>
                                </td>
                            </tr> 
                            <?php 
                        }
                        else{
                            ?>
                            <tr>
                                <th colspan="3" class="centerme">IGST</th>
                                <td>
                                    <?php echo $this->Form->control('taxation1',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'taxation1','readonly']); ?> 
                                </td>
                            </tr>
                        <?php 
                        }
                    }
                    ?>
                    <?= $this->Form->hidden('complimenatry_status' , ['label' => false,'id'=>'comple']); ?>
                    <tr>
                        <th colspan="3" class="centerme">Round Off</th>
                        <td>
                            <?php echo $this->Form->control('round_off',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'round_off','readonly']); ?>   
                        </td>
                    </tr>
                        
                    <tr>
                        <th colspan="2" style="padding-left: 17%;">Grand Total</th>
                        <td></td>
                        <th colspan=" ">
                            <?php echo $this->Form->control('grand_total',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>$row_invoice->grand_total,'id'=>'grand_total',]); ?> 
                        </th>
                    </tr>
                         
                    <tr>
                        <td colspan="2"><b>SIGNATURE IN CONFIRMATION</b><br/><span style="font-size: 11px; font-style:italic;">of terms & condition overleaf</span></td>
                        <td colspan="2">For: Comfort Travels & Tours</td>
                    </tr>
                            
                    <tr><td colspan="4" style="border-bottom:none;">&nbsp;</td></tr>
                    <tr><td colspan="4" style="border-top:none;">&nbsp;</td></tr>
                            
                    <tr>
                        <td colspan="2">(Name............................................)</td>
                        <td colspan="2">Authorised Signatory</td>
                    </tr>
                    <tr>
                        <td colspan="4"  style="color:#0872BA;"><b>Other Info.</b> <span>PAN No. AAWPC1369E, Service Tax: AAWPC1369EST001<br /><b>Email:-</b> operations@comforttours.com ,  siddhant.chatur@comforttours.com   </span></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:center;background-color:#F5F5F5;">
                        <?php  
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
                         echo $this->Form->hidden('count', ['label' => false,'value' => $x,'id'=>'count']); 
                         echo $this->Form->hidden('invoice_id', ['label' => false,'value' => $row_invoice->id,'id'=>'count']); 
                        ?> 
                        <?= $this->Form->hidden('tax_status' , ['label' => false,'value'=>$row_invoice->customer->servicetax_status,'id'=>'tax_status']); ?> <?= $this->Form->hidden('isRoundofType' , ['label' => false,'value'=>0,'id'=>'isRoundofType']); ?>  
                        <?php echo $this->Form->button('Save Changes',['class'=>'btn btn-success','name'=>'invoiceReg','value'=>'2']); ?>
                        </td>
                    </tr>
                        
            </table>
        </div>
        <?= $this->Form->end() ?> 
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
<?php
//if($row_invoice->billing_type == 'Normal Billing')
//{ ?>
    $(document).ready(function() {
        cal_amount(); //alert();  
    });
<?php //} ?>
function round(value, exp) {
    if (typeof exp === 'undefined' || +exp === 0)
    return Math.round(value);

    value = +value; 
    exp = +exp;

    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0))
    return 0;

    // Shift
    value = value.toString().split('e');
    value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp)));

    // Shift back
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp));
}
function cal_amount()
{
     
    var total_amtt=0;
    var total=0;
    var total_other=0;
    var net_total=0;
    var val=0;
    var all_tax=0;
    var tax_status=0;

    var count=eval($("#count").val());
    var discount_rate=eval($('#discount').val()); 
    for(var i=1; i<=count; i++)
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
    }
    
    net_total=total+total_other;
    var discount_amnt = 0;
    if(discount_rate>0){
        if($('#per').prop("checked")==true)
        {
            var discount_amnt=Math.round((total)*discount_rate/100);
        }
        else
        {
            var discount_amnt=discount_rate;
        }
    } 
    $("#discout_final").val(discount_amnt);
    var val=(net_total-discount_amnt);
    var total_tax_amnt=0;   
    var tax=0;
    var tax_amnt=0;
    var valu=0;

    if(total_other!=0)
    {
        $("#other_charges").val(total_other);
    }
    else{
        $("#other_charges").val(0); 
    }
 
    if(($('#tax_status').val()=='yes')&&($('#comple').val()!='1'))
    {
        valu=(total-discount_amnt)+total_other;
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
        var all_over_total = Math.round(val+total_tax_amnt);
    }     
    var after_dis=val;    
    var val = parseFloat(after_dis+total_tax_amnt);
    var roundOff1 = round(val);
    var isRoundofType =0;
    var round_of =0;

    if(val<roundOff1)
    {
        round_of=parseFloat(roundOff1)-parseFloat(val);
        isRoundofType='0';
    }
    if(val>roundOff1)
    {
        round_of=parseFloat(roundOff1)-parseFloat(val);
        isRoundofType='1';
    }
    if(val==roundOff1)
    {
        round_of=parseFloat(val)-parseFloat(roundOff1);
        isRoundofType='0';
    }
    
     
    $('#round_off').val(round_of.toFixed(2));
    $('#isRoundofType').val(isRoundofType);
    $("#total").val(total);

    $("#grand_total").val(round(val));
}
</script>
                
        