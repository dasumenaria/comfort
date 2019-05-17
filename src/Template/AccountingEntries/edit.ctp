<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountingEntry $accountingEntry
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $accountingEntry->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accountingEntry->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Accounting Entries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ledgers'), ['controller' => 'Ledgers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ledger'), ['controller' => 'Ledgers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accountingEntries form large-9 medium-8 columns content">
    <?= $this->Form->create($accountingEntry) ?>
    <fieldset>
        <legend><?= __('Edit Accounting Entry') ?></legend>
        <?php
            echo $this->Form->control('ledger_id', ['options' => $ledgers]);
            echo $this->Form->control('debit');
            echo $this->Form->control('credit');
            echo $this->Form->control('transaction_date');
            echo $this->Form->control('company_id');
            echo $this->Form->control('is_opening_balance');
            echo $this->Form->control('invoice_id');
            echo $this->Form->control('receipt_id');
            echo $this->Form->control('receipt_row_id');
            echo $this->Form->control('payment_id');
            echo $this->Form->control('payment_row_id');
            echo $this->Form->control('journal_voucher_id');
            echo $this->Form->control('journal_voucher_row_id');
            echo $this->Form->control('reconciliation_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
