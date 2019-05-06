<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerTariff[]|\Cake\Collection\CollectionInterface $customerTariffs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer Tariff'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Car Types'), ['controller' => 'CarTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car Type'), ['controller' => 'CarTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customerTariffs index large-9 medium-8 columns content">
    <h3><?= __('Customer Tariffs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('car_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('minimum_chg_km') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extra_km_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('minimum_chg_hourly') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extra_hour_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customerTariffs as $customerTariff): ?>
            <tr>
                <td><?= $this->Number->format($customerTariff->id) ?></td>
                <td><?= $customerTariff->has('customer') ? $this->Html->link($customerTariff->customer->name, ['controller' => 'Customers', 'action' => 'view', $customerTariff->customer->id]) : '' ?></td>
                <td><?= $customerTariff->has('car_type') ? $this->Html->link($customerTariff->car_type->name, ['controller' => 'CarTypes', 'action' => 'view', $customerTariff->car_type->id]) : '' ?></td>
                <td><?= $customerTariff->has('service') ? $this->Html->link($customerTariff->service->name, ['controller' => 'Services', 'action' => 'view', $customerTariff->service->id]) : '' ?></td>
                <td><?= h($customerTariff->rate) ?></td>
                <td><?= h($customerTariff->minimum_chg_km) ?></td>
                <td><?= h($customerTariff->extra_km_rate) ?></td>
                <td><?= $this->Number->format($customerTariff->minimum_chg_hourly) ?></td>
                <td><?= $this->Number->format($customerTariff->extra_hour_rate) ?></td>
                <td><?= h($customerTariff->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customerTariff->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customerTariff->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customerTariff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerTariff->id)]) ?>
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
