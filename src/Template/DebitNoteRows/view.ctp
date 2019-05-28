<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DebitNoteRow $debitNoteRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Debit Note Row'), ['action' => 'edit', $debitNoteRow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Debit Note Row'), ['action' => 'delete', $debitNoteRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $debitNoteRow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Debit Note Rows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Debit Note Row'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Debit Notes'), ['controller' => 'DebitNotes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Debit Note'), ['controller' => 'DebitNotes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ledgers'), ['controller' => 'Ledgers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ledger'), ['controller' => 'Ledgers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="debitNoteRows view large-9 medium-8 columns content">
    <h3><?= h($debitNoteRow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Debit Note') ?></th>
            <td><?= $debitNoteRow->has('debit_note') ? $this->Html->link($debitNoteRow->debit_note->id, ['controller' => 'DebitNotes', 'action' => 'view', $debitNoteRow->debit_note->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cr Dr') ?></th>
            <td><?= h($debitNoteRow->cr_dr) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ledger') ?></th>
            <td><?= $debitNoteRow->has('ledger') ? $this->Html->link($debitNoteRow->ledger->name, ['controller' => 'Ledgers', 'action' => 'view', $debitNoteRow->ledger->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mode Of Payment') ?></th>
            <td><?= h($debitNoteRow->mode_of_payment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cheque No') ?></th>
            <td><?= h($debitNoteRow->cheque_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($debitNoteRow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debit') ?></th>
            <td><?= $this->Number->format($debitNoteRow->debit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit') ?></th>
            <td><?= $this->Number->format($debitNoteRow->credit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cheque Date') ?></th>
            <td><?= h($debitNoteRow->cheque_date) ?></td>
        </tr>
    </table>
</div>
