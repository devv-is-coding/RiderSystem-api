<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property bool $is_active
 * @property \Cake\I18n\DateTime $created_on
 * @property \Cake\I18n\DateTime $modified_on
 * @property \Cake\I18n\DateTime|null $deleted_on
 *
 * @property \App\Model\Entity\Accommodation[] $accommodations
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\Rider[] $riders
 * @property \App\Model\Entity\Team[] $teams
 * @property \App\Model\Entity\Token[] $tokens
 */
class User extends Entity
{
    protected array $_accessible = [
        'username' => true,
        'email' => true,
        'password' => true,
        'is_active' => true,
        'created_on' => true,
        'modified_on' => true,
        'deleted_on' => true,
        'accommodations' => true,
        'invoices' => true,
        'riders' => true,
        'teams' => true,
        'tokens' => true,
    ];
     protected array $_hidden = [
        'password',
    ];
    protected function _setPassword(string $password): ?string {
    if (strlen($password) > 0) {
      return password_hash($password, PASSWORD_ARGON2ID);
    }
    return null;
}
}
