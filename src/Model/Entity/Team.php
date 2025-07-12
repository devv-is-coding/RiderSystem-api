<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Team Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int|null $team_size
 * @property int $city_id
 * @property int $country_code_id
 * @property bool $is_active
 * @property \Cake\I18n\DateTime $created_on
 * @property \Cake\I18n\DateTime $modified_on
 * @property \Cake\I18n\DateTime|null $deleted_on
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\CountryCode $country_code
 */
class Team extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'user_id' => true,
        'name' => true,
        'team_size' => true,
        'city_id' => true,
        'country_code_id' => true,
        'is_active' => true,
        'created_on' => true,
        'modified_on' => true,
        'deleted_on' => true,
        'user' => true,
        'city' => true,
        'country_code' => true,
    ];
}
