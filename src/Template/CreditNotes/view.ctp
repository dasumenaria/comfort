<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CreditNote $creditNote
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Credit Note'), ['action' => 'edit', $creditNote->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Credit Note'), ['action' => 'delete', $creditNote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $creditNote->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Credit Notes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit Note'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Financial Years'), ['controller' => 'FinancialYears', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Financial Year'), ['controller' => 'FinancialYears', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Credit Note Rows'), ['controller' => 'CreditNoteRows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit Note Row'), ['controller' => 'CreditNoteRows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="creditNotes view large-9 medium-8 columns content">
    <h3><?= h($creditNote->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Financial Year') ?></th>
            <td><?= $creditNote->has('financial_year') ? $this->Html->link($creditNote->financial_year->id, ['controller' => 'FinancialYears', 'action' => 'view', $creditNote->financial_year->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($creditNote->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($creditNote->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Voucher No') ?></th>
            <td><?= $this->Number->format($creditNote->voucher_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Id') ?></th>
            <td><?= $this->Number->format($creditNote->company_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Date') ?></th>
            <td><?= h($creditNote->transaction_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Narration') ?></h4>
        <?= $this->Text->autoParagraph(h($creditNote->narration)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Credit Note Rows') ?></h4>
        <?php if (!empty($creditNote->credit_note_rows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Credit Note Id') ?></th>
                <th scope="col"><?= __('Cr Dr') ?></th>
                <th scope="col"><?= __('Ledger Id') ?></th>
                <th scope="col"><?= __('Debit') ?></th>
                <th scope="col"><?= __('Credit') ?></th>
                <th scope="col"><?= __('Mode Of Payment') ?></th>
                <th scope="col"><?= __('Cheque No') ?></th>
                <th scope="col"><?= __('Cheque Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($creditNote->credit_note_rows as $creditNoteRows): ?>
            <tr>
                <td><?= h($creditNoteRows->id) ?></td>
                <td><?= h($creditNoteRows->credit_note_id) ?></td>
                <td><?= h($creditNoteRows->cr_dr) ?></td>
                <td><?= h($creditNoteRows->ledger_id) ?></td>
                <td><?= h($creditNoteRows->debit) ?></td>
                <td><?= h($creditNoteRows->credit) ?></td>
                <td><?= h($creditNoteRows->mode_of_payment) ?></td>
                <td><?= h($creditNoteRows->cheque_no) ?></td>
                <td><?= h($creditNoteRows->cheque_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CreditNoteRows', 'action' => 'view', $creditNoteRows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CreditNoteRows', 'action' => 'edit', $creditNoteRows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CreditNoteRows', 'action' => 'delete', $creditNoteRows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $creditNoteRows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
