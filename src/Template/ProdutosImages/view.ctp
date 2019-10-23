<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutosImage $produtosImage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produtos Image'), ['action' => 'edit', $produtosImage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produtos Image'), ['action' => 'delete', $produtosImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosImage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produtos Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtosImages view large-9 medium-8 columns content">
    <h3><?= h($produtosImage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($produtosImage->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($produtosImage->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produto') ?></th>
            <td><?= $produtosImage->has('produto') ? $this->Html->link($produtosImage->produto->id, ['controller' => 'Produtos', 'action' => 'view', $produtosImage->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produtosImage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($produtosImage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($produtosImage->modified) ?></td>
        </tr>
    </table>
</div>
