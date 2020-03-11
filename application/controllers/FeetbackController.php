<?php
/**
 * 
 */
namespace application\controllers;

use application\core\Controller;

class FeetbackController extends Controller
{
    function formAction()
    {
        if (!empty($_POST)) $this->model->setData($_POST);
        $this->view->render('Оставить отзыв');
    }

    function showAction()
    {
        $data = $this->model->getData();
        $this->view->render('Страница отзывов', $data);
    }
}
