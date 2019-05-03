<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReferenceDetail $referenceDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $referenceDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $referenceDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reference Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ledgers'), ['controller' => 'Ledgers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ledger'), ['controller' => 'Ledgers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="referenceDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($referenceDetail) ?>
    <fieldset>
        <legend><?= __('Edit Reference Detail') ?></legend>
        <?php
            echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->control('supplier_id');
            echo $this->Form->control('transaction_date', ['empty' => true]);
            echo $this->Form->control('company_id');
            echo $this->Form->control('ledger_id', ['options' => $ledgers]);
            echo $this->Form->control('type');
            echo $this->Form->control('ref_name');
            echo $this->Form->control('debit');
            echo $this->Form->control('credit');
            echo $this->Form->control('receipt_id');
            echo $this->Form->control('receipt_row_id');
            echo $this->Form->control('payment_row_id');
            echo $this->Form->control('credit_note_id');
            echo $this->Form->control('credit_note_row_id');
            echo $this->Form->control('debit_note_id');
            echo $this->Form->control('debit_note_row_id');
            echo $this->Form->control('sales_voucher_row_id');
            echo $this->Form->control('purchase_voucher_row_id');
            echo $this->Form->control('journal_voucher_row_id');
            echo $this->Form->control('sale_return_id');
            echo $this->Form->control('purchase_invoice_id');
            echo $this->Form->control('purchase_return_id');
            echo $this->Form->control('sales_invoice_id');
            echo $this->Form->control('opening_balance');
            echo $this->Form->control('due_days');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
