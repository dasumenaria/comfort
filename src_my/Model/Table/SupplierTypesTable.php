<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SupplierTypes Model
 *
 * @method \App\Model\Entity\SupplierType get($primaryKey, $options = [])
 * @method \App\Model\Entity\SupplierType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SupplierType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SupplierType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SupplierType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SupplierType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SupplierType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SupplierType findOrCreate($search, callable $callback = null, $options = [])
 */
class SupplierTypesTable extends Table
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

        $this->setTable('supplier_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        
        $this->hasMany('SupplierTypeSubs', [
            'foreignKey' => 'supplier_type_id'
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
            ->maxLength('name', 30)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        return $validator;
    }
}
