<?php
/**
 * 
 */
class Controller_Form_Feetback extends Controller
{
	
	function __construct() {
		$this->model = new Model_Form_Feetback();
		$this->view = new View();
	}

	function action_index()
	{
		if (!empty($_POST)) $this->model->set_data($_POST);
		$this->view->generate('form_feetback_view.php', 'template_view.php');
	}
}
