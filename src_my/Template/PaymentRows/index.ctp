<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentRow[]|\Cake\Collection\CollectionInterface $paymentRows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Payment Row'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ledgers'), ['controller' => 'Ledgers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ledger'), ['controller' => 'Ledgers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accounting Entries'), ['controller' => 'AccountingEntries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Accounting Entry'), ['controller' => 'AccountingEntries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reference Details'), ['controller' => 'ReferenceDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reference Detail'), ['controller' => 'ReferenceDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paymentRows index large-9 medium-8 columns content">
    <h3><?= __('Payment Rows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cr_dr') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ledger_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('debit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('credit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mode_of_payment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cheque_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cheque_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paymentRows as $paymentRow): ?>
            <tr>
                <td><?= $this->Number->format($paymentRow->id) ?></td>
                <td><?= $paymentRow->has('payment') ? $this->Html->link($paymentRow->payment->id, ['controller' => 'Payments', 'action' => 'view', $paymentRow->payment->id]) : '' ?></td>
                <td><?= h($paymentRow->cr_dr) ?></td>
                <td><?= $paymentRow->has('ledger') ? $this->Html->link($paymentRow->ledger->name, ['controller' => 'Ledgers', 'action' => 'view', $paymentRow->ledger->id]) : '' ?></td>
                <td><?= $this->Number->format($paymentRow->debit) ?></td>
                <td><?= $this->Number->format($paymentRow->credit) ?></td>
                <td><?= h($paymentRow->mode_of_payment) ?></td>
                <td><?= h($paymentRow->cheque_no) ?></td>
                <td><?= h($paymentRow->cheque_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $paymentRow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paymentRow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paymentRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentRow->id)]) ?>
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
