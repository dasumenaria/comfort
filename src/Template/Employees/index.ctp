<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employees index large-9 medium-8 columns content">
    <h3><?= __('Employees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('father_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('qualification') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dob') ?></th>
                <th scope="col"><?= $this->Paginator->sort('esi_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pf_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('designation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('basicsalary') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dearness') ?></th>
                <th scope="col"><?= $this->Paginator->sort('houserent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conveyance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_amnt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medical_amnt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('professiontax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('providentfund') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('esic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('incometaxtds') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bank_account_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bank_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('driver_doj') ?></th>
                <th scope="col"><?= $this->Paginator->sort('blood_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ref_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lic_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lic_issue_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lic_issue_place') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lic_exp_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('badge_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dob_leave') ?></th>
                <th scope="col"><?= $this->Paginator->sort('leave_reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $this->Number->format($employee->id) ?></td>
                <td><?= h($employee->name) ?></td>
                <td><?= h($employee->mobile_no) ?></td>
                <td><?= h($employee->father_name) ?></td>
                <td><?= h($employee->qualification) ?></td>
                <td><?= h($employee->dob) ?></td>
                <td><?= h($employee->esi_no) ?></td>
                <td><?= h($employee->pf_no) ?></td>
                <td><?= h($employee->designation) ?></td>
                <td><?= h($employee->basicsalary) ?></td>
                <td><?= h($employee->dearness) ?></td>
                <td><?= h($employee->houserent) ?></td>
                <td><?= h($employee->conveyance) ?></td>
                <td><?= h($employee->phone_amnt) ?></td>
                <td><?= h($employee->medical_amnt) ?></td>
                <td><?= h($employee->professiontax) ?></td>
                <td><?= h($employee->providentfund) ?></td>
                <td><?= h($employee->fpf) ?></td>
                <td><?= h($employee->esic) ?></td>
                <td><?= h($employee->incometaxtds) ?></td>
                <td><?= h($employee->bank_account_number) ?></td>
                <td><?= h($employee->bank_name) ?></td>
                <td><?= h($employee->driver_doj) ?></td>
                <td><?= h($employee->blood_group) ?></td>
                <td><?= h($employee->ref_name) ?></td>
                <td><?= h($employee->lic_no) ?></td>
                <td><?= h($employee->lic_issue_date) ?></td>
                <td><?= h($employee->lic_issue_place) ?></td>
                <td><?= h($employee->lic_exp_date) ?></td>
                <td><?= h($employee->badge_no) ?></td>
                <td><?= h($employee->dob_leave) ?></td>
                <td><?= h($employee->leave_reason) ?></td>
                <td><?= h($employee->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
