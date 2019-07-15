<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CreditNote $creditNote
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $creditNote->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $creditNote->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Credit Notes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Financial Years'), ['controller' => 'FinancialYears', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Financial Year'), ['controller' => 'FinancialYears', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Credit Note Rows'), ['controller' => 'CreditNoteRows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Credit Note Row'), ['controller' => 'CreditNoteRows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="creditNotes form large-9 medium-8 columns content">
    <?= $this->Form->create($creditNote) ?>
    <fieldset>
        <legend><?= __('Edit Credit Note') ?></legend>
        <?php
            echo $this->Form->control('financial_year_id', ['options' => $financialYears]);
            echo $this->Form->control('status');
            echo $this->Form->control('voucher_no');
            echo $this->Form->control('company_id');
            echo $this->Form->control('transaction_date');
            echo $this->Form->control('narration');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
