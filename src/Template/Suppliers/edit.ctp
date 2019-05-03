<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $supplier->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Supplier Types'), ['controller' => 'SupplierTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier Type'), ['controller' => 'SupplierTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supplier Type Subs'), ['controller' => 'SupplierTypeSubs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier Type Sub'), ['controller' => 'SupplierTypeSubs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="suppliers form large-9 medium-8 columns content">
    <?= $this->Form->create($supplier) ?>
    <fieldset>
        <legend><?= __('Edit Supplier') ?></legend>
        <?php
            echo $this->Form->control('supplier_type_id', ['options' => $supplierTypes]);
            echo $this->Form->control('supplier_type_sub_id', ['options' => $supplierTypeSubs]);
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('contact_name');
            echo $this->Form->control('office_no');
            echo $this->Form->control('residence_no');
            echo $this->Form->control('mobile_no');
            echo $this->Form->control('email_id');
            echo $this->Form->control('fax_no');
            echo $this->Form->control('opening_bal');
            echo $this->Form->control('closing_bal');
            echo $this->Form->control('due_days');
            echo $this->Form->control('servicetax_no');
            echo $this->Form->control('pan_no');
            echo $this->Form->control('account_no');
            echo $this->Form->control('servicetax_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
