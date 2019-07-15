<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Receipt Entity
 *
 * @property int $id
 * @property int $financial_year_id
 * @property int $voucher_no
 * @property int $company_id
 * @property \Cake\I18n\FrozenDate $transaction_date
 * @property string $narration
 * @property float $voucher_amount
 * @property float $amount
 * @property int $sales_invoice_id
 * @property string $status
 *
 * @property \App\Model\Entity\FinancialYear $financial_year
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\SalesInvoice $sales_invoice
 * @property \App\Model\Entity\AccountingEntry[] $accounting_entries
 * @property \App\Model\Entity\ReceiptRow[] $receipt_rows
 * @property \App\Model\Entity\ReferenceDetail[] $reference_details
 */
class Receipt extends Entity
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
        'voucher_no' => true,
        'company_id' => true,
        'transaction_date' => true,
        'narration' => true,
        'voucher_amount' => true,
        'amount' => true,
        'sales_invoice_id' => true,
        'status' => true,
        'financial_year' => true,
        'company' => true,
        'sales_invoice' => true,
        'accounting_entries' => true,
        'receipt_rows' => true,
        'reference_details' => true
    ];
}
