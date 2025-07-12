<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccommodationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccommodationsTable Test Case
 */
class AccommodationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccommodationsTable
     */
    protected $Accommodations;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Accommodations',
        'app.Users',
        'app.Events',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Accommodations') ? [] : ['className' => AccommodationsTable::class];
        $this->Accommodations = $this->getTableLocator()->get('Accommodations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Accommodations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\AccommodationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\AccommodationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
