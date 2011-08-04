<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of secao
 *
 * @author Gregori
 */
class Secao extends Controller {

	function Secao()
	{
		parent::Controller();	
	}
        
        
        /*
         * FUNÇÕES RELACIONADAS AS VIEWS
         */
        
	function index()
	{                      
            
            $this->load->model('secao_model');
            
            if($this->session->userdata('logged_in')) {
                
                    $data['grao'] = array ('Conteúdo','Seção');                

                    $data['secoes'] = $this->secao_model->get_all();               

                    //ESTA VIEW SEMPRE ANTES DOS OUTROS
                    $this->load->view('dashboard_view',$data);

                    $this->load->view('secao/index');
                
            }else{
                
                redirect('Login');
                
            }
            
        }
        
        function secao_success (){
            
            $this->message->set('Seção cadastrada com Sucesso!','success');
            $this->load->model('secao_model');
            
            if($this->session->userdata('logged_in')) {
                
                    $data['grao'] = array ('Conteúdo','Seção');                

                    $data['secoes'] = $this->secao_model->get_all();               

                    //ESTA VIEW SEMPRE ANTES DOS OUTROS
                    $this->load->view('dashboard_view',$data);

                    $this->load->view('secao/index');
            }
            
        }
        
    
        /*
         * FIM DAS FUNÇÕES DA VIEW
         */
        
        
        
        /*
         * FUNÇÕES DE CRUD
         */
        function nova_secao(){
            
            
            $this->load->model('secao_model');
            
            $data = $this->input->post('secao');              
               
            if ($this->secao_model->add_records($data)){                  
                  
                    $this->message->set('Seção cadastrada com Sucesso!','success');
                    
                    redirect('Secao');
            }           
            
        }
        
        
        function secao_delete(){
            
             $this->load->model('secao_model');
             
             if($this->secao_model->delete_records()){
                 
                 redirect('Secao');
                 
             }                        
        }
        
        
        function secao_edit($id){

            
            $this->load->model('secao_model');
            
            $data['secao'] = $this->secao_model->get_by_id($id);

                $data['grao'] = array ('Conteúdo','Seção','Editar seção');                

               //ESTA VIEW SEMPRE ANTES DOS OUTROS
                $this->load->view('dashboard_view',$data);

                $this->load->view('secao/edit');      
        }
        
        
        function secao_update($id){
            
            $this->load->model('secao_model');
           
            $this->form_validation->set_rules('secao','secao','trim|required');
            
            if($this->form_validation->run()){
                
                $options = array (
                    
                    'secao' => $_POST['secao'],
                    'id' => $id                    
                    
                );                
               
                        if($this->secao_model->update_record($options)){

                            redirect('Secao');

                        }   
           
            }else{
                
                redirect('Secao/secao_edit/'.$id);
                
            }

        }
        
        
}

?>
