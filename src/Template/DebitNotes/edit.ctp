<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DebitNote $debitNote
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $debitNote->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $debitNote->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Debit Notes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Financial Years'), ['controller' => 'FinancialYears', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Financial Year'), ['controller' => 'FinancialYears', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Debit Note Rows'), ['controller' => 'DebitNoteRows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Debit Note Row'), ['controller' => 'DebitNoteRows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="debitNotes form large-9 medium-8 columns content">
    <?= $this->Form->create($debitNote) ?>
    <fieldset>
        <legend><?= __('Edit Debit Note') ?></legend>
        <?php
            echo $this->Form->control('financial_year_id', ['options' => $financialYears]);
            echo $this->Form->control('voucher_no');
            echo $this->Form->control('company_id');
            echo $this->Form->control('transaction_date');
            echo $this->Form->control('narration');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
