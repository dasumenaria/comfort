<style type="text/css">
td{
    padding-left: 5px; 
}
</style>
<section class="content"> 
<div class="row">
    <div class="col-md-12"> 
            <?php
            for($i=1;$i<=2;$i++)
            {
                $total_time      = strtotime($dutySlip->closing_time) - strtotime($dutySlip->opening_time);
                $hours      = floor($total_time / 60 / 60);
                $minutes    = round(($total_time - ($hours * 60 * 60)) / 60);
                $time_duration=$hours.'.'.$minutes;

                $opening_km = $dutySlip->opening_km;
                $closing_km = $dutySlip->closing_km;
                $total_km = $closing_km-$opening_km;

                $main1= strtotime($dutySlip->date_from);
                $main2 = strtotime($dutySlip->date_to);
                $days=(($main2-$main1)/86400); 
                if($dutySlip->service->type == 'intercity'){
                    $days+=1;
                }
                else{
                    if($days==0)
                    $days++;
                }

                if($dutySlip->billing_type == 'Normal Billing') 
                { ?>
                    <table width="100%"  cellpadding="0" cellspacing="0"  style="border-collapse:collapse;">
                        <tr>
                            <td> 
                                <?php echo $this->Html->image('/img/logo.jpg', ['style'=>'float:left; border:2px solid #2E3192;']) ?>
                            </td>
                            <td style="float:right;color:#0872BA;">
                                <span style="font-size:16px !important;"><b>Comfort Travels &amp; Tours</b></span>
                                <br/><span>"Akruti", 4-New Fatehpura, Opp. Saheliyo ki Badi,</span><br/>
                                <span>UDAIPUR-313004 Fax: +91-294-2422131</span><br/>
                                <span><i class="icon-phone"></i> +91-294-2411661/62</span> 
                            </td>
                        </tr>
                    </table>

                    <table width="100%"  border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin-top:1%;"  bordercolor="#0872BA">
                        <tr>
                           <td><strong>DutySlip ID</strong></td>
                           <td><?php echo $dutySlip->id; ?></td>
                           <td><strong>Date</strong></td>
                           <td colspan="3"><?php echo date("d-M-Y",strtotime($dutySlip->date)) ?></td>
                        </tr>
                        <tr>
                           <td><strong>Customer Name</strong></td>
                           <td><?php echo $dutySlip->customer->name; ?></td>
                           <td><strong>Guest:</strong></td>
                           <td colspan="3"><?php echo $dutySlip->guest_name;?></td>
                        </tr>

                        <tr>
                           <td><strong>Guest Mobile</strong></td>
                           <td><?php echo $dutySlip->mobile_no;?></td>
                           <td><strong>Guest Email</strong></td>
                           <td colspan="3"><?php echo $dutySlip->email_id?></td>
                        </tr>


                        <tr>
                           <td><strong>Service</strong></td>
                           <td colspan="5"><?php echo $dutySlip->service->name;?></td>
                        </tr>
                        <tr>
                           <td><strong>Taxi Number</strong></td>
                           <td><?php echo $dutySlip->car->name; ?></td>
                           <td><strong>Driver</strong></td>
                           <td colspan="3"><?php echo $dutySlip->employee->name;; ?></td>
                        </tr>
                        <tr>
                           <td><strong>Opening Date</strong></td>
                           <td><?php echo date('d-m-Y',strtotime($dutySlip->date_from)); ?></td>
                           <td><strong>Closing Date</strong></td>
                           <td><?php echo date('d-m-Y',strtotime($dutySlip->date_to)); ?></td>
                           <td><strong>Total Days</strong></td>
                           <td><?php echo $days ?></td>
                        </tr>
                        <tr>
                           <td><strong>Opening Time</strong></td>
                           <td><?php echo date('H:i:s',strtotime($dutySlip->opening_time)); ?></td>
                           <td><strong>Closing Time</strong></td>
                           <td>
                              <?php if($dutySlip->closing_time != '00:00:00') 
                              { 
                                echo date('H:i:s',strtotime($dutySlip->closing_time));
                              } 
                              else { 
                                  echo '-'; 
                              } ?>
                          </td>
                           <td><strong>Total Hours</strong></td>
                           <td><?php if($dutySlip->closing_time != '00:00:00')
                              { 
                                echo $time_duration; 
                              }
                              else 
                              { 
                                echo '-';  
                              }
                             ?>
                           </td>
                        </tr>
                        <tr>
                           <td><strong>Opening KM</strong></td>
                           <td>
                            <?php if($dutySlip->opening_km != 0)
                              { 
                                echo $dutySlip->opening_km; 
                              }
                              else 
                              { 
                                echo '-';  
                              }
                            ?>
                           </td>
                           <td><strong>Closing KM</strong></td>
                           <td> 
                            <?php if($dutySlip->closing_km != 0)
                              { 
                                echo $dutySlip->closing_km; 
                              }
                              else 
                              { 
                                echo '-';  
                              }
                            ?>
                           </td>
                           <td><strong>Total Run</strong></td>
                           <td> 
                            <?php if($dutySlip->closing_km != 0)
                              { 
                                echo $total_km; 
                              }
                              else 
                              { 
                                echo '-';  
                              }
                            ?>
                           </td>
                        </tr>
                        <tr>
                           <td><strong>Guest Comment</strong></td>
                           <td colspan="5"></td>
                        </tr>
                        <tr>
                            <td><strong>Remarks</strong></td>
                            <td colspan="5"><?php echo $dutySlip->remarks; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Autorized Signature</strong></td>
                            <td height="35px" colspan="5"></td>
                        </tr>
                    </table>
                    <?php  if($i==1){ ?>
                        <br /> 
                        <br />
                        <p style="text-align:center">--------------------<i class="fa fa-cut"></i>--------------------</p>
                        <br />
                        <br />
                    <?php } 
                }
                else if($dutySlip->billing_type == 'Corporate Billing')
                {         
                    ?> 
                    <table width="100%"  cellpadding="0" cellspacing="0"  style="border-collapse:collapse;">
                        <tr>
                            <td>
                                <?php echo $this->Html->image('/img/logo.jpg', ['style'=>'float:left; border:2px solid #2E3192;']) ?>
                            </td>
                            <td style="float:right;color:#0872BA;">
                                <span style="font-size:16px !important;"><b>Comfort Travels &amp; Tours</b></span>
                                <br/><span>"Akruti", 4-New Fatehpura, Opp. Saheliyo ki Badi,</span><br/>
                                <span>UDAIPUR-313004 Fax: +91-294-2422131</span><br/>
                                <span><i class="icon-phone"></i> +91-294-2411661/62</span>
                            </td>
                        </tr>
                    </table>
                        <table width="100%"  border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin-top:1%;"  bordercolor="#0872BA">
                            <tr>
                           <td><strong>DutySlip ID</strong></td>
                           <td><?php echo $dutySlip->id; ?></td>
                           <td><strong>Date</strong></td>
                           <td colspan="3"><?php echo  date("d-M-Y",strtotime($dutySlip->date)) ?></td>
                        </tr>
                        <tr>
                           <td><strong>Customer Name</strong></td>
                           <td><?php echo $dutySlip->customer->name; ?></td>
                           <td><strong>Guest:</strong></td>
                           <td colspan="3"><?php echo $dutySlip->guest_name;?></td>
                        </tr>

                        <tr>
                           <td><strong>Guest Mobile</strong></td>
                           <td><?php echo $dutySlip->mobile_no;?></td>
                           <td><strong>Guest Email</strong></td>
                           <td colspan="3"><?php echo $dutySlip->email_id?></td>
                        </tr>


                        <tr>
                           <td><strong>Service</strong></td>
                           <td colspan="5"><?php echo $dutySlip->service->name;?></td>
                        </tr>
                        <tr>
                           <td><strong>Taxi Number</strong></td>
                           <td colspan="5"><?php echo $dutySlip->texi_no; ?></td>
                        </tr>
                              
                        <tr>
                           <td><strong>Rate</strong></td>
                           <td><?php echo $dutySlip->rate; ?></td>
                           <td><strong>No of Days</strong></td>
                           <td><?php echo $dutySlip->no_of_days; ?></td>
                           <td><strong>Amount</strong></td>
                           <td><?php echo $dutySlip->cop_amounts; ?></td>
                        </tr>
                            
                        <tr>
                           <td><strong>Guest Comment</strong></td>
                           <td colspan="5"></td>
                        </tr>
                        <tr>
                            <td><strong>Remarks</strong></td>
                            <td colspan="5"><?php echo $dutySlip->remarks; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Autorized Signature</strong></td>
                            <td height="35px" colspan="5"></td>
                        </tr>
                    </table>
                        <?php  if($i==1){ ?>
                        <br /> <br />
                        <p style="text-align:center">--------------------<i class="fa fa-cut"></i>--------------------</p>
                        <br /><br />
                       <?php 
                        }
                    }

                } 
                 $body = '<!doctype html>
                    <html>
                    <head>
                        <meta charset="utf-8">
                        <title>Untitled Document</title>
                        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
                    </head>
                    <body>
                        <div style="font-family:Arial,sans-serif; font-size:13px; color:#555; width:100%; max-width:600px; line-height:2; margin:0 auto;">
                            <div style="border:1px solid #ddd; background:#fff;">
                                <div style="background: #fff; padding: 10px 10px;">
                                    <div style="display:inline-block;  max-width:100%; vertical-align:top;">
                                            <a href="#" target="_blank"><img src="http://comforttours.in/assets/logo.jpg" alt="comforttours" title="comforttours" border="0" style="vertical-align:bottom;"></a></div>
                                        <div style="display: inline-block;line-height: 1.8;padding-top: 1px;padding-left: 10px;font-style: oblique;">
                                            "Akruti", 4-New Fatehpura, Opp. Saheliyo ki Badi,<br>
                                            UDAIPUR-313004 Fax: +91-294-2422131<br>
                                            <i class="fa fa-phone"></i> +91-294-2411661/62
                                        </div>
                                    </div>
                            
                                    <div style="height:5px; background: #d8c808; background: -moz-linear-gradient(left, #d8c808 0%, #f49414 14%, #e53a24 28%, #594b97 43%, #594b97 43%, #008dd3 57%, #00546d 72%, #009a84 85%, #54af3a 100%);background: -webkit-linear-gradient(left,  #d8c808 0%,#f49414 14%,#e53a24 28%,#594b97 43%,#594b97 43%,#008dd3 57%,#00546d 72%,#009a84 85%,#54af3a 100%); background: linear-gradient(to right,  #d8c808 0%,#f49414 14%,#e53a24 28%,#594b97 43%,#594b97 43%,#008dd3 57%,#00546d 72%,#009a84 85%,#54af3a 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=#d8c808, endColorstr=#54af3a,GradientType=1);">
                                    </div>
                            
                                    <div style="border-bottom: 1px solid #e6e6e6; background-color: #fafafa; padding:5px 20px 10px; font-size:15px;">
                                        <p><strong>Hello '.$dutySlip->guest_name.'!</strong></p>
                                        <p>Thank you for Chossing your Travel with Comfort Travels & Tours !<br></p>
                                    </div>
                                 
                                 <div>
                                       <div style="padding:0 20px;">
                                           <table cellpadding="0" cellspacing="0" style="border-collapse:collapse; width:100%;">
                                             <tr>
                                                <td align="center" style="padding:4px 10px; border:1px solid #CCC;"><strong>Booking No</strong></td>
                                                <td align="center" style="padding:4px 10px; border:1px solid #CCC;"> '.$dutySlip->id.'</td>
                                                <td align="center" style="padding:4px 10px; border:1px solid #CCC;"><strong>Date</strong></td>
                                                <td colspan="3" align="center" style="padding:4px 10px; border:1px solid #CCC;"> '. date("d-M-Y",strtotime($dutySlip->date)).'</td>
                                                   </tr>
                                                   <tr>
                                               
                                                <td align="center" style="padding:4px 10px; border:1px solid #CCC;"><strong>Guest Name:</strong></td>
                                                <td colspan="3" align="center" style="padding:4px 10px; border:1px solid #CCC;">'.$dutySlip->guest_name.'</td>
                                            </tr>
                                            <tr>
                                               <td align="center" style="padding:4px 10px; border:1px solid #CCC;"><strong>Service Type</strong></td>
                                               <td colspan="5" align="center" style="padding:4px 10px; border:1px solid #CCC;">'.$dutySlip->service->name.'</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="padding:10px 20px;">
                                        <p>For More Details Please Contact On :- <br />
                                          Email -:  operations@comforttours.com , siddhant.chatur@comforttours.com <br />
                                          Phone -:  +91-9829794669 , +91-9602131131
                                          </p>
                                    </div>
                                </div>
                                <div style="height:25px; color:#fff; background: #d8c808; background: -moz-linear-gradient(left,  #d8c808 0%, #f49414 14%, #e53a24 28%, #594b97 43%, #594b97 43%, #008dd3 57%, #00546d 72%, #009a84 85%, #54af3a 100%); background: -webkit-linear-gradient(left,  #d8c808 0%,#f49414 14%,#e53a24 28%,#594b97 43%,#594b97 43%,#008dd3 57%,#00546d 72%,#009a84 85%,#54af3a 100%); background: linear-gradient(to right,  #d8c808 0%,#f49414 14%,#e53a24 28%,#594b97 43%,#594b97 43%,#008dd3 57%,#00546d 72%,#009a84 85%,#54af3a 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=#d8c808, endColorstr=#54af3a,GradientType=1 );">
                                </div>
                                <div style="background-color: #fafafa; padding:5px 20px 10px;">
                                <div style="padding:0 15px; text-align:center;"> <a href="#" style="display:inline-block; color:#555; text-decoration:none;">Terms &amp; Conditions</a> | <a href="#" style="display:inline-block; color:#555; text-decoration:none;">FAQs</a> | <span style="display:inline-block;">100% Authenticity</span> | <span style="display:inline-block;">Easy Customer Support</span> </div>
                                </div>
                            </div>
                        </div>
                    </body>
                    </html> ';
                    //$to  = $row_data['email_id'];
                    $from = 'siddhant.chatur@comforttours.com ';
                    $subject = 'Cab Dispatch details from Comfort Travels and Tours, Udaipur';
                    //smtpmailer($to, $from,$subject, $body);
                ?>
            </div>
        </div>
    </div>
</div>
</section>