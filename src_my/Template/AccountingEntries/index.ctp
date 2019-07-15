<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountingEntry[]|\Cake\Collection\CollectionInterface $accountingEntries
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Accounting Entry'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ledgers'), ['controller' => 'Ledgers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ledger'), ['controller' => 'Ledgers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accountingEntries index large-9 medium-8 columns content">
    <h3><?= __('Accounting Entries') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ledger_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('debit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('credit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_opening_balance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('invoice_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receipt_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receipt_row_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_row_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('journal_voucher_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('journal_voucher_row_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reconciliation_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accountingEntries as $accountingEntry): ?>
            <tr>
                <td><?= $this->Number->format($accountingEntry->id) ?></td>
                <td><?= $accountingEntry->has('ledger') ? $this->Html->link($accountingEntry->ledger->name, ['controller' => 'Ledgers', 'action' => 'view', $accountingEntry->ledger->id]) : '' ?></td>
                <td><?= $this->Number->format($accountingEntry->debit) ?></td>
                <td><?= $this->Number->format($accountingEntry->credit) ?></td>
                <td><?= h($accountingEntry->transaction_date) ?></td>
                <td><?= $this->Number->format($accountingEntry->company_id) ?></td>
                <td><?= h($accountingEntry->is_opening_balance) ?></td>
                <td><?= $this->Number->format($accountingEntry->invoice_id) ?></td>
                <td><?= $this->Number->format($accountingEntry->receipt_id) ?></td>
                <td><?= $this->Number->format($accountingEntry->receipt_row_id) ?></td>
                <td><?= $this->Number->format($accountingEntry->payment_id) ?></td>
                <td><?= $this->Number->format($accountingEntry->payment_row_id) ?></td>
                <td><?= $this->Number->format($accountingEntry->journal_voucher_id) ?></td>
                <td><?= $this->Number->format($accountingEntry->journal_voucher_row_id) ?></td>
                <td><?= h($accountingEntry->reconciliation_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $accountingEntry->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accountingEntry->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $accountingEntry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountingEntry->id)]) ?>
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
