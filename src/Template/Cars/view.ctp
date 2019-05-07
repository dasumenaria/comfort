<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Car'), ['action' => 'edit', $car->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Car'), ['action' => 'delete', $car->id], ['confirm' => __('Are you sure you want to delete # {0}?', $car->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cars'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Car'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Car Types'), ['controller' => 'CarTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Car Type'), ['controller' => 'CarTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cars view large-9 medium-8 columns content">
    <h3><?= h($car->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Car Type') ?></th>
            <td><?= $car->has('car_type') ? $this->Html->link($car->car_type->name, ['controller' => 'CarTypes', 'action' => 'view', $car->car_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($car->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $car->has('supplier') ? $this->Html->link($car->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $car->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Engine No') ?></th>
            <td><?= h($car->engine_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chasis No') ?></th>
            <td><?= h($car->chasis_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($car->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rto Tax Date') ?></th>
            <td><?= h($car->rto_tax_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Insurance Date From') ?></th>
            <td><?= h($car->insurance_date_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Insurance Date To') ?></th>
            <td><?= h($car->insurance_date_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Authorization Date') ?></th>
            <td><?= h($car->authorization_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Permit Date') ?></th>
            <td><?= h($car->permit_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fitness Date') ?></th>
            <td><?= h($car->fitness_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Puc Date') ?></th>
            <td><?= h($car->puc_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $car->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
