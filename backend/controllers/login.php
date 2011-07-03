<?php

class Login extends Controller {

	function Login()
	{
		parent::Controller();	
	}
	
	function index()
	{
              $this->load->view('login_view');
	}
        
        function entrar(){
            
            $login = $_POST['login'];
            $senha = md5($_POST['senha']);
            
            $this->load->model('usuario_model');
            
            
            if( $this->usuario_model->usuario_login($login,$senha) > 0){
                
                $this->load->view('debug');
                
            }else{
                
                redirect('Login');
                
            }           
            
           
            
        }
}

?>
