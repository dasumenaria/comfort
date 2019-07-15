<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRight $userRight
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userRight->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userRight->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Rights'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Logins'), ['controller' => 'Logins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Login'), ['controller' => 'Logins', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userRights form large-9 medium-8 columns content">
    <?= $this->Form->create($userRight) ?>
    <fieldset>
        <legend><?= __('Edit User Right') ?></legend>
        <?php
            echo $this->Form->control('login_id', ['options' => $logins, 'empty' => true]);
            echo $this->Form->control('menu_ids');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
