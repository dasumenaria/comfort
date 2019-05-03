<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($customer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($customer->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Person') ?></th>
            <td><?= h($customer->Contact_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Office No') ?></th>
            <td><?= h($customer->office_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Residence No') ?></th>
            <td><?= h($customer->Residence_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Id') ?></th>
            <td><?= h($customer->email_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax No') ?></th>
            <td><?= h($customer->fax_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Srvctaxregno') ?></th>
            <td><?= h($customer->srvctaxregno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Panno') ?></th>
            <td><?= h($customer->panno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creditlimit') ?></th>
            <td><?= h($customer->creditlimit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Block Status') ?></th>
            <td><?= h($customer->block_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Servicetax Status') ?></th>
            <td><?= h($customer->servicetax_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gst Number') ?></th>
            <td><?= h($customer->gst_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($customer->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($customer->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile No') ?></th>
            <td><?= $this->Number->format($customer->mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Opening Bal') ?></th>
            <td><?= $this->Number->format($customer->opening_bal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Closing Bal') ?></th>
            <td><?= $this->Number->format($customer->closing_bal) ?></td>
        </tr>
    </table>
</div>
