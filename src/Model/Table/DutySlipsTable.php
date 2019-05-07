<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DutySlips Model
 *
 * @property \App\Model\Table\EmailsTable|\Cake\ORM\Association\BelongsTo $Emails
 * @property \App\Model\Table\PhotosTable|\Cake\ORM\Association\BelongsTo $Photos
 * @property \App\Model\Table\ServicesTable|\Cake\ORM\Association\BelongsTo $Services
 * @property \App\Model\Table\CarTypesTable|\Cake\ORM\Association\BelongsTo $CarTypes
 * @property \App\Model\Table\CarsTable|\Cake\ORM\Association\BelongsTo $Cars
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\LoginsTable|\Cake\ORM\Association\BelongsTo $Logins
 * @property \App\Model\Table\CountersTable|\Cake\ORM\Association\BelongsTo $Counters
 * @property \App\Model\Table\MaxInvoicesTable|\Cake\ORM\Association\BelongsTo $MaxInvoices
 * @property \App\Model\Table\WaveoffLoginsTable|\Cake\ORM\Association\BelongsTo $WaveoffLogins
 * @property \App\Model\Table\WaveoffCountersTable|\Cake\ORM\Association\BelongsTo $WaveoffCounters
 *
 * @method \App\Model\Entity\DutySlip get($primaryKey, $options = [])
 * @method \App\Model\Entity\DutySlip newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DutySlip[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DutySlip|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DutySlip saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DutySlip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DutySlip[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DutySlip findOrCreate($search, callable $callback = null, $options = [])
 */
class DutySlipsTable extends Table
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

        $this->setTable('duty_slips');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        
         
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CarTypes', [
            'foreignKey' => 'car_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cars', [
            'foreignKey' => 'car_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Logins', [
            'foreignKey' => 'login_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Counters', [
            'foreignKey' => 'counter_id',
            'joinType' => 'INNER'
        ]); 
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->allowEmptyDate('date', false);

        $validator
            ->scalar('guest_name')
            ->maxLength('guest_name', 255)
            ->requirePresence('guest_name', 'create')
            ->allowEmptyString('guest_name', false);

        $validator
            ->scalar('reporting_address')
            ->requirePresence('reporting_address', 'create')
            ->allowEmptyString('reporting_address', false);

        $validator
            ->scalar('mobile_no')
            ->maxLength('mobile_no', 200)
            ->requirePresence('mobile_no', 'create')
            ->allowEmptyString('mobile_no', false);

        $validator
            ->scalar('temp_car_no')
            ->maxLength('temp_car_no', 20)
            ->requirePresence('temp_car_no', 'create')
            ->allowEmptyString('temp_car_no', false);

        $validator
            ->scalar('detail_no')
            ->maxLength('detail_no', 30)
            ->requirePresence('detail_no', 'create')
            ->allowEmptyString('detail_no', false);

        $validator
            ->requirePresence('opening_km', 'create')
            ->allowEmptyString('opening_km', false);

        $validator
            ->time('opening_time')
            ->requirePresence('opening_time', 'create')
            ->allowEmptyTime('opening_time', false);

        $validator
            ->requirePresence('closing_km', 'create')
            ->allowEmptyString('closing_km', false);

        $validator
            ->time('closing_time')
            ->requirePresence('closing_time', 'create')
            ->allowEmptyTime('closing_time', false);

        $validator
            ->date('date_from')
            ->requirePresence('date_from', 'create')
            ->allowEmptyDate('date_from', false);

        $validator
            ->date('date_to')
            ->requirePresence('date_to', 'create')
            ->allowEmptyDate('date_to', false);

        $validator
            ->integer('extra_chg')
            ->requirePresence('extra_chg', 'create')
            ->allowEmptyString('extra_chg', false);

        $validator
            ->integer('permit_chg')
            ->requirePresence('permit_chg', 'create')
            ->allowEmptyString('permit_chg', false);

        $validator
            ->integer('parking_chg')
            ->requirePresence('parking_chg', 'create')
            ->allowEmptyString('parking_chg', false);

        $validator
            ->integer('otherstate_chg')
            ->requirePresence('otherstate_chg', 'create')
            ->allowEmptyString('otherstate_chg', false);

        $validator
            ->integer('guide_chg')
            ->requirePresence('guide_chg', 'create')
            ->allowEmptyString('guide_chg', false);

        $validator
            ->integer('misc_chg')
            ->requirePresence('misc_chg', 'create')
            ->allowEmptyString('misc_chg', false);

        $validator
            ->scalar('remarks')
            ->requirePresence('remarks', 'create')
            ->allowEmptyString('remarks', false);

        $validator
            ->scalar('billed_complimentary')
            ->maxLength('billed_complimentary', 20)
            ->requirePresence('billed_complimentary', 'create')
            ->allowEmptyString('billed_complimentary', false);

        $validator
            ->scalar('authorized_person')
            ->maxLength('authorized_person', 30)
            ->requirePresence('authorized_person', 'create')
            ->allowEmptyString('authorized_person', false);

        $validator
            ->date('date_authorization')
            ->requirePresence('date_authorization', 'create')
            ->allowEmptyDate('date_authorization', false);

        $validator
            ->scalar('reason')
            ->maxLength('reason', 200)
            ->requirePresence('reason', 'create')
            ->allowEmptyString('reason', false);

        $validator
            ->scalar('billing_status')
            ->maxLength('billing_status', 20)
            ->requirePresence('billing_status', 'create')
            ->allowEmptyString('billing_status', false);

        $validator
            ->scalar('total_km')
            ->maxLength('total_km', 30)
            ->requirePresence('total_km', 'create')
            ->allowEmptyString('total_km', false);

        $validator
            ->requirePresence('rate', 'create')
            ->allowEmptyString('rate', false);

        $validator
            ->scalar('extra')
            ->maxLength('extra', 10)
            ->requirePresence('extra', 'create')
            ->allowEmptyString('extra', false);

        $validator
            ->scalar('extra_details')
            ->maxLength('extra_details', 30)
            ->requirePresence('extra_details', 'create')
            ->allowEmptyString('extra_details', false);

        $validator
            ->requirePresence('extra_amnt', 'create')
            ->allowEmptyString('extra_amnt', false);

        $validator
            ->requirePresence('tot_amnt', 'create')
            ->allowEmptyString('tot_amnt', false);

        $validator
            ->requirePresence('amount', 'create')
            ->allowEmptyString('amount', false);

        $validator
            ->scalar('new_car_no')
            ->maxLength('new_car_no', 100)
            ->requirePresence('new_car_no', 'create')
            ->allowEmptyString('new_car_no', false);

        $validator
            ->integer('waveoff_status')
            ->requirePresence('waveoff_status', 'create')
            ->allowEmptyString('waveoff_status', false);

        $validator
            ->scalar('waveoff_reason')
            ->requirePresence('waveoff_reason', 'create')
            ->allowEmptyString('waveoff_reason', false);

        $validator
            ->scalar('temp_driver_name')
            ->maxLength('temp_driver_name', 50)
            ->requirePresence('temp_driver_name', 'create')
            ->allowEmptyString('temp_driver_name', false);

        $validator
            ->scalar('gst_no')
            ->maxLength('gst_no', 50)
            ->requirePresence('gst_no', 'create')
            ->allowEmptyString('gst_no', false);

        $validator
            ->date('service_date')
            ->requirePresence('service_date', 'create')
            ->allowEmptyDate('service_date', false);

        $validator
            ->scalar('ref')
            ->maxLength('ref', 100)
            ->requirePresence('ref', 'create')
            ->allowEmptyString('ref', false);

        $validator
            ->scalar('no_of_days')
            ->maxLength('no_of_days', 100)
            ->requirePresence('no_of_days', 'create')
            ->allowEmptyString('no_of_days', false);

        $validator
            ->scalar('texi_no')
            ->maxLength('texi_no', 100)
            ->requirePresence('texi_no', 'create')
            ->allowEmptyString('texi_no', false);

        $validator
            ->scalar('cop_amounts')
            ->maxLength('cop_amounts', 100)
            ->requirePresence('cop_amounts', 'create')
            ->allowEmptyString('cop_amounts', false);

        $validator
            ->scalar('billing_type')
            ->maxLength('billing_type', 100)
            ->requirePresence('billing_type', 'create')
            ->allowEmptyString('billing_type', false);

        $validator
            ->integer('fuel_hike_chg')
            ->requirePresence('fuel_hike_chg', 'create')
            ->allowEmptyString('fuel_hike_chg', false);

        $validator
            ->scalar('city')
            ->maxLength('city', 50)
            ->requirePresence('city', 'create')
            ->allowEmptyString('city', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    { 
        $rules->add($rules->existsIn(['service_id'], 'Services'));
        $rules->add($rules->existsIn(['car_type_id'], 'CarTypes'));
        $rules->add($rules->existsIn(['car_id'], 'Cars'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));
        $rules->add($rules->existsIn(['login_id'], 'Logins'));
        $rules->add($rules->existsIn(['counter_id'], 'Counters')); 

        return $rules;
    }
}
