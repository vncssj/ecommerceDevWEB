<h3 class="titulos">Carrinho</h3>
<div class="col-8">
    <table class="table-striped">
        <thead>
            <tr>
                <th colspan="2">Produtos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedido->produtos as $produto) : ?>
                <tr>
                    <td class="td-image"><?= $this->Html->image('produtos/' . $produto->images[0]->nome) ?></td>
                    <td>
                        <?= $produto->nome ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
