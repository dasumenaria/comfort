<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DutySlip $dutySlip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dutySlip->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dutySlip->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Duty Slips'), ['action' => 'index']) ?></li>
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
<div class="dutySlips form large-9 medium-8 columns content">
    <?= $this->Form->create($dutySlip) ?>
    <fieldset>
        <legend><?= __('Edit Duty Slip') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('guest_name');
            echo $this->Form->control('reporting_address');
            echo $this->Form->control('mobile_no');
            echo $this->Form->control('email_id');
            echo $this->Form->control('photo_id');
            echo $this->Form->control('service_id', ['options' => $services]);
            echo $this->Form->control('car_type_id', ['options' => $carTypes]);
            echo $this->Form->control('car_id');
            echo $this->Form->control('temp_car_no');
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('detail_no');
            echo $this->Form->control('employee_id', ['options' => $employees]);
            echo $this->Form->control('opening_km');
            echo $this->Form->control('opening_time');
            echo $this->Form->control('closing_km');
            echo $this->Form->control('closing_time');
            echo $this->Form->control('date_from');
            echo $this->Form->control('date_to');
            echo $this->Form->control('extra_chg');
            echo $this->Form->control('permit_chg');
            echo $this->Form->control('parking_chg');
            echo $this->Form->control('otherstate_chg');
            echo $this->Form->control('guide_chg');
            echo $this->Form->control('misc_chg');
            echo $this->Form->control('remarks');
            echo $this->Form->control('billed_complimentary');
            echo $this->Form->control('authorized_person');
            echo $this->Form->control('date_authorization');
            echo $this->Form->control('reason');
            echo $this->Form->control('billing_status');
            echo $this->Form->control('total_km');
            echo $this->Form->control('rate');
            echo $this->Form->control('extra');
            echo $this->Form->control('extra_details');
            echo $this->Form->control('extra_amnt');
            echo $this->Form->control('tot_amnt');
            echo $this->Form->control('amount');
            echo $this->Form->control('login_id', ['options' => $logins]);
            echo $this->Form->control('counter_id', ['options' => $counters]);
            echo $this->Form->control('max_invoice_id');
            echo $this->Form->control('new_car_no');
            echo $this->Form->control('waveoff_status');
            echo $this->Form->control('waveoff_reason');
            echo $this->Form->control('waveoff_login_id');
            echo $this->Form->control('waveoff_counter_id');
            echo $this->Form->control('temp_driver_name');
            echo $this->Form->control('gst_no');
            echo $this->Form->control('service_date');
            echo $this->Form->control('ref');
            echo $this->Form->control('no_of_days');
            echo $this->Form->control('texi_no');
            echo $this->Form->control('cop_amounts');
            echo $this->Form->control('billing_type');
            echo $this->Form->control('fuel_hike_chg');
            echo $this->Form->control('city');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
