<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RidersFixture
 */
class RidersFixture extends TestFixture
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
                'uci_id' => 'Lorem ipsum dolor sit amet',
                'phi_id' => 'Lorem ipsum dolor sit amet',
                'fname' => 'Lorem ipsum dolor sit amet',
                'mname' => 'Lorem ipsum dolor sit amet',
                'lname' => 'Lorem ipsum dolor sit amet',
                'date_of_birth' => '2025-07-12',
                'contact_number' => 1,
                'city_id' => 1,
                'country_code_id' => 1,
                'pts' => 1,
                'is_active' => 1,
                'created_on' => '2025-07-12 14:32:16',
                'modified_on' => '2025-07-12 14:32:16',
                'deleted_on' => '2025-07-12 14:32:16',
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
