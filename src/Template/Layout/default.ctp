<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'WebSpa';
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
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <div class="large-12">
            <ul class="title-area large-3 medium-4 columns">
                <li class="name">
                    <h1><a href="/">Home</a></h1>
                </li>
            </ul>
            <div class="large-6 medium-4 columns text-center">
                <h3 style="color: white">WebSpa - Grupo 4</h3>
            </div>
<!--            <ul class="title-area large-6 medium-4 columns">-->
<!--               <li>-->
<!--                   <h3>WebSpa</h3>-->
<!--               </li>-->
<!--            </ul>-->
            <ul class="title-area large-3 medium-4 columns right">
                <li class="name right">
                    <h1><a href="/users/logout">Salir del sistema</a></h1>
                </li>
            </ul>
        </div>

    </nav>
    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
