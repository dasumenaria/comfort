<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomerTariffs Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\CarTypesTable|\Cake\ORM\Association\BelongsTo $CarTypes
 * @property \App\Model\Table\ServicesTable|\Cake\ORM\Association\BelongsTo $Services
 *
 * @method \App\Model\Entity\CustomerTariff get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomerTariff newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustomerTariff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomerTariff|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomerTariff saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomerTariff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomerTariff[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomerTariff findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomerTariffsTable extends Table
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

        $this->setTable('customer_tariffs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CarTypes', [
            'foreignKey' => 'car_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['car_type_id'], 'CarTypes'));
        $rules->add($rules->existsIn(['service_id'], 'Services'));

        return $rules;
    }
}
