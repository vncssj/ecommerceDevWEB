<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutosPedido $produtosPedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Produtos Pedidos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtosPedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($produtosPedido) ?>
    <fieldset>
        <legend><?= __('Add Produtos Pedido') ?></legend>
        <?php
            echo $this->Form->control('pedido_id', ['options' => $pedidos, 'empty' => true]);
            echo $this->Form->control('produto_id', ['options' => $produtos, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
