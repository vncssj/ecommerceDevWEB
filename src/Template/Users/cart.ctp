<div class="col-12">
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Imagem</th>
                <th class="text-center">Produto</th>
                <th class="text-center">Valor</th>
                <th class="text-center">Quantidade</th>
                <th class="text-center">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) : ?>
                <tr class="linha-produto">
                    <td><?= $this->Html->image('produtos/' . $produto->produto->images[0]->nome, ['style' => 'max-height: 100px;']) ?></td>
                    <td>
                        <div class="nome-produto"><?= $produto->produto->nome ?></div>
                        <div class="dados-produto">
                            Produto #<?= $produto->produto->id ?></br>
                            #<?= $produto->produto->categoria->nome ?></br>
                        </div>
                    </td>
                    <td class="text-center"><?= $produto->produto->valor_venda ?></td>
                    <td class="text-center"><?= $produto->quantidade ?></td>
                    <td class="text-center"><?= $produto->total ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="col-4"></div>
