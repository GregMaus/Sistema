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
            $this->load->model('links_menu_model');
            
            if($this->session->userdata('logged_in')) {
                
                    $data['grao'] = array ('Conteúdo','Menu','Sub Menu');                

                    $data['links'] = $this->links_menu_model->get_all();
                    $data['sublinks'] = $this->sublinks_menu_model->get_all();               

                    //ESTA VIEW SEMPRE ANTES DOS OUTROS
                    $this->load->view('dashboard_view',$data);

                    $this->load->view('sublinks/index');
                
            }else{
                
                redirect('Login');
                
            }
            
        }
        
        
        function novo_sublink(){
            
            
            $this->load->model('sublinks_menu_model');
            
            $data = array(
                
                'adm_links_menu_id_adm_links_menu' => $this->input->post('links'),
                'label'  => $this->input->post('label'),
                'anchor'  => $this->input->post('link'),

            );         
            
               
            if ($this->sublinks_menu_model->add_records($data)){                  
                  
                    $this->message->set('Seção cadastrada com Sucesso!','success');
                    
                    redirect('Sublinksmenu');
            }           
            
        }
        
        
        function sublink_delete(){
            
              $this->load->model('sublinks_menu_model');
             
             if($this->sublinks_menu_model->delete_records()){
                 
                 redirect('Sublinksmenu');
                 
             }                        
        }
        
        
        function sublink_edit($id){


                    $this->load->model('sublinks_menu_model');
                    $this->load->model('links_menu_model');


                    $data['links'] = $this->links_menu_model->get_all();
                    
                    $data['sublink'] = $this->sublinks_menu_model->get_by_id($id);                   
                    

                        $data['grao'] = array ('Conteúdo','Sublink','Editar sublink');                

                       //ESTA VIEW SEMPRE ANTES DOS OUTROS
                        $this->load->view('dashboard_view',$data);

                        $this->load->view('sublinks/edit');      
                }


        function sublink_update($id){

                    $this->load->model('sublinks_menu_model');                    

                    $this->form_validation->set_rules('links','links','required');
                    $this->form_validation->set_rules('label','label','trim|required');
                    $this->form_validation->set_rules('link','link','trim|required');

                    if($this->form_validation->run()){

                        $options = array (

                            'links' => $_POST['links'],
                            'label' => $_POST['label'],
                            'link' => $_POST['link'],
                            'id' => $id                    

                        );                

                            if($this->sublinks_menu_model->update_record($options)){

                                redirect('Sublinksmenu');

                            }else{
                                
                                redirect('Sublinksmenu/sublink_edit/'.$id);
                                
                            }   

                    }else{

                        $this->form_validation->set_message('rule', 'Error Message');
                        redirect('Sublinksmenu/sublink_edit/'.$id);

                    }

                }
        
        
}

?>
