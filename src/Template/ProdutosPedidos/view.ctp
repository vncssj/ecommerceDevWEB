<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutosPedido $produtosPedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produtos Pedido'), ['action' => 'edit', $produtosPedido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produtos Pedido'), ['action' => 'delete', $produtosPedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosPedido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos Pedidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produtos Pedido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtosPedidos view large-9 medium-8 columns content">
    <h3><?= h($produtosPedido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pedido') ?></th>
            <td><?= $produtosPedido->has('pedido') ? $this->Html->link($produtosPedido->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $produtosPedido->pedido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produto') ?></th>
            <td><?= $produtosPedido->has('produto') ? $this->Html->link($produtosPedido->produto->id, ['controller' => 'Produtos', 'action' => 'view', $produtosPedido->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produtosPedido->id) ?></td>
        </tr>
    </table>
</div>
