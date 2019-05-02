<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarType $carType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Car Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="carTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($carType) ?>
    <fieldset>
        <legend><?= __('Add Car Type') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
