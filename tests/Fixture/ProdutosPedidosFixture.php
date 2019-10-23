<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProdutosPedidosFixture
 */
class ProdutosPedidosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'pedido_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'produto_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_produtos_pedidos_pedidos' => ['type' => 'index', 'columns' => ['pedido_id'], 'length' => []],
            'FK_produtos_pedidos_produtos' => ['type' => 'index', 'columns' => ['produto_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_produtos_pedidos_pedidos' => ['type' => 'foreign', 'columns' => ['pedido_id'], 'references' => ['pedidos', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'FK_produtos_pedidos_produtos' => ['type' => 'foreign', 'columns' => ['produto_id'], 'references' => ['produtos', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'pedido_id' => 1,
                'produto_id' => 1
            ],
        ];
        parent::init();
    }
}
