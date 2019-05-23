<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Report_".date('d-m-Y').".xls");
header("Content-Type: application/force-download");
header("Cache-Control: post-check=0, pre-check=0", true); 
date_default_timezone_set('asia/kolkata');
echo $pdfData;
?> 