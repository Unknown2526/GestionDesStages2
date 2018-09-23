<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Milieudestages Model
 *
 * @property \App\Model\Table\RegionsTable|\Cake\ORM\Association\BelongsTo $Regions
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ListemissionsTable|\Cake\ORM\Association\HasMany $Listemissions
 * @property \App\Model\Table\ListetypeclientelesTable|\Cake\ORM\Association\HasMany $Listetypeclienteles
 * @property \App\Model\Table\ListetypeetablissementsTable|\Cake\ORM\Association\HasMany $Listetypeetablissements
 * @property \App\Model\Table\OffresTable|\Cake\ORM\Association\HasMany $Offres
 *
 * @method \App\Model\Entity\Milieudestage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Milieudestage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Milieudestage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Milieudestage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Milieudestage|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Milieudestage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Milieudestage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Milieudestage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MilieudestagesTable extends Table
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

        $this->setTable('milieudestages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Regions', [
            'foreignKey' => 'region_admin_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Listemissions', [
            'foreignKey' => 'milieudestage_id'
        ]);
        $this->hasMany('Listetypeclienteles', [
            'foreignKey' => 'milieudestage_id'
        ]);
        $this->hasMany('Listetypeetablissements', [
            'foreignKey' => 'milieudestage_id'
        ]);
        $this->hasMany('Offres', [
            'foreignKey' => 'milieudestage_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nom')
            ->maxLength('nom', 255)
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->scalar('adresse')
            ->maxLength('adresse', 255)
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse');

        $validator
            ->scalar('ville')
            ->maxLength('ville', 255)
            ->requirePresence('ville', 'create')
            ->notEmpty('ville');

        $validator
            ->scalar('province')
            ->maxLength('province', 255)
            ->requirePresence('province', 'create')
            ->notEmpty('province');

        $validator
            ->scalar('code_postal')
            ->maxLength('code_postal', 255)
            ->requirePresence('code_postal', 'create')
            ->notEmpty('code_postal');

        $validator
            ->scalar('exigence')
            ->requirePresence('exigence', 'create')
            ->notEmpty('exigence');

        $validator
            ->scalar('nom_respo')
            ->maxLength('nom_respo', 255)
            ->requirePresence('nom_respo', 'create')
            ->notEmpty('nom_respo');

        $validator
            ->scalar('telephone_respo')
            ->maxLength('telephone_respo', 255)
            ->requirePresence('telephone_respo', 'create')
            ->notEmpty('telephone_respo');

        $validator
            ->scalar('fax_respo')
            ->maxLength('fax_respo', 255)
            ->requirePresence('fax_respo', 'create')
            ->notEmpty('fax_respo');

        $validator
            ->scalar('courriel_respo')
            ->maxLength('courriel_respo', 255)
            ->requirePresence('courriel_respo', 'create')
            ->notEmpty('courriel_respo');

        $validator
            ->scalar('adresse_admin')
            ->maxLength('adresse_admin', 255)
            ->requirePresence('adresse_admin', 'create')
            ->notEmpty('adresse_admin');

        $validator
            ->scalar('ville_admin')
            ->maxLength('ville_admin', 255)
            ->requirePresence('ville_admin', 'create')
            ->notEmpty('ville_admin');

        $validator
            ->scalar('province_admin')
            ->maxLength('province_admin', 255)
            ->requirePresence('province_admin', 'create')
            ->notEmpty('province_admin');

        $validator
            ->scalar('code_postal_admin')
            ->maxLength('code_postal_admin', 255)
            ->requirePresence('code_postal_admin', 'create')
            ->notEmpty('code_postal_admin');

        $validator
            ->scalar('facilite')
            ->maxLength('facilite', 255)
            ->requirePresence('facilite', 'create')
            ->notEmpty('facilite');

        $validator
            ->scalar('tache')
            ->requirePresence('tache', 'create')
            ->notEmpty('tache');

        $validator
            ->scalar('remarque')
            ->maxLength('remarque', 255)
            ->requirePresence('remarque', 'create')
            ->notEmpty('remarque');

        $validator
            ->scalar('info_solicitation')
            ->maxLength('info_solicitation', 255)
            ->requirePresence('info_solicitation', 'create')
            ->notEmpty('info_solicitation');

        $validator
            ->scalar('info_contrat')
            ->maxLength('info_contrat', 255)
            ->requirePresence('info_contrat', 'create')
            ->notEmpty('info_contrat');

        $validator
            ->scalar('reponse_milieu')
            ->maxLength('reponse_milieu', 255)
            ->requirePresence('reponse_milieu', 'create')
            ->notEmpty('reponse_milieu');

        $validator
            ->scalar('autre_info')
            ->requirePresence('autre_info', 'create')
            ->notEmpty('autre_info');

        $validator
            ->dateTime('date_inv')
            ->requirePresence('date_inv', 'create')
            ->notEmpty('date_inv');

        $validator
            ->dateTime('date_rappel')
            ->requirePresence('date_rappel', 'create')
            ->notEmpty('date_rappel');

        $validator
            ->boolean('actif')
            ->requirePresence('actif', 'create')
            ->notEmpty('actif');

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
        $rules->add($rules->existsIn(['region_admin_id'], 'Regions'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
