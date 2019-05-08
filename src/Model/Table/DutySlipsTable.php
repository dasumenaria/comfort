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
        $this->belongsTo('ServiceCities'); 
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
            ->date('date_from')
            ->requirePresence('date_from', 'create')
            ->allowEmptyDate('date_from', false);

        $validator
            ->date('date_to')
            ->requirePresence('date_to', 'create')
            ->allowEmptyDate('date_to', false);  

        $validator
            ->scalar('billing_type')
            ->maxLength('billing_type', 100)
            ->requirePresence('billing_type', 'create')
            ->allowEmptyString('billing_type', false); 

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
        //$rules->add($rules->existsIn(['car_id'], 'Cars'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));
        $rules->add($rules->existsIn(['login_id'], 'Logins'));
        $rules->add($rules->existsIn(['counter_id'], 'Counters')); 
        return $rules;
    }
}
