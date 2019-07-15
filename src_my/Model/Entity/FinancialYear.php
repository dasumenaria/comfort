<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FinancialYear Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $financial_year_from
 * @property \Cake\I18n\FrozenDate $financial_year_to
 * @property string $alias_name
 * @property string $status
 */
class FinancialYear extends Entity
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
        'financial_year_from' => true,
        'financial_year_to' => true,
        'alias_name' => true,
        'status' => true
    ];
}
