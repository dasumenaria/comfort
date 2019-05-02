<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarType $carType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Car Type'), ['action' => 'edit', $carType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Car Type'), ['action' => 'delete', $carType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Car Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Car Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="carTypes view large-9 medium-8 columns content">
    <h3><?= h($carType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($carType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($carType->id) ?></td>
        </tr>
    </table>
</div>
