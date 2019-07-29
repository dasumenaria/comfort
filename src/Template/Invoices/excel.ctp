<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Report_".date('d-m-Y').".xls");
header("Content-Type: application/force-download");
header("Cache-Control: post-check=0, pre-check=0", true); 
date_default_timezone_set('asia/kolkata');
echo '<table width="100%"  cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
<tr><td colspan="3"></td>
<td colspan="3" align="center" style="color:#0872BA;"><span style="font-size:18px !important;"><b>Comfort Travels &amp; Tours</b></span></td></tr>
<tr><td colspan="3"></td><td colspan="3"  align="center" style="font-size:16px !important;color:#0872BA;">"Akruti", 4-New Fatehpura, Opp. Saheliyo ki Badi,</span></td></tr>
<tr><td colspan="3"></td><td colspan="3"  align="center" style="font-size:16px !important;color:#0872BA;">UDAIPUR-313004 Fax: +91-294-2422131</td></tr>
<tr><td colspan="3"></td><td colspan="3" align="center" style="font-size:16px !important; color:#0872BA;">Telephone : +91-294-2411661/62
</td>
</tr>
</table>';
echo $pdfData;
?> 