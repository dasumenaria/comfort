<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice[]|\Cake\Collection\CollectionInterface $invoices
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoice Types'), ['controller' => 'InvoiceTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice Type'), ['controller' => 'InvoiceTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Logins'), ['controller' => 'Logins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Login'), ['controller' => 'Logins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counters'), ['controller' => 'Counters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Counter'), ['controller' => 'Counters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Financial Years'), ['controller' => 'FinancialYears', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Financial Year'), ['controller' => 'FinancialYears', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gst Figures'), ['controller' => 'GstFigures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gst Figure'), ['controller' => 'GstFigures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoice Details'), ['controller' => 'InvoiceDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice Detail'), ['controller' => 'InvoiceDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoices index large-9 medium-8 columns content">
    <h3><?= __('Invoices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('invoice_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('invoice_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('authorized_person') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grand_total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('counter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('complimenatry_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waveoff_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waveoff_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waveoff_login_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waveoff_counter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('invoice_gst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('financial_year_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gst_figure_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?= $this->Number->format($invoice->id) ?></td>
                <td><?= h($invoice->invoice_no) ?></td>
                <td><?= $invoice->has('invoice_type') ? $this->Html->link($invoice->invoice_type->name, ['controller' => 'InvoiceTypes', 'action' => 'view', $invoice->invoice_type->id]) : '' ?></td>
                <td><?= h($invoice->authorized_person) ?></td>
                <td><?= $invoice->has('customer') ? $this->Html->link($invoice->customer->name, ['controller' => 'Customers', 'action' => 'view', $invoice->customer->id]) : '' ?></td>
                <td><?= h($invoice->date) ?></td>
                <td><?= h($invoice->payment_type) ?></td>
                <td><?= h($invoice->remarks) ?></td>
                <td><?= h($invoice->total) ?></td>
                <td><?= h($invoice->discount) ?></td>
                <td><?= h($invoice->tax) ?></td>
                <td><?= h($invoice->grand_total) ?></td>
                <td><?= h($invoice->payment_status) ?></td>
                <td><?= $invoice->has('login') ? $this->Html->link($invoice->login->name, ['controller' => 'Logins', 'action' => 'view', $invoice->login->id]) : '' ?></td>
                <td><?= $invoice->has('counter') ? $this->Html->link($invoice->counter->name, ['controller' => 'Counters', 'action' => 'view', $invoice->counter->id]) : '' ?></td>
                <td><?= $this->Number->format($invoice->complimenatry_status) ?></td>
                <td><?= $this->Number->format($invoice->waveoff_status) ?></td>
                <td><?= h($invoice->waveoff_date) ?></td>
                <td><?= $this->Number->format($invoice->waveoff_login_id) ?></td>
                <td><?= $this->Number->format($invoice->waveoff_counter_id) ?></td>
                <td><?= h($invoice->current_date) ?></td>
                <td><?= h($invoice->invoice_gst) ?></td>
                <td><?= $invoice->has('financial_year') ? $this->Html->link($invoice->financial_year->id, ['controller' => 'FinancialYears', 'action' => 'view', $invoice->financial_year->id]) : '' ?></td>
                <td><?= $invoice->has('gst_figure') ? $this->Html->link($invoice->gst_figure->name, ['controller' => 'GstFigures', 'action' => 'view', $invoice->gst_figure->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $invoice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?>
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
