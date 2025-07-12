<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Accommodation Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $event_id
 * @property \Cake\I18n\Date $start_date
 * @property \Cake\I18n\Date $end_date
 * @property int|null $is_halal
 * @property int|null $status
 * @property \Cake\I18n\DateTime $created_on
 * @property \Cake\I18n\DateTime $modified_on
 * @property \Cake\I18n\DateTime|null $deleted_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Event $event
 */
class Accommodation extends Entity
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
        'event_id' => true,
        'start_date' => true,
        'end_date' => true,
        'is_halal' => true,
        'status' => true,
        'created_on' => true,
        'modified_on' => true,
        'deleted_on' => true,
        'is_deleted' => true,
        'user' => true,
        'event' => true,
    ];
}
