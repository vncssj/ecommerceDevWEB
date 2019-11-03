<nav class="menu-dashboard">
    <ul>
        <div class="link-dash" id="categorias">
            <?= $this->Html->link($this->Html->tag('li', 'Categorias'), ['controller' => 'Categorias', 'action' => 'index'], ['escape' => false]) ?>
        </div>
        <div class="link-dash" id="dash">
            <?= $this->Html->link($this->Html->tag('li', 'Dash'), ['controller' => 'Users', 'action' => 'dashboard'], ['escape' => false]) ?>
        </div>
        <div class="link-dash" id="pedidos">
            <?= $this->Html->link($this->Html->tag('li', 'Pedidos'), ['controller' => 'Pedidos', 'action' => 'index'], ['escape' => false]) ?>
        </div>
        <div class="link-dash" id="produtos">
            <?= $this->Html->link($this->Html->tag('li', 'Produtos'), ['controller' => 'Produtos', 'action' => 'index'], ['escape' => false]) ?>
        </div>
        <div class="link-dash" id="usuarios">
            <?= $this->Html->link($this->Html->tag('li', 'Usuários'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?>
        </div>
    </ul>
</nav>
