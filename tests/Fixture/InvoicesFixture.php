<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoicesFixture
 */
class InvoicesFixture extends TestFixture
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
                'description' => 'Lorem ipsum dolor sit amet',
                'currency' => 'L',
                'amount' => 1.5,
                'status' => 1,
                'created_on' => '2025-07-12 14:27:41',
                'modified_on' => '2025-07-12 14:27:41',
                'deleted_on' => '2025-07-12 14:27:41',
            ],
        ];
        parent::init();
    }
}
