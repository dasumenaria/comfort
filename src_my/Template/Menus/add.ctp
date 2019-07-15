 
<div class="menus form large-9 medium-8 columns content">
    <?= $this->Form->create($menu) ?>
    <fieldset>
        <legend><?= __('Add Menu') ?></legend>
        <?php
            echo $this->Form->control('menu_name');
            echo $this->Form->control('parent_id', ['options' => $parentMenus, 'empty' => true]);
            echo $this->Form->control('controller');
            echo $this->Form->control('action');  
            echo $this->Form->control('query_string'); 
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
