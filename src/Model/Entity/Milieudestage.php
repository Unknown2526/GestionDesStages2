<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Milieudestage Entity
 *
 * @property int $id
 * @property string $nom
 * @property string $adresse
 * @property string $ville
 * @property string $province
 * @property string $code_postal
 * @property string $exigence
 * @property string $nom_respo
 * @property string $telephone_respo
 * @property string $fax_respo
 * @property string $courriel_respo
 * @property string $adresse_admin
 * @property string $ville_admin
 * @property string $province_admin
 * @property string $code_postal_admin
 * @property int $region_admin_id
 * @property string $facilite
 * @property string $tache
 * @property string $remarque
 * @property string $info_solicitation
 * @property string $info_contrat
 * @property string $reponse_milieu
 * @property string $autre_info
 * @property \Cake\I18n\FrozenTime $date_inv
 * @property \Cake\I18n\FrozenTime $date_rappel
 * @property bool $actif
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Listemission[] $listemissions
 * @property \App\Model\Entity\Listetypeclientele[] $listetypeclienteles
 * @property \App\Model\Entity\Listetypeetablissement[] $listetypeetablissements
 * @property \App\Model\Entity\Offre[] $offres
 */
class Milieudestage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nom' => true,
        'adresse' => true,
        'ville' => true,
        'province' => true,
        'code_postal' => true,
        'exigence' => true,
        'nom_respo' => true,
        'telephone_respo' => true,
        'fax_respo' => true,
        'courriel_respo' => true,
        'adresse_admin' => true,
        'ville_admin' => true,
        'province_admin' => true,
        'code_postal_admin' => true,
        'region_admin_id' => true,
        'facilite' => true,
        'tache' => true,
        'remarque' => true,
        'info_solicitation' => true,
        'info_contrat' => true,
        'reponse_milieu' => true,
        'autre_info' => true,
        'date_inv' => true,
        'date_rappel' => true,
        'actif' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'region' => true,
        'user' => true,
        'listemissions' => true,
        'listetypeclienteles' => true,
        'listetypeetablissements' => true,
        'offres' => true
    ];
}
