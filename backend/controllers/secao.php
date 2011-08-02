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
        
        function secao_fail (){
            
            
            
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
            
            $data['usuario'] = $this->usuario_model->get_by_id($id);
            
            $this->form_validation->set_rules('nome','nome','trim|required');
            
            if($this->form_validation->run()){
                
                $_POST['id'] = $id;
                if($this->usuario_model->update_record($_POST)){
                    
                    redirect('maincontroler');
                    
                }
                
                $this->load->view('update_view',$data);
                
            }
   
            
        }
        
        
}

?>
