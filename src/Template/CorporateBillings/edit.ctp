<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CorporateBilling $corporateBilling
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $corporateBilling->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $corporateBilling->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Corporate Billings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Logins'), ['controller' => 'Logins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Login'), ['controller' => 'Logins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counters'), ['controller' => 'Counters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Counter'), ['controller' => 'Counters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="corporateBillings form large-9 medium-8 columns content">
    <?= $this->Form->create($corporateBilling) ?>
    <fieldset>
        <legend><?= __('Edit Corporate Billing') ?></legend>
        <?php
            echo $this->Form->control('invoice_no');
            echo $this->Form->control('date');
            echo $this->Form->control('customer_name');
            echo $this->Form->control('guest_name');
            echo $this->Form->control('ref');
            echo $this->Form->control('service_date');
            echo $this->Form->control('service');
            echo $this->Form->control('rate');
            echo $this->Form->control('no_of_days');
            echo $this->Form->control('taxi_no');
            echo $this->Form->control('amount');
            echo $this->Form->control('tot_amnt');
            echo $this->Form->control('service_tax');
            echo $this->Form->control('discount');
            echo $this->Form->control('net_amnt');
            echo $this->Form->control('login_id', ['options' => $logins]);
            echo $this->Form->control('counter_id', ['options' => $counters]);
            echo $this->Form->control('waveoff_status');
            echo $this->Form->control('waveoff_reason');
            echo $this->Form->control('waveoff_login_id');
            echo $this->Form->control('waveoff_counter_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
