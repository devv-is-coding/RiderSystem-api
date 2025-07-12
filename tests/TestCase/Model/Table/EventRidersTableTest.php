<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventRidersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventRidersTable Test Case
 */
class EventRidersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EventRidersTable
     */
    protected $EventRiders;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.EventRiders',
        'app.Events',
        'app.Riders',
        'app.Categories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EventRiders') ? [] : ['className' => EventRidersTable::class];
        $this->EventRiders = $this->getTableLocator()->get('EventRiders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EventRiders);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\EventRidersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\EventRidersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
