<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $role_id
 * @property int $file_id
 * @property string $uuid
 * @property bool $verify
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\File $file
 * @property \App\Model\Entity\Administrateur[] $administrateurs
 * @property \App\Model\Entity\Etudiant[] $etudiants
 * @property \App\Model\Entity\Milieudestage[] $milieudestages
 * @property \App\Model\Entity\Offre[] $offres
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'role_id' => true,
        'file_id' => true,
        'uuid' => true,
        'verify' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'file' => true,
        'administrateurs' => true,
        'etudiants' => true,
        'milieudestages' => true,
        'offres' => true,
        'files'=>true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
