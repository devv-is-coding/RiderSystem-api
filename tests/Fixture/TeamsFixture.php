<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TeamsFixture
 */
class TeamsFixture extends TestFixture
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
                'user_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'team_size' => 1,
                'city_id' => 1,
                'country_code_id' => 1,
                'is_active' => 1,
                'created_on' => '2025-07-12 14:29:29',
                'modified_on' => '2025-07-12 14:29:29',
                'deleted_on' => '2025-07-12 14:29:29',
            ],
        ];
        parent::init();
    }
}
