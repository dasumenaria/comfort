<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JournalVoucherRow Entity
 *
 * @property int $id
 * @property int $journal_voucher_id
 * @property string $cr_dr
 * @property int $ledger_id
 * @property float|null $debit
 * @property float|null $credit
 * @property string $mode_of_payment
 * @property string $cheque_no
 * @property \Cake\I18n\FrozenDate|null $cheque_date
 * @property float $total
 *
 * @property \App\Model\Entity\JournalVoucher $journal_voucher
 * @property \App\Model\Entity\Ledger $ledger
 * @property \App\Model\Entity\AccountingEntry[] $accounting_entries
 * @property \App\Model\Entity\ReferenceDetail[] $reference_details
 */
class JournalVoucherRow extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'journal_voucher_id' => true,
        'cr_dr' => true,
        'ledger_id' => true,
        'debit' => true,
        'credit' => true,
        'mode_of_payment' => true,
        'cheque_no' => true,
        'cheque_date' => true,
        'total' => true,
        'journal_voucher' => true,
        'ledger' => true,
        'accounting_entries' => true,
        'reference_details' => true
    ];
}
