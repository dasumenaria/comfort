<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CorporateBillings Model
 *
 * @property \App\Model\Table\LoginsTable|\Cake\ORM\Association\BelongsTo $Logins
 * @property \App\Model\Table\CountersTable|\Cake\ORM\Association\BelongsTo $Counters
 * @property \App\Model\Table\WaveoffLoginsTable|\Cake\ORM\Association\BelongsTo $WaveoffLogins
 * @property \App\Model\Table\WaveoffCountersTable|\Cake\ORM\Association\BelongsTo $WaveoffCounters
 *
 * @method \App\Model\Entity\CorporateBilling get($primaryKey, $options = [])
 * @method \App\Model\Entity\CorporateBilling newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CorporateBilling[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CorporateBilling|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CorporateBilling saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CorporateBilling patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CorporateBilling[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CorporateBilling findOrCreate($search, callable $callback = null, $options = [])
 */
class CorporateBillingsTable extends Table
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

        $this->setTable('corporate_billings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Logins', [
            'foreignKey' => 'login_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Counters', [
            'foreignKey' => 'counter_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
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
            ->scalar('customer_name')
            ->maxLength('customer_name', 200)
            ->requirePresence('customer_name', 'create')
            ->allowEmptyString('customer_name', false);

        $validator
            ->scalar('guest_name')
            ->maxLength('guest_name', 120)
            ->requirePresence('guest_name', 'create')
            ->allowEmptyString('guest_name', false);

        $validator
            ->scalar('ref')
            ->requirePresence('ref', 'create')
            ->allowEmptyString('ref', false);

        $validator
            ->scalar('service_date')
            ->maxLength('service_date', 500)
            ->requirePresence('service_date', 'create')
            ->allowEmptyString('service_date', false);

        $validator
            ->scalar('service')
            ->maxLength('service', 200)
            ->requirePresence('service', 'create')
            ->allowEmptyString('service', false);

        $validator
            ->scalar('rate')
            ->maxLength('rate', 500)
            ->requirePresence('rate', 'create')
            ->allowEmptyString('rate', false);

        $validator
            ->scalar('no_of_days')
            ->maxLength('no_of_days', 500)
            ->requirePresence('no_of_days', 'create')
            ->allowEmptyString('no_of_days', false);

        $validator
            ->scalar('taxi_no')
            ->maxLength('taxi_no', 500)
            ->requirePresence('taxi_no', 'create')
            ->allowEmptyString('taxi_no', false);

        $validator
            ->scalar('amount')
            ->maxLength('amount', 100)
            ->requirePresence('amount', 'create')
            ->allowEmptyString('amount', false);

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
        $rules->add($rules->existsIn(['login_id'], 'Logins'));
        $rules->add($rules->existsIn(['counter_id'], 'Counters'));
       
        return $rules;
    }
}
