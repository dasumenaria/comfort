<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountingEntry $accountingEntry
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Accounting Entry'), ['action' => 'edit', $accountingEntry->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Accounting Entry'), ['action' => 'delete', $accountingEntry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountingEntry->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accounting Entries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accounting Entry'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ledgers'), ['controller' => 'Ledgers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ledger'), ['controller' => 'Ledgers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accountingEntries view large-9 medium-8 columns content">
    <h3><?= h($accountingEntry->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ledger') ?></th>
            <td><?= $accountingEntry->has('ledger') ? $this->Html->link($accountingEntry->ledger->name, ['controller' => 'Ledgers', 'action' => 'view', $accountingEntry->ledger->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Opening Balance') ?></th>
            <td><?= h($accountingEntry->is_opening_balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debit') ?></th>
            <td><?= $this->Number->format($accountingEntry->debit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit') ?></th>
            <td><?= $this->Number->format($accountingEntry->credit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->company_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchase Voucher Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->purchase_voucher_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchase Voucher Row Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->purchase_voucher_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sales Invoice Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->sales_invoice_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sale Return Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->sale_return_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchase Invoice Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->purchase_invoice_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchase Return Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->purchase_return_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receipt Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->receipt_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receipt Row Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->receipt_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->payment_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Row Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->payment_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit Note Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->credit_note_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit Note Row Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->credit_note_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debit Note Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->debit_note_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debit Note Row Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->debit_note_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sales Voucher Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->sales_voucher_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sales Voucher Row Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->sales_voucher_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Journal Voucher Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->journal_voucher_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Journal Voucher Row Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->journal_voucher_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contra Voucher Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->contra_voucher_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contra Voucher Row Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->contra_voucher_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Date') ?></th>
            <td><?= h($accountingEntry->transaction_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reconciliation Date') ?></th>
            <td><?= h($accountingEntry->reconciliation_date) ?></td>
        </tr>
    </table>
</div>
