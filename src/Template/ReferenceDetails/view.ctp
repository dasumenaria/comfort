<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReferenceDetail $referenceDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reference Detail'), ['action' => 'edit', $referenceDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reference Detail'), ['action' => 'delete', $referenceDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $referenceDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reference Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reference Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ledgers'), ['controller' => 'Ledgers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ledger'), ['controller' => 'Ledgers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="referenceDetails view large-9 medium-8 columns content">
    <h3><?= h($referenceDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $referenceDetail->has('customer') ? $this->Html->link($referenceDetail->customer->name, ['controller' => 'Customers', 'action' => 'view', $referenceDetail->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ledger') ?></th>
            <td><?= $referenceDetail->has('ledger') ? $this->Html->link($referenceDetail->ledger->name, ['controller' => 'Ledgers', 'action' => 'view', $referenceDetail->ledger->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($referenceDetail->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ref Name') ?></th>
            <td><?= h($referenceDetail->ref_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Opening Balance') ?></th>
            <td><?= h($referenceDetail->opening_balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->supplier_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->company_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debit') ?></th>
            <td><?= $this->Number->format($referenceDetail->debit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit') ?></th>
            <td><?= $this->Number->format($referenceDetail->credit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receipt Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->receipt_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receipt Row Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->receipt_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Row Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->payment_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit Note Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->credit_note_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit Note Row Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->credit_note_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debit Note Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->debit_note_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debit Note Row Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->debit_note_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sales Voucher Row Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->sales_voucher_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchase Voucher Row Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->purchase_voucher_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Journal Voucher Row Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->journal_voucher_row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sale Return Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->sale_return_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchase Invoice Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->purchase_invoice_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchase Return Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->purchase_return_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sales Invoice Id') ?></th>
            <td><?= $this->Number->format($referenceDetail->sales_invoice_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Due Days') ?></th>
            <td><?= $this->Number->format($referenceDetail->due_days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Date') ?></th>
            <td><?= h($referenceDetail->transaction_date) ?></td>
        </tr>
    </table>
</div>
