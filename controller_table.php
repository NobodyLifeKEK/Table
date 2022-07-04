<?php

class Controller_Table extends Controller
{

	function __construct()
	{
		$this->model = new Model_Table();
		$this->view = new View();
	}

	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('table_view.php', 'template_view.php', $data);
	}
}
