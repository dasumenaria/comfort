<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Types'), ['controller' => 'InvoiceTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Type'), ['controller' => 'InvoiceTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Logins'), ['controller' => 'Logins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login'), ['controller' => 'Logins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Counters'), ['controller' => 'Counters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Counter'), ['controller' => 'Counters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Financial Years'), ['controller' => 'FinancialYears', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Financial Year'), ['controller' => 'FinancialYears', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gst Figures'), ['controller' => 'GstFigures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gst Figure'), ['controller' => 'GstFigures', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Details'), ['controller' => 'InvoiceDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Detail'), ['controller' => 'InvoiceDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="invoices view large-9 medium-8 columns content">
    <h3><?= h($invoice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Invoice No') ?></th>
            <td><?= h($invoice->invoice_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Invoice Type') ?></th>
            <td><?= $invoice->has('invoice_type') ? $this->Html->link($invoice->invoice_type->name, ['controller' => 'InvoiceTypes', 'action' => 'view', $invoice->invoice_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Authorized Person') ?></th>
            <td><?= h($invoice->authorized_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $invoice->has('customer') ? $this->Html->link($invoice->customer->name, ['controller' => 'Customers', 'action' => 'view', $invoice->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Type') ?></th>
            <td><?= h($invoice->payment_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remarks') ?></th>
            <td><?= h($invoice->remarks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= h($invoice->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount') ?></th>
            <td><?= h($invoice->discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax') ?></th>
            <td><?= h($invoice->tax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grand Total') ?></th>
            <td><?= h($invoice->grand_total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Status') ?></th>
            <td><?= h($invoice->payment_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login') ?></th>
            <td><?= $invoice->has('login') ? $this->Html->link($invoice->login->name, ['controller' => 'Logins', 'action' => 'view', $invoice->login->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Counter') ?></th>
            <td><?= $invoice->has('counter') ? $this->Html->link($invoice->counter->name, ['controller' => 'Counters', 'action' => 'view', $invoice->counter->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Invoice Gst') ?></th>
            <td><?= h($invoice->invoice_gst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Financial Year') ?></th>
            <td><?= $invoice->has('financial_year') ? $this->Html->link($invoice->financial_year->id, ['controller' => 'FinancialYears', 'action' => 'view', $invoice->financial_year->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gst Figure') ?></th>
            <td><?= $invoice->has('gst_figure') ? $this->Html->link($invoice->gst_figure->name, ['controller' => 'GstFigures', 'action' => 'view', $invoice->gst_figure->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($invoice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Complimenatry Status') ?></th>
            <td><?= $this->Number->format($invoice->complimenatry_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waveoff Status') ?></th>
            <td><?= $this->Number->format($invoice->waveoff_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waveoff Login Id') ?></th>
            <td><?= $this->Number->format($invoice->waveoff_login_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waveoff Counter Id') ?></th>
            <td><?= $this->Number->format($invoice->waveoff_counter_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($invoice->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waveoff Date') ?></th>
            <td><?= h($invoice->waveoff_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Date') ?></th>
            <td><?= h($invoice->current_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Waveoff Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($invoice->waveoff_reason)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Invoice Details') ?></h4>
        <?php if (!empty($invoice->invoice_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Invoice Id') ?></th>
                <th scope="col"><?= __('Duty Slip Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($invoice->invoice_details as $invoiceDetails): ?>
            <tr>
                <td><?= h($invoiceDetails->id) ?></td>
                <td><?= h($invoiceDetails->invoice_id) ?></td>
                <td><?= h($invoiceDetails->duty_slip_id) ?></td>
                <td><?= h($invoiceDetails->amount) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InvoiceDetails', 'action' => 'view', $invoiceDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InvoiceDetails', 'action' => 'edit', $invoiceDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InvoiceDetails', 'action' => 'delete', $invoiceDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
