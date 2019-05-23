<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $id
 * @property string $invoice_no
 * @property string $invoice_type_id
 * @property string $authorized_person
 * @property string $customer_id
 * @property \Cake\I18n\FrozenDate $date
 * @property string $payment_type
 * @property string $remarks
 * @property string $total
 * @property string $discount
 * @property string $tax
 * @property string $grand_total
 * @property string $payment_status
 * @property int $login_id
 * @property int $counter_id
 * @property int $complimenatry_status
 * @property int $waveoff_status
 * @property string $waveoff_reason
 * @property \Cake\I18n\FrozenTime $waveoff_date
 * @property int $waveoff_login_id
 * @property int $waveoff_counter_id
 * @property \Cake\I18n\FrozenDate $current_date
 * @property string $invoice_gst
 * @property int $financial_year_id
 * @property int $gst_figure_id
 *
 * @property \App\Model\Entity\InvoiceType $invoice_type
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Login $login
 * @property \App\Model\Entity\Counter $counter
 * @property \App\Model\Entity\WaveoffLogin $waveoff_login
 * @property \App\Model\Entity\WaveoffCounter $waveoff_counter
 * @property \App\Model\Entity\FinancialYear $financial_year
 * @property \App\Model\Entity\GstFigure $gst_figure
 * @property \App\Model\Entity\InvoiceDetail[] $invoice_details
 */
class Invoice extends Entity
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
        '*' => true,
        'invoice_type_id' => true,
        'authorized_person' => true,
        'customer_id' => true,
        'date' => true,
        'payment_type' => true,
        'remarks' => true,
        'total' => true,
        'discount' => true,
        'tax' => true,
        'grand_total' => true,
        'payment_status' => true,
        'login_id' => true,
        'counter_id' => true,
        'complimenatry_status' => true,
        'waveoff_status' => true,
        'waveoff_reason' => true,
        'waveoff_date' => true,
        'waveoff_login_id' => true,
        'waveoff_counter_id' => true,
        'current_date' => true,
        'invoice_gst' => true,
        'financial_year_id' => true,
        'gst_figure_id' => true,
        'invoice_type' => true,
        'customer' => true,
        'login' => true,
        'counter' => true,
        'waveoff_login' => true,
        'waveoff_counter' => true,
        'financial_year' => true,
        'gst_figure' => true,
        'invoice_details' => true
    ];
}
