<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoriesFixture
 */
class CategoriesFixture extends TestFixture
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
                'event_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'is_deleted' => 1,
                'created_on' => '2025-07-12 14:33:22',
                'modified_on' => '2025-07-12 14:33:22',
                'deleted_on' => '2025-07-12 14:33:22',
            ],
        ];
        parent::init();
    }
}
