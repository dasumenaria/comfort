<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NatureOfGroup $natureOfGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nature Of Group'), ['action' => 'edit', $natureOfGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nature Of Group'), ['action' => 'delete', $natureOfGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $natureOfGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nature Of Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nature Of Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounting Groups'), ['controller' => 'AccountingGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accounting Group'), ['controller' => 'AccountingGroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="natureOfGroups view large-9 medium-8 columns content">
    <h3><?= h($natureOfGroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($natureOfGroup->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($natureOfGroup->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Accounting Groups') ?></h4>
        <?php if (!empty($natureOfGroup->accounting_groups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nature Of Group Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Customer') ?></th>
                <th scope="col"><?= __('Supplier') ?></th>
                <th scope="col"><?= __('Purchase Voucher First Ledger') ?></th>
                <th scope="col"><?= __('Purchase Voucher Purchase Ledger') ?></th>
                <th scope="col"><?= __('Purchase Voucher All Ledger') ?></th>
                <th scope="col"><?= __('Sale Invoice Party') ?></th>
                <th scope="col"><?= __('Sale Invoice Sales Account') ?></th>
                <th scope="col"><?= __('Credit Note Party') ?></th>
                <th scope="col"><?= __('Credit Note Sales Account') ?></th>
                <th scope="col"><?= __('Bank') ?></th>
                <th scope="col"><?= __('Cash') ?></th>
                <th scope="col"><?= __('Purchase Invoice Purchase Account') ?></th>
                <th scope="col"><?= __('Purchase Invoice Party') ?></th>
                <th scope="col"><?= __('Receipt Ledger') ?></th>
                <th scope="col"><?= __('Payment Ledger') ?></th>
                <th scope="col"><?= __('Credit Note First Row') ?></th>
                <th scope="col"><?= __('Credit Note All Row') ?></th>
                <th scope="col"><?= __('Debit Note First Row') ?></th>
                <th scope="col"><?= __('Debit Note All Row') ?></th>
                <th scope="col"><?= __('Sales Voucher First Ledger') ?></th>
                <th scope="col"><?= __('Sales Voucher Sales Ledger') ?></th>
                <th scope="col"><?= __('Sales Voucher All Ledger') ?></th>
                <th scope="col"><?= __('Journal Voucher Ledger') ?></th>
                <th scope="col"><?= __('Contra Voucher Ledger') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($natureOfGroup->accounting_groups as $accountingGroups): ?>
            <tr>
                <td><?= h($accountingGroups->id) ?></td>
                <td><?= h($accountingGroups->nature_of_group_id) ?></td>
                <td><?= h($accountingGroups->name) ?></td>
                <td><?= h($accountingGroups->parent_id) ?></td>
                <td><?= h($accountingGroups->lft) ?></td>
                <td><?= h($accountingGroups->rght) ?></td>
                <td><?= h($accountingGroups->company_id) ?></td>
                <td><?= h($accountingGroups->customer) ?></td>
                <td><?= h($accountingGroups->supplier) ?></td>
                <td><?= h($accountingGroups->purchase_voucher_first_ledger) ?></td>
                <td><?= h($accountingGroups->purchase_voucher_purchase_ledger) ?></td>
                <td><?= h($accountingGroups->purchase_voucher_all_ledger) ?></td>
                <td><?= h($accountingGroups->sale_invoice_party) ?></td>
                <td><?= h($accountingGroups->sale_invoice_sales_account) ?></td>
                <td><?= h($accountingGroups->credit_note_party) ?></td>
                <td><?= h($accountingGroups->credit_note_sales_account) ?></td>
                <td><?= h($accountingGroups->bank) ?></td>
                <td><?= h($accountingGroups->cash) ?></td>
                <td><?= h($accountingGroups->purchase_invoice_purchase_account) ?></td>
                <td><?= h($accountingGroups->purchase_invoice_party) ?></td>
                <td><?= h($accountingGroups->receipt_ledger) ?></td>
                <td><?= h($accountingGroups->payment_ledger) ?></td>
                <td><?= h($accountingGroups->credit_note_first_row) ?></td>
                <td><?= h($accountingGroups->credit_note_all_row) ?></td>
                <td><?= h($accountingGroups->debit_note_first_row) ?></td>
                <td><?= h($accountingGroups->debit_note_all_row) ?></td>
                <td><?= h($accountingGroups->sales_voucher_first_ledger) ?></td>
                <td><?= h($accountingGroups->sales_voucher_sales_ledger) ?></td>
                <td><?= h($accountingGroups->sales_voucher_all_ledger) ?></td>
                <td><?= h($accountingGroups->journal_voucher_ledger) ?></td>
                <td><?= h($accountingGroups->contra_voucher_ledger) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AccountingGroups', 'action' => 'view', $accountingGroups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AccountingGroups', 'action' => 'edit', $accountingGroups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AccountingGroups', 'action' => 'delete', $accountingGroups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountingGroups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
