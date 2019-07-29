<?php
 $url_excel="/?".$url; 
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */ 
 //pr($reference_details->toArray());
 //exit;
$this->set('title', 'Overdue Report');
?>

<?php
	if($status=='excel'){
		$date= date("d-m-Y"); 
	$time=date('h:i:a',time());

	$filename="Outstanding_report_".$date.'_'.$time;
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
<section class="content">
   <div class="row">
	    <div class="col-md-12">
                 <div class="box box-primary">
                         <?php if($status!='excel'){ ?>
                        <div class="box-header with-border hide_print">
                          <i class="fa fa-plus"></i>Outstanding Receivable Report [Debitors Report]
                        </div>
                        <?php echo $this->Html->link( '<i class="fa fa-file-excel-o"></i> Excel', '/Ledgers/OverDueReport/'.@$url_excel.'&status=excel',['class' =>'btn btn-sm green tooltips pull-right','target'=>'_blank','escape'=>false,'data-original-title'=>'Download as excel']); ?>
                    
                    <div class="box-body" > 
                     <div class="row"> 
                        <div class="col-md-12">
                            <?= $this->Form->create('overdue',['type' => 'get']) ?>
				<div class="col-md-12">
					<div class="col-md-3">
						<div class="form-group">
							<?php if($run_time_date){ echo $this->Form->control('run_time_date',['class'=>'form-control input-sm datepickers','data-date-format'=>'dd-mm-yyyy', 'label'=>false,'placeholder'=>'DD-MM-YYYY','type'=>'text','value'=>date('d-m-Y',strtotime($run_time_date)),'required'=>'required']); }
							else{ echo $this->Form->control('run_time_date',['class'=>'form-control input-sm datepickers','data-date-format'=>'dd-mm-yyyy', 'label'=>false,'placeholder'=>'DD-MM-YYYY','type'=>'text','value'=>date('d-m-Y'),'required'=>'required']);} ?>
						</div>
					</div>
					<div class="col-md-2">
						<?= $this->Form->button(__('Go'),['class'=>'btn btn-success submit']) ?>
					</div>
				</div>
			<?= $this->Form->end() ?>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"><?php } ?>
                            <div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed" border="1">
						<thead>
							<tr>
								<th scope="col">S NO</th>
								<th scope="col">Party</th>
								<th scope="col">Mobile No</th>
								<th scope="col">Debit</th>
								<th scope="col">Credit</th>
							</tr>
						</thead>
						<tbody><?php $sno = 1; $dbt=[];$cdt=[];
							if($run_time_date){
								  foreach ($reference_details as $reference_detail):
									$duebalance = $reference_detail->total_debit - $reference_detail->total_credit;
									//pr($duebalance);
									$tday = date('d-m-Y');
							if($reference_detail->total_debit > $reference_detail->total_credit){
										$dbt[$reference_detail->ledger->id] = round($reference_detail->total_debit-$reference_detail->total_credit,2);
									}else{
										$cdt[$reference_detail->ledger->id] = round($reference_detail->total_credit-$reference_detail->total_debit,2);
									}
									//pr($dbt);
								if(@$dbt[$reference_detail->ledger->id] > 0 || @$cdt[$reference_detail->ledger->id] >0){		
									
									
								if(($reference_detail->total_debit > 0 && $reference_detail->total_credit == 0) || ($reference_detail->total_credit > 0 && $reference_detail->total_debit == 0) || $duebalance > 0) 
									{ ?>
										<tr >
										<td><?php echo $sno++; ?></td>
											<td>
											
											<?= $this->Html->link($reference_detail->ledger->name, ['controller' => 'Ledgers', 'action' => 'accountLedger'.'?ledger_id=' .$reference_detail->ledger_id.'&from_date='.$run_time_dates.'&to_date='.$tday]) ?></td>
											<td><?= $reference_detail->ledger->customer->mobile; ?></td>
											<?php if($reference_detail->total_debit > $reference_detail->total_credit){ ?>
												<td class="rightAligntextClass"><?php echo $this->Number->format(round($reference_detail->total_debit-$reference_detail->total_credit,2));  ?></td>
												<td>-</td>
											<?php }else{ ?>
											<td>-</td>
											<td class="rightAligntextClass"><?php echo $this->Number->format(round($reference_detail->total_credit-$reference_detail->total_debit,2));  ?></td>
											<?php } ?>
											
											
											
										</tr>
								<?php }} endforeach;  } ?>
						</tbody>
					</table>
				  </div>
                        </div>
                    </div>    
                </div>
                </div>     
                     
        </div>
    </div>
</section>