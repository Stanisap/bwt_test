<?php
/**
 * 
 */
class Controller_Show_Feetback extends Controller {

	public function __construct() {
		$this->model = new Model_Show_Feetback();
		$this->view = new View();
	}
	
	function action_index() {
		$data = $this->model->get_data();
		$this->view->generate('show_feetback_view.php', 'template_view.php', $data);
	}
}