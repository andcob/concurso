<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParticipantesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParticipantesTable Test Case
 */
class ParticipantesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ParticipantesTable
     */
    protected $Participantes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Participantes',
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
        $config = $this->getTableLocator()->exists('Participantes') ? [] : ['className' => ParticipantesTable::class];
        $this->Participantes = $this->getTableLocator()->get('Participantes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Participantes);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
