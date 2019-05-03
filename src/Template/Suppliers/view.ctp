<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Supplier Types'), ['controller' => 'SupplierTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier Type'), ['controller' => 'SupplierTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Supplier Type Subs'), ['controller' => 'SupplierTypeSubs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier Type Sub'), ['controller' => 'SupplierTypeSubs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="suppliers view large-9 medium-8 columns content">
    <h3><?= h($supplier->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Supplier Type') ?></th>
            <td><?= $supplier->has('supplier_type') ? $this->Html->link($supplier->supplier_type->name, ['controller' => 'SupplierTypes', 'action' => 'view', $supplier->supplier_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier Type Sub') ?></th>
            <td><?= $supplier->has('supplier_type_sub') ? $this->Html->link($supplier->supplier_type_sub->name, ['controller' => 'SupplierTypeSubs', 'action' => 'view', $supplier->supplier_type_sub->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($supplier->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($supplier->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Name') ?></th>
            <td><?= h($supplier->contact_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Office No') ?></th>
            <td><?= h($supplier->office_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Residence No') ?></th>
            <td><?= h($supplier->residence_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile No') ?></th>
            <td><?= h($supplier->mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Id') ?></th>
            <td><?= h($supplier->email_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax No') ?></th>
            <td><?= h($supplier->fax_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Opening Bal') ?></th>
            <td><?= h($supplier->opening_bal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Closing Bal') ?></th>
            <td><?= h($supplier->closing_bal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Due Days') ?></th>
            <td><?= h($supplier->due_days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Servicetax No') ?></th>
            <td><?= h($supplier->servicetax_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pan No') ?></th>
            <td><?= h($supplier->pan_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account No') ?></th>
            <td><?= h($supplier->account_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Servicetax Status') ?></th>
            <td><?= h($supplier->servicetax_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplier->id) ?></td>
        </tr>
    </table>
</div>
