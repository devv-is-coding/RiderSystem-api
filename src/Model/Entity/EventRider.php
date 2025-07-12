<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventRider Entity
 *
 * @property int $id
 * @property int $event_id
 * @property int $rider_id
 * @property int $category_id
 * @property string|null $jersey_size
 * @property int|null $status
 * @property \Cake\I18n\DateTime $created_on
 * @property \Cake\I18n\DateTime $modified_on
 * @property \Cake\I18n\DateTime|null $deleted_on
 *
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\Rider $rider
 * @property \App\Model\Entity\Category $category
 */
class EventRider extends Entity
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
        'rider_id' => true,
        'category_id' => true,
        'jersey_size' => true,
        'status' => true,
        'created_on' => true,
        'modified_on' => true,
        'deleted_on' => true,
        'event' => true,
        'rider' => true,
        'category' => true,
    ];
}
