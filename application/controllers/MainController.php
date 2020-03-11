<?php
/**
 * 
 */
namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    
    function indexAction()
    {
        
        $data = $this->model->getData();
        $this->view->render('Главная страница', $data);
    }
}