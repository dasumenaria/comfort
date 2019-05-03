<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SupplierType $supplierType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supplier Type'), ['action' => 'edit', $supplierType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier Type'), ['action' => 'delete', $supplierType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Supplier Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="supplierTypes view large-9 medium-8 columns content">
    <h3><?= h($supplierType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($supplierType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplierType->id) ?></td>
        </tr>
    </table>
</div>
