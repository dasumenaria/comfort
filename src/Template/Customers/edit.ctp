<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="customers form large-9 medium-8 columns content">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Edit Customer') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('Contact_person');
            echo $this->Form->control('office_no');
            echo $this->Form->control('Residence_no');
            echo $this->Form->control('mobile_no');
            echo $this->Form->control('email_id');
            echo $this->Form->control('fax_no');
            echo $this->Form->control('opening_bal');
            echo $this->Form->control('closing_bal');
            echo $this->Form->control('srvctaxregno');
            echo $this->Form->control('panno');
            echo $this->Form->control('creditlimit');
            echo $this->Form->control('block_status');
            echo $this->Form->control('servicetax_status');
            echo $this->Form->control('gst_number');
            echo $this->Form->control('state');
            echo $this->Form->control('city');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
