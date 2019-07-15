<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DutySlip Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property string $guest_name
 * @property string $reporting_address
 * @property string $mobile_no
 * @property string $email_id
 * @property string $photo_id
 * @property string $service_id
 * @property string $car_type_id
 * @property string $car_id
 * @property string $temp_car_no
 * @property string $customer_id
 * @property string $detail_no
 * @property string $employee_id
 * @property int $opening_km
 * @property \Cake\I18n\FrozenTime $opening_time
 * @property int $closing_km
 * @property \Cake\I18n\FrozenTime $closing_time
 * @property \Cake\I18n\FrozenDate $date_from
 * @property \Cake\I18n\FrozenDate $date_to
 * @property int $extra_chg
 * @property int $permit_chg
 * @property int $parking_chg
 * @property int $otherstate_chg
 * @property int $guide_chg
 * @property int $misc_chg
 * @property string $remarks
 * @property string $billed_complimentary
 * @property string $authorized_person
 * @property \Cake\I18n\FrozenDate $date_authorization
 * @property string $reason
 * @property string $billing_status
 * @property string $total_km
 * @property int $rate
 * @property string $extra
 * @property string $extra_details
 * @property int $extra_amnt
 * @property int $tot_amnt
 * @property int $amount
 * @property string $login_id
 * @property string $counter_id
 * @property string $max_invoice_id
 * @property string $new_car_no
 * @property int $waveoff_status
 * @property string $waveoff_reason
 * @property int $waveoff_login_id
 * @property int $waveoff_counter_id
 * @property string $temp_driver_name
 * @property string $gst_no
 * @property \Cake\I18n\FrozenDate $service_date
 * @property string $ref
 * @property string $no_of_days
 * @property string $texi_no
 * @property string $cop_amounts
 * @property string $billing_type
 * @property int $fuel_hike_chg
 * @property string $city
 *
 * @property \App\Model\Entity\Email $email
 * @property \App\Model\Entity\Photo $photo
 * @property \App\Model\Entity\Service $service
 * @property \App\Model\Entity\CarType $car_type
 * @property \App\Model\Entity\Car $car
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Login $login
 * @property \App\Model\Entity\Counter $counter
 * @property \App\Model\Entity\MaxInvoice $max_invoice
 * @property \App\Model\Entity\WaveoffLogin $waveoff_login
 * @property \App\Model\Entity\WaveoffCounter $waveoff_counter
 */
class DutySlip extends Entity
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
        '*' => true
    ];
}
