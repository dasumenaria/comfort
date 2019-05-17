<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReferenceDetail[]|\Cake\Collection\CollectionInterface $referenceDetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reference Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ledgers'), ['controller' => 'Ledgers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ledger'), ['controller' => 'Ledgers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="referenceDetails index large-9 medium-8 columns content">
    <h3><?= __('Reference Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ledger_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ref_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('debit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('credit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receipt_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receipt_row_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_row_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('journal_voucher_row_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('invoice_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('opening_balance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('due_days') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($referenceDetails as $referenceDetail): ?>
            <tr>
                <td><?= $this->Number->format($referenceDetail->id) ?></td>
                <td><?= $referenceDetail->has('customer') ? $this->Html->link($referenceDetail->customer->name, ['controller' => 'Customers', 'action' => 'view', $referenceDetail->customer->id]) : '' ?></td>
                <td><?= $referenceDetail->has('supplier') ? $this->Html->link($referenceDetail->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $referenceDetail->supplier->id]) : '' ?></td>
                <td><?= h($referenceDetail->transaction_date) ?></td>
                <td><?= $this->Number->format($referenceDetail->company_id) ?></td>
                <td><?= $referenceDetail->has('ledger') ? $this->Html->link($referenceDetail->ledger->name, ['controller' => 'Ledgers', 'action' => 'view', $referenceDetail->ledger->id]) : '' ?></td>
                <td><?= h($referenceDetail->type) ?></td>
                <td><?= h($referenceDetail->ref_name) ?></td>
                <td><?= $this->Number->format($referenceDetail->debit) ?></td>
                <td><?= $this->Number->format($referenceDetail->credit) ?></td>
                <td><?= $this->Number->format($referenceDetail->receipt_id) ?></td>
                <td><?= $this->Number->format($referenceDetail->receipt_row_id) ?></td>
                <td><?= $this->Number->format($referenceDetail->payment_row_id) ?></td>
                <td><?= $this->Number->format($referenceDetail->journal_voucher_row_id) ?></td>
                <td><?= $this->Number->format($referenceDetail->invoice_id) ?></td>
                <td><?= h($referenceDetail->opening_balance) ?></td>
                <td><?= $this->Number->format($referenceDetail->due_days) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $referenceDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $referenceDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $referenceDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $referenceDetail->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
