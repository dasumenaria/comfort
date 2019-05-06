<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SupplierTariff $supplierTariff
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supplier Tariff'), ['action' => 'edit', $supplierTariff->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier Tariff'), ['action' => 'delete', $supplierTariff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierTariff->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Supplier Tariffs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier Tariff'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Car Types'), ['controller' => 'CarTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Car Type'), ['controller' => 'CarTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="supplierTariffs view large-9 medium-8 columns content">
    <h3><?= h($supplierTariff->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $supplierTariff->has('supplier') ? $this->Html->link($supplierTariff->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $supplierTariff->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Car Type') ?></th>
            <td><?= $supplierTariff->has('car_type') ? $this->Html->link($supplierTariff->car_type->name, ['controller' => 'CarTypes', 'action' => 'view', $supplierTariff->car_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service') ?></th>
            <td><?= $supplierTariff->has('service') ? $this->Html->link($supplierTariff->service->name, ['controller' => 'Services', 'action' => 'view', $supplierTariff->service->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= h($supplierTariff->rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplierTariff->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Minimum Chg Km') ?></th>
            <td><?= $this->Number->format($supplierTariff->minimum_chg_km) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extra Km Rate') ?></th>
            <td><?= $this->Number->format($supplierTariff->extra_km_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Minimum Chg Hourly') ?></th>
            <td><?= $this->Number->format($supplierTariff->minimum_chg_hourly) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extra Hour Rate') ?></th>
            <td><?= $this->Number->format($supplierTariff->extra_hour_rate) ?></td>
        </tr>
    </table>
</div>
