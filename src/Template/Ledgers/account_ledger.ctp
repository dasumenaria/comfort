<?php
 $url_excel="/?".$url; 

/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'Account Ledger report');
?>
<?php
	if($status=='excel'){
		$date= date("d-m-Y"); 
	$time=date('h:i:a',time());

	$filename="Invoice_report_".$date.'_'.$time;
	//$from_date=date('d-m-Y',strtotime($from_date));
	//$to_date=date('d-m-Y',strtotime($to_date));
	
	header ("Expires: 0");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/vnd.ms-excel");
	header ("Content-Disposition: attachment; filename=".$filename.".xls");
	header ("Content-Description: Generated Report" ); 
	echo '<table width="100%"  cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
<tr><td colspan="3"></td>
<td colspan="3" align="center"><span style="font-size:18px !important;"><b>Comfort Travels &amp; Tours</b></span></td></tr>
<tr><td colspan="3"></td><td colspan="3"  align="center" style="font-size:16px !important;">"Akruti", 4-New Fatehpura, Opp. Saheliyo ki Badi,</span></td></tr>
<tr><td colspan="3"></td><td colspan="3"  align="center" style="font-size:16px !important;">UDAIPUR-313004 Fax: +91-294-2422131</td></tr>
<tr><td colspan="3"></td><td colspan="3" align="center" style="font-size:16px !important; ">Telephone : +91-294-2411661/62
</td>
</tr>
</table>';
	}

 
?>

