<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customers index large-9 medium-8 columns content">
    <h3><?= __('Customers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Contact_person') ?></th>
                <th scope="col"><?= $this->Paginator->sort('office_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Residence_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fax_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('opening_bal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('closing_bal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('srvctaxregno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('panno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creditlimit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('block_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('servicetax_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gst_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $this->Number->format($customer->id) ?></td>
                <td><?= h($customer->name) ?></td>
                <td><?= h($customer->address) ?></td>
                <td><?= h($customer->Contact_person) ?></td>
                <td><?= h($customer->office_no) ?></td>
                <td><?= h($customer->Residence_no) ?></td>
                <td><?= $this->Number->format($customer->mobile_no) ?></td>
                <td><?= h($customer->email_id) ?></td>
                <td><?= h($customer->fax_no) ?></td>
                <td><?= $this->Number->format($customer->opening_bal) ?></td>
                <td><?= $this->Number->format($customer->closing_bal) ?></td>
                <td><?= h($customer->srvctaxregno) ?></td>
                <td><?= h($customer->panno) ?></td>
                <td><?= h($customer->creditlimit) ?></td>
                <td><?= h($customer->block_status) ?></td>
                <td><?= h($customer->servicetax_status) ?></td>
                <td><?= h($customer->gst_number) ?></td>
                <td><?= h($customer->state) ?></td>
                <td><?= h($customer->city) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
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
