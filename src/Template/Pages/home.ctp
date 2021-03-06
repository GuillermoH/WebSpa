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

$session = $this->request->session();
$user_data = $session->read('Auth.User.role');
if(!empty($user_data)){
    if($user_data === 'ROLE_ADMIN'){
    echo "<script>
        window.location.replace(\"/admin\");
    </script>";
//        $this->redirect('/admin');
    }elseif ($user_data === 'ROLE_MAN'){
        echo "<script>
        window.location.replace(\"/manager\");
    </script>";
    }else{
        echo "<script>
        window.location.replace(\"/specialist\");
    </script>";
    }
}

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
    <header style="background-color:#c10020">
        <div class="header-image">
            <?= $this->Html->image('logo.png') ?>
            <h1>Proyecto para Ingenier&iacute;a de Software</h1>
            <h2 style="color: white">WebSpa</h2>
            <h3 style="color: white">Grupo: Alejandra Saavedra, Cesare Brice&ntilde;o y Guillermo Hellmund</h3>
            <div> <a href="/users/login" class="button">Iniciar Sesi&oacute;n</a> <a href="/users/add" class="button">Registrarse</a></div>
            <div style="height: 10px"></div> <?= $this->Html->image('http://cakephp.org/img/logo-cake.png') ?> </div>

        </div>
    </header>
    <div id="content">
        <div class="row">

            <div class="columns large-4">
                <h3>Usuario Administrador</h3>
                <p>Usuario: guillermo <br>
                Clave: 123123</p>
            </div>
            <div class="columns large-4">
                <h3>Usuario Gerente</h3>
                <p>Usuario: alejandra <br>
                    Clave: 123456</p>
            </div>
            <div class="columns large-4">
                <h3>Usuario Especialista</h3>
                <p>Usuario: bernardo <br>
                    Clave: 123456</p>
            </div>


        </div>
    </div>
</body>
</html>
