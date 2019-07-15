<style>

@media print{
    .maindiv{
        width:100% !important;
        margin:auto;
    }   
    .hidden-print{
        display:none;
    }
}

</style>
<style type="text/css" media="print">
@page {
    width:100%;
    size: auto;   /* auto is the initial value */
    margin: 0px 0px 0px 0px;  /* this affects the margin in the printer settings */
}
.maindiv {
border:solid 1px #c7c7c7;background-color: #FFF;padding: 10px;margin: auto;width: 100%;font-size: 12px;
}
</style>

<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'Journal Voucher');
?>
<div  class="maindiv" style="border:solid 1px #c7c7c7;background-color: #FFF;padding: 10px;margin: auto;width:75%;font-size: 12px;">    
    <table width="100%"  cellpadding="0" cellspacing="0"  style="border-collapse:collapse;">
        <tr>
            <td> 
                <?php echo $this->Html->image('/img/logo.jpg', ['style'=>'float:left; border:2px solid #2E3192;']) ?>
            </td>
            <th>JOURNAL VOUCHER</th>
            <td style="float:right;color:#0872BA;">
                <span style="font-size:16px !important;"><b>Comfort Travels &amp; Tours</b></span>
                <br/><span>"Akruti", 4-New Fatehpura, Opp. Saheliyo ki Badi,</span><br/>
                <span>UDAIPUR-313004 Fax: +91-294-2422131</span><br/>
                <span><i class="icon-phone"></i> +91-294-2411661/62</span> 
            </td>
        </tr>
        <tr>
            <td height="35px" colspan="3">
            <div style="border:solid 2px #0685a8;margin-bottom:5px;margin-top: 5px;"></div>
            </td>
        </tr>
    </table>
		<table width="100%">
		<tr>
			<td width="50%" valign="top" align="left">
				<table>
					<tr>
						<td>Voucher No</td>
						<td width="20" align="center">:</td>
						<td><?= h(str_pad($journalVoucher->voucher_no, 4, '0', STR_PAD_LEFT)) ?></td>
					</tr>
					<tr>
						<td>Reference No</td>
						<td width="20" align="center">:</td>
						<td><?= $journalVoucher->reference_no?></td>
					</tr>
				</table>
			</td>
			<td width="50%" valign="top" align="right">
				<table>
					<tr>
						<td>Transaction Date</td>
						<td width="20" align="center">:</td>
						<td><?= h(date("d-m-Y",strtotime($journalVoucher->transaction_date))) ?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
		Narration: <?php echo $journalVoucher->narration;?>
		<br/><br/>
		<table width="100%" class="table" style="font-size:12px">
			<tr style="background-color:#F0EFED;">
				<th colspan="3"><?= __('Ledger A/C') ?></th>
				<th><?= __('Dr') ?></th>
				<th><?= __('Cr') ?></th>
			</tr>
			<?php foreach($journalVoucher->journal_voucher_rows as $journal_voucher_row)
				{ 
					@$total_debit+=$journal_voucher_row->debit;
					@$total_credit+=$journal_voucher_row->credit; ?>
					<tr>
					<td colspan="3" style="text-align:left"><b><?=$journal_voucher_row->ledger->name?></b>
						<div class="window" style="margin:auto;"><table width="50%">
							<?php foreach($journal_voucher_row->reference_details as $refdata)
							{?><tr>
							<td style="text-align:left"><?=$refdata->type?></td>
							<td style="text-align:left"><?=$refdata->ref_name?></td>
							<?php if($refdata->debit){ ?>
							<td class="rightAligntextClass"><?=$refdata->debit?> Dr</td><?php } else {?>
							<td class="rightAligntextClass"><?=$refdata->credit?> Cr</td><?php } ?></tr>
							<?php } ?></table>
						</div>
					</td>
					<td ><?=$journal_voucher_row->debit?></td>
					<td><?=$journal_voucher_row->credit?></td>
					</tr>
			<?php } ?>
			<tr>
			
			<td colspan="3" align="right"></td>
			
			<td> <?php echo $total_debit;?></td>
			<td> <?php echo $total_credit;?></td>
			</tr>
		</table>
	</div>
