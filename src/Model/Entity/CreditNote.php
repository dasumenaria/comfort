<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CreditNote Entity
 *
 * @property int $id
 * @property int $financial_year_id
 * @property string $status
 * @property int $voucher_no
 * @property int $company_id
 * @property \Cake\I18n\FrozenDate $transaction_date
 * @property string $narration
 *
 * @property \App\Model\Entity\FinancialYear $financial_year
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\CreditNoteRow[] $credit_note_rows
 */
class CreditNote extends Entity
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
        'financial_year_id' => true,
        'status' => true,
        'voucher_no' => true,
        'company_id' => true,
        'transaction_date' => true,
        'narration' => true,
        'financial_year' => true,
        'company' => true,
        'credit_note_rows' => true
    ];
}
