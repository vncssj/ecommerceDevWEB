<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdutosPedidosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdutosPedidosTable Test Case
 */
class ProdutosPedidosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdutosPedidosTable
     */
    public $ProdutosPedidos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProdutosPedidos',
        'app.Pedidos',
        'app.Produtos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProdutosPedidos') ? [] : ['className' => ProdutosPedidosTable::class];
        $this->ProdutosPedidos = TableRegistry::getTableLocator()->get('ProdutosPedidos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProdutosPedidos);

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
