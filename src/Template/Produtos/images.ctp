<style>
    .card {
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .card-add:hover {
        background-color: #f5f5f5;
    }

    .card-add:hover .card-title {
        text-decoration-line: underline;
        cursor: pointer;
    }

    #card-add-after {
        min-height: 194px;
        display: none;
        padding-top: 20px;
    }
</style>
<div class="card col-3 card-add" style="width: 18rem;">
    <div id="card-add-before">
        <div class="centralizar card-img-top">
            <i class="fas fa-plus-circle" style="font-size: 50pt; margin-top: 50px;"></i>
        </div>
        <div class="card-body">
            <h5 class="card-title centralizar">Adicionar Imagem</h5>
        </div>
    </div>
    <div id="card-add-after">
        <?= $this->Form->create('upImages', ['enctype' => 'multipart/form-data']); ?>
        <?= $this->Form->file('Images[]', ['label' => 'Arquivo de Imagem', 'multiple' => true, 'accept' => 'image/*']); ?>
        <?= $this->Form->button('Cancelar', ['class' => 'btn btn-light', 'type' => 'button', 'id' => 'cancel-add']); ?>
        <?= $this->Form->button('Enviar', ['class' => 'btn btn-primary']); ?>
        <?= $this->Form->end(); ?>
    </div>
</div>
<div class="row" style="margin-left: 0px; marin-right: 0px;">
    <?php foreach ($images as $image) : ?>
        <div class="card col-3 img-card" style="width: 18rem;">
            <?= $this->Html->image('produtos/' . $image->nome, ['class' => 'card-img-top']) ?>
            <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-times']), ['controller' => 'images', 'action' => 'delete', $image->id, $image->produto_id], ['class' => 'btn-excluir', 'escape' => false]) ?>
        </div>
    <?php endforeach; ?>
</div>
<script>
    $("#card-add-before").click(() => {
        $("#card-add-before").hide();
        $("#card-add-after").show();
    });
    $("#cancel-add").click((evt) => {
        evt.preventDefault();
        $("#card-add-after").hide();
        $("#card-add-before").show();
    });
</script>
