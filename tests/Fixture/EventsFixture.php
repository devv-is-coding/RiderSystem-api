<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsFixture
 */
class EventsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'schedule' => '2025-07-12 14:30:46',
                'is_active' => 1,
                'created_on' => '2025-07-12 14:30:46',
                'modified_on' => '2025-07-12 14:30:46',
                'deleted_on' => '2025-07-12 14:30:46',
            ],
        ];
        parent::init();
    }
}
