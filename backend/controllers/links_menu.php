<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu
 *
 * @author Gregori
 */
class linksmenu extends Controller {

	function Linksmenu()
	{
		parent::Controller();	
	}
        
        
	function index()
	{                      
            
            $this->load->model('links_menu_model');
            
            if($this->session->userdata('logged_in')) {
                
                    $data['grao'] = array ('Conteúdo','Menu','Links do Menu');                

                    $data['menus'] = $this->links_menu_model->get_all();               

                    //ESTA VIEW SEMPRE ANTES DOS OUTROS
                    $this->load->view('dashboard_view',$data);

                    $this->load->view('dashboard_menu');
                
            }else{
                
                redirect('Login');
                
            }
            
        }
        
        
        function novo_menu(){
            
            
            $this->load->model('links_menu_model');
            
            $data = $this->input->post('menu');         
            
               
            if ($this->menu_model->add_records($data)){                  
                  
                    $this->message->set('Seção cadastrada com Sucesso!','success');
                    
                    redirect('Menu');
            }           
            
        }
        
        
        function menu_delete(){
            
             $this->load->model('links_menu_model');
             
             if($this->menu_model->delete_records()){
                 
                 redirect('Menu');
                 
             }                        
        }
        
        
}

?>
