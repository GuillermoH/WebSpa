<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/10/16
 * Time: 08:58 PM
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


class AdminController extends AppController
{
    public function index()
    {
        echo $this->params['action'];

    }


    public function isAuthorized($user)
    {
        if ($this->Auth->user('role') != 'ROLE_ADMIN'){
            return false;
        }else{
            return true;
        }

        return parent::isAuthorized($user);
    }

}