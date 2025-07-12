<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'is_active' => 1,
                'created_on' => '2025-07-12 14:21:11',
                'modified_on' => '2025-07-12 14:21:11',
                'deleted_on' => '2025-07-12 14:21:11',
            ],
        ];
        parent::init();
    }
}
