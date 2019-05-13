<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CorporateBilling[]|\Cake\Collection\CollectionInterface $corporateBillings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Corporate Billing'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Logins'), ['controller' => 'Logins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Login'), ['controller' => 'Logins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counters'), ['controller' => 'Counters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Counter'), ['controller' => 'Counters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="corporateBillings index large-9 medium-8 columns content">
    <h3><?= __('Corporate Billings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('invoice_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('guest_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_of_days') ?></th>
                <th scope="col"><?= $this->Paginator->sort('taxi_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tot_amnt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_tax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('net_amnt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('counter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waveoff_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waveoff_login_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waveoff_counter_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($corporateBillings as $corporateBilling): ?>
            <tr>
                <td><?= $this->Number->format($corporateBilling->id) ?></td>
                <td><?= $this->Number->format($corporateBilling->invoice_no) ?></td>
                <td><?= h($corporateBilling->date) ?></td>
                <td><?= h($corporateBilling->customer_name) ?></td>
                <td><?= h($corporateBilling->guest_name) ?></td>
                <td><?= h($corporateBilling->service_date) ?></td>
                <td><?= h($corporateBilling->service) ?></td>
                <td><?= h($corporateBilling->rate) ?></td>
                <td><?= h($corporateBilling->no_of_days) ?></td>
                <td><?= h($corporateBilling->taxi_no) ?></td>
                <td><?= h($corporateBilling->amount) ?></td>
                <td><?= h($corporateBilling->tot_amnt) ?></td>
                <td><?= h($corporateBilling->service_tax) ?></td>
                <td><?= h($corporateBilling->discount) ?></td>
                <td><?= h($corporateBilling->net_amnt) ?></td>
                <td><?= $corporateBilling->has('login') ? $this->Html->link($corporateBilling->login->name, ['controller' => 'Logins', 'action' => 'view', $corporateBilling->login->id]) : '' ?></td>
                <td><?= $corporateBilling->has('counter') ? $this->Html->link($corporateBilling->counter->name, ['controller' => 'Counters', 'action' => 'view', $corporateBilling->counter->id]) : '' ?></td>
                <td><?= $this->Number->format($corporateBilling->waveoff_status) ?></td>
                <td><?= $this->Number->format($corporateBilling->waveoff_login_id) ?></td>
                <td><?= $this->Number->format($corporateBilling->waveoff_counter_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $corporateBilling->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $corporateBilling->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $corporateBilling->id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporateBilling->id)]) ?>
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
