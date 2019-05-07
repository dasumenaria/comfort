<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employee->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee) ?>
    <fieldset>
        <legend><?= __('Edit Employee') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('mobile_no');
            echo $this->Form->control('present_add');
            echo $this->Form->control('father_name');
            echo $this->Form->control('qualification');
            echo $this->Form->control('address');
            echo $this->Form->control('dob');
            echo $this->Form->control('esi_no');
            echo $this->Form->control('pf_no');
            echo $this->Form->control('designation');
            echo $this->Form->control('basicsalary');
            echo $this->Form->control('dearness');
            echo $this->Form->control('houserent');
            echo $this->Form->control('conveyance');
            echo $this->Form->control('phone_amnt');
            echo $this->Form->control('medical_amnt');
            echo $this->Form->control('professiontax');
            echo $this->Form->control('providentfund');
            echo $this->Form->control('fpf');
            echo $this->Form->control('esic');
            echo $this->Form->control('incometaxtds');
            echo $this->Form->control('bank_account_number');
            echo $this->Form->control('bank_name');
            echo $this->Form->control('driver_doj');
            echo $this->Form->control('blood_group');
            echo $this->Form->control('ref_name');
            echo $this->Form->control('lic_no');
            echo $this->Form->control('lic_issue_date');
            echo $this->Form->control('lic_issue_place');
            echo $this->Form->control('lic_exp_date');
            echo $this->Form->control('badge_no');
            echo $this->Form->control('dob_leave');
            echo $this->Form->control('leave_reason');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
