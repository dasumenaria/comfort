<?php

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options(); 
$options->set('isRemoteEnabled', true);  
$dompdf = new Dompdf(); 
$filename = 'Invoice_'.time();


$html='
<table width="100%"  cellpadding="0" cellspacing="0"  style="border-collapse:collapse;">
    <tr>
      <td> 
        <img src="'.ROOT . DS  . 'webroot' . DS  .'img/logo.jpg" style="float:left; border:2px solid #2E3192;" alt="">
      </td>
      <td style="float:right;color:#0872BA;">
          <span style="font-size:16px !important;"><b>Comfort Travels &amp; Tours</b></span>
          <br/><span>"Akruti", 4-New Fatehpura, Opp. Saheliyo ki Badi,</span><br/>
          <span>UDAIPUR-313004 Fax: +91-294-2422131</span><br/>
          <span><i class="icon-phone"></i> +91-294-2411661/62</span> 
      </td>
    </tr>
</table>';
 if(!empty($gst_number)) { $gst = $gst_number;} else{ $gst = $invoice->invoice_gst;} 
 $invDate = date('d-M-Y', strtotime($invoice->date));; 
$html.='
<table width="100%" class="maintb" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin-top:1%;margin-bottom: 20px;" bordercolor="#0872BA" id="main_data">
    <tbody>
    <tr class="ad"> 
        <td width="15%">Bill To M/s.</td>
        <td colspan="2" width="55%"><strong>'.$invoice->customer->name.'</strong></td>
        <td colspan="2">Original for Recipients </td>
    </tr>
    <tr class="ad"> 
        <td>Billing Address</td>
        <td colspan="2">'.$invoice->customer->address.'</td>
        <td width="15%">Invoice No.</td>
        <td width="15%"><strong>'.$invoice->invoice_no.'</strong></td>
    </tr>
    <tr class="ad"> 
        <td>Billing GST</td>
        <td colspan="2">'.$gst.'</td>
        <td>Date</td>
        <td>'.$invDate.'</td>
    </tr>
    <tr class="ad"> 
        <td>Guest Name</td>
        <td colspan="2">'.$invoice->invoice_details[0]->duty_slip->guest_name.'</td> 
        <td colspan="2"> </td> 
    </tr>
    <tr class="ad">
        <td>REF.</td>
        <td colspan="4"></td>
    </tr>
    <tr class="ad">
    ';
         
        $x=0; 
        $othercharges=0;
        foreach ($invoice->invoice_details as $invoiceData) 
        {
            $x++;

            if($invoiceData->duty_slip->billing_type == 'Normal Billing')
            {
                if($x==1)
                {
                   
                    $html.='<th colspan="2">Description</th>
                        <th>SAC Code</th>
                        <th colspan="2">Amount in INR</th>
                    </tr>';
                     
                }

                if(!empty($invoiceData->duty_slip->temp_car_no))
                    $car_no=$invoiceData->duty_slip->temp_car_no;
                else
                    $car_no=$invoiceData->duty_slip->car->name;

                $main_amnt=($invoiceData->duty_slip->tot_amnt-($invoiceData->duty_slip->extra_chg+$invoiceData->duty_slip->permit_chg+$invoiceData->duty_slip->otherstate_chg+$invoiceData->duty_slip->guide_chg+$invoiceData->duty_slip->misc_chg+$invoiceData->duty_slip->parking_chg+$invoiceData->duty_slip->fuel_hike_chg));
                $ctyName='Udaipur';

                if(!empty($invoiceData->city)){$ctyName=$invoiceData->city;}
                $tariffData = $DateConvert->tariffData($invoiceData->duty_slip->service_id,$invoiceData->duty_slip->customer_id,$invoiceData->duty_slip->car_type_id);
                $minimum_chg_hourly = @$tariffData->minimum_chg_hourly;
                $minimum_chg_km = @$tariffData->minimum_chg_km;
                $dayda = date('d-M-Y', strtotime($invoiceData->duty_slip->date));
                $html.='
                <tr class="ad">
                    <td colspan="2" style="text-align:left"> Duty Slip No. '.$invoiceData->duty_slip->id.' dated on '.$dayda.' towards the cost of transport used in '.$ctyName.' for the Service '.$invoiceData->duty_slip->service->name.' ('.$minimum_chg_hourly.' hrs / '.$minimum_chg_km.' kms) by '.$invoiceData->duty_slip->car_type->name.' '.$car_no.'</td>
                    <td width="15%" align="center">'.$invoiceData->duty_slip->service->sac_code.'</td>
                    <th colspan="2">'. $main_amnt.'</th>
                </tr>';
                

                if(!empty($invoiceData->duty_slip->extra))
                {
                    $html.='
                        <tr class="ad">
                        <th colspan="3">Extra  '. $invoiceData->duty_slip->extra.': '.$invoiceData->duty_slip->extra_details.'</th>
                        <th colspan="2">'.$invoiceData->duty_slip->extra_amnt.'</th>
                        </tr>';
                     
                }
                
                if(!empty($invoiceData->duty_slip->extra_chg))
                {
                    $html.='
                        <tr class="ad">
                        <td colspan="3">Toll Tax</td>
                        <th colspan="2">'.$invoiceData->duty_slip->extra_chg.'</th>
                        </tr>';
                 
                    $othercharges+=$invoiceData->duty_slip->extra_chg;
                }

                if(!empty($invoiceData->duty_slip->permit_chg))
                {
                $html.='
                        <tr class="ad">
                        <td colspan="3">Permit Charges</td>
                        <th colspan="2">'.$invoiceData->duty_slip->permit_chg.'</th>
                        </tr>';
                 
                 $othercharges+=$invoiceData->duty_slip->permit_chg;
                }
                if(!empty($invoiceData->duty_slip->parking_chg))
                {
                $html.='
                        <tr class="ad">
                        <td colspan="3">Parking Charges</td>
                        <th colspan="2">'.$invoiceData->duty_slip->parking_chg.'</th>
                        </tr>';
                 
                    $othercharges+=$invoiceData->duty_slip->parking_chg;
                }
                if(!empty($invoiceData->duty_slip->otherstate_chg))
                {
                 $html.='
                        <tr class="ad">
                        <td colspan="3">Driver Allowance:</td>
                        <th colspan="2">'.$invoiceData->duty_slip->otherstate_chg.'</th>
                        </tr>';
                 
                    $othercharges+=$invoiceData->duty_slip->otherstate_chg;
                }

                if(!empty($invoiceData->duty_slip->guide_chg))
                {
                $html.='
                        <tr class="ad">
                        <td colspan="3">Border Tax:</td>
                        <th colspan="2">'.$invoiceData->duty_slip->guide_chg.'</th>
                        </tr>';
                 
                    $othercharges+=$invoiceData->duty_slip->guide_chg;
                }
                if(!empty($invoiceData->duty_slip->misc_chg))
                {
                $html.='
                        <tr class="ad">
                        <td colspan="3">Miscellaneous Charges</td>
                        <th colspan="2">'.$invoiceData->duty_slip->misc_chg.'</th>
                        </tr>';
                        $othercharges+=$invoiceData->duty_slip->misc_chg;
                }
                if(!empty($invoiceData->duty_slip->fuel_hike_chg))
                {
                $html.='
                        <tr class="ad">
                        <td colspan="3">Fuel Hike</td>
                        <th colspan="2">'.$invoiceData->duty_slip->fuel_hike_chg.'</th>
                        </tr>';
                 
                    $othercharges+=$invoiceData->duty_slip->fuel_hike_chg;
                }
             
                $colspan=2;
            }
            if($invoiceData->duty_slip->billing_type=='Corporate Billing')
            {
                if($x==1){
                $html.='
                    <th>DATE</th>
                    <th>SERVICES</th>
                    <th>SAC Code</th>
                    <th>TAXI NO./GUIDE Tkt. No.</th>
                    <th>Amount in INR</th>
                    </tr>';
                 
                }
                $html.='
                    <tr class="ad">
                        <td align="center">'.date('d-m-Y',strtotime($invoiceData->duty_slip->service_date)).'</td>
                        
                        <td align="center">'.$invoiceData->duty_slip->service->name.' @ '.$invoiceData->duty_slip->rate; ?>/- x <?php echo $invoiceData->duty_slip->no_of_days.'</td>
                        <td width="15%" align="center">'.$invoiceData->duty_slip->service->sec_code.'</td>
                        <td align="center">'.$invoiceData->duty_slip->texi_no.'</td>
                        <th align="center">'.$invoiceData->duty_slip->cop_amounts.'</th>
                    </tr>';
                
                $colspan=0; 
            }
        }
    $html.='
    <tr class="ad">
        <th colspan="3">Total</th>';
         if($colspan==0){
            $html.='<th></th>'; 
        } 
        $html.='<th colspan="'.$colspan.'">'.$invoice->total.'</th>
    </tr>';
    
    if(!empty($invoice->discount))
    {
        $html.='
        <tr class="ad">
            <th colspan="3">Discount</th>';
        if($colspan==0){
            $html.='<th></th>'; 
        } 
        $html.='<th colspan="'.$colspan.'">'.$invoice->discount.'</th>
        </tr>';
         
    }
    if(!empty($othercharges))
    {
        $html.='
        <tr class="ad">
            <th colspan="3">Other Charges</th>';
        if($colspan==0){
            $html.='<th></th>'; 
        } 
        $html.='<th colspan="'.$colspan.'">'.$othercharges.'</th>
        </tr>';
         
    }
    if(!empty($invoice->tax))
    {
        $taxData = $DateConvert->taxData($invoice->id);   
        foreach ($taxData as $accountingEntry) {
            $html.='
            <tr class="ad">
                <th colspan="3"> '.$accountingEntry->ledger->name.'</th>';
            if($colspan==0){
                $html.='<th></th>'; 
            } 
            $html.='<th colspan="'.$colspan.'">'.$accountingEntry->credit.'</th>
            </tr>';
             
        }
    }
    $html.='

    <tr class="ad">
        <th colspan="3">Grand Total</th>';
        if($colspan==0){
            $html.='<th></th>'; 
        } 
        $html.='<th colspan="'.$colspan.'">'.$invoice->grand_total.'</th>
    </tr>
    <tr class="ad">
        <td colspan="5"><b>'.$NumbersComponent->convertNumberToWord($invoice->grand_total).'  Only</b></td>
    </tr>
    <tr class="ad">
        <td colspan="3"><b>SIGNATURE IN CONFIRMATION</b><br/><span style="font-size: 11px; font-style:italic;">of terms & condition overleaf</span></td>';
        if($colspan==0){
            $html.='<th></th>'; 
        } 
        $html.='<td colspan="'.$colspan.'">For: Comfort Travels & Tours</td>
    </tr>
    ';

    $html.='  
            <tr class="auth">
                <td colspan="3">(Name............................................)</td>';
                if($colspan==0){$html.='<th></th>';} 

                $html.='<td colspan="'.$colspan.'"> 
                <img src="'.ROOT . DS  . 'webroot' . DS  .'img/sign.png" style="margin:5px;width:150px" alt="">      
                Authorised Signatory</td>
            </tr>
            <tr class="ad">
                <td colspan="5" style="color:#0872BA;"><b>Other Info.</b> <span>PAN No. AAWPC1369E, GST No. : 08AAWPC1369E1ZL<br /><b>Email:-</b> operations@comforttours.com ,  siddhant.chatur@comforttours.com</span></td>
            </tr>
            <tr class="ad">
                <td colspan="5" style="color:#0872BA;"><strong>For Bookings Contact:</strong> +91-9829794669 , +91-9602131131</td>
            </tr> 
            </tbody>
          </table>';
 
$name=$filename;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream($name,array('Attachment'=>0));
exit(0);

      