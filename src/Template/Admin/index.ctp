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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
</head>
<body class="home">
    <header style="background-color: darkorange">
        <div class="header-image">
            <?= $this->Html->image('logo.png') ?>
            <h1>Bienvenido <?php   $session = $this->request->session();
                $user_data = $session->read('Auth.User.user');
                if(!empty($user_data)){
                    print_r($user_data);
                }?></h1>
            <h3 style="color: white">Este es el panel de administrador</h3>
            <div> <a href="/users/logout" class="button">Salir del sistema</a></div>
            <div style="height: 10px"></div> <?= $this->Html->image('http://cakephp.org/img/logo-cake.png') ?> </div>
            <div></div>

        </div>
    </header>
    <div id="content">
        <div class="row">

            <div class="columns large-6">
                <h3>Usuarios</h3>
                <ul>
                    <li><a  href="users/add">Agregar usuarios</a></li>
                    <li><a  href="users">Listar, editar y eliminar usuarios</a></li>
                </ul>
                <p>
            </div>
            <div class="columns large-6">
                <h3>Especialistas</h3>
                <ul>
                    <li><a  href="specialists/add">Agregar especialistas</a></li>
                    <li><a  href="specialists">Listar, editar y eliminar especialistas</a></li>
                </ul>
                <p>
            </div>
            <div class="columns large-6">
                <h3>Servicios</h3>
                <ul>
                    <li><a  href="services/add">Agregar servicios</a></li>
                    <li><a  href="services">Listar, editar y eliminar servicios</a></li>
                </ul>
                <p>
            </div>
            <div class="columns large-6">
                <h3>Sesiones</h3>
                <ul>
                    <li><a  href="sesions/add">Agregar sesions</a></li>
                    <li><a  href="sesions">Listar, editar y eliminar sesions</a></li>
                </ul>
                <p>
            </div>
            <div class="columns large-6">
                <h3>Agendas</h3>
                <ul>
                    <li><a  href="schedules/add">Agregar Agenda</a></li>
                    <li><a  href="schedules">Listar, editar y eliminar agendas</a></li>
                </ul>
                <p>
            </div>
            <div class="columns large-6">
                <h3>Clientes</h3>
                <ul>
                    <li><a  href="clients/add">Agregar cliente</a></li>
                    <li><a  href="clients">Listar, editar y eliminar cliente</a></li>
                </ul>
                <p>
            </div>
            <div class="columns large-6">
                <h3>Pagos</h3>
                <ul>
                    <li><a  href="payments/add">Agregar pagos</a></li>
                    <li><a  href="payments">Listar, editar y eliminar pagos</a></li>
                </ul>
                <p>
            </div>

            <div class="columns large-6">  </div>

        </div>
    </div>
</body>
</html>
