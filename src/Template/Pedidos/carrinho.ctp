<h3 class="titulos">Carrinho</h3>
<div class="col-12">
    <table class="table-striped">
        <thead>
            <tr>
                <th class="th-carrinho">Produtos</th>
                <th class="th-nome"></th>
                <th class="th-qtd text-center">Quantidade</th>
                <th class="th-preco text-center">Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php $valor_total = 0; ?>
            <?php foreach ($pedido->produtos as $produto) : ?>
                <tr>
                    <td class="td-image"><?= $this->Html->image('produtos/' . $produto->images[0]->nome) ?></td>
                    <td class="carrinho-content-produto">
                        <span class="carrinho-titulo-produto"><?= $produto->nome ?></span>
                    </td>
                    <td class="td-quantidade">
                        <?= $this->Form->button('-', ['produto' => $produto->_joinData->id, 'class' => 'btn-less']) ?>
                        <?= $this->Form->control('quantidade', ['id' => 'input-qtd-' . $produto->_joinData->id, 'value' => $produto->_joinData->quantidade, 'label' => false, 'class' => 'carrinho-qtd-produto', 'readonly']) ?>
                        <?= $this->Form->button('+', ['produto' => $produto->_joinData->id, 'class' => 'btn-plus']) ?>
                    </td>
                    <td class="td-preco">
                        <span class="carrinho-preco-produto"><?= $this->Number->format($produto->valor_venda, ['before' => 'R$', 'locale' => 'pt_BR', 'place' => 2]) ?></span>
                        <?php $valor_total += $produto->valor_venda * $produto->_joinData->quantidade; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"></td>
                <td>Subtotal: <strong><?= $this->Number->format($valor_total, ['before' => 'R$', 'locale' => 'pt_BR', 'place' => 2]) ?></strong></td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    $(".btn-plus").click(function() {
        let produto = $(this).attr("produto");
        let valor_atual = $("#input-qtd-" + produto).val();
        $("#input-qtd-" + produto).val(parseInt(valor_atual) + 1);
    });
    $(".btn-less").click(function() {
        let produto = $(this).attr("produto");
        let valor_atual = $("#input-qtd-" + produto).val();
        if (parseInt(valor_atual) > 0) {
            $("#input-qtd-" + produto).val(parseInt(valor_atual) - 1);
        }
    });
</script>
