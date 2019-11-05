<div class="col-12">
    <?php if ($user['role'] === 'admin') : ?>
        <h3>Pedidos</h3>
    <?php else :  ?>
        <h3>Meu Carrinho</h3>
    <?php endif;  ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" class="sort"><?= $this->Paginator->sort('id', ['label' => 'Código']) ?></th>
                <th scope="col" class="sort"><?= $this->Paginator->sort('forma_pagamento', ['label' => 'Forma de Pagamento']) ?></th>
                <th scope="col" class="sort"><?= $this->Paginator->sort('total', ['label' => 'Valor Total']) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido) : ?>
                <tr>
                    <td><?= $this->Number->format($pedido->id) ?></td>
                    <td><?= h($pedido->forma_pagamento) ?></td>
                    <td><?= $this->Number->format($pedido->total) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
