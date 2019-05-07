<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DutySlip $dutySlip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Duty Slip'), ['action' => 'edit', $dutySlip->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Duty Slip'), ['action' => 'delete', $dutySlip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dutySlip->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Duty Slips'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Duty Slip'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Car Types'), ['controller' => 'CarTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Car Type'), ['controller' => 'CarTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Logins'), ['controller' => 'Logins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login'), ['controller' => 'Logins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Counters'), ['controller' => 'Counters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Counter'), ['controller' => 'Counters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dutySlips view large-9 medium-8 columns content">
    <h3><?= h($dutySlip->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Guest Name') ?></th>
            <td><?= h($dutySlip->guest_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile No') ?></th>
            <td><?= h($dutySlip->mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Id') ?></th>
            <td><?= h($dutySlip->email_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Id') ?></th>
            <td><?= h($dutySlip->photo_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service') ?></th>
            <td><?= $dutySlip->has('service') ? $this->Html->link($dutySlip->service->name, ['controller' => 'Services', 'action' => 'view', $dutySlip->service->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Car Type') ?></th>
            <td><?= $dutySlip->has('car_type') ? $this->Html->link($dutySlip->car_type->name, ['controller' => 'CarTypes', 'action' => 'view', $dutySlip->car_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Car Id') ?></th>
            <td><?= h($dutySlip->car_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Temp Car No') ?></th>
            <td><?= h($dutySlip->temp_car_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $dutySlip->has('customer') ? $this->Html->link($dutySlip->customer->name, ['controller' => 'Customers', 'action' => 'view', $dutySlip->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Detail No') ?></th>
            <td><?= h($dutySlip->detail_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $dutySlip->has('employee') ? $this->Html->link($dutySlip->employee->name, ['controller' => 'Employees', 'action' => 'view', $dutySlip->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Billed Complimentary') ?></th>
            <td><?= h($dutySlip->billed_complimentary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Authorized Person') ?></th>
            <td><?= h($dutySlip->authorized_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reason') ?></th>
            <td><?= h($dutySlip->reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Billing Status') ?></th>
            <td><?= h($dutySlip->billing_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Km') ?></th>
            <td><?= h($dutySlip->total_km) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extra') ?></th>
            <td><?= h($dutySlip->extra) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extra Details') ?></th>
            <td><?= h($dutySlip->extra_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login') ?></th>
            <td><?= $dutySlip->has('login') ? $this->Html->link($dutySlip->login->name, ['controller' => 'Logins', 'action' => 'view', $dutySlip->login->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Counter') ?></th>
            <td><?= $dutySlip->has('counter') ? $this->Html->link($dutySlip->counter->name, ['controller' => 'Counters', 'action' => 'view', $dutySlip->counter->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Max Invoice Id') ?></th>
            <td><?= h($dutySlip->max_invoice_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('New Car No') ?></th>
            <td><?= h($dutySlip->new_car_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Temp Driver Name') ?></th>
            <td><?= h($dutySlip->temp_driver_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gst No') ?></th>
            <td><?= h($dutySlip->gst_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ref') ?></th>
            <td><?= h($dutySlip->ref) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Days') ?></th>
            <td><?= h($dutySlip->no_of_days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Texi No') ?></th>
            <td><?= h($dutySlip->texi_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cop Amounts') ?></th>
            <td><?= h($dutySlip->cop_amounts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Billing Type') ?></th>
            <td><?= h($dutySlip->billing_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($dutySlip->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dutySlip->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Opening Km') ?></th>
            <td><?= $this->Number->format($dutySlip->opening_km) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Closing Km') ?></th>
            <td><?= $this->Number->format($dutySlip->closing_km) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extra Chg') ?></th>
            <td><?= $this->Number->format($dutySlip->extra_chg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Permit Chg') ?></th>
            <td><?= $this->Number->format($dutySlip->permit_chg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parking Chg') ?></th>
            <td><?= $this->Number->format($dutySlip->parking_chg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Otherstate Chg') ?></th>
            <td><?= $this->Number->format($dutySlip->otherstate_chg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Guide Chg') ?></th>
            <td><?= $this->Number->format($dutySlip->guide_chg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Misc Chg') ?></th>
            <td><?= $this->Number->format($dutySlip->misc_chg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= $this->Number->format($dutySlip->rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extra Amnt') ?></th>
            <td><?= $this->Number->format($dutySlip->extra_amnt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tot Amnt') ?></th>
            <td><?= $this->Number->format($dutySlip->tot_amnt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($dutySlip->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waveoff Status') ?></th>
            <td><?= $this->Number->format($dutySlip->waveoff_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waveoff Login Id') ?></th>
            <td><?= $this->Number->format($dutySlip->waveoff_login_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waveoff Counter Id') ?></th>
            <td><?= $this->Number->format($dutySlip->waveoff_counter_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fuel Hike Chg') ?></th>
            <td><?= $this->Number->format($dutySlip->fuel_hike_chg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($dutySlip->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Opening Time') ?></th>
            <td><?= h($dutySlip->opening_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Closing Time') ?></th>
            <td><?= h($dutySlip->closing_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date From') ?></th>
            <td><?= h($dutySlip->date_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date To') ?></th>
            <td><?= h($dutySlip->date_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Authorization') ?></th>
            <td><?= h($dutySlip->date_authorization) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service Date') ?></th>
            <td><?= h($dutySlip->service_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Reporting Address') ?></h4>
        <?= $this->Text->autoParagraph(h($dutySlip->reporting_address)); ?>
    </div>
    <div class="row">
        <h4><?= __('Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($dutySlip->remarks)); ?>
    </div>
    <div class="row">
        <h4><?= __('Waveoff Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($dutySlip->waveoff_reason)); ?>
    </div>
</div>
