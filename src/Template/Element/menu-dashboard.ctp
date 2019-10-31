<nav class="menu-dashboard">
    <ul>
        <div id="pedidos">
            <?= $this->Html->link($this->Html->tag('li', 'Dash'), ['controller' => 'Users', 'action' => 'dashboard'], ['escape' => false]) ?>
        </div>
        <div id="pedidos">
            <?= $this->Html->link($this->Html->tag('li', 'Pedidos'), ['controller' => 'Pedidos', 'action' => 'index'], ['escape' => false]) ?>
        </div>
        <div id="produtos">
            <?= $this->Html->link($this->Html->tag('li', 'Produtos'), ['controller' => 'Produtos', 'action' => 'index'], ['escape' => false]) ?>
        </div>
        <div id="usuarios">
            <?= $this->Html->link($this->Html->tag('li', 'Usuários'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?>
        </div>
    </ul>
</nav>
