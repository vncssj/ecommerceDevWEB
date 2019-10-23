<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity
 *
 * @property int $id
 * @property int $user_id
 * @property float $total
 * @property string $forma_pagamento
 * @property int $parcela
 * @property float $frete
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Produto[] $produtos
 */
class Pedido extends Entity
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
        'user_id' => true,
        'total' => true,
        'forma_pagamento' => true,
        'parcela' => true,
        'frete' => true,
        'user' => true,
        'produtos' => true
    ];
}
