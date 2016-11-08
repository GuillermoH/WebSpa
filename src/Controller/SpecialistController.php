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


class SpecialistController extends AppController
{
    public function index()
    {

    }

    public function isAuthorized($user)
    {
        if ($this->Auth->user('role') != 'ROLE_SPEC'){
            return false;
        }else{
            return true;
        }

        return parent::isAuthorized($user);
    }

}