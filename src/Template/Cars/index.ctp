<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car[]|\Cake\Collection\CollectionInterface $cars
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Car'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Car Types'), ['controller' => 'CarTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car Type'), ['controller' => 'CarTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cars index large-9 medium-8 columns content">
    <h3><?= __('Cars') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('car_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('engine_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chasis_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rto_tax_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('insurance_date_from') ?></th>
                <th scope="col"><?= $this->Paginator->sort('insurance_date_to') ?></th>
                <th scope="col"><?= $this->Paginator->sort('authorization_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('permit_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fitness_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puc_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car): ?>
            <tr>
                <td><?= $this->Number->format($car->id) ?></td>
                <td><?= $car->has('car_type') ? $this->Html->link($car->car_type->name, ['controller' => 'CarTypes', 'action' => 'view', $car->car_type->id]) : '' ?></td>
                <td><?= h($car->name) ?></td>
                <td><?= $car->has('supplier') ? $this->Html->link($car->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $car->supplier->id]) : '' ?></td>
                <td><?= h($car->engine_no) ?></td>
                <td><?= h($car->chasis_no) ?></td>
                <td><?= h($car->rto_tax_date) ?></td>
                <td><?= h($car->insurance_date_from) ?></td>
                <td><?= h($car->insurance_date_to) ?></td>
                <td><?= h($car->authorization_date) ?></td>
                <td><?= h($car->permit_date) ?></td>
                <td><?= h($car->fitness_date) ?></td>
                <td><?= h($car->puc_date) ?></td>
                <td><?= h($car->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $car->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $car->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $car->id], ['confirm' => __('Are you sure you want to delete # {0}?', $car->id)]) ?>
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
