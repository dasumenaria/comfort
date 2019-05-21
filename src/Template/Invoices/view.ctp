<style type="text/css">
td{
    padding-left: 5px; 
}
th {
    text-align: center;
}
</style>
<section class="content">
    <table class="hide_print">
        <tr>
            <td>&nbsp;
            <button class="btn btn-warning" onclick="window.print();"><i class="fa fa-print" aria-hidden="true"></i> Print </button>
            </td>

            <td>
                <?php echo $this->Html->link('<i class="fa fa-pencil"></i> Edit',['action' => 'edit', $invoice->id],array('escape'=>false,'class'=>'btn btn-info','target'=>'_blank'));?>
            </td>
            <td> 
            <?= $this->Form->create(null, ['url' => [
                    'controller' => 'Invoices',
                    'action' => 'pdf'
                ]]); ?>  
            <?php echo $this->Form->control('pdfData' , ['label' => false,'value' => '','type'=>'textarea','id'=>'pdfData','style'=>'display:none']); ?> 
            <?php echo $this->Form->button('<i class="fa fa-download"></i> PDF',['class'=>'btn btn-danger','title'=>'Click here to download PDF']); ?> 
            <?= $this->Form->end() ?>
           
            </td>
        </tr>
    </table> 
    <div class="row" style="margin-top:10px">
        <div class="col-md-12"> 
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
            <div  id="main_data">
            <table width="100%"  border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin-top:1%;margin-bottom: 20px;" bordercolor="#0872BA">
                <tr class="ad"> 
                    <td width="15%">Bill To M/s.</td>
                    <td colspan="2" width="55%"><strong><?php echo $invoice->customer->name; ?></strong></td>
                    <td colspan="2">Original for Recipients </td>
                </tr>
                <tr class="ad"> 
                    <td>Billing Address</td>
                    <td colspan="2"><?php echo $invoice->customer->address; ?></td>
                    <td width="15%">Invoice No.</td>
                    <td width="15%"><strong><?php echo $invoice->invoice_no; ?></strong></td>
                </tr>
                <tr class="ad"> 
                    <td>Billing GST</td>
                    <td colspan="2"><?php if(!empty($gst_number)) { echo $gst_number;} else{ echo $invoice->invoice_gst;} ?></td>
                    <td>Date</td>
                    <td><?php echo date('d-M-Y', strtotime($invoice->date)); ?></td>
                </tr>
                <tr class="ad"> 
                    <td>Guest Name</td>
                    <td colspan="2"><?php echo $invoice->invoice_details[0]->duty_slip->guest_name ; ?></td> 
                    <td colspan="2"> </td> 
                </tr>
                <tr>
                    <td>REF.</td>
                    <td colspan="4"></td>
                </tr>
                <tr class="ad">
                    <?php
                    $x=0; 
                    foreach ($invoice->invoice_details as $invoiceData) 
                    {
                        $x++;

                        if($invoiceData->duty_slip->billing_type == 'Normal Billing')
                        {
                            if($x==1)
                            {
                                ?>
                                    <th colspan="2">Description</th>
                                    <th>SAC Code</th>
                                    <th colspan="2">Amount in INR</th>
                                </tr>
                                <?php
                            }

                            if(!empty($invoiceData->duty_slip->temp_car_no))
                                $car_no=$invoiceData->duty_slip->temp_car_no;
                            else
                                $car_no=$invoiceData->duty_slip->car->name;

                            $main_amnt=($invoiceData->duty_slip->tot_amnt-($invoiceData->duty_slip->extra_chg+$invoiceData->duty_slip->permit_chg+$invoiceData->duty_slip->otherstate_chg+$invoiceData->duty_slip->guide_chg+$invoiceData->duty_slip->misc_chg+$invoiceData->duty_slip->parking_chg+$invoiceData->duty_slip->fuel_hike_chg));
                            $ctyName='Udaipur';

                            if(!empty($invoiceData->city)){$ctyName=$invoiceData->city;}
                            $tariffData = $DateConvert->tariffData($invoiceData->duty_slip->service_id,$invoiceData->duty_slip->customer_id,$invoiceData->duty_slip->car_type_id);
                            $minimum_chg_hourly = $tariffData->minimum_chg_hourly;
                            $minimum_chg_km = $tariffData->minimum_chg_km;
                            ?>
                            <tr class="ad">
                                <td colspan="2" style="text-align:left"><?php echo "Duty Slip No. ".$invoiceData->id." dated on ".date('d-M-Y', strtotime($invoiceData->duty_slip->date))." "."towards the cost of transport used in ".$ctyName." for the Service ".$invoiceData->duty_slip->service->name." (".$minimum_chg_hourly." hrs / ".$minimum_chg_km." kms) by ".$invoiceData->duty_slip->car_type->name." ".$car_no ?></td>
                                <td width="15%" align="center"><?php echo $invoiceData->duty_slip->service->sac_code;?></td>
                                <th colspan="2"><?php echo $main_amnt; ?></th>
                            </tr>
                            <?php
   
                            if(!empty($invoiceData->duty_slip->extra))
                            {
                                ?>
                                    <tr class="ad">
                                    <th colspan="3">Extra <?php echo $invoiceData->duty_slip->extra; ?>: <?php echo $invoiceData->duty_slip->extra_details; ?></th>
                                    <th colspan="2"><?php echo $invoiceData->duty_slip->extra_amnt; ?></th>
                                    </tr>
                                <?php
                            }
                            $othercharges=0;
                            if(!empty($invoiceData->duty_slip->extra_chg))
                            {
                            ?>
                                    <tr class="ad">
                                    <td colspan="3">Toll Tax</td>
                                    <th colspan="2"><?php echo $invoiceData->duty_slip->extra_chg; ?></th>
                                    </tr>
                            <?php
                                $othercharges+=$invoiceData->duty_slip->extra_chg;
                            }

                            if(!empty($invoiceData->duty_slip->permit_chg))
                            {
                            ?>
                                    <tr class="ad">
                                    <td colspan="3">Permit Charges</td>
                                    <th colspan="2"><?php echo $invoiceData->duty_slip->permit_chg; ?></th>
                                    </tr>
                            <?php
                             $othercharges+=$invoiceData->duty_slip->permit_chg;
                            }
                            if(!empty($invoiceData->duty_slip->parking_chg))
                            {
                            ?>
                                    <tr class="ad">
                                    <td colspan="3">Parking Charges</td>
                                    <th colspan="2"><?php echo $invoiceData->duty_slip->parking_chg; ?></th>
                                    </tr>
                            <?php
                                $othercharges+=$invoiceData->duty_slip->parking_chg;
                            }
                            if(!empty($invoiceData->duty_slip->otherstate_chg))
                            {
                            ?>
                                    <tr class="ad">
                                    <td colspan="3">Driver Allowance:</td>
                                    <th colspan="2"><?php echo $invoiceData->duty_slip->otherstate_chg; ?></th>
                                    </tr>
                            <?php
                                $othercharges+=$invoiceData->duty_slip->otherstate_chg;
                            }

                            if(!empty($invoiceData->duty_slip->guide_chg))
                            {
                            ?>
                                    <tr class="ad">
                                    <td colspan="3">Border Tax:</td>
                                    <th colspan="2"><?php echo $invoiceData->duty_slip->guide_chg; ?></th>
                                    </tr>
                            <?php
                                $othercharges+=$invoiceData->duty_slip->guide_chg;
                            }
                            if(!empty($invoiceData->duty_slip->misc_chg))
                            {
                            ?>
                                    <tr class="ad">
                                    <td colspan="3">Miscellaneous Charges</td>
                                    <th colspan="2"><?php echo $invoiceData->duty_slip->misc_chg; ?></th>
                                    </tr>
                            <?php
                                $othercharges+=$invoiceData->duty_slip->misc_chg;
                            }
                            if(!empty($invoiceData->duty_slip->fuel_hike_chg))
                            {
                            ?>
                                    <tr class="ad">
                                    <td colspan="3">Fuel Hike</td>
                                    <th colspan="2"><?php echo $invoiceData->duty_slip->fuel_hike_chg; ?></th>
                                    </tr>
                            <?php
                                $othercharges+=$invoiceData->duty_slip->fuel_hike_chg;
                            }
                         
                            $colspan=2;
                        }
                        if($invoiceData->duty_slip->billing_type=='Corporate Billing')
                        {
                            if($x==1){
                            ?>
                                <th>DATE</th>
                                <th>SERVICES</th>
                                <th>SAC Code</th>
                                <th>TAXI NO./GUIDE Tkt. No.</th>
                                <th>Amount in INR</th>
                                </tr>
                            <?php
                            }
                            ?>
                                <tr class="ad">
                                    <td align="center"><?php echo date('d-m-Y',strtotime($invoiceData->duty_slip->service_date)); ?></td>
                                    
                                    <td align="center"><?php echo $invoiceData->duty_slip->service->name.' @ '.$invoiceData->duty_slip->rate; ?>/- x <?php echo $invoiceData->duty_slip->no_of_days; ?></td>
                                    <td width="15%" align="center"><?php echo $invoiceData->duty_slip->service->sec_code;?></td>
                                    <td align="center"><?php echo $invoiceData->duty_slip->texi_no; ?></td>
                                    <th align="center"><?php echo $invoiceData->duty_slip->cop_amounts; ?></th>
                                </tr>
                            <?php
                            $colspan=0; 
                        }
                    }
                ?>
                <tr class="ad">
                    <th colspan="3">Total</th>
                    <?php if($colspan==0){echo"<th></th>";}?>
                    <th colspan="<?php echo $colspan; ?>"><?php echo $invoice->total; ?></th>
                </tr>
                <?php
                if(!empty($invoice->discount))
                {
                    ?>
                    <tr class="ad">
                        <th colspan="3">Discount</th>
                        <?php if($colspan==0){echo"<th></th>";}?>
                        <th colspan="<?php echo $colspan; ?>"><?php echo $invoice->discount; ?></th>
                    </tr>
                    <?php
                }
                if(!empty($othercharges))
                {
                    ?>
                    <tr class="ad">
                        <th colspan="3">Other Charges</th>
                        <?php if($colspan==0){echo"<th></th>";}?>
                        <th colspan="<?php echo $colspan; ?>"><?php echo $othercharges; ?></th>
                    </tr>
                    <?php
                }
                if(!empty($invoice->tax))
                {
                    $taxData = $DateConvert->taxData($invoice->id);   
                    foreach ($taxData as $accountingEntry) {
                        ?>
                        <tr class="ad">
                            <th colspan="3"> <?php echo $accountingEntry->ledger->name; ?></th>
                             <?php if($colspan==0){echo"<th></th>";}?>
                            <th colspan="<?php echo $colspan; ?>"><?php echo $accountingEntry->credit; ?></th>
                        </tr>
                        <?php
                    }
                }
                ?>

                <tr class="ad">
                    <th colspan="3">Grand Total</th>
                    <?php if($colspan==0){echo"<th></th>";}?>
                    <th colspan="<?php echo $colspan; ?>"><?php echo $invoice->grand_total; ?></th>
                </tr>
                <tr class="ad">
                    <td colspan="5"><b><?php echo $invoice->grand_total; ?> Only</b></td>
                </tr>
                <tr class="ad">
                    <td colspan="3"><b>SIGNATURE IN CONFIRMATION</b><br/><span style="font-size: 11px; font-style:italic;">of terms & condition overleaf</span></td>
                    <?php if($colspan==0){echo"<th></th>";}?>
                    <td colspan="<?php echo $colspan; ?>">For: Comfort Travels & Tours</td>
                </tr>
                <tr class="ad"><td colspan="5" style="border-bottom:none;">&nbsp;</td></tr>
                <tr class="ad"><td colspan="5" style="border-top:none;">&nbsp;</td></tr>
                <tr class="ad">
                    <td colspan="3">(Name............................................)</td>
                    <?php if($colspan==0){echo"<th></th>";}?>
                    <td colspan="<?php echo $colspan; ?>"> Authorised Signatory</td>
                </tr>
                <tr class="ad">
                    <td colspan="5" style="color:#0872BA;"><b>Other Info.</b> <span>PAN No. AAWPC1369E, GST No. : 08AAWPC1369E1ZL<br /><b>Email:-</b> operations@comforttours.com ,  siddhant.chatur@comforttours.com</span></td>
                </tr>
                <tr class="ad">
                    <td colspan="5" style="color:#0872BA;"><strong>For Bookings Contact:</strong> +91-9829794669 , +91-9602131131</td>
                </tr>
            </table>
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
    $('#pdfData').html($('#main_data').html());
        
});
</script>
