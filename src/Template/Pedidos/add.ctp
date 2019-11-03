
<div class="pedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <legend><?= __('Add Pedido') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('total');
            echo $this->Form->control('forma_pagamento');
            echo $this->Form->control('parcela');
            echo $this->Form->control('frete');
            echo $this->Form->control('produtos._ids', ['options' => $produtos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
