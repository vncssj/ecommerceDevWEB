<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pedido'), ['action' => 'edit', $pedido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pedido'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pedidos view large-9 medium-8 columns content">
    <h3><?= h($pedido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $pedido->has('user') ? $this->Html->link($pedido->user->id, ['controller' => 'Users', 'action' => 'view', $pedido->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Forma Pagamento') ?></th>
            <td><?= h($pedido->forma_pagamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pedido->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($pedido->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parcela') ?></th>
            <td><?= $this->Number->format($pedido->parcela) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frete') ?></th>
            <td><?= $this->Number->format($pedido->frete) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Produtos') ?></h4>
        <?php if (!empty($pedido->produtos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Valor Compra') ?></th>
                <th scope="col"><?= __('Valor Venda') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pedido->produtos as $produtos): ?>
            <tr>
                <td><?= h($produtos->id) ?></td>
                <td><?= h($produtos->nome) ?></td>
                <td><?= h($produtos->descricao) ?></td>
                <td><?= h($produtos->valor_compra) ?></td>
                <td><?= h($produtos->valor_venda) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Produtos', 'action' => 'view', $produtos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produtos', 'action' => 'edit', $produtos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Produtos', 'action' => 'delete', $produtos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
