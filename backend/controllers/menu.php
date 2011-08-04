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
class menu extends Controller {

	function Menu()
	{
		parent::Controller();	
	}
        
        
	function index()
	{                      
            
            $this->load->model('menu_model');
            
            if($this->session->userdata('logged_in')) {
                
                    $data['grao'] = array ('Conteúdo','Menu');                

                    $data['menus'] = $this->menu_model->get_all();               

                    //ESTA VIEW SEMPRE ANTES DOS OUTROS
                    $this->load->view('dashboard_view',$data);

                    $this->load->view('menu/index');
                
            }else{
                
                redirect('Login');
                
            }
            
        }
        
        
        function novo_menu(){
            
            
            $this->load->model('menu_model');
            
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
        
        function menu_edit($id){
            
            $this->load->model('menu_model');
            
            $data['menu'] = $this->menu_model->get_by_id($id);

                $data['grao'] = array ('Conteúdo','Menu','Editar menu');                

                //ESTA VIEW SEMPRE ANTES DOS OUTROS
                $this->load->view('dashboard_view',$data);

                $this->load->view('menu/edit');         
            
        }
        
        function menu_update($id){
            
            $this->load->model('menu_model');
           
            $this->form_validation->set_rules('menu','menu','trim|required');
            
            if($this->form_validation->run()){
                
                $options = array (
                    
                    'menu' => $_POST['menu'],
                    'id' => $id                    
                    
                );                
               
                        if($this->menu_model->update_record($options)){

                            redirect('Menu');

                        }   
           
            }else{
                
                redirect('Menu/menu_edit/'.$id);
                
            }

        }
        
        
}

?>
