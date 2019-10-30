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
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('all.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <?= $this->Flash->render() ?>
    <div class="jumbotron" style="margin-bottom: 0; background-image: url('<?= $this->request->webroot ?>/img/bg.jpg'); background-position: 30% 70%;">
        <?php if ($session->read('Auth.User')) : ?>
            <span class="bem-vindo"> <?= $this->Html->Tag('i', '', ['class' => 'fas fa-user-circle']) ?> Olá <?= $session->read('Auth.User.nome') ?>! <?= $this->Html->link('Sair ' . $this->Html->Tag('i', '', ['class' => 'fas fa-sign-out-alt']), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false, 'class' => 'btn btn-sm btn-danger']) ?></span>
        <?php else : ?>
            <?= $this->Html->link($this->Html->Tag('i', '', ['class' => 'fas fa-user-circle']) . ' Entrar', ['controller' => 'Users', 'action' => 'login'], ['class' => 'link-entrar', 'escape' => false]) ?>
        <?php endif; ?>
        <h1 id="titulo-principal"><a href="<?= $this->request->webroot ?>">TechShop</a></h1>
    </div>
    <div class="menu">
        <div class="col-5 offset-4">
            <nav>
                <ul>
                    <a href="<?= $this->request->webroot ?>">
                        <li>Inicio</li>
                    </a>
                    <a href="#">
                        <li>Produtos</li>
                    </a>
                    <a href="/sobre">
                        <li>Sobre</li>
                    </a>
                    <a href="/contate-nos">
                        <li>Contate-nos</li>
                    </a>
                </ul>
            </nav>
        </div>
        <div class="search">
            <?= $this->Form->input('pesquisar', ['placeholder' => 'Encontre seu produto...', 'label' => false, 'class' => 'search-input']); ?>
        </div>
    </div>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer class="text-center">
        Copyright © 2019 | TechShop
    </footer>
</body>

</html>
