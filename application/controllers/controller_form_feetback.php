<?php
/**
 * 
 */
class Controller_Form_Feetback extends Controller
{
	
	function __construct()
	{
		$this->model = new Model_Form_Feetback();
		$this->view = new View();
	}

	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('form_feetback_view.php', 'template_view.php', $data);
	}
}
