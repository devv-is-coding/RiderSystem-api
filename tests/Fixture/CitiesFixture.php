<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CitiesFixture
 */
class CitiesFixture extends TestFixture
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
                'city_name' => 'Lorem ipsum dolor sit amet',
                'city_code' => 1,
                'created_on' => '2025-07-12 14:28:29',
                'modified_on' => '2025-07-12 14:28:29',
                'deleted_on' => '2025-07-12 14:28:29',
            ],
        ];
        parent::init();
    }
}
