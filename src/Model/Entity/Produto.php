<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $descricao
 * @property float $valor_compra
 * @property float|null $valor_venda
 *
 * @property \App\Model\Entity\Pedido[] $pedidos
 */
class Produto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'descricao' => true,
        'valor_compra' => true,
        'valor_venda' => true,
        'pedidos' => true
    ];
}
