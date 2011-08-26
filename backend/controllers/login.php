<?php

/**
 * Login
 * 
 * Controller referente ao sistema de login.
 * 
 * @package Backend
 * @subpackage controllers   
 * @author sistema
 * @copyright Gregori Maus
 * @version 2011
 * @access public
 */
class Login extends Controller {

	/**
	 * Login::Login()
	 * 
	 * @return
	 */
	function Login()
	{
		parent::Controller();	
	}
	
	/**
	 * Login::index()
	 * 
	 * @return
	 */
	function index()
	{
            
            if($this->session->userdata('logged_in')) {
                
                redirect('Dashboard');   
                
            }else{
                
               $this->load->view('login_view');
            }
            
              
	}
        
        /**
         * Login::entrar()
         * 
         * Função para realizar login no sistema.
         * 
         * @see Simplelogin::login
         * @return void
         */
        function entrar(){
            
            $login = $_POST['login'];
            $senha = md5($_POST['senha']);
            
            $this->load->model('usuario_model');
            
            $data = $this->usuario_model->usuario_login($login,$senha);
  
            
            if( $data->rows > 0){
                
//                // attempt to login
                if($this->simplelogin->login($data->login,$data->senha)) {
                    
                    redirect('Dashboard',$data);                   
                }           
                
            }else{
                
                redirect('Login');
                
            }     
            
        }
        
        

        
        
}

?>
