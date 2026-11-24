<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carriers Model
 *
 * @property \App\Model\Table\PatientsTable&\Cake\ORM\Association\HasMany $Patients
 *
 * @method \App\Model\Entity\Carrier newEmptyEntity()
 * @method \App\Model\Entity\Carrier newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Carrier> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Carrier get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Carrier findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Carrier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Carrier> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Carrier|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Carrier saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Carrier>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Carrier>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Carrier>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Carrier> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Carrier>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Carrier>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Carrier>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Carrier> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CarriersTable extends Table
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

        $this->setTable('carriers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Patients', [
            'foreignKey' => 'carrier_id',
        ]);
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('carrier_code')
            ->maxLength('carrier_code', 255)
            ->requirePresence('carrier_code', 'create')
            ->notEmptyString('carrier_code');

        $validator
            ->dateTime('modefied')
            ->requirePresence('modefied', 'create')
            ->notEmptyDateTime('modefied');

        return $validator;
    }
}
