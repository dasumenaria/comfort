<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CreditNoteRow $creditNoteRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Credit Note Row'), ['action' => 'edit', $creditNoteRow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Credit Note Row'), ['action' => 'delete', $creditNoteRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $creditNoteRow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Credit Note Rows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit Note Row'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Credit Notes'), ['controller' => 'CreditNotes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit Note'), ['controller' => 'CreditNotes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ledgers'), ['controller' => 'Ledgers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ledger'), ['controller' => 'Ledgers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="creditNoteRows view large-9 medium-8 columns content">
    <h3><?= h($creditNoteRow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Credit Note') ?></th>
            <td><?= $creditNoteRow->has('credit_note') ? $this->Html->link($creditNoteRow->credit_note->id, ['controller' => 'CreditNotes', 'action' => 'view', $creditNoteRow->credit_note->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cr Dr') ?></th>
            <td><?= h($creditNoteRow->cr_dr) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ledger') ?></th>
            <td><?= $creditNoteRow->has('ledger') ? $this->Html->link($creditNoteRow->ledger->name, ['controller' => 'Ledgers', 'action' => 'view', $creditNoteRow->ledger->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mode Of Payment') ?></th>
            <td><?= h($creditNoteRow->mode_of_payment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cheque No') ?></th>
            <td><?= h($creditNoteRow->cheque_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($creditNoteRow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debit') ?></th>
            <td><?= $this->Number->format($creditNoteRow->debit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit') ?></th>
            <td><?= $this->Number->format($creditNoteRow->credit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cheque Date') ?></th>
            <td><?= h($creditNoteRow->cheque_date) ?></td>
        </tr>
    </table>
</div>
