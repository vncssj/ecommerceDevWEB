<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutosPedido[]|\Cake\Collection\CollectionInterface $produtosPedidos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produtos Pedido'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtosPedidos index large-9 medium-8 columns content">
    <h3><?= __('Produtos Pedidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pedido_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('produto_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtosPedidos as $produtosPedido): ?>
            <tr>
                <td><?= $this->Number->format($produtosPedido->id) ?></td>
                <td><?= $produtosPedido->has('pedido') ? $this->Html->link($produtosPedido->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $produtosPedido->pedido->id]) : '' ?></td>
                <td><?= $produtosPedido->has('produto') ? $this->Html->link($produtosPedido->produto->id, ['controller' => 'Produtos', 'action' => 'view', $produtosPedido->produto->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produtosPedido->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produtosPedido->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produtosPedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosPedido->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
