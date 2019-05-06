<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomerTariff Entity
 *
 * @property int $id
 * @property string $customer_id
 * @property string $car_type_id
 * @property string $service_id
 * @property string $rate
 * @property string $minimum_chg_km
 * @property string $extra_km_rate
 * @property int $minimum_chg_hourly
 * @property int $extra_hour_rate
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\CarType $car_type
 * @property \App\Model\Entity\Service $service
 */
class CustomerTariff extends Entity
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
