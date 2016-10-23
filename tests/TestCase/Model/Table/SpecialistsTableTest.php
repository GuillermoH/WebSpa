<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpecialistsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpecialistsTable Test Case
 */
class SpecialistsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpecialistsTable
     */
    public $Specialists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.specialists',
        'app.schedules',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Specialists') ? [] : ['className' => 'App\Model\Table\SpecialistsTable'];
        $this->Specialists = TableRegistry::get('Specialists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Specialists);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
