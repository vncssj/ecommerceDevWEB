<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<style>
    #quantidade {
        width: 100px;
        margin: 0px;
        margin-left: 5px;
        margin-right: 5px;
    }

    .nome-produto {
        color: #f28181;
        font-size: 16pt;
        font-family: 'Montserrat'
    }
</style>
<div class="clearfix">&nbsp</div>
<div class="row">
    <div class="col-6 flex">
        <div class="marginal-fotos">
            <?php foreach ($produto->images as $key => $imagem) : ?>
                <div class="individual-marginal">
                    <?= $this->Html->image('produtos/' . $imagem->nome) ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="central-foto">
            <?= $this->Html->image('produtos/' . $produto->images[0]->nome, ['id' => 'imagem-flexivel']) ?>
        </div>
    </div>
    <div class="col-6">
        <table class="vertical-table">
            <tr>
                <td class="nome-produto" colspan="2"><?= $produto->nome ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Preço:') ?></th>
                <td><?= $this->Number->format($produto->valor_venda, ['before' => 'R$', 'locale' => 'pt_BR', 'place' => 2]) ?></td>
            </tr>
        </table>

        <?= $this->Form->create(null, ['url' => ['controller' => 'Pedidos', 'action' => 'add']]) ?>
        <div class="form-inline flex">
            <?= $this->Form->control('produto', ['type' => 'number', 'type' => 'hidden', 'label' => false, 'value' => $produto->id]) ?>
            <?= $this->Form->control('preco', ['type' => 'number', 'type' => 'hidden', 'label' => false, 'value' => $produto->valor_venda]) ?>
            <?= $this->Form->control('quantidade', ['type' => 'number', 'class' => 'form-control', 'value' => '1', 'min' => 1, 'max' => 10, 'label' => false]) ?>
            <?= $this->Form->button('Adicionar ' . $this->Html->tag('i', '', ['class' => 'fas fa-shopping-cart']), ['class' => 'btn btn-success']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <div class="col-12">
        <h4>Descrição</h4>
        <?= $this->Text->autoParagraph($produto->descricao); ?>
    </div>
</div>
<script>
    $(".individual-marginal").mouseenter(function() {
        let img = $(this).children('img').attr('src');
        $("#imagem-flexivel").attr('src', img);
    });
</script>
