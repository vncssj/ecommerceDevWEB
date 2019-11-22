<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Techshop';
$session = $this->getRequest()->getSession();
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('estilo.css') ?>
    <?= $this->Html->css('all.css') ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script('moeda') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" crossorigin="anonymous"></script>
</head>

<body>
    <?= $this->Flash->render() ?>
    <div class="jumbotron" style="border-radius:0%;margin-bottom: 0; background-image: url('<?= $this->request->getAttribute('webroot') ?>img/bg.jpg'); background-position: 30% 70%;">
        <?php if ($session->read('Auth.User')) : ?>
            <div class="links-superiores">
                <div class="dropdown">
                    <?= $this->Html->link($this->Html->Tag('i', '', ['class' => 'fas fa-user-circle']) . ' Olá ' . $session->read('Auth.User.nome') . '!', '#', ['role' => 'button', 'id' => 'dropdown-user', 'data-toggle' => 'dropdown', 'escape' => false, 'class' => 'bem-vindo']) ?>
                    <div class="dropdown-menu" aria-labelledby="dropdown-user">
                        <?= $this->Html->link('Carrinho', ['controller' => 'Users', 'action' => 'cart'], ['class' => 'dropdown-item link-conta', 'escape' => false]) ?>
                        <?= $this->Html->link('Minha Conta', ['controller' => 'Users', 'action' => 'minhaConta'], ['class' => 'dropdown-item link-conta', 'escape' => false]) ?>
                        <?= $this->Html->link('Sair', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'dropdown-item link-conta', 'escape' => false]) ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <?= $this->Html->link($this->Html->Tag('i', '', ['class' => 'fas fa-user-circle']) . ' Entrar', ['controller' => 'Users', 'action' => 'login'], ['class' => 'link-entrar', 'escape' => false]) ?>
        <?php endif; ?>
        <h1 id="titulo-principal"><a href="<?= $this->request->getAttribute('webroot') ?>">TechShop</a></h1>
    </div>
    <div class="menu">
        <div class="col-4 offset-4">
            <nav>
                <ul>
                    <li><?= $this->Html->link('Inicio', '/', ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('Produtos', ['controller' => 'produtos', 'action' => 'all'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('Sobre', ['controller' => 'Pages', 'action' => 'sobre'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('Contate-nos', ['controller' => 'Pages', 'action' => 'contateNos'], ['escape' => false]) ?></li>
                </ul>
            </nav>
        </div>
        <div class="col-4 search">
            <?= $this->Form->control('pesquisar', ['placeholder' => 'Encontre seu produto...', 'label' => false, 'class' => 'search-input']); ?>
        </div>
    </div>
    <?php if ($session->read('Auth.User') !== null && $session->read('Auth.User.role') === 'admin') : ?>
        <?= $this->element('menu-dashboard') ?>
    <?php endif; ?>
    <?php if ($this->request->getParam('controller') === 'Produtos' && $this->request->getParam('action') == 'home') : ?>
        <div class="col-12 container-carousel">
            <div class="col-8 offset-2">
                <div id="carousel-principal" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?= $this->Html->image('slide/banner1.png', ['class' => 'd-block w-100', 'alt' => 'banner 1']) ?>
                        </div>
                        <div class="carousel-item">
                            <?= $this->Html->image('slide/banner2.png', ['class' => 'd-block w-100', 'alt' => 'banner 2']) ?>
                        </div>
                        <div class="carousel-item">
                            <?= $this->Html->image('slide/banner3.png', ['class' => 'd-block w-100', 'alt' => 'banner 3']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="container-fluid">
        <?= $this->fetch('content') ?>
    </div>
    <footer class="text-center">
        Copyright © 2019 | TechShop
    </footer>
</body>

</html>
