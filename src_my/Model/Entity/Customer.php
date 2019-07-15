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
        '*' => true 
    ];
}
