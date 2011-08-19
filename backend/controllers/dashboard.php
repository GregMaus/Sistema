<?php

class Dashboard extends Controller
{

    function Dashboard()
    {
        parent::Controller();
    }


    function index()
    {
        if ($this->session->userdata('logged_in')) {

            $data['grao'] = array('Dashboard');

                
            //ESTA VIEW SEMPRE ANTES DOS OUTROS
            $this->load->view('dashboard_view', $data);

            $this->load->view('dashboard_main');

        } else {

            redirect('Login');

        }

    }


    function Logout()
    {


        $this->simplelogin->logout();
        redirect('Login');


    }

}
