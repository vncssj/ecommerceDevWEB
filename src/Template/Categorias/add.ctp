<h3 class="titulos">Nova Categoria</h3>
<?= $this->Form->create($categoria) ?>
<div class="form-inline">
    <div class="col-8">
        <fieldset>
            <?= $this->Form->control('nome'); ?>
        </fieldset>
    </div>
    <div class="col-4">
        <?= $this->Form->button(__('Salvar'), ['class' => 'btn-add']) ?>
    </div>
</div>
<?= $this->Form->end() ?>