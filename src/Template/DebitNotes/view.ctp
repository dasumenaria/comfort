<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DebitNote $debitNote
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Debit Note'), ['action' => 'edit', $debitNote->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Debit Note'), ['action' => 'delete', $debitNote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $debitNote->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Debit Notes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Debit Note'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Financial Years'), ['controller' => 'FinancialYears', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Financial Year'), ['controller' => 'FinancialYears', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Debit Note Rows'), ['controller' => 'DebitNoteRows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Debit Note Row'), ['controller' => 'DebitNoteRows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="debitNotes view large-9 medium-8 columns content">
    <h3><?= h($debitNote->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Financial Year') ?></th>
            <td><?= $debitNote->has('financial_year') ? $this->Html->link($debitNote->financial_year->id, ['controller' => 'FinancialYears', 'action' => 'view', $debitNote->financial_year->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($debitNote->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($debitNote->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Voucher No') ?></th>
            <td><?= $this->Number->format($debitNote->voucher_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Id') ?></th>
            <td><?= $this->Number->format($debitNote->company_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Date') ?></th>
            <td><?= h($debitNote->transaction_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Narration') ?></h4>
        <?= $this->Text->autoParagraph(h($debitNote->narration)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Debit Note Rows') ?></h4>
        <?php if (!empty($debitNote->debit_note_rows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Debit Note Id') ?></th>
                <th scope="col"><?= __('Cr Dr') ?></th>
                <th scope="col"><?= __('Ledger Id') ?></th>
                <th scope="col"><?= __('Debit') ?></th>
                <th scope="col"><?= __('Credit') ?></th>
                <th scope="col"><?= __('Mode Of Payment') ?></th>
                <th scope="col"><?= __('Cheque No') ?></th>
                <th scope="col"><?= __('Cheque Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($debitNote->debit_note_rows as $debitNoteRows): ?>
            <tr>
                <td><?= h($debitNoteRows->id) ?></td>
                <td><?= h($debitNoteRows->debit_note_id) ?></td>
                <td><?= h($debitNoteRows->cr_dr) ?></td>
                <td><?= h($debitNoteRows->ledger_id) ?></td>
                <td><?= h($debitNoteRows->debit) ?></td>
                <td><?= h($debitNoteRows->credit) ?></td>
                <td><?= h($debitNoteRows->mode_of_payment) ?></td>
                <td><?= h($debitNoteRows->cheque_no) ?></td>
                <td><?= h($debitNoteRows->cheque_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DebitNoteRows', 'action' => 'view', $debitNoteRows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DebitNoteRows', 'action' => 'edit', $debitNoteRows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DebitNoteRows', 'action' => 'delete', $debitNoteRows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $debitNoteRows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
