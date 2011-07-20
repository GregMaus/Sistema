<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of visitantes
 *
 * @author Greg
 */
class Visitantes extends Controller {

	function Visitantes()
	{
		parent::Controller();	
	}
        
        
	function index()
	{
            
            if($this->session->userdata('logged_in')) {
                
                $data['grao'] = array ('Conteúdo','Visitantes');   
                
                
                //ESTA VIEW SEMPRE ANTES DOS OUTROS
		$this->load->view('dashboard_view',$data);
                
                $this->load->view('dashboard_visitantes');
                
            }else{
                
                redirect('Login');
                
            }
            
        }
}

?>
