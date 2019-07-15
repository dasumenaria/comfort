<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvoiceDetail Entity
 *
 * @property int $id
 * @property int $invoice_id
 * @property int $duty_slip_id
 * @property string $amount
 *
 * @property \App\Model\Entity\Invoice $invoice
 * @property \App\Model\Entity\DutySlip $duty_slip
 */
class InvoiceDetail extends Entity
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
        'invoice_id' => true,
        'duty_slip_id' => true,
        'amount' => true,
        'invoice' => true,
        'duty_slip' => true
    ];
}
