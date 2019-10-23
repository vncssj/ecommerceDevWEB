<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutosImage[]|\Cake\Collection\CollectionInterface $produtosImages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produtos Image'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtosImages index large-9 medium-8 columns content">
    <h3><?= __('Produtos Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('produto_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtosImages as $produtosImage): ?>
            <tr>
                <td><?= $this->Number->format($produtosImage->id) ?></td>
                <td><?= h($produtosImage->titulo) ?></td>
                <td><?= h($produtosImage->nome) ?></td>
                <td><?= h($produtosImage->created) ?></td>
                <td><?= h($produtosImage->modified) ?></td>
                <td><?= $produtosImage->has('produto') ? $this->Html->link($produtosImage->produto->id, ['controller' => 'Produtos', 'action' => 'view', $produtosImage->produto->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produtosImage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produtosImage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produtosImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosImage->id)]) ?>
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
