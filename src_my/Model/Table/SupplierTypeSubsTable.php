<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SupplierTypeSubs Model
 *
 * @property \App\Model\Table\SupplierTypesTable|\Cake\ORM\Association\BelongsTo $SupplierTypes
 *
 * @method \App\Model\Entity\SupplierTypeSub get($primaryKey, $options = [])
 * @method \App\Model\Entity\SupplierTypeSub newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SupplierTypeSub[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SupplierTypeSub|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SupplierTypeSub saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SupplierTypeSub patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SupplierTypeSub[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SupplierTypeSub findOrCreate($search, callable $callback = null, $options = [])
 */
class SupplierTypeSubsTable extends Table
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

        $this->setTable('supplier_type_subs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('SupplierTypes', [
            'foreignKey' => 'supplier_type_id',
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
            ->scalar('name')
            ->maxLength('name', 20)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

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
        $rules->add($rules->existsIn(['supplier_type_id'], 'SupplierTypes'));

        return $rules;
    }
}
