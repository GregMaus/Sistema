<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author Synth Web
 */
class usuario extends Controller {
    
    	function Usuario()
	{
		parent::Controller();	
	}
        
        
	function index()
	{ 
            
            $this->load->model('usuario_model');
            
            if($this->session->userdata('logged_in')) {
                
                    $data['grao'] = array ('Usuários','Ver Usuários');                

                    $data['usuarios'] = $this->usuario_model->get_all();               

                    //ESTA VIEW SEMPRE ANTES DOS OUTROS
                    $this->load->view('dashboard_view',$data);

                    $this->load->view('usuario/index');
                
            }else{
                
                redirect('Login');
                
            }            
            
            
        }
        
        
        function add_usuario(){
            
             $this->load->model('usuario_model');
             
             
            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_rules('login', 'Login', 'trim|required');
            $this->form_validation->set_rules('rsenha', 'Confirmação', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
             
            
            if ($this->form_validation->run()){
            
                 $data = array(
    
                            'adm_tipo_usuario_id_tipo_usuario' => $this->input->post('tipo'),
                            'nome'   => $this->input->post('nome'),
                            'login'  => $this->input->post('login'),
                            'email'  => $this->input->post('email'),
                            'senha'  => md5($this->input->post('senha')),
                            'created_at'  => date(),
    
                        );         


                        if ($this->usuario_model->add_records($data)){                  
    
                                $this->message->set('Seção cadastrada com Sucesso!','success');
    
                                redirect('Usuario');
                        }
                    
                    }else{
                        
                        redirect('Usuario/novo_usuario');
                        
                    }
            
        }
        
        
        function novo_usuario(){
                   
            $this->load->model('usuario_model');            
           
                    

                    $data['tipos'] = $this->usuario_model->get_tipo();

                    $data['grao'] = array ('Usuários','Novo Usuário'); 

                          //ESTA VIEW SEMPRE ANTES DOS OUTROS
                            $this->load->view('dashboard_view',$data);

                            $this->load->view('usuario/new');    
            
            
        }
        
        
        function usuario_edit($id){
                   
            $this->load->model('usuario_model');    
                    

                    $data['tipos'] = $this->usuario_model->get_tipo();
                    
                    $data['dados'] = $this->usuario_model->get_by_id($id);

                    $data['grao'] = array ('Usuários','Novo Usuário'); 

                          //ESTA VIEW SEMPRE ANTES DOS OUTROS
                            $this->load->view('dashboard_view',$data);

                            $this->load->view('usuario/edit');    
            
            
        }
        
        
        
        function usuario_update($id){
                    
                    $this->load->model('usuario_model'); 
                   
                    $this->form_validation->set_rules('nome', 'Nome', 'required');
                    $this->form_validation->set_rules('login', 'Login', 'trim|required');
                    $this->form_validation->set_rules('rsenha', 'Confirmação', 'trim|required');
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                    
                    if($this->form_validation->run()){
                        
                    $options = array(
        
                                'id' => $id,
                                'adm_tipo_usuario_id_tipo_usuario' => $this->input->post('tipo'),
                                'nome'   => $this->input->post('nome'),
                                'login'  => $this->input->post('login'),
                                'email'  => $this->input->post('email'),
                                'senha'  => md5($this->input->post('senha')),                            
        
                            );               
                       
                                if($this->usuario_model->update_record($options)){
        
                                    redirect('Usuario');
        
                                } else{
                                    
                                     redirect('Usuario/usuario_edit/'.$id);
                                }  
                   
                    }else{
                        
                         redirect('Usuario/usuario_edit/'.$id);
                        
                    }

        }
        
        
        function usuario_delete(){
            
            $this->load->model('usuario_model'); 
             
             if($this->usuario_model->delete_records()){
                 
                 redirect('Usuario');
                 
             }                        
        }
        
    
    
}

?>
