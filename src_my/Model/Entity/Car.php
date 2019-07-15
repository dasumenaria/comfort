<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Car Entity
 *
 * @property int $id
 * @property string $car_type_id
 * @property string $name
 * @property string $supplier_id
 * @property string $engine_no
 * @property string $chasis_no
 * @property \Cake\I18n\FrozenDate $rto_tax_date
 * @property \Cake\I18n\FrozenDate $insurance_date_from
 * @property \Cake\I18n\FrozenDate $insurance_date_to
 * @property \Cake\I18n\FrozenDate $authorization_date
 * @property \Cake\I18n\FrozenDate $permit_date
 * @property \Cake\I18n\FrozenDate $fitness_date
 * @property \Cake\I18n\FrozenDate $puc_date
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\CarType $car_type
 * @property \App\Model\Entity\Supplier $supplier
 */
class Car extends Entity
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
        'car_type_id' => true,
        'name' => true,
        'supplier_id' => true,
        'engine_no' => true,
        'chasis_no' => true,
        'rto_tax_date' => true,
        'insurance_date_from' => true,
        'insurance_date_to' => true,
        'authorization_date' => true,
        'permit_date' => true,
        'fitness_date' => true,
        'puc_date' => true,
        'is_deleted' => true,
        'car_type' => true,
        'supplier' => true
    ];
}
