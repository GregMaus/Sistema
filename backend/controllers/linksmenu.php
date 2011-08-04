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
            $this->load->model('menu_model');
            
            if($this->session->userdata('logged_in')) {
                
                    $data['grao'] = array ('Conteúdo','Menu','Links Menu');                

                    $data['links'] = $this->links_menu_model->get_all();   
                    $data['menus'] = $this->menu_model->get_all(); 

                    //ESTA VIEW SEMPRE ANTES DOS OUTROS
                    $this->load->view('dashboard_view',$data);

                    $this->load->view('links/index');
                
            }else{
                
                redirect('Login');
                
            }
            
        }
        
        
        function novo_link(){
            
            
            $this->load->model('links_menu_model');
            
            $data = array(

                'adm_menu_id_adm_menu' => $this->input->post('menu'),
                'label'  => $this->input->post('label'),
                'anchor'  => $this->input->post('link'),

            );            
               
            if ($this->links_menu_model->add_records($data)){                  
                  
                    $this->message->set('Sub Link cadastrado com Sucesso!','success');
                    
                    redirect('Linksmenu');
            }           
            
        }
        
        
        function link_delete(){
            
            $this->load->model('links_menu_model');
             
             if($this->links_menu_model->delete_records()){
                 
                 redirect('Linksmenu');
                 
             }                        
        }
        
        function link_edit($id){


                    $this->load->model('links_menu_model');
                    $this->load->model('menu_model');
                    
                    $data['menus'] = $this->menu_model->get_all(); 

                    $data['link'] = $this->links_menu_model->get_by_id($id);
                    

                        $data['grao'] = array ('Conteúdo','Link','Editar link');                

                       //ESTA VIEW SEMPRE ANTES DOS OUTROS
                        $this->load->view('dashboard_view',$data);

                        $this->load->view('links/edit');      
                }


        function link_update($id){

                    $this->load->model('links_menu_model');                    

                    $this->form_validation->set_rules('menu','menu','required');
                    $this->form_validation->set_rules('label','label','trim|required');
                    $this->form_validation->set_rules('link','link','trim|required');

                    if($this->form_validation->run()){

                        $options = array (

                            'menu' => $_POST['menu'],
                            'label' => $_POST['label'],
                            'link' => $_POST['link'],
                            'id' => $id                    

                        );                

                            if($this->links_menu_model->update_record($options)){

                                redirect('Linksmenu');

                            }   

                    }else{

                        $this->form_validation->set_message('rule', 'Error Message');
                        redirect('Linksmenu/link_edit/'.$id);

                    }

                }
        
        
}

?>
