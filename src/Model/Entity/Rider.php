<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rider Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $uci_id
 * @property string|null $phi_id
 * @property string $fname
 * @property string|null $mname
 * @property string $lname
 * @property \Cake\I18n\Date|null $date_of_birth
 * @property int|null $contact_number
 * @property int $city_id
 * @property int $country_code_id
 * @property int $pts
 * @property bool $is_active
 * @property \Cake\I18n\DateTime $created_on
 * @property \Cake\I18n\DateTime $modified_on
 * @property \Cake\I18n\DateTime|null $deleted_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\CountryCode $country_code
 * @property \App\Model\Entity\EventRider[] $event_riders
 */
class Rider extends Entity
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
        'uci_id' => true,
        'phi_id' => true,
        'fname' => true,
        'mname' => true,
        'lname' => true,
        'date_of_birth' => true,
        'contact_number' => true,
        'city_id' => true,
        'country_code_id' => true,
        'pts' => true,
        'is_active' => true,
        'created_on' => true,
        'modified_on' => true,
        'deleted_on' => true,
        'is_deleted' => true,
        'user' => true,
        'city' => true,
        'country_code' => true,
        'event_riders' => true,
    ];
}
