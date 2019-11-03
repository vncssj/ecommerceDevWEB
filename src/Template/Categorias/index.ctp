<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria[]|\Cake\Collection\CollectionInterface $categorias
 */
?>
<div class="col-12">
    <div class="topo-dash">
        <h3>Categorias</h3>
        <?= $this->html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']) . ' Categoria', ['action' => 'add'], ['class' => 'btn-add', 'escape' => false]) ?>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col" class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria) : ?>
                <tr>
                    <td><?= $this->Number->format($categoria->id) ?></td>
                    <td><?= h($categoria->nome) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $categoria->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $categoria->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?>
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