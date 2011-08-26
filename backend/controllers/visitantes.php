<?php


/**
 * Visitantes
 * 
 * @package Backend
 * @subpackage controllers   
 * @author sistema
 * @copyright Gregori Maus
 * @version 2011
 * @access public
 */
class Visitantes extends Controller {

	/**
	 * Visitantes::Visitantes()
	 * 
	 * @return
	 */
	function Visitantes()
	{
		parent::Controller();	
	}
        
        
	/**
	 * Visitantes::index()
	 * 
	 * @return
	 */
	function index()
	{
            
            if($this->session->userdata('logged_in')) {
                
                $data['grao'] = array ('Conteúdo','Visitantes');   
                
                
                //ESTA VIEW SEMPRE ANTES DOS OUTROS
		$this->load->view('dashboard_view',$data);
                
                $this->load->view('visitantes/index');
                
            }else{
                
                redirect('Login');
                
            }
            
        }
}

?>
