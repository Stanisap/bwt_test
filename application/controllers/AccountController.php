<?php
/**
 * 
 */

namespace application\controllers;

use application\core\Controller;
use application\core\Model;

class AccountController extends Controller
{

    function registerAction()
    {
    	if (!empty($_POST)) $this->model->setData($_POST);
        $this->view->render('Страница регистрации');
    }
}