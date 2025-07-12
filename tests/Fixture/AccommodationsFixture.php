<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccommodationsFixture
 */
class AccommodationsFixture extends TestFixture
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
                'event_id' => 1,
                'start_date' => '2025-07-12',
                'end_date' => '2025-07-12',
                'is_halal' => 1,
                'status' => 1,
                'created_on' => '2025-07-12 14:33:37',
                'modified_on' => '2025-07-12 14:33:37',
                'deleted_on' => '2025-07-12 14:33:37',
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
