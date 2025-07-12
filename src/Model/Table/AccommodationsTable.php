<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accommodations Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\EventsTable&\Cake\ORM\Association\BelongsTo $Events
 *
 * @method \App\Model\Entity\Accommodation newEmptyEntity()
 * @method \App\Model\Entity\Accommodation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Accommodation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Accommodation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Accommodation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Accommodation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Accommodation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Accommodation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Accommodation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Accommodation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Accommodation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Accommodation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Accommodation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Accommodation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Accommodation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Accommodation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Accommodation> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AccommodationsTable extends Table
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

        $this->setTable('accommodations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Events', [
            'foreignKey' => 'event_id',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('event_id')
            ->notEmptyString('event_id');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmptyDate('end_date');

        $validator
            ->allowEmptyString('is_halal');

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
        $rules->add($rules->existsIn(['event_id'], 'Events'), ['errorField' => 'event_id']);

        return $rules;
    }
}
