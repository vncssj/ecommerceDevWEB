<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<h3 class="text-center" style="margin: 20px;"><?= h($produto->nome) ?></h3>
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
                <th scope="row"><?= __('Preço:') ?></th>
                <td><?= $this->Number->format($produto->valor_venda, ['before' => 'R$', 'locale' => 'pt_BR', 'place' => 2]) ?></td>
            </tr>
        </table>
        <div class="flex" style="align-items:center; float:inline-end;">
            <input type="number" class="form-control" placeholder="qtd." min="1" max="50" style="width: 100px; margin: 0px; margin-left: 5px; margin-right: 5px;">
            <?= $this->Form->button('Adicionar ' . $this->Html->tag('i', '', ['class' => 'fas fa-shopping-cart']), ['class' => 'btn btn-success']) ?>
        </div>
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
