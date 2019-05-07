<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DutySlip[]|\Cake\Collection\CollectionInterface $dutySlips
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Duty Slip'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Car Types'), ['controller' => 'CarTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car Type'), ['controller' => 'CarTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Logins'), ['controller' => 'Logins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Login'), ['controller' => 'Logins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counters'), ['controller' => 'Counters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Counter'), ['controller' => 'Counters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dutySlips index large-9 medium-8 columns content">
    <h3><?= __('Duty Slips') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('guest_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('car_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('car_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('temp_car_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('detail_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('opening_km') ?></th>
                <th scope="col"><?= $this->Paginator->sort('opening_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('closing_km') ?></th>
                <th scope="col"><?= $this->Paginator->sort('closing_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_from') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_to') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extra_chg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('permit_chg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parking_chg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('otherstate_chg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('guide_chg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('misc_chg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('billed_complimentary') ?></th>
                <th scope="col"><?= $this->Paginator->sort('authorized_person') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_authorization') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('billing_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_km') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extra') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extra_details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extra_amnt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tot_amnt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('counter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('max_invoice_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('new_car_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waveoff_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waveoff_login_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waveoff_counter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('temp_driver_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gst_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ref') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_of_days') ?></th>
                <th scope="col"><?= $this->Paginator->sort('texi_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cop_amounts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('billing_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fuel_hike_chg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dutySlips as $dutySlip): ?>
            <tr>
                <td><?= $this->Number->format($dutySlip->id) ?></td>
                <td><?= h($dutySlip->date) ?></td>
                <td><?= h($dutySlip->guest_name) ?></td>
                <td><?= h($dutySlip->mobile_no) ?></td>
                <td><?= h($dutySlip->email_id) ?></td>
                <td><?= h($dutySlip->photo_id) ?></td>
                <td><?= $dutySlip->has('service') ? $this->Html->link($dutySlip->service->name, ['controller' => 'Services', 'action' => 'view', $dutySlip->service->id]) : '' ?></td>
                <td><?= $dutySlip->has('car_type') ? $this->Html->link($dutySlip->car_type->name, ['controller' => 'CarTypes', 'action' => 'view', $dutySlip->car_type->id]) : '' ?></td>
                <td><?= h($dutySlip->car_id) ?></td>
                <td><?= h($dutySlip->temp_car_no) ?></td>
                <td><?= $dutySlip->has('customer') ? $this->Html->link($dutySlip->customer->name, ['controller' => 'Customers', 'action' => 'view', $dutySlip->customer->id]) : '' ?></td>
                <td><?= h($dutySlip->detail_no) ?></td>
                <td><?= $dutySlip->has('employee') ? $this->Html->link($dutySlip->employee->name, ['controller' => 'Employees', 'action' => 'view', $dutySlip->employee->id]) : '' ?></td>
                <td><?= $this->Number->format($dutySlip->opening_km) ?></td>
                <td><?= h($dutySlip->opening_time) ?></td>
                <td><?= $this->Number->format($dutySlip->closing_km) ?></td>
                <td><?= h($dutySlip->closing_time) ?></td>
                <td><?= h($dutySlip->date_from) ?></td>
                <td><?= h($dutySlip->date_to) ?></td>
                <td><?= $this->Number->format($dutySlip->extra_chg) ?></td>
                <td><?= $this->Number->format($dutySlip->permit_chg) ?></td>
                <td><?= $this->Number->format($dutySlip->parking_chg) ?></td>
                <td><?= $this->Number->format($dutySlip->otherstate_chg) ?></td>
                <td><?= $this->Number->format($dutySlip->guide_chg) ?></td>
                <td><?= $this->Number->format($dutySlip->misc_chg) ?></td>
                <td><?= h($dutySlip->billed_complimentary) ?></td>
                <td><?= h($dutySlip->authorized_person) ?></td>
                <td><?= h($dutySlip->date_authorization) ?></td>
                <td><?= h($dutySlip->reason) ?></td>
                <td><?= h($dutySlip->billing_status) ?></td>
                <td><?= h($dutySlip->total_km) ?></td>
                <td><?= $this->Number->format($dutySlip->rate) ?></td>
                <td><?= h($dutySlip->extra) ?></td>
                <td><?= h($dutySlip->extra_details) ?></td>
                <td><?= $this->Number->format($dutySlip->extra_amnt) ?></td>
                <td><?= $this->Number->format($dutySlip->tot_amnt) ?></td>
                <td><?= $this->Number->format($dutySlip->amount) ?></td>
                <td><?= $dutySlip->has('login') ? $this->Html->link($dutySlip->login->name, ['controller' => 'Logins', 'action' => 'view', $dutySlip->login->id]) : '' ?></td>
                <td><?= $dutySlip->has('counter') ? $this->Html->link($dutySlip->counter->name, ['controller' => 'Counters', 'action' => 'view', $dutySlip->counter->id]) : '' ?></td>
                <td><?= h($dutySlip->max_invoice_id) ?></td>
                <td><?= h($dutySlip->new_car_no) ?></td>
                <td><?= $this->Number->format($dutySlip->waveoff_status) ?></td>
                <td><?= $this->Number->format($dutySlip->waveoff_login_id) ?></td>
                <td><?= $this->Number->format($dutySlip->waveoff_counter_id) ?></td>
                <td><?= h($dutySlip->temp_driver_name) ?></td>
                <td><?= h($dutySlip->gst_no) ?></td>
                <td><?= h($dutySlip->service_date) ?></td>
                <td><?= h($dutySlip->ref) ?></td>
                <td><?= h($dutySlip->no_of_days) ?></td>
                <td><?= h($dutySlip->texi_no) ?></td>
                <td><?= h($dutySlip->cop_amounts) ?></td>
                <td><?= h($dutySlip->billing_type) ?></td>
                <td><?= $this->Number->format($dutySlip->fuel_hike_chg) ?></td>
                <td><?= h($dutySlip->city) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dutySlip->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dutySlip->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dutySlip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dutySlip->id)]) ?>
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
