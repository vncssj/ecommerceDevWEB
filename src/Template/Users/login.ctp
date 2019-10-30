<div class="row" style="margin-top: 10px;">
    <div class="col-6" style="border-right: 1px solid #f28181">
        <legend style="font-family: 'Montserrat'; margin: 50px;">Já é nosso cliente?</legend>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'login']]) ?>
        <div class="col-8">
            <?= $this->Form->control('email', ['label' => 'Email:']) ?>
        </div>
        <div class="col-8">
            <?= $this->Form->control('password', ['label' => 'Senha:']) ?>
        </div>
        <?= $this->Form->button('Entrar', ['class' => 'btn-login col-4 offset-2']) ?>
        <?= $this->Form->end() ?>
        <div class="clearfix">&nbsp</div>
        <?= $this->Html->link('Esqueceu sua senha?', '#') ?>
    </div>
    <div class="col-6">
        <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'add']]) ?>
        <legend style="font-family: 'Montserrat'; margin: 50px;">Cadastre-se</legend>
        <?= $this->Form->control('nome', ['label' => 'Nome:']) ?>
        <?= $this->Form->control('sobrenome', ['label' => 'Sobrenome:']) ?>
        <?= $this->Form->control('email', ['label' => 'Email:']) ?>
        <?= $this->Form->control('telefone', ['label' => 'Telefone:']) ?>
        <?= $this->Form->control('endereco', ['label' => 'Endereco:']) ?>
        <?= $this->Form->control('password', ['label' => 'Senha:']) ?>
        <?= $this->Form->button('Concluir', ['class' => 'btn-login col-4 offset-4']) ?>
        <?= $this->Form->end() ?>
        <div class="clearfix">&nbsp</div>
    </div>
</div>
