<?php

class midia extends Controller
{

    function Midia()
    {
        parent::Controller();
    }


    function index()
    {
        if ($this->session->userdata('logged_in')) {

            $data['grao'] = array('Midia','File Manager');


            //ESTA VIEW SEMPRE ANTES DOS OUTROS
            $this->load->view('dashboard_view', $data);

            $this->load->view('dashboard_main');

        } else {

            redirect('Login');

        }

    }
    
}
    
    
?>