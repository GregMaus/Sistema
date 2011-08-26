<?php

/**
 * Dashboard
 * Controler da página inicial do sistema.
 * 
 * @package Backend
 * @subpackage controllers 
 * @author sistema
 * @copyright Gregori Maus
 * @version 2011
 * @access public
 */
class Dashboard extends Controller
{

    /**
     * Dashboard::Dashboard()
     * @access public   
     */
    public function Dashboard()
    {
        parent::Controller();
    }


    /**
     * Dashboard::index()
     * 
     * @access public
     * @return $data
     */
    public function index()
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


    /**
     * Dashboard::Logout()
     * 
     * Método que quebra a seção deslogando seguramente.
     * 
     * @see Simplelogin:: logout()      
     * @return void
     * @access public
     * 
     */
    public function Logout()
    {


        $this->simplelogin->logout();
        redirect('Login');


    }

}
