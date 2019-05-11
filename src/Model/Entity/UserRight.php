<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserRight Entity
 *
 * @property int $id
 * @property int|null $login_id
 * @property string|null $menu_ids
 *
 * @property \App\Model\Entity\Login $login
 */
class UserRight extends Entity
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
        'login_id' => true,
        'menu_ids' => true,
        'login' => true
    ];
}
