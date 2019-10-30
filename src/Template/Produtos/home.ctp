<style>
    .card {
        margin-top: 20px;
        padding: 0px;
    }
</style>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="webroot/img/slide/banner1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="webroot/img/slide/banner2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="webroot/img/slide/banner3.png" class="d-block w-100" alt="...">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 text-center">
        <h2 class="titulo-inicial">Nossos Novos Produtos</h2>
    </div>
    <?php if (isset($produtos)) : ?>
        <?php foreach ($produtos as $produto) : ?>
            <div class="card" style="width: 18rem; margin-left: 5px;margin-right: 5px;">
                <?php if (count($produto->images) > 0) : ?>
                    <?= $this->Html->image('produtos/' . $produto->images[0]->nome, ['class' => 'card-img-top']); ?>
                <?php endif; ?>
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $produto->nome ?></h5>
                </div>
                <div class="card-footer preco_link">
                    <div class="preco">
                        <?= $this->Number->format($produto->valor_venda, ['before' => 'R$ ', 'locale' => 'pt_BR']) ?>
                    </div>
                    <a href="produtos/view/<?= $produto->id ?>" class="btn btn-compre">Compre já</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
