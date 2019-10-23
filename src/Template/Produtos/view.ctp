<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produto'), ['action' => 'edit', $produto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produto'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos Images'), ['controller' => 'ProdutosImages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produtos Image'), ['controller' => 'ProdutosImages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtos view large-9 medium-8 columns content">
    <h3><?= h($produto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($produto->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Compra') ?></th>
            <td><?= $this->Number->format($produto->valor_compra) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Venda') ?></th>
            <td><?= $this->Number->format($produto->valor_venda) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($produto->descricao)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pedidos') ?></h4>
        <?php if (!empty($produto->pedidos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Forma Pagamento') ?></th>
                <th scope="col"><?= __('Parcela') ?></th>
                <th scope="col"><?= __('Frete') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->pedidos as $pedidos): ?>
            <tr>
                <td><?= h($pedidos->id) ?></td>
                <td><?= h($pedidos->user_id) ?></td>
                <td><?= h($pedidos->total) ?></td>
                <td><?= h($pedidos->forma_pagamento) ?></td>
                <td><?= h($pedidos->parcela) ?></td>
                <td><?= h($pedidos->frete) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pedidos', 'action' => 'view', $pedidos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pedidos', 'action' => 'edit', $pedidos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pedidos', 'action' => 'delete', $pedidos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Produtos Images') ?></h4>
        <?php if (!empty($produto->produtos_images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Produto Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->produtos_images as $produtosImages): ?>
            <tr>
                <td><?= h($produtosImages->id) ?></td>
                <td><?= h($produtosImages->titulo) ?></td>
                <td><?= h($produtosImages->nome) ?></td>
                <td><?= h($produtosImages->created) ?></td>
                <td><?= h($produtosImages->modified) ?></td>
                <td><?= h($produtosImages->produto_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProdutosImages', 'action' => 'view', $produtosImages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProdutosImages', 'action' => 'edit', $produtosImages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProdutosImages', 'action' => 'delete', $produtosImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosImages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