<style>
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
<section class="content">
    <div class="row">
	    <div class="col-md-12">
	         <div class="box box-primary">
	             <?php if($status!='excel'){ ?>
	            <div class="box-header with-border hide_print">
                      <i class="fa fa-plus"></i>Account Ledger Report
                 </div>
                 <?php echo $this->Html->link( '<i class="fa fa-file-excel-o"></i> Excel', '/Ledgers/AccountLedger'.@$url_excel.'&status=excel',['class' =>'btn btn-sm green tooltips pull-right','target'=>'_blank','escape'=>false,'data-original-title'=>'Download as excel']); ?>
                 <div class="box-body" > 
                 
                    <div class="row"> 
                        <div class="col-md-12">
                                    <form method="GET" >
        						<div class="col-md-3">
        							<div class="form-group">
        								<label>Ledgers</label>
        								<?php 
        								echo $this->Form->input('ledger_id', ['options'=>$ledgers,'label' => false,'class' => 'form-control input-sm select2' ,'value'=>$ledger_id, 'required'=>'required']); 
        								?>
        							</div>
        						</div>
        						<div class="col-md-2">
        							<div class="form-group">
        								<label>From Date</label>
        								<?php 
        								if(@$from_date=='1970-01-01')
        								{
        									$from_date = '';
        								}
        								elseif(!empty($from_date))
        								{
        									$from_date = date("d-m-Y",strtotime(@$from_date));
        								}
        								else{
        								    $from_date = date("01-m-Y");
        							   	}
        								echo $this->Form->control('from_date',['class'=>'form-control datepickers','data-date-format'=>'dd-mm-yyyy','label'=>false,'type'=>'text','placeholder'=>'From','value'=>$from_date]);?>
        							</div>
        						</div>
        						<div class="col-md-2">
        							<div class="form-group">
        								<label>To Date</label>
        								<?php 
        								if(@$to_date=='1970-01-01')
        								{
        									$to_date = '';
        								}
        								elseif(!empty($to_date))
        								{
        									$to_date = date("d-m-Y",strtotime(@$to_date));
        								}
        								else{
        									$to_date = date("d-m-Y");
        								}
        							    echo $this->Form->control('to_date',['class'=>'form-control datepickers','data-date-format'=>'dd-mm-yyyy','label'=>false,'type'=>'text','placeholder'=>'To','value'=>$to_date]); ?>
        							</div>
        						</div>
        						<div class="col-md-2" >
        								<div class="form-group" style="padding-top:22px;"> 
        									<button type="submit" class="go btn blue-madison input-sm">Go</button>
        								</div>
        						</div>	
        					</form>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"><?php } ?>
                            <?php
				if(!empty($AccountingLedgers))
				{
					
				?>
				<table border="1"></table>
					<table class="table table-bordered table-hover table-condensed" width="100%" border="1">
						<thead>
					
							<tr>
								<th colspan="4">
								
								<span style="float:right";><b>Opening Balance</b></span></th>
								<th style="text-align:right";>
								<?php
									if(!empty($opening_balance))
									{
										echo $opening_balance.' '. $opening_balance_type;
									} 
								?>
								</th>
								
							</tr>
							<tr>
								<th width="10%" scope="col">Date</th>
								<th width="20%" scope="col" style="text-align:center";>Voucher Type</th>
								<th width="20%" scope="col" style="text-align:center";>Voucher No</th>
							
								<th width="25%" scope="col" style="text-align:center";>Debit</th>
								<th width="25%" scope="col" style="text-align:center";>Credit</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if(!empty($AccountingLedgers))
						{
							$total_credit=0;$total_debit=0;
							//pr($AccountingLedgers->toArray());     exit;
						foreach($AccountingLedgers as $AccountingLedger)
						{   
							$id= $AccountingLedger->id;
						?>
							<tr>
								<td><?php echo date("d-m-Y",strtotime($AccountingLedger->transaction_date)); ?></td>
								<td>
								<?php 
								if(!empty($AccountingLedger->is_opening_balance=='yes')){
									echo 'Opening Balance';
									@$voucher_no='-';
									@$reference_no='-';
									@$url_link='-';
								}
								else if(!empty($AccountingLedger->invoice_id)){
									echo 'Invoices';
									@$voucher_no=$AccountingLedger->invoice->invoice_no;
									@$url_link=$this->Html->link($voucher_no,['controller'=>'invoices','action' => 'view', $AccountingLedger->invoice_id],['target'=>'_blank']);
								}
								else if(!empty($AccountingLedger->journal_voucher_id)){
									echo 'Journal Vouchers';
									@$voucher_no=$AccountingLedger->journal_voucher->voucher_no;
									@$url_link=$this->Html->link($voucher_no,['controller'=>'JournalVouchers','action' => 'view', $AccountingLedger->journal_voucher_id],['target'=>'_blank']);
								}
								else if(!empty($AccountingLedger->contra_voucher_id)){
									echo 'Contra Vouchers';
									@$voucher_no=$AccountingLedger->contra_voucher->voucher_no;
									@$url_link=$this->Html->link($voucher_no,['controller'=>'ContraVouchers','action' => 'view', $AccountingLedger->contra_voucher_id],['target'=>'_blank']);
								}
								else if(!empty($AccountingLedger->receipt_id)){
									echo 'Receipt Vouchers';
									@$voucher_no=$AccountingLedger->receipt->voucher_no;
									@$url_link=$this->Html->link($voucher_no,['controller'=>'Receipts','action' => 'view', $AccountingLedger->receipt_id],['target'=>'_blank']);
								}
								else if(!empty($AccountingLedger->payment_id)){
									echo 'Payment Vouchers';
									@$voucher_no=$AccountingLedger->payment->voucher_no;
									@$url_link=$this->Html->link($voucher_no,['controller'=>'Payments','action' => 'view', $AccountingLedger->payment_id],['target'=>'_blank']);
								}
								else if(!empty($AccountingLedger->credit_note_id)){
									echo 'Credit Note Vouchers';
									@$voucher_no=$AccountingLedger->credit_note->voucher_no;
									@$url_link=$this->Html->link($voucher_no,['controller'=>'CreditNotes','action' => 'view', $AccountingLedger->credit_note_id],['target'=>'_blank']);
								}
								else if(!empty($AccountingLedger->debit_note_id)){
									echo 'Debit Note Vouchers';
									@$voucher_no=$AccountingLedger->debit_note->voucher_no;
									@$url_link=$this->Html->link($voucher_no,['controller'=>'DebitNotes','action' => 'view', $AccountingLedger->debit_note_id],['target'=>'_blank']);
								}
								?>
								</td>
								<td class="rightAligntextClass"><?php echo @$url_link; ?></td>
								
								<td style="text-align:right";>
								<?php 
									if(!empty($AccountingLedger->total_debit_sum))
									{
										echo $AccountingLedger->total_debit_sum; 
										$total_debit +=round($AccountingLedger->total_debit_sum,2);
									}
									else
									{
										echo "-";
									}
								?>
								</td>
								<td style="text-align:right";>
								<?php 
									if(!empty($AccountingLedger->total_credit_sum))
									{
										echo $this->Number->format($AccountingLedger->total_credit_sum,['places'=>2]); 
										$total_credit +=round($AccountingLedger->total_credit_sum,2);
									}else
									{
										echo "-";
									}
								?>
								</td>
							</tr>
						<?php  } 
						} ?>
						</tbody>
						<tfoot>
							<tr>
								<td scope="col" colspan="3" style="text-align:right";><b>Total</b></td>
								<td scope="col" style="text-align:right";><?php echo $this->Number->format(@$total_debit,['places'=>2]);?></td>
								<td scope="col" style="text-align:right";><?php echo $this->Number->format(@$total_credit,['places'=>2]);?></td>
							</tr>
							<tr>
								<td scope="col" colspan="3" style="text-align:right";><b>Closing Balance</b></td>
								<td scope="col" colspan="2" style="text-align:right";><b>
								<?php
									if($opening_balance_type=='Dr'){
									@$closingBalanceDr= $opening_balance+$total_debit;
									@$closingBalanceCr= $total_credit;
									}
									else{
									@$closingBalanceCr= $opening_balance+$total_credit;
									@$closingBalanceDr= $total_debit;
									}
									//pr($closingBalance); exit;
									if($closingBalanceDr < $closingBalanceCr)
									{
									@$closing_bal_type='Cr';
									$closingBalance=$closingBalanceCr-$closingBalanceDr;
									}
									else if($closingBalanceDr > $closingBalanceCr){
									@$closing_bal_type='Dr';
									$closingBalance=$closingBalanceDr-$closingBalanceCr; 									
									}
									else{
									@$closing_bal_type='';	
									}
									echo $this->Number->format(round(abs(@$closingBalance),2),['places'=>2]); echo ' '.$closing_bal_type;
								?>
								</b></td>
								
							</tr>
						</tfoot>
					</table>
				<?php } ?>
                        </div>
                    </div>    
                    
                </div>    
	         </div>
	    </div>
	</div>   
</section>