<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NatureOfGroup $natureOfGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $natureOfGroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $natureOfGroup->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Nature Of Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Accounting Groups'), ['controller' => 'AccountingGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Accounting Group'), ['controller' => 'AccountingGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="natureOfGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($natureOfGroup) ?>
    <fieldset>
        <legend><?= __('Edit Nature Of Group') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
