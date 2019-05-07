<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employee->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($employee->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile No') ?></th>
            <td><?= h($employee->mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Father Name') ?></th>
            <td><?= h($employee->father_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qualification') ?></th>
            <td><?= h($employee->qualification) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Esi No') ?></th>
            <td><?= h($employee->esi_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pf No') ?></th>
            <td><?= h($employee->pf_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= h($employee->designation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Basicsalary') ?></th>
            <td><?= h($employee->basicsalary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dearness') ?></th>
            <td><?= h($employee->dearness) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Houserent') ?></th>
            <td><?= h($employee->houserent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conveyance') ?></th>
            <td><?= h($employee->conveyance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Amnt') ?></th>
            <td><?= h($employee->phone_amnt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medical Amnt') ?></th>
            <td><?= h($employee->medical_amnt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Professiontax') ?></th>
            <td><?= h($employee->professiontax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Providentfund') ?></th>
            <td><?= h($employee->providentfund) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fpf') ?></th>
            <td><?= h($employee->fpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Esic') ?></th>
            <td><?= h($employee->esic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Incometaxtds') ?></th>
            <td><?= h($employee->incometaxtds) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank Account Number') ?></th>
            <td><?= h($employee->bank_account_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank Name') ?></th>
            <td><?= h($employee->bank_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Blood Group') ?></th>
            <td><?= h($employee->blood_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ref Name') ?></th>
            <td><?= h($employee->ref_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lic No') ?></th>
            <td><?= h($employee->lic_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lic Issue Place') ?></th>
            <td><?= h($employee->lic_issue_place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Badge No') ?></th>
            <td><?= h($employee->badge_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Leave Reason') ?></th>
            <td><?= h($employee->leave_reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dob') ?></th>
            <td><?= h($employee->dob) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Driver Doj') ?></th>
            <td><?= h($employee->driver_doj) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lic Issue Date') ?></th>
            <td><?= h($employee->lic_issue_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lic Exp Date') ?></th>
            <td><?= h($employee->lic_exp_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dob Leave') ?></th>
            <td><?= h($employee->dob_leave) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $employee->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Present Add') ?></h4>
        <?= $this->Text->autoParagraph(h($employee->present_add)); ?>
    </div>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($employee->address)); ?>
    </div>
</div>
