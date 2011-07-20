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
class sublinksmenu extends Controller {

	function Sublinksmenu()
	{
		parent::Controller();	
	}
        
        
	function index()
	{                      
            
            $this->load->model('sublinks_menu_model');
            
            if($this->session->userdata('logged_in')) {
                
                    $data['grao'] = array ('Conteúdo','Menu','Sub Menu');                

                    $data['menus'] = $this->sublinks_menu_model->get_all();               

                    //ESTA VIEW SEMPRE ANTES DOS OUTROS
                    $this->load->view('dashboard_view',$data);

                    $this->load->view('dashboard_sublinks_menu');
                
            }else{
                
                redirect('Login');
                
            }
            
        }
        
        
        function novo_link(){
            
            
            $this->load->model('sublinks_menu_model');
            
            $data = $this->input->post('menu');         
            
               
            if ($this->menu_model->add_records($data)){                  
                  
                    $this->message->set('Seção cadastrada com Sucesso!','success');
                    
                    redirect('Menu');
            }           
            
        }
        
        
        function menu_delete(){
            
             $this->load->model('menu_model');
             
             if($this->menu_model->delete_records()){
                 
                 redirect('Menu');
                 
             }                        
        }
        
        
}

?>
