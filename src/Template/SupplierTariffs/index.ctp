<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SupplierTariff[]|\Cake\Collection\CollectionInterface $supplierTariffs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Supplier Tariff'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Car Types'), ['controller' => 'CarTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car Type'), ['controller' => 'CarTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="supplierTariffs index large-9 medium-8 columns content">
    <h3><?= __('Supplier Tariffs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('car_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('minimum_chg_km') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extra_km_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('minimum_chg_hourly') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extra_hour_rate') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($supplierTariffs as $supplierTariff): ?>
            <tr>
                <td><?= $this->Number->format($supplierTariff->id) ?></td>
                <td><?= $supplierTariff->has('supplier') ? $this->Html->link($supplierTariff->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $supplierTariff->supplier->id]) : '' ?></td>
                <td><?= $supplierTariff->has('car_type') ? $this->Html->link($supplierTariff->car_type->name, ['controller' => 'CarTypes', 'action' => 'view', $supplierTariff->car_type->id]) : '' ?></td>
                <td><?= $supplierTariff->has('service') ? $this->Html->link($supplierTariff->service->name, ['controller' => 'Services', 'action' => 'view', $supplierTariff->service->id]) : '' ?></td>
                <td><?= h($supplierTariff->rate) ?></td>
                <td><?= $this->Number->format($supplierTariff->minimum_chg_km) ?></td>
                <td><?= $this->Number->format($supplierTariff->extra_km_rate) ?></td>
                <td><?= $this->Number->format($supplierTariff->minimum_chg_hourly) ?></td>
                <td><?= $this->Number->format($supplierTariff->extra_hour_rate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $supplierTariff->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplierTariff->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplierTariff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierTariff->id)]) ?>
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
