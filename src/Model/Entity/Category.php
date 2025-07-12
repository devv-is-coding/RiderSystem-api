<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property int $event_id
 * @property string $name
 * @property bool $is_deleted
 * @property \Cake\I18n\DateTime $created_on
 * @property \Cake\I18n\DateTime $modified_on
 * @property \Cake\I18n\DateTime|null $deleted_on
 *
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\EventRider[] $event_riders
 */
class Category extends Entity
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
        'event_id' => true,
        'name' => true,
        'is_deleted' => true,
        'created_on' => true,
        'modified_on' => true,
        'deleted_on' => true,
        'event' => true,
        'event_riders' => true,
    ];
}
