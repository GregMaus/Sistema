<?php

class Dashboard extends Controller {

	function Dashboard()
	{
		parent::Controller();	
	}
	
	function index()
	{
               // $this->load->view('header');
		$this->load->view('debug');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */