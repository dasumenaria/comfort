<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employees Model
 *
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployeesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('employees');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('mobile_no')
            ->maxLength('mobile_no', 20)
            ->requirePresence('mobile_no', 'create')
            ->allowEmptyString('mobile_no', false);

        $validator
            ->scalar('present_add')
            ->requirePresence('present_add', 'create')
            ->allowEmptyString('present_add', false);

        $validator
            ->scalar('father_name')
            ->maxLength('father_name', 50)
            ->requirePresence('father_name', 'create')
            ->allowEmptyString('father_name', false);

        $validator
            ->scalar('qualification')
            ->maxLength('qualification', 50)
            ->requirePresence('qualification', 'create')
            ->allowEmptyString('qualification', false);

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', false);

        $validator
            ->date('dob')
            ->requirePresence('dob', 'create')
            ->allowEmptyDate('dob', false);

        $validator
            ->scalar('esi_no')
            ->maxLength('esi_no', 30)
            ->requirePresence('esi_no', 'create')
            ->allowEmptyString('esi_no', false);

        $validator
            ->scalar('pf_no')
            ->maxLength('pf_no', 30)
            ->requirePresence('pf_no', 'create')
            ->allowEmptyString('pf_no', false);

        $validator
            ->scalar('designation')
            ->maxLength('designation', 30)
            ->requirePresence('designation', 'create')
            ->allowEmptyString('designation', false);

        $validator
            ->scalar('basicsalary')
            ->maxLength('basicsalary', 30)
            ->requirePresence('basicsalary', 'create')
            ->allowEmptyString('basicsalary', false);

        $validator
            ->scalar('dearness')
            ->maxLength('dearness', 30)
            ->requirePresence('dearness', 'create')
            ->allowEmptyString('dearness', false);

        $validator
            ->scalar('houserent')
            ->maxLength('houserent', 30)
            ->requirePresence('houserent', 'create')
            ->allowEmptyString('houserent', false);

        $validator
            ->scalar('conveyance')
            ->maxLength('conveyance', 30)
            ->requirePresence('conveyance', 'create')
            ->allowEmptyString('conveyance', false);

        $validator
            ->scalar('phone_amnt')
            ->maxLength('phone_amnt', 30)
            ->requirePresence('phone_amnt', 'create')
            ->allowEmptyString('phone_amnt', false);

        $validator
            ->scalar('medical_amnt')
            ->maxLength('medical_amnt', 30)
            ->requirePresence('medical_amnt', 'create')
            ->allowEmptyString('medical_amnt', false);

        $validator
            ->scalar('professiontax')
            ->maxLength('professiontax', 30)
            ->requirePresence('professiontax', 'create')
            ->allowEmptyString('professiontax', false);

        $validator
            ->scalar('providentfund')
            ->maxLength('providentfund', 30)
            ->requirePresence('providentfund', 'create')
            ->allowEmptyString('providentfund', false);

        $validator
            ->scalar('fpf')
            ->maxLength('fpf', 30)
            ->requirePresence('fpf', 'create')
            ->allowEmptyString('fpf', false);

        $validator
            ->scalar('esic')
            ->maxLength('esic', 30)
            ->requirePresence('esic', 'create')
            ->allowEmptyString('esic', false);

        $validator
            ->scalar('incometaxtds')
            ->maxLength('incometaxtds', 30)
            ->requirePresence('incometaxtds', 'create')
            ->allowEmptyString('incometaxtds', false);

        $validator
            ->scalar('bank_account_number')
            ->maxLength('bank_account_number', 30)
            ->requirePresence('bank_account_number', 'create')
            ->allowEmptyString('bank_account_number', false);

        $validator
            ->scalar('bank_name')
            ->maxLength('bank_name', 30)
            ->requirePresence('bank_name', 'create')
            ->allowEmptyString('bank_name', false);

        $validator
            ->date('driver_doj')
            ->requirePresence('driver_doj', 'create')
            ->allowEmptyDate('driver_doj', false);

        $validator
            ->scalar('blood_group')
            ->maxLength('blood_group', 30)
            ->requirePresence('blood_group', 'create')
            ->allowEmptyString('blood_group', false);

        $validator
            ->scalar('ref_name')
            ->maxLength('ref_name', 30)
            ->requirePresence('ref_name', 'create')
            ->allowEmptyString('ref_name', false);

        $validator
            ->scalar('lic_no')
            ->maxLength('lic_no', 30)
            ->requirePresence('lic_no', 'create')
            ->allowEmptyString('lic_no', false);

        $validator
            ->date('lic_issue_date')
            ->requirePresence('lic_issue_date', 'create')
            ->allowEmptyDate('lic_issue_date', false);

        $validator
            ->scalar('lic_issue_place')
            ->maxLength('lic_issue_place', 30)
            ->requirePresence('lic_issue_place', 'create')
            ->allowEmptyString('lic_issue_place', false);

        $validator
            ->date('lic_exp_date')
            ->requirePresence('lic_exp_date', 'create')
            ->allowEmptyDate('lic_exp_date', false);

        $validator
            ->scalar('badge_no')
            ->maxLength('badge_no', 30)
            ->requirePresence('badge_no', 'create')
            ->allowEmptyString('badge_no', false);

        $validator
            ->date('dob_leave')
            ->requirePresence('dob_leave', 'create')
            ->allowEmptyDate('dob_leave', false);

        $validator
            ->scalar('leave_reason')
            ->maxLength('leave_reason', 30)
            ->requirePresence('leave_reason', 'create')
            ->allowEmptyString('leave_reason', false);

        $validator
            ->boolean('is_deleted')
            ->requirePresence('is_deleted', 'create')
            ->allowEmptyString('is_deleted', false);

        return $validator;
    }
}
