<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
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
        <?php if (!empty($produto->pedidos)) : ?>
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
                <?php foreach ($produto->pedidos as $pedidos) : ?>
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
</div>
