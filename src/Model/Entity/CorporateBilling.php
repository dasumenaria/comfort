<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CorporateBilling Entity
 *
 * @property int $id
 * @property int $invoice_no
 * @property \Cake\I18n\FrozenDate $date
 * @property string $customer_name
 * @property string $guest_name
 * @property string $ref
 * @property string $service_date
 * @property string $service
 * @property string $rate
 * @property string $no_of_days
 * @property string $taxi_no
 * @property string $amount
 * @property string $tot_amnt
 * @property string $service_tax
 * @property string $discount
 * @property string $net_amnt
 * @property int $login_id
 * @property int $counter_id
 * @property int $waveoff_status
 * @property string $waveoff_reason
 * @property int $waveoff_login_id
 * @property int $waveoff_counter_id
 *
 * @property \App\Model\Entity\Login $login
 * @property \App\Model\Entity\Counter $counter
 * @property \App\Model\Entity\WaveoffLogin $waveoff_login
 * @property \App\Model\Entity\WaveoffCounter $waveoff_counter
 */
class CorporateBilling extends Entity
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
        'invoice_no' => true,
        'date' => true,
        'customer_name' => true,
        'guest_name' => true,
        'ref' => true,
        'service_date' => true,
        'service' => true,
        'rate' => true,
        'no_of_days' => true,
        'taxi_no' => true,
        'amount' => true,
        'tot_amnt' => true,
        'service_tax' => true,
        'discount' => true,
        'net_amnt' => true,
        'login_id' => true,
        'counter_id' => true,
        'waveoff_status' => true,
        'waveoff_reason' => true,
        'waveoff_login_id' => true,
        'waveoff_counter_id' => true,
        'login' => true,
        'counter' => true,
        'waveoff_login' => true,
        'waveoff_counter' => true
    ];
}
