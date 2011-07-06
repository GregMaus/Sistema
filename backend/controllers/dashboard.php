<?php

class Dashboard extends Controller {

	function Dashboard()
	{
		parent::Controller();	
	}
	
	function index()
	{
            if($this->session->userdata('logged_in')) {
                
                // $this->load->view('header');
		$this->load->view('debug');
                
            }else{
                
                redirect('Login');
                
            }

	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */