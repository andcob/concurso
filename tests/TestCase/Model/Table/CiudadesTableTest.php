<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CiudadesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CiudadesTable Test Case
 */
class CiudadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CiudadesTable
     */
    protected $Ciudades;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Ciudades',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ciudades') ? [] : ['className' => CiudadesTable::class];
        $this->Ciudades = $this->getTableLocator()->get('Ciudades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Ciudades);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
