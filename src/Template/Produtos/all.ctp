<div class="flex">

    <div class="filtros-produtos">
        <legend class="text-center">FILTROS</legend>
        <?= $this->Form->control('categorias', ['options' => $categorias, 'empty' => 'Categorias', 'label' => false]) ?>
        <div class="form-inline">
            <?= $this->Form->control('preco-min', ['type' => 'range', 'value' => 0, 'label' => 'Preço mínimo', 'value' => '0', 'min' => 0, 'max' => 10000]) ?>
            <?= $this->Form->control('readonly-min', ['value' => 0, 'class' => 'r20', 'readonly', 'label' => false]) ?>
        </div>
        <div class="form-inline">
            <?= $this->Form->control('preco-max', ['type' => 'range', 'value' => 0, 'label' => 'Preço máximo', 'value' => '10000', 'min' => 0, 'max' => 10000]) ?>
            <?= $this->Form->control('readonly-max', ['value' => 10000, 'class' => 'r20', 'readonly', 'label' => false]) ?>
        </div>
        <div class="text-center">
            <?= $this->Form->button('Filtrar', ['class' => 'btn-filtrar']) ?>
        </div>
    </div>
    <div class="produtos">
        <div class="w-100 text-center page-title-produtos">Produtos</div>
        <div class="w-100 flex" style="flex-wrap: wrap;">
            <?php foreach ($produtos as $produto) : ?>
                <div class="col-2" style="margin-top: 20px;">
                    <div class="card" style="max-height: 300px; height: 100%; overflow: hidden; margin-top: 20px;" product=<?= $produto->id ?>>
                        <div class="card-title">
                            <div class="text-center"><?= $produto->nome ?></div>
                        </div>
                        <?php if (count($produto->images) > 0) : ?>
                            <?= $this->Html->image('produtos/' . $produto->images[0]->nome); ?>
                        <?php else : ?>
                            <?= $this->Html->image('sem-imagem.png'); ?>
                        <?php endif; ?>
                        <div class="card-footer-hover w-100">
                            Por apenas: R$ <strong><?= $this->Number->format($produto->valor_venda, ['places' => 2, 'locale' => 'pt_br']) ?></strong>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    $("#preco-min").on('input', function() {
        $("#readonly-min").val($(this).val())
    });
    $("#preco-max").on('input', function() {
        $("#readonly-max").val($(this).val())
    });

    $(".card").click(function() {
        let produto = $(this).attr('product');
        window.location.href = "<?= $this->request->webroot ?>produtos/view/" + produto;
    })
</script>
