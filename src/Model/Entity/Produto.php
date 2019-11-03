<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $descricao
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property float $valor_compra
 * @property float|null $valor_venda
 * @property string $status
 * @property int $categoria_id
 *
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\Image[] $images
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
        'created' => true,
        'modified' => true,
        'valor_compra' => true,
        'valor_venda' => true,
        'status' => true,
        'categoria_id' => true,
        'categoria' => true,
        'images' => true,
        'pedidos' => true
    ];
}
