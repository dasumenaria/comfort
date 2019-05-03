<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Supplier Entity
 *
 * @property int $id
 * @property int $supplier_type_id
 * @property int $supplier_type_sub_id
 * @property string $name
 * @property string $address
 * @property string $contact_name
 * @property string $office_no
 * @property string $residence_no
 * @property string $mobile_no
 * @property string $email_id
 * @property string $fax_no
 * @property string $opening_bal
 * @property string $closing_bal
 * @property string $due_days
 * @property string $servicetax_no
 * @property string $pan_no
 * @property string $account_no
 * @property string $servicetax_status
 *
 * @property \App\Model\Entity\SupplierType $supplier_type
 * @property \App\Model\Entity\SupplierTypeSub $supplier_type_sub
 * @property \App\Model\Entity\Email $email
 */
class Supplier extends Entity
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
        'supplier_type_id' => true,
        'supplier_type_sub_id' => true,
        'name' => true,
        'address' => true,
        'contact_name' => true,
        'office_no' => true,
        'residence_no' => true,
        'mobile_no' => true,
        'email_id' => true,
        'fax_no' => true,
        'opening_bal' => true,
        'closing_bal' => true,
        'due_days' => true,
        'servicetax_no' => true,
        'pan_no' => true,
        'account_no' => true,
        'servicetax_status' => true,
        'supplier_type' => true,
        'supplier_type_sub' => true,
        'email' => true
    ];
}
