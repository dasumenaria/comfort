<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'Journal Vouchers List');
?>
<style>
.noBorder{
    border:none;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
     vertical-align: top !important; 
}
</style>
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i>Journal Voucher
            </div>
            <div class="box-body">
                <form method="GET" id="">
                    <div class="row"> 
                        <div class='col-md-2'>
                            <?php echo $this->Form->input('voucher_no',['class'=>'form-control','label'=>false, 'placeholder'=>'Voucher.No','value'=> @$voucher_no]);
                            ?> 
                        </div>
                        <div class="col-md-2">
                                <div class="form-group">
                                    <?= $this->Form->control('From',['class'=>'form-control datepickers','data-date-format'=>'dd-mm-yyyy','label'=>false,'type'=>'text','placeholder'=>'From']);?>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                 <?= $this->Form->control('To',['class'=>'form-control datepickers','data-date-format'=>'dd-mm-yyyy','label'=>false,'type'=>'text','placeholder'=>'To']); ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class='col-md-2'>
						 		<?php echo $this->Form->input('reference_no',['class'=>'form-control','label'=>false, 'placeholder'=>'Reference.No','value'=> @$reference_no]);
								?>
					
						</div>
                        <div class="col-md-1">
                            <button type="submit" class="go btn blue-madison input-sm">Go</button>
                        </div> 
                    </div>
						
					</form> 

                <div class="table-responsive">
					<?php $page_no=$this->Paginator->current('Journalvouchers');
					 $page_no=($page_no-1)*100; ?>
					<table class="table table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th scope="col"><?= __('Sr') ?></th>
								<th scope="col"><?= $this->Paginator->sort('voucher_no') ?></th>
									<th scope="col"><?= $this->Paginator->sort('party') ?></th>
								<th scope="col"><?= $this->Paginator->sort('transaction_date') ?></th>
								<th scope="col"><?= $this->Paginator->sort('reference_no') ?></th>
								<th scope="col"><?= $this->Paginator->sort('Amount') ?></th>
								<th scope="col" class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($journalVouchers as $journalVoucher): if($journalVoucher->status == 'cancel') { ?>
							 <tr style="background-color:#FE5E5E ;">
							<?php } else { ?>
							<tr> <?php } ?>
									<td><?= h(++$page_no) ?></td>
									<td><?= h(str_pad($journalVoucher->voucher_no, 4, '0', STR_PAD_LEFT)) ?></td>
									<td><?= h($journalVoucher->journal_voucher_rows[0]->ledger->name) ?></td>
									<td><?= h(date("d-m-Y",strtotime($journalVoucher->transaction_date))) ?></td>
									<td><?= h($journalVoucher->reference_no) ?></td>
									<td class=""><?= h($journalVoucher->journal_voucher_rows[0]->credit) ?></td>
									<td class="actions">
                                        <?php echo $this->Html->link('<i class="fa fa-search"></i> View',['action' => 'view', $journalVoucher->id],array('escape'=>false,'class'=>'btn btn-xs btn-info','target'=>'_blank')); ?>
                                        <?php if ($journalVoucher->status!='cancel'){?>
                                       
  
                                        <?= $this->Form->postLink(__('Cancel'), ['action' => 'cancel', $journalVoucher->id],['class'=>'btn btn-xs btn-danger'], ['confirm' => __('Are you sure you want to cancel # {0}?',h(str_pad($journalVoucher->voucher_no, 3, '0', STR_PAD_LEFT)))]) ?>&nbsp;&nbsp;
                                    <?php }?> 
                                    </td>
								</tr>
							 <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
            </div>
        </div>
    </div>
</div> 
</section>