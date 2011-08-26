<?php


/**
 * Mensagens
 * 
 * @package Backend
 * @subpackage controllers   
 * @author sistema
 * @copyright Gregori Maus
 * @version 2011
 * @access public
 */
class Mensagens extends Controller {

	/**
	 * Mensagens::Mensagens()
	 * 
	 * @return
	 */
	function Mensagens()
	{
		parent::Controller();	
	}
        
        
	/**
	 * Mensagens::index()
	 * 
	 * @return
	 */
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