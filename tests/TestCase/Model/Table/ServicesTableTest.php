<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicesTable Test Case
 */
class ServicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ServicesTable
     */
    public $Services;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.services',
        'app.sesions',
        'app.clients',
        'app.personals',
        'app.payments',
        'app.schedules',
        'app.specialists',
        'app.users',
        'app.sesions_services'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Services') ? [] : ['className' => 'App\Model\Table\ServicesTable'];
        $this->Services = TableRegistry::get('Services', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Services);

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
}
