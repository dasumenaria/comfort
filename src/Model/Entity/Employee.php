<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $employee_type
 * @property string $name
 * @property string $mobile_no
 * @property string $present_add
 * @property string $father_name
 * @property string $qualification
 * @property string $address
 * @property \Cake\I18n\FrozenDate $dob
 * @property string $esi_no
 * @property string $pf_no
 * @property string $designation
 * @property string $basicsalary
 * @property string $dearness
 * @property string $houserent
 * @property string $conveyance
 * @property string $phone_amnt
 * @property string $medical_amnt
 * @property string $professiontax
 * @property string $providentfund
 * @property string $fpf
 * @property string $esic
 * @property string $incometaxtds
 * @property string $bank_account_number
 * @property string $bank_name
 * @property \Cake\I18n\FrozenDate $driver_doj
 * @property string $blood_group
 * @property string $ref_name
 * @property string $lic_no
 * @property \Cake\I18n\FrozenDate $lic_issue_date
 * @property string $lic_issue_place
 * @property \Cake\I18n\FrozenDate $lic_exp_date
 * @property string $badge_no
 * @property \Cake\I18n\FrozenDate $dob_leave
 * @property string $leave_reason
 * @property bool $is_deleted
 */
class Employee extends Entity
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
        'employee_type' => true,
        'name' => true,
        'mobile_no' => true,
        'present_add' => true,
        'father_name' => true,
        'qualification' => true,
        'address' => true,
        'dob' => true,
        'esi_no' => true,
        'pf_no' => true,
        'designation' => true,
        'basicsalary' => true,
        'dearness' => true,
        'houserent' => true,
        'conveyance' => true,
        'phone_amnt' => true,
        'medical_amnt' => true,
        'professiontax' => true,
        'providentfund' => true,
        'fpf' => true,
        'esic' => true,
        'incometaxtds' => true,
        'bank_account_number' => true,
        'bank_name' => true,
        'driver_doj' => true,
        'blood_group' => true,
        'ref_name' => true,
        'lic_no' => true,
        'lic_issue_date' => true,
        'lic_issue_place' => true,
        'lic_exp_date' => true,
        'badge_no' => true,
        'dob_leave' => true,
        'leave_reason' => true,
        'is_deleted' => true
    ];
}
