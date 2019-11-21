<div class="col-12">
    <h3 class="titulos">Produtos</h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" class="sort"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="sort"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col" class="sort"><?= $this->Paginator->sort('valor_compra') ?></th>
                <th scope="col" class="sort"><?= $this->Paginator->sort('valor_venda') ?></th>
                <th scope="col" class="actions">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) : ?>
                <tr>
                    <td><?= $this->Number->format($produto->id) ?></td>
                    <td><?= h($produto->nome) ?></td>
                    <td><?= $this->Number->format($produto->valor_compra, ['locale' => 'pt_br', 'places' => 2, 'before' => 'R$ ']) ?></td>
                    <td><?= $this->Number->format($produto->valor_venda, ['locale' => 'pt_br', 'places' => 2, 'before' => 'R$ ']) ?></td>
                    <td class="actions">
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'far fa-images']), ['action' => 'images', $produto->id], ['class' => 'btn btn-sm btn-info', 'escape' => false, 'title' => 'Imagens']) ?>
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'far fa-file-alt']), ['action' => 'view', $produto->id], ['class' => 'btn btn-sm btn-info', 'escape' => false, 'title' => 'Visualizar Produto']) ?>
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'far fa-edit']), ['action' => 'edit', $produto->id], ['class' => 'btn btn-sm btn-info', 'escape' => false, 'title' => 'Editar Produto']) ?>
                        <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'far fa-trash-alt']), ['action' => 'delete', $produto->id], ['class' => 'btn btn-sm btn-danger', 'escape' => false, 'title' => 'Excluir Produto', 'confirm' => __('Realmente deseja excluir {0}?', $produto->nome)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próxima') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>
<div class="modal fade" id="modalAddImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Imagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <?= $this->Form->create(); ?>
                    <?= $this->Form->input('image', ['type' => 'file', 'multiple' => true]); ?>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
