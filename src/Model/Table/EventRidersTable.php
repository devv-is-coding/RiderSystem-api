<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EventRiders Model
 *
 * @property \App\Model\Table\EventsTable&\Cake\ORM\Association\BelongsTo $Events
 * @property \App\Model\Table\RidersTable&\Cake\ORM\Association\BelongsTo $Riders
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\EventRider newEmptyEntity()
 * @method \App\Model\Entity\EventRider newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\EventRider> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventRider get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\EventRider findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\EventRider patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\EventRider> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventRider|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\EventRider saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\EventRider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EventRider>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EventRider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EventRider> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EventRider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EventRider>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EventRider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EventRider> deleteManyOrFail(iterable $entities, array $options = [])
 */
class EventRidersTable extends Table
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

        $this->setTable('event_riders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Events', [
            'foreignKey' => 'event_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Riders', [
            'foreignKey' => 'rider_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
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
            ->integer('event_id')
            ->notEmptyString('event_id');

        $validator
            ->integer('rider_id')
            ->notEmptyString('rider_id');

        $validator
            ->integer('category_id')
            ->notEmptyString('category_id');

        $validator
            ->scalar('jersey_size')
            ->maxLength('jersey_size', 255)
            ->allowEmptyString('jersey_size');

        $validator
            ->allowEmptyString('status');

        $validator
            ->dateTime('created_on')
            ->notEmptyDateTime('created_on');

        $validator
            ->dateTime('modified_on')
            ->notEmptyDateTime('modified_on');

        $validator
            ->dateTime('deleted_on')
            ->allowEmptyDateTime('deleted_on');

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
        $rules->add($rules->existsIn(['event_id'], 'Events'), ['errorField' => 'event_id']);
        $rules->add($rules->existsIn(['rider_id'], 'Riders'), ['errorField' => 'rider_id']);
        $rules->add($rules->existsIn(['category_id'], 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }
}
