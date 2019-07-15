<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AccountingGroup Entity
 *
 * @property int $id
 * @property int|null $nature_of_group_id
 * @property string $name
 * @property int|null $parent_id
 * @property int|null $lft
 * @property int|null $rght
 * @property int $company_id
 * @property bool|null $customer
 * @property bool|null $supplier
 * @property bool|null $purchase_voucher_first_ledger
 * @property bool|null $purchase_voucher_purchase_ledger
 * @property bool|null $purchase_voucher_all_ledger
 * @property int|null $sale_invoice_party
 * @property int|null $sale_invoice_sales_account
 * @property int|null $credit_note_party
 * @property int|null $credit_note_sales_account
 * @property int $bank
 * @property bool|null $cash
 * @property bool|null $purchase_invoice_purchase_account
 * @property bool|null $purchase_invoice_party
 * @property bool|null $receipt_ledger
 * @property bool|null $payment_ledger
 * @property bool|null $credit_note_first_row
 * @property bool|null $credit_note_all_row
 * @property bool|null $debit_note_first_row
 * @property bool|null $debit_note_all_row
 * @property bool|null $sales_voucher_first_ledger
 * @property bool|null $sales_voucher_sales_ledger
 * @property bool|null $sales_voucher_all_ledger
 * @property bool|null $journal_voucher_ledger
 * @property bool|null $contra_voucher_ledger
 *
 * @property \App\Model\Entity\NatureOfGroup $nature_of_group
 * @property \App\Model\Entity\AccountingGroup $parent_accounting_group
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\AccountingGroup[] $child_accounting_groups
 * @property \App\Model\Entity\Ledger[] $ledgers
 */
class AccountingGroup extends Entity
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
        'nature_of_group_id' => true,
        'name' => true,
        'parent_id' => true,
        'lft' => true,
        'rght' => true,
        'company_id' => true,
        'customer' => true,
        'supplier' => true,
        'purchase_voucher_first_ledger' => true,
        'purchase_voucher_purchase_ledger' => true,
        'purchase_voucher_all_ledger' => true,
        'sale_invoice_party' => true,
        'sale_invoice_sales_account' => true,
        'credit_note_party' => true,
        'credit_note_sales_account' => true,
        'bank' => true,
        'cash' => true,
        'purchase_invoice_purchase_account' => true,
        'purchase_invoice_party' => true,
        'receipt_ledger' => true,
        'payment_ledger' => true,
        'credit_note_first_row' => true,
        'credit_note_all_row' => true,
        'debit_note_first_row' => true,
        'debit_note_all_row' => true,
        'sales_voucher_first_ledger' => true,
        'sales_voucher_sales_ledger' => true,
        'sales_voucher_all_ledger' => true,
        'journal_voucher_ledger' => true,
        'contra_voucher_ledger' => true,
        'nature_of_group' => true,
        'parent_accounting_group' => true,
        'company' => true,
        'child_accounting_groups' => true,
        'ledgers' => true
    ];
}
