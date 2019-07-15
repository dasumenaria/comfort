<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ServiceCities Model
 *
 * @method \App\Model\Entity\ServiceCity get($primaryKey, $options = [])
 * @method \App\Model\Entity\ServiceCity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ServiceCity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ServiceCity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServiceCity saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServiceCity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceCity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceCity findOrCreate($search, callable $callback = null, $options = [])
 */
class ServiceCitiesTable extends Table
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

        $this->setTable('service_cities');
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
            ->integer('flag')
            ->requirePresence('flag', 'create')
            ->allowEmptyString('flag', false);

        return $validator;
    }
}
