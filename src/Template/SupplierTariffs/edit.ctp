<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SupplierTariff $supplierTariff
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $supplierTariff->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supplierTariff->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Supplier Tariffs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Car Types'), ['controller' => 'CarTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car Type'), ['controller' => 'CarTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="supplierTariffs form large-9 medium-8 columns content">
    <?= $this->Form->create($supplierTariff) ?>
    <fieldset>
        <legend><?= __('Edit Supplier Tariff') ?></legend>
        <?php
            echo $this->Form->control('supplier_id', ['options' => $suppliers]);
            echo $this->Form->control('car_type_id', ['options' => $carTypes]);
            echo $this->Form->control('service_id', ['options' => $services]);
            echo $this->Form->control('rate');
            echo $this->Form->control('minimum_chg_km');
            echo $this->Form->control('extra_km_rate');
            echo $this->Form->control('minimum_chg_hourly');
            echo $this->Form->control('extra_hour_rate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
