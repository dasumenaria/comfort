<?php
 $url_excel="/?".$url; 
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'GSTR1 Report');
?>
	
<style>
table th {
    white-space: nowrap;
	font-size:12px !important;
}
table td {
	white-space: nowrap;
	font-size:11px !important;
}


</style>
<section class="content">
<?php
    if($RecordShow == 1)
    { ?>
        <table class="hide_print">
            <tr>
                <td>
                    <a href="" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                </td>
            </tr>
        </table>
        <span class="help-block"></span>
    <?php
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i>GST Reports
            </div>
           <br/>
			<div class="box-body" >
			
				<form method="get">
						<div class="row">
							<div class="col-md-3">
								<?php echo $this->Form->control('from_date',['autocomplete'=>'off','class'=>'form-control input-sm datepickers from_date','data-date-format'=>'dd-mm-yyyy', 'label'=>false,'placeholder'=>'DD-MM-YYYY','type'=>'text','value'=>date('d-m-Y',strtotime($from)),'required'=>'required']); ?>
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->control('to_date',['autocomplete'=>'off','class'=>'form-control input-sm datepickers to_date','data-date-format'=>'dd-mm-yyyy', 'label'=>false,'placeholder'=>'DD-MM-YYYY','type'=>'text','value'=>date('d-m-Y',strtotime($to)),'required'=>'required']); ?>
							</div>
							<div class="col-md-3">
								<span class="input-group-btn">
								<button class="btn btn-sm btn-info" type="submit">Go</button>
								</span>
							</div>	
						</div>
				</form>
				<br/>
				<table class="table table-bordered table-hover table-condensed" width="100%" border="1">
					<thead>
						<tr>
							<th scope="col" colspan="12" style="text-align:center;background-color:#8594a3";>B2C </th>
						</tr>
						<tr>
							<th scope="col" style="text-align:center";>Sr.no</th>
							<th scope="col" style="text-align:center";>Party Name</th>
							<th scope="col" style="text-align:center";>GSTIn</th>
							<th scope="col" style="text-align:center";>State</th>
							<th scope="col" style="text-align:center";>Invoice No</th>
							<th scope="col" style="text-align:center";>Bill date</th>
							<th scope="col" style="text-align:center";>GST Rate</th>
							<th scope="col" style="text-align:center";>Sub Total</th>
							<th scope="col" style="text-align:center";>CGST Amt.</th>
							<th scope="col" style="text-align:center";>SGST Amt.</th>
							<th scope="col" style="text-align:center";>IGST Amt.</th>
							<th scope="col" style="text-align:center";>Total.</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$i=1;
					$totalCgstB2C=0;
					$totalSgstB2C=0;
					$totalIgstB2C=0;
					$totaltaxableB2C=0;
					$totalnetamountB2C=0;
					foreach($salesInvoicesDatas as $data){
						if(empty($data->customer->gst_number)){
						
					?>	<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $data->customer->name; ?></td>
							<td><?php echo $data->customer->gst_number; ?></td>
							<td><?php echo $data->customer->state; ?></td>
							<td><?= h(str_pad($data->invoice_no, 3, '0', STR_PAD_LEFT))?></td>
							<td><?=date('d-m-Y',strtotime($data->date)) ?></td>
							<td><?=$data->gst_figure->name?></td>
							<td><?=$data->grand_total?></td>
							<?php if($data->customer->state=='Rajasthan'){ ?>
								<td><?=$data->tax/2?></td>
								<td><?=$data->tax/2?></td>
								<td></td>
								<?php
									$totalCgstB2C+=$data->tax/2;
									$totalSgstB2C+=$data->tax/2;
								?>
							<?php }else{ ?>
								<td></td>
								<td></td>
								<td><?=$data->tax;?></td>
								<?php
									$totalIgstB2C+=$data->tax;
								?>
							<?php } ?>
							<td><?=$data->total?></td>
							<?php
									$totaltaxableB2C+=$data->grand_total;
									$totalnetamountB2C+=$data->total;
							?>
						</tr>
					<?php
						
					}
					}
					?>
					<tr>
						<td align="right" colspan="7"><b>Total</td>
						<td ><b><?php echo $totaltaxableB2C ?></td>
						<td ><b><?php echo $totalCgstB2C ?></td>
						<td ><b><?php echo $totalSgstB2C ?></td>
						<td ><b><?php echo $totalIgstB2C ?></td>
						<td ><b><?php echo $totalnetamountB2C ?></td>
					</tr>
					</tbody>
					</table>
					<br>
					<table class="table table-bordered table-hover table-condensed" width="100%" border="1">
					<thead>
						<tr>
							<th scope="col" colspan="12" style="text-align:center;background-color:#bdc193";>B2B </th>
						</tr>
						<tr>
							<th scope="col" style="text-align:center";>Sr.no</th>
							<th scope="col" style="text-align:center";>Party Name</th>
							<th scope="col" style="text-align:center";>GSTIn</th>
							<th scope="col" style="text-align:center";>State</th>
							<th scope="col" style="text-align:center";>Invoice No</th>
							<th scope="col" style="text-align:center";>Bill date</th>
							<th scope="col" style="text-align:center";>GST Rate</th>
							<th scope="col" style="text-align:center";>Sub Total</th>
							<th scope="col" style="text-align:center";>CGST Amt.</th>
							<th scope="col" style="text-align:center";>SGST Amt.</th>
							<th scope="col" style="text-align:center";>IGST Amt.</th>
							<th scope="col" style="text-align:center";>Total.</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$i=1;
					$totalCgstB2B=0;
					$totalSgstB2B=0;
					$totalIgstB2B=0;
					$totaltaxableB2B=0;
					$totalnetamountB2B=0;
					foreach($salesInvoicesDatas as $data){
						if(!empty($data->customer->gst_number)){
						
					?>	<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $data->customer->name; ?></td>
							<td><?php echo $data->customer->gst_number; ?></td>
							<td><?php echo $data->customer->state; ?></td>
							<td><?= h(str_pad($data->invoice_no, 3, '0', STR_PAD_LEFT))?></td>
							<td><?=date('d-m-Y',strtotime($data->date))?></td>
							<td><?=$data->gst_figure->name?></td>
							<td><?=$data->total?></td>
							<?php if($data->customer->state=='Rajasthan'){ ?>
								<td><?=$data->tax/2?></td>
								<td><?=$data->tax/2?></td>
								<td></td>
								<?php
									$totalCgstB2B+=$data->tax/2;
									$totalSgstB2B+=$data->tax/2;
								?>
							<?php }else{ ?>
								<td></td>
								<td></td>
								<td><?=$data->tax;?></td>
								<?php
									$totalIgstB2B+=$data->tax;
								?>
							<?php } ?>
							<td><?=$data->grand_total?></td>
							<?php
									$totaltaxableB2B+=$data->total;
									$totalnetamountB2B+=$data->grand_total;
							?>
						</tr>
					<?php
							
						}
					}
					?>
					<tr>
						<td align="right" colspan="7"><b>Total</td>
						<td ><b><?php echo $totaltaxableB2B ?></td>
						<td ><b><?php echo $totalCgstB2B ?></td>
						<td ><b><?php echo $totalSgstB2B ?></td>
						<td ><b><?php echo $totalIgstB2B ?></td>
						<td ><b><?php echo $totalnetamountB2B ?></td>
					</tr>
					</tbody>
					</table>
					<br>
					
					<table class="table table-bordered table-hover table-condensed" width="100%" border="1">
					<thead>
						<tr>
							<th scope="col" colspan="10" style="text-align:center; background-color:#979aa0";><b>STATE WISE B2C SUPPLIES</th>
						</tr>
						<tr>
							<th scope="col" style="text-align:center";>Sr.no</th>
							<th scope="col" style="text-align:center";>Ship to state</th>
							<th scope="col" style="text-align:center";>Transaction Type</th>
							<th scope="col" style="text-align:center";>GST Rate</th>
							<th scope="col" style="text-align:center";>Invoice Amount</th>
							<th scope="col" style="text-align:center";>Tax Exclusive Gross</th>
							<th scope="col" style="text-align:center";>Total Tax Amount</th>
							<th scope="col" style="text-align:center";>CGST</th>
							<th scope="col" style="text-align:center";>SGST</th>
							<th scope="col" style="text-align:center";>IGST</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$i=1;
					$totalCgst=0;
					$totalSgst=0;
					$totalIgst=0;
					$totaltaxable=0;
					$totalnetamount=0;
					foreach($StateWiseTaxableAmt as $key=>$datas){ 
						foreach($datas as $key1=>$dt) 
						{   
						
					?>	<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $StateName[$key]; ?></td>
							<td><?php echo "Cash"; ?></td>
							<td><?php echo $GstFiguresDatas[$key1]; ?></td>
							<td><?php echo $StateWiseTaxableAmt[$key][$key1]+$StateWiseGst[$key][$key1]; 
								$totalnetamount+=$StateWiseTaxableAmt[$key][$key1]+$StateWiseGst[$key][$key1];
							?></td>
							<td><?php echo $StateWiseTaxableAmt[$key][$key1]; 
								$totaltaxable+=$StateWiseTaxableAmt[$key][$key1];
							?></td>
							<td><?php echo $StateWiseGst[$key][$key1]; 
							
							?></td>
							<?php if($key==46){ ?>
							<td><?php echo $StateWiseGst[$key][$key1]/2; 
							$totalCgst+=$StateWiseGst[$key][$key1]/2;
							?></td>
							<td><?php echo $StateWiseGst[$key][$key1]/2; 
							$totalSgst+=$StateWiseGst[$key][$key1]/2;
							?></td>
							<td>
							<?php }else{ ?>
							<td></td>
							<td></td>
							<td><?php echo $StateWiseGst[$key][$key1]; 
							$totalIgst+=$StateWiseGst[$key][$key1];
							?></td>
							<?php } ?>
							
						</tr>
					<?php
						}
					}
					?>
					<tr>
						<td align="right" colspan="4"><b>Total</td>
						<td ><b><?php echo $totalnetamount ?></td>
						<td ><b><?php echo $totaltaxable ?></td>
						<td ><b><?php echo $totalIgst ?></td>
						<td ><b><?php echo $totalCgst ?></td>
						<td ><b><?php echo $totalSgst ?></td>
						<td ><b><?php echo $totalIgst ?></td>
					</tr>
					</tbody>
					</table>
					<br>
					<table class="table table-bordered table-hover table-condensed" width="100%" border="1">
						<thead>
							
							<tr>
								<th scope="col" style="text-align:center";></th>
								<th scope="col" style="text-align:center";>Invoice Amount</th>
								<th scope="col" style="text-align:center";>Tax Exclusive Gross</th>
								<th scope="col" style="text-align:center";>Total Tax Amount</th>
								<th scope="col" style="text-align:center";>CGST</th>
								<th scope="col" style="text-align:center";>SGST</th>
								<th scope="col" style="text-align:center";>IGST</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>B2C</td>
								<td ><?php echo $totalnetamountB2C; ?></td>
								<td ><?php echo $totaltaxableB2C; ?></td>
								<td ><?php echo $totalCgstB2C+$totalSgstB2C+$totalIgstB2C; ?></td>
								<td ><?php echo $totalCgstB2C; ?></td>
								<td ><?php echo $totalSgstB2C; ?></td>
								<td ><?php echo $totalIgstB2C; ?></td>
						
							</tr>
							<tr>
								<td>B2B</td>
								<td ><?php echo $totalnetamountB2B ?></td>
								<td ><?php echo $totaltaxableB2B ?></td>
								<td ><?php echo $totalCgstB2B+$totalSgstB2B+$totalIgstB2B; ?></td>
								<td ><?php echo $totalCgstB2B ?></td>
								<td ><?php echo $totalSgstB2B ?></td>
								<td ><?php echo $totalIgstB2B ?></td>
						
							</tr>
							<tr>
							<td>Total</td>
							<td><b><?php echo $totalnetamountB2B+$totalnetamountB2C; ?></td>
							<td><b><?php echo $totaltaxableB2B+$totaltaxableB2C; ?></td>
							<td><b><?php echo $totalCgstB2C+$totalSgstB2C+$totalIgstB2C+$totalCgstB2B+$totalSgstB2B+$totalIgstB2B; ?></td>
							<td><b><?php echo $totalCgstB2C+$totalCgstB2B; ?></td>
							<td><b><?php echo $totalSgstB2C+$totalSgstB2B; ?></td>
							<td><b><?php echo $totalIgstB2C+$totalIgstB2B; ?></td>
							
							</tr>
						</tbody>
						
					</table>
				</div> 
        </div>  
    </div>
</div>
</section>
<?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?> 

