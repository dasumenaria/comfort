<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AccountingEntry Entity
 *
 * @property int $id
 * @property int $ledger_id
 * @property float|null $debit
 * @property float|null $credit
 * @property \Cake\I18n\FrozenDate $transaction_date
 * @property int $company_id
 * @property string|null $is_opening_balance
 * @property int $invoice_id
 * @property int|null $receipt_id
 * @property int|null $receipt_row_id
 * @property int|null $payment_id
 * @property int|null $payment_row_id
 * @property int|null $journal_voucher_id
 * @property int|null $journal_voucher_row_id
 * @property \Cake\I18n\FrozenDate $reconciliation_date
 *
 * @property \App\Model\Entity\Ledger $ledger
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\PurchaseVoucher $purchase_voucher
 * @property \App\Model\Entity\PurchaseVoucherRow $purchase_voucher_row
 * @property \App\Model\Entity\SalesInvoice $sales_invoice
 * @property \App\Model\Entity\SaleReturn $sale_return
 * @property \App\Model\Entity\PurchaseInvoice $purchase_invoice
 * @property \App\Model\Entity\PurchaseReturn $purchase_return
 * @property \App\Model\Entity\Receipt $receipt
 * @property \App\Model\Entity\ReceiptRow $receipt_row
 * @property \App\Model\Entity\Payment $payment
 * @property \App\Model\Entity\PaymentRow $payment_row
 * @property \App\Model\Entity\CreditNote $credit_note
 * @property \App\Model\Entity\CreditNoteRow $credit_note_row
 * @property \App\Model\Entity\DebitNote $debit_note
 * @property \App\Model\Entity\DebitNoteRow $debit_note_row
 * @property \App\Model\Entity\SalesVoucher $sales_voucher
 * @property \App\Model\Entity\SalesVoucherRow $sales_voucher_row
 * @property \App\Model\Entity\JournalVoucher $journal_voucher
 * @property \App\Model\Entity\JournalVoucherRow $journal_voucher_row
 * @property \App\Model\Entity\ContraVoucher $contra_voucher
 * @property \App\Model\Entity\ContraVoucherRow $contra_voucher_row
 */
class AccountingEntry extends Entity
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
        'ledger_id' => true,
        'debit' => true,
        'credit' => true,
        'transaction_date' => true,
        'company_id' => true,
        'is_opening_balance' => true,
        'invoice_id' => true,
        'receipt_id' => true,
        'receipt_row_id' => true,
        'payment_id' => true,
        'payment_row_id' => true,
        'journal_voucher_id' => true,
        'journal_voucher_row_id' => true,
        'reconciliation_date' => true,
        'ledger' => true,
        'company' => true,
        'purchase_voucher' => true,
        'purchase_voucher_row' => true,
        'sales_invoice' => true,
        'sale_return' => true,
        'purchase_invoice' => true,
        'purchase_return' => true,
        'receipt' => true,
        'receipt_row' => true,
        'payment' => true,
        'payment_row' => true,
        'credit_note' => true,
        'credit_note_row' => true,
        'debit_note' => true,
        'debit_note_row' => true,
        'sales_voucher' => true,
        'sales_voucher_row' => true,
        'journal_voucher' => true,
        'journal_voucher_row' => true,
        'contra_voucher' => true,
        'contra_voucher_row' => true
    ];
}
