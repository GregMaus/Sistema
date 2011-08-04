<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mensagens
 *
 * @author Greg
 */
class Mensagens extends Controller {

	function Mensagens()
	{
		parent::Controller();	
	}
        
        
	function index()
	{
            
            if($this->session->userdata('logged_in')) {
                
                $data['grao'] = array ('Conteúdo','Mensagens');   
                
                
                //ESTA VIEW SEMPRE ANTES DOS OUTROS
		$this->load->view('dashboard_view',$data);
                
                $this->load->view('mensagens/index');
                
            }else{
                
                redirect('Login');
                
            }
            
        }
}

?>