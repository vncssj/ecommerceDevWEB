<div class="cotainer">
    <h1 class="titulos">Fale conosco</h1>
    <div class="alert alert-success hide" id="mensagem">Obrigado, logo entraremos em contato.</div>
    <div class="col-6 offset-3">
        <?= $this->Form->create(null) ?>
        <?= $this->Form->control('nome', ['class' => 'form-control']) ?>
        <?= $this->Form->control('email', ['class' => 'form-control']) ?>
        <?= $this->Form->control('mensagem', ['class' => 'form-control', 'type' => 'textarea']) ?>
        <div class="clearfix">&nbsp</div>
        <?= $this->Form->button('Enviar', ['class' => 'btn btn-info col-4 offset-4', 'id' => 'enviar']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<script>
    $("#enviar").click(function(evt) {
        evt.preventDefault();
        $("#mensagem").removeClass('hide');
    });
</script>
