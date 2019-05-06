<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerTariff $customerTariff
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer Tariff'), ['action' => 'edit', $customerTariff->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer Tariff'), ['action' => 'delete', $customerTariff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerTariff->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customer Tariffs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Tariff'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Car Types'), ['controller' => 'CarTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Car Type'), ['controller' => 'CarTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customerTariffs view large-9 medium-8 columns content">
    <h3><?= h($customerTariff->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $customerTariff->has('customer') ? $this->Html->link($customerTariff->customer->name, ['controller' => 'Customers', 'action' => 'view', $customerTariff->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Car Type') ?></th>
            <td><?= $customerTariff->has('car_type') ? $this->Html->link($customerTariff->car_type->name, ['controller' => 'CarTypes', 'action' => 'view', $customerTariff->car_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service') ?></th>
            <td><?= $customerTariff->has('service') ? $this->Html->link($customerTariff->service->name, ['controller' => 'Services', 'action' => 'view', $customerTariff->service->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= h($customerTariff->rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Minimum Chg Km') ?></th>
            <td><?= h($customerTariff->minimum_chg_km) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extra Km Rate') ?></th>
            <td><?= h($customerTariff->extra_km_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customerTariff->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Minimum Chg Hourly') ?></th>
            <td><?= $this->Number->format($customerTariff->minimum_chg_hourly) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extra Hour Rate') ?></th>
            <td><?= $this->Number->format($customerTariff->extra_hour_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $customerTariff->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
