<?php
/**
 * 
 */
class Controller_Show_Feetback extends Controller
{
	
	function action_index()
	{
		$this->view->generate('show_feetback_view.php', 'template_view.php');
	}
}