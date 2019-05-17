<style type="text/css">
td{
    padding-left: 5px; 
}
</style>
<section class="content"> 
    <div class="row">
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
            <table width="100%"  border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin-top:1%;margin-bottom: 20px;" bordercolor="#0872BA">
                <tr class="ad"> 
                    <td width="15%">Bill To M/s.</td>
                    <td colspan="2" width="55%"><strong><?php echo $invoice->customer_id; ?></strong></td>
                    <td colspan="2">Original for Recipients </td>
                </tr>
                <tr class="ad"> 
                    <td>Billing Address</td>
                    <td colspan="2"><?php echo fetchcustomeraddress($invoice->customer_id); ?></td>
                    <td width="15%">Invoice No.</td>
                    <td width="15%"><strong><?php echo $invoice->id; ?></strong></td>
                    
                </tr>
                <tr class="ad"> 
                    <td>Billing GST</td>
                    <td colspan="2"><?php if(!empty($gst_number)) { echo $gst_number;} else{ echo $invoice->invoice_gst;} ?></td>
                    <td>Date</td>
                    <td><?php echo dateforview($invoice->date); ?></td>
                </tr>
                <tr class="ad"> 
                    <td>Guest Name</td>
                    <td colspan="2"><?php echo $guest_name; ?></td> 
                    <td colspan="2"> </td> 
                </tr>
                <tr>
                    <td>REF.</td>
                    <td colspan="4"></td>
                </tr>
                <tr class="ad">
                    <?php
                    $x=0;
                    foreach ($invoice->invoice_details as $invoiceData) {
                        $x++;
                        if($invoiceData->duty_slip->billing_type == 'Normal Billing'){
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

                            
                        }
                        
                    } 
                    ?>
        </div>
    </div>
</section>