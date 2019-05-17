<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
        	<div class="box-body" >
                <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                        <tr style="table-layout: fixed;">  
                            <th>Name</th>
                            <th>Credit</th>
                            <th>Debit</th> 
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                    	foreach ($AccountingDatas as $entries) {
                    		?>
                    		<tr>
                    			<td><?= $entries->ledger->name ?></td>
                    			<td><?= $entries->credit ?></td>
                    			<td><?= $entries->debit ?></td>
                    		</tr>
                    		<?php 
                    	}
                    	?>
                    </tbody>
                    <tfoot class="hide_print">
                    	<tr>
                    		<td align="center" colspan="5">
                    			<?php echo $this->Html->link('<i class="fa fa-check"></i> OK',['action' => 'view', $invoice_id],array('escape'=>false,'class'=>'btn btn-success','target'=>'_blank')); ?>
								<button class="btn btn-danger" onclick="window.print();"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
	                    	</td>
	                    </tr>
                    </tfoot>
                </table>
            </div>
        </div> 
    </div>   
</section>