<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $Contact_person
 * @property string $office_no
 * @property string $Residence_no
 * @property int $mobile_no
 * @property string $email_id
 * @property string $fax_no
 * @property int $opening_bal
 * @property int $closing_bal
 * @property string $srvctaxregno
 * @property string $panno
 * @property string $creditlimit
 * @property string $block_status
 * @property string $servicetax_status
 * @property string $gst_number
 * @property string $state
 * @property string $city
 *
 * @property \App\Model\Entity\Email $email
 */
class Customer extends Entity
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
        'name' => true,
        'address' => true,
        'Contact_person' => true,
        'office_no' => true,
        'Residence_no' => true,
        'mobile_no' => true,
        'email_id' => true,
        'fax_no' => true,
        'opening_bal' => true,
        'closing_bal' => true,
        'srvctaxregno' => true,
        'panno' => true,
        'creditlimit' => true,
        'block_status' => true,
        'servicetax_status' => true,
        'gst_number' => true,
        'state' => true,
        'city' => true,
        'email' => true
    ];
}
