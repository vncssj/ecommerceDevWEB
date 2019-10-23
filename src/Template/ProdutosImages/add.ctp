<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutosImage $produtosImage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Produtos Images'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtosImages form large-9 medium-8 columns content">
    <?= $this->Form->create($produtosImage) ?>
    <fieldset>
        <legend><?= __('Add Produtos Image') ?></legend>
        <?php
            echo $this->Form->control('titulo');
            echo $this->Form->control('nome');
            echo $this->Form->control('produto_id', ['options' => $produtos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
