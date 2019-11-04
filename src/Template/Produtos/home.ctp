<style>
    .card {
        margin-top: 20px;
        padding: 0px;
    }
</style>
<div class="row">
    <div class="col-12 text-center">
        <h2 class="titulo-inicial">Acabaram de Chegar</h2>
    </div>
    <?php if (isset($produtos)) : ?>
        <?php foreach ($produtos as $produto) : ?>
            <div class="card card-produtos">
                <?php if (count($produto->images) > 0) : ?>
                    <?= $this->Html->image('produtos/' . $produto->images[0]->nome, ['class' => 'card-img-top']); ?>
                <?php endif; ?>
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $produto->nome ?></h5>
                </div>
                <div class="card-footer preco_link">
                    <div class="preco">
                        <?= $this->Number->format($produto->valor_venda, ['before' => 'R$ ', 'locale' => 'pt_BR', 'places' => 2]) ?>
                    </div>
                    <a href="produtos/view/<?= $produto->id ?>" class="btn btn-compre">Compre já</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php foreach ($categorias as $categoria) : ?>
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="titulo-inicial">Novidades em <?= $categoria->nome ?></h2>
        </div>
        <?php if (isset($produtos)) : ?>
            <?php foreach ($categoria->produtos as $produto) : ?>
                <div class="card card-produtos">
                    <?php if (count($produto->images) > 0) : ?>
                        <?= $this->Html->image('produtos/' . $produto->images[0]->nome, ['class' => 'card-img-top']); ?>
                    <?php endif; ?>
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $produto->nome ?></h5>
                    </div>
                    <div class="card-footer preco_link">
                        <div class="preco">
                            <?= $this->Number->format($produto->valor_venda, ['before' => 'R$ ', 'locale' => 'pt_BR', 'places' => 2]) ?>
                        </div>
                        <a href="produtos/view/<?= $produto->id ?>" class="btn btn-compre">Compre já</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

<?php endforeach; ?>
