<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedidos
 */
?>
<div class="col-12">
    <div class="jumbotron">
        <h3 class="titulos">Pedidos</h3>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" class="sort"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="sort"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="sort"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col" class="sort"><?= $this->Paginator->sort('forma_pagamento') ?></th>
                <th scope="col" class="sort"><?= $this->Paginator->sort('parcela') ?></th>
                <th scope="col" class="sort"><?= $this->Paginator->sort('frete') ?></th>
                <th scope="col" class="actions">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido) : ?>
                <tr>
                    <td><?= $this->Number->format($pedido->id) ?></td>
                    <td><?= $pedido->has('user') ? $this->Html->link($pedido->user->cpf, ['controller' => 'Users', 'action' => 'view', $pedido->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($pedido->total) ?></td>
                    <td><?= h($pedido->forma_pagamento) ?></td>
                    <td><?= $this->Number->format($pedido->parcela) ?></td>
                    <td><?= $this->Number->format($pedido->frete) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Ver', ['action' => 'view', $pedido->id]) ?>
                        <?= $this->Html->link('Editar', ['action' => 'edit', $pedido->id]) ?>
                        <?= $this->Form->postLink('Excluir', ['action' => 'delete', $pedido->id], ['confirm' => __('Realmente deseja excluir o pedido {0}?', $pedido->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próxima') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>
