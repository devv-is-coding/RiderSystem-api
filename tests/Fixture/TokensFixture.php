<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TokensFixture
 */
class TokensFixture extends TestFixture
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
                'token' => 'Lorem ipsum dolor sit amet',
                'expires_at' => '2025-07-12 14:26:04',
                'created_on' => '2025-07-12 14:26:04',
                'modified_on' => '2025-07-12 14:26:04',
            ],
        ];
        parent::init();
    }
}
