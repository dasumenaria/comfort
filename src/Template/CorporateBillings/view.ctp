<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CorporateBilling $corporateBilling
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Corporate Billing'), ['action' => 'edit', $corporateBilling->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Corporate Billing'), ['action' => 'delete', $corporateBilling->id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporateBilling->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Corporate Billings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Corporate Billing'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Logins'), ['controller' => 'Logins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login'), ['controller' => 'Logins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Counters'), ['controller' => 'Counters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Counter'), ['controller' => 'Counters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="corporateBillings view large-9 medium-8 columns content">
    <h3><?= h($corporateBilling->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer Name') ?></th>
            <td><?= h($corporateBilling->customer_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Guest Name') ?></th>
            <td><?= h($corporateBilling->guest_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service Date') ?></th>
            <td><?= h($corporateBilling->service_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service') ?></th>
            <td><?= h($corporateBilling->service) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= h($corporateBilling->rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Days') ?></th>
            <td><?= h($corporateBilling->no_of_days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Taxi No') ?></th>
            <td><?= h($corporateBilling->taxi_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= h($corporateBilling->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tot Amnt') ?></th>
            <td><?= h($corporateBilling->tot_amnt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service Tax') ?></th>
            <td><?= h($corporateBilling->service_tax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount') ?></th>
            <td><?= h($corporateBilling->discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Net Amnt') ?></th>
            <td><?= h($corporateBilling->net_amnt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login') ?></th>
            <td><?= $corporateBilling->has('login') ? $this->Html->link($corporateBilling->login->name, ['controller' => 'Logins', 'action' => 'view', $corporateBilling->login->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Counter') ?></th>
            <td><?= $corporateBilling->has('counter') ? $this->Html->link($corporateBilling->counter->name, ['controller' => 'Counters', 'action' => 'view', $corporateBilling->counter->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($corporateBilling->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Invoice No') ?></th>
            <td><?= $this->Number->format($corporateBilling->invoice_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waveoff Status') ?></th>
            <td><?= $this->Number->format($corporateBilling->waveoff_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waveoff Login Id') ?></th>
            <td><?= $this->Number->format($corporateBilling->waveoff_login_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waveoff Counter Id') ?></th>
            <td><?= $this->Number->format($corporateBilling->waveoff_counter_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($corporateBilling->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Ref') ?></h4>
        <?= $this->Text->autoParagraph(h($corporateBilling->ref)); ?>
    </div>
    <div class="row">
        <h4><?= __('Waveoff Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($corporateBilling->waveoff_reason)); ?>
    </div>
</div>
