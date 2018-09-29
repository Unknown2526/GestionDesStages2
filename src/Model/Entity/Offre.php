<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Offre Entity
 *
 * @property int $id
 * @property string $titre
 * @property string $region
 * @property string $tache
 * @property string $responsabilite
 * @property int $user_id
 * @property int $milieudestage_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Milieudestage $milieudestage
 */
class Offre extends Entity
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
        'titre' => true,
        'region' => true,
        'tache' => true,
        'responsabilite' => true,
        'user_id' => true,
        'milieudestage_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'milieudestage' => true
    ];
}
