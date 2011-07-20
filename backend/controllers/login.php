<?php

class Login extends Controller {

	function Login()
	{
		parent::Controller();	
	}
	
	function index()
	{
            
            if($this->session->userdata('logged_in')) {
                
                redirect('Dashboard');   
                
            }else{
                
               $this->load->view('login_view');
            }
            
              
	}
        
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
