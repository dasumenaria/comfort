<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SupplierTariff Entity
 *
 * @property int $id
 * @property string $supplier_id
 * @property string $car_type_id
 * @property string $service_id
 * @property string $rate
 * @property int $minimum_chg_km
 * @property int $extra_km_rate
 * @property int $minimum_chg_hourly
 * @property int $extra_hour_rate
 *
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\CarType $car_type
 * @property \App\Model\Entity\Service $service
 */
class SupplierTariff extends Entity
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
        'supplier_id' => true,
        'car_type_id' => true,
        'service_id' => true,
        'rate' => true,
        'minimum_chg_km' => true,
        'extra_km_rate' => true,
        'minimum_chg_hourly' => true,
        'extra_hour_rate' => true,
        'supplier' => true,
        'car_type' => true,
        'service' => true
    ];
}
