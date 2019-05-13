<?php //pr($quotation->employee->signature); exit;
//use Cake\Mailer\Email;

//require_once(ROOT . DS  .'vendor' . DS  . 'dompdf' . DS . 'autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();   
$dompdf = new Dompdf(); 
$filename = 'dutySlip_'.time();;
 

$total_time      = strtotime($dutySlip->closing_time) - strtotime($dutySlip->opening_time);
$hours      = floor($total_time / 60 / 60);
$minutes    = round(($total_time - ($hours * 60 * 60)) / 60);
$time_duration=$hours.'.'.$minutes;

$opening_km = $dutySlip->opening_km;
$closing_km = $dutySlip->closing_km;
$total_km = $closing_km-$opening_km;

$main1= strtotime($dutySlip->date_from);
$main2 = strtotime($dutySlip->date_from);
$days=(($main2-$main1)/86400);
if($dutySlip->service->type == 'intercity'){
  $days+=1;
}
else{
  if($days==0)
  $days++;
}
$html='<title>DutySlip </title> ';
if($dutySlip->billing_type == 'Normal Billing') 
{ 
  $html.='

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

  $html.='<table width="100%"  border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin-top:1%;"  bordercolor="#0872BA">
      <tr>
         <td><strong>DutySlip ID</strong></td>
         <td>'.$dutySlip->id.'</td>
         <td><strong>Date</strong></td>
         <td colspan="3">'.date("d-M-Y",strtotime($dutySlip->date)).'</td>
      </tr>
      <tr>
         <td><strong>Customer Name</strong></td>
         <td>'.$dutySlip->customer->name.'</td>
         <td><strong>Guest:</strong></td>
         <td colspan="3">'.$dutySlip->guest_name.'</td>
      </tr>

      <tr>
         <td><strong>Guest Mobile</strong></td>
         <td>'.$dutySlip->mobile_no.'</td>
         <td><strong>Guest Email</strong></td>
         <td colspan="3">'.$dutySlip->email_id.'</td>
      </tr>


      <tr>
         <td><strong>Service</strong></td>
         <td colspan="5">'.$dutySlip->service->name.'</td>
      </tr>
      <tr>
         <td><strong>Taxi Number</strong></td>
         <td>'.$dutySlip->car->name.'</td>
         <td><strong>Driver</strong></td>
         <td colspan="3">'.$dutySlip->employee->name.'</td>
      </tr>
      <tr>
         <td><strong>Opening Date</strong></td>
         <td>'.date('d-m-Y',strtotime($dutySlip->date_from)).'</td>
         <td><strong>Closing Date</strong></td>
         <td>'.date('d-m-Y',strtotime($dutySlip->date_to)).'</td>
         <td><strong>Total Days</strong></td>
         <td>'.$days.'</td>
      </tr>
      <tr>
         <td><strong>Opening Time</strong></td>
         <td>'.date('H:i:s',strtotime($dutySlip->opening_time)).'</td>
         <td><strong>Closing Time</strong></td>
         <td>'.date('H:i:s',strtotime($dutySlip->closing_time)).'</td>
         <td><strong>Total Hours</strong></td>
         <td>'.$time_duration.'</td>
      </tr>
      <tr>
         <td><strong>Opening KM</strong></td>
         <td>'.$dutySlip->opening_km.'</td>
         <td><strong>Closing KM</strong></td>
         <td>'.$dutySlip->closing_km.'</td>
         <td><strong>Total Run</strong></td>
         <td>'.$total_km.'</td>
      </tr>
      <tr>
         <td><strong>Guest Comment</strong></td>
         <td colspan="5"></td>
      </tr>
      <tr>
          <td><strong>Remarks</strong></td>
          <td colspan="5">'.$dutySlip->remarks.'</td>
      </tr>
      <tr>
          <td><strong>Autorized Signature</strong></td>
          <td height="35px" colspan="5"></td>
      </tr>
  </table>';

}
else if($dutySlip->billing_type == 'Corporate Billing')
{    
  $html.='<table width="100%"  cellpadding="0" cellspacing="0"  style="border-collapse:collapse;">
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
  $html.='<table width="100%"  border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; margin-top:1%;"  bordercolor="#0872BA">
          <tr>
         <td><strong>DutySlip ID</strong></td>
         <td>'.$dutySlip->id.'</td>
         <td><strong>Date</strong></td>
         <td colspan="3">'. date("d-M-Y",strtotime($dutySlip->date)).'</td>
      </tr>
      <tr>
         <td><strong>Customer Name</strong></td>
         <td>'.$dutySlip->customer->name.'</td>
         <td><strong>Guest:</strong></td>
         <td colspan="3">'.$dutySlip->guest_name.'</td>
      </tr>

      <tr>
         <td><strong>Guest Mobile</strong></td>
         <td>'.$dutySlip->mobile_no.'</td>
         <td><strong>Guest Email</strong></td>
         <td colspan="3">'.$dutySlip->email_id.'</td>
      </tr>


      <tr>
         <td><strong>Service</strong></td>
         <td colspan="5">'.$dutySlip->service->name.'</td>
      </tr>
      <tr>
         <td><strong>Taxi Number</strong></td>
         <td colspan="5">'.$dutySlip->texi_no.'</td>
      </tr>
            
      <tr>
         <td><strong>Rate</strong></td>
         <td>'.$dutySlip->rate.'</td>
         <td><strong>No of Days</strong></td>
         <td>'.$dutySlip->no_of_days.'</td>
         <td><strong>Amount</strong></td>
         <td>'.$dutySlip->cop_amounts.'</td>
      </tr>
          
      <tr>
         <td><strong>Guest Comment</strong></td>
         <td colspan="5"></td>
      </tr>
      <tr>
          <td><strong>Remarks</strong></td>
          <td colspan="5">'.$dutySlip->remarks.'</td>
      </tr>
      <tr>
          <td><strong>Autorized Signature</strong></td>
          <td colspan="5"></td>
      </tr>
  </table>';
  }
  

$name=$filename;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$dompdf->stream($name,array('Attachment'=>0));
exit(0);