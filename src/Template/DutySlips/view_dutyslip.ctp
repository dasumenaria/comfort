<style type="text/css">
td{
    padding-left: 5px; 
    height: 35px;
}
</style>
<section class="content">
<div class="row">
    <div class="col-md-12"> 
            <?php
            
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
                           <td><?php echo date('H:i:s',strtotime($dutySlip->closing_time)); ?></td>
                           <td><strong>Total Hours</strong></td>
                           <td><?php echo $time_duration; ?></td>
                        </tr>
                        <tr>
                           <td><strong>Opening KM</strong></td>
                           <td><?php echo $dutySlip->opening_km; ?></td>
                           <td><strong>Closing KM</strong></td>
                           <td><?php echo $dutySlip->closing_km; ?></td>
                           <td><strong>Total Run</strong></td>
                           <td><?php echo $total_km; ?></td>
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
                    <?php  
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
                            <td colspan="5"></td>
                        </tr>
                    </table>
                    <?php 
                    }
                  ?>
            </div>
        </div>
    </div>
</div>
</section>