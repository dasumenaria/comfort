<?php //pr($quotation->employee->signature); exit;
//use Cake\Mailer\Email;

//require_once(ROOT . DS  .'vendor' . DS  . 'dompdf' . DS . 'autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();   
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
$html.=$pdfData;
$name=$filename;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$dompdf->stream($name,array('Attachment'=>0));
exit(0);