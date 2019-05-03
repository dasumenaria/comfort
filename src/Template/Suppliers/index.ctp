<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier[]|\Cake\Collection\CollectionInterface $suppliers
 */
?>
<div class="suppliers index large-9 medium-8 columns content">
    <h3><?= __('Suppliers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_type_sub_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('office_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('residence_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fax_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('opening_bal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('closing_bal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('due_days') ?></th>
                <th scope="col"><?= $this->Paginator->sort('servicetax_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pan_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('servicetax_status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suppliers as $supplier): ?>
            <tr>
                <td><?= $this->Number->format($supplier->id) ?></td>
                <td><?= $supplier->has('supplier_type') ? $this->Html->link($supplier->supplier_type->name, ['controller' => 'SupplierTypes', 'action' => 'view', $supplier->supplier_type->id]) : '' ?></td>
                <td><?= $supplier->has('supplier_type_sub') ? $this->Html->link($supplier->supplier_type_sub->name, ['controller' => 'SupplierTypeSubs', 'action' => 'view', $supplier->supplier_type_sub->id]) : '' ?></td>
                <td><?= h($supplier->name) ?></td>
                <td><?= h($supplier->address) ?></td>
                <td><?= h($supplier->contact_name) ?></td>
                <td><?= h($supplier->office_no) ?></td>
                <td><?= h($supplier->residence_no) ?></td>
                <td><?= h($supplier->mobile_no) ?></td>
                <td><?= h($supplier->email_id) ?></td>
                <td><?= h($supplier->fax_no) ?></td>
                <td><?= h($supplier->opening_bal) ?></td>
                <td><?= h($supplier->closing_bal) ?></td>
                <td><?= h($supplier->due_days) ?></td>
                <td><?= h($supplier->servicetax_no) ?></td>
                <td><?= h($supplier->pan_no) ?></td>
                <td><?= h($supplier->account_no) ?></td>
                <td><?= h($supplier->servicetax_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $supplier->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplier->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?>
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
