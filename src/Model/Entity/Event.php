<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Cake\I18n\DateTime $schedule
 * @property bool $is_active
 * @property \Cake\I18n\DateTime $created_on
 * @property \Cake\I18n\DateTime $modified_on
 * @property \Cake\I18n\DateTime|null $deleted_on
 *
 * @property \App\Model\Entity\Accommodation[] $accommodations
 * @property \App\Model\Entity\Category[] $categories
 * @property \App\Model\Entity\EventRider[] $event_riders
 */
class Event extends Entity
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
        'name' => true,
        'description' => true,
        'schedule' => true,
        'is_active' => true,
        'created_on' => true,
        'modified_on' => true,
        'deleted_on' => true,
        'accommodations' => true,
        'categories' => true,
        'event_riders' => true,
    ];
}
