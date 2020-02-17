<?php
/**
 * 
 */

class Controller_Register extends Controller {
	
	function __construct()
	{
		$this->model = new Model_Register();
		$this->view = new View();
	}

	function action_index() {
		if (isset($_POST) and !empty($_POST)) {
			$this->model->set_data($_POST);
		}
		
		$this->view->generate('register_view.php', 'template_view.php');
	}
}