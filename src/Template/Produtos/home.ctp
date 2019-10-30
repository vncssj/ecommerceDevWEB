<style>
    .card-body {
        background-color: #f5f2e6;
    }

    .card {
        margin: 10px;
        padding: 5px;
        background-color: #f5f5f5;
    }
</style>
<div class="row">
    <div class="col-12 text-center">
        <h2 class="titulo-inicial">Nossos Produtos</h2>
    </div>
    <?php if (isset($produtos)) : ?>
        <?php foreach ($produtos as $produto) : ?>
            <div class="card col-3" style="width: 18rem;">
                <?php if (count($produto->images) > 0) : ?>
                    <?= $this->Html->image('produtos/' . $produto->images[0]->nome, ['class' => 'card-img-top']); ?>
                <?php endif; ?>
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $produto->nome ?></h5>
                    <p class="card-text">
                        <?= $produto->descricao ?>
                    </p>
                    <a href="produtos/view/<?= $produto->id ?>" class="btn btn-primary">Compre já</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>