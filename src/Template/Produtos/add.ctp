<div class="col-12">
    <?= $this->Form->create($produto) ?>
    <fieldset>
        <legend class="titulos">Novo Produto</legend>

        <div class="form-inline">
            <div class="col-8">
                <?= $this->Form->control('nome'); ?>
            </div>
            <div class="col-4">
                <?= $this->Form->control('categoria_id', ['style' => 'margin-bottom: 1rem; padding: 0;', 'empty' => 'Categoria']); ?>
            </div>
        </div>
        <div class="form-inline">

            <div class="col-6">
                <?= $this->Form->control('valor_compra'); ?>
            </div>
            <div class="col-6">
                <?= $this->Form->control('valor_venda'); ?>
            </div>
        </div>
        <div class="col-12">
            <?= $this->Form->control('descricao'); ?>
        </div>
    </fieldset>
    <div class="clearfix">&nbsp</div>
    <div class="centralizar">
        <?= $this->Form->button('Salvar', ['class' => 'btn btn-info col-4']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>