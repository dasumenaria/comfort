<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CreditNoteRow[]|\Cake\Collection\CollectionInterface $creditNoteRows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Credit Note Row'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Credit Notes'), ['controller' => 'CreditNotes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Credit Note'), ['controller' => 'CreditNotes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ledgers'), ['controller' => 'Ledgers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ledger'), ['controller' => 'Ledgers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="creditNoteRows index large-9 medium-8 columns content">
    <h3><?= __('Credit Note Rows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('credit_note_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cr_dr') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ledger_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('debit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('credit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mode_of_payment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cheque_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cheque_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($creditNoteRows as $creditNoteRow): ?>
            <tr>
                <td><?= $this->Number->format($creditNoteRow->id) ?></td>
                <td><?= $creditNoteRow->has('credit_note') ? $this->Html->link($creditNoteRow->credit_note->id, ['controller' => 'CreditNotes', 'action' => 'view', $creditNoteRow->credit_note->id]) : '' ?></td>
                <td><?= h($creditNoteRow->cr_dr) ?></td>
                <td><?= $creditNoteRow->has('ledger') ? $this->Html->link($creditNoteRow->ledger->name, ['controller' => 'Ledgers', 'action' => 'view', $creditNoteRow->ledger->id]) : '' ?></td>
                <td><?= $this->Number->format($creditNoteRow->debit) ?></td>
                <td><?= $this->Number->format($creditNoteRow->credit) ?></td>
                <td><?= h($creditNoteRow->mode_of_payment) ?></td>
                <td><?= h($creditNoteRow->cheque_no) ?></td>
                <td><?= h($creditNoteRow->cheque_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $creditNoteRow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $creditNoteRow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $creditNoteRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $creditNoteRow->id)]) ?>
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
