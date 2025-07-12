<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Riders Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CitiesTable&\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\CountryCodesTable&\Cake\ORM\Association\BelongsTo $CountryCodes
 * @property \App\Model\Table\EventRidersTable&\Cake\ORM\Association\HasMany $EventRiders
 *
 * @method \App\Model\Entity\Rider newEmptyEntity()
 * @method \App\Model\Entity\Rider newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Rider> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rider get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Rider findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Rider patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Rider> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rider|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Rider saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Rider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Rider>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Rider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Rider> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Rider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Rider>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Rider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Rider> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RidersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('riders');
        $this->setDisplayField('fname');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('CountryCodes', [
            'foreignKey' => 'country_code_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('EventRiders', [
            'foreignKey' => 'rider_id',
        ]);
        $this->addBehavior('Timestamp', [
            'events' => [
            'Model.beforeSave' => [
            'created_on' => 'new',
            'modified_on' => 'always'
        ]]]);
        
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('uci_id')
            ->maxLength('uci_id', 50)
            ->allowEmptyString('uci_id');

        $validator
            ->scalar('phi_id')
            ->maxLength('phi_id', 50)
            ->allowEmptyString('phi_id');

        $validator
            ->scalar('fname')
            ->maxLength('fname', 255)
            ->requirePresence('fname', 'create')
            ->notEmptyString('fname');

        $validator
            ->scalar('mname')
            ->maxLength('mname', 255)
            ->allowEmptyString('mname');

        $validator
            ->scalar('lname')
            ->maxLength('lname', 255)
            ->requirePresence('lname', 'create')
            ->notEmptyString('lname');

        $validator
            ->date('date_of_birth')
            ->allowEmptyDate('date_of_birth');

        $validator
            ->integer('contact_number')
            ->allowEmptyString('contact_number');

        $validator
            ->integer('city_id')
            ->notEmptyString('city_id');

        $validator
            ->integer('country_code_id')
            ->notEmptyString('country_code_id');

        $validator
            ->integer('pts')
            ->notEmptyString('pts');

        $validator
            ->boolean('is_active')
            ->notEmptyString('is_active');

        $validator
            ->dateTime('created_on')
            ->notEmptyDateTime('created_on');

        $validator
            ->dateTime('modified_on')
            ->notEmptyDateTime('modified_on');

        $validator
            ->dateTime('deleted_on')
            ->allowEmptyDateTime('deleted_on');

        $validator
            ->boolean('is_deleted')
            ->notEmptyString('is_deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['city_id'], 'Cities'), ['errorField' => 'city_id']);
        $rules->add($rules->existsIn(['country_code_id'], 'CountryCodes'), ['errorField' => 'country_code_id']);

        return $rules;
    }
}
