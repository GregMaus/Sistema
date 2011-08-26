<?php

/**
 * Subsecao
 * 
 * Controller de subseções do sistema.
 * 
 * @package Backend
 * @subpackage controllers    
 * @author sistema
 * @copyright Gregori Maus
 * @version 2011
 * @access public
 */
class Subsecao extends Controller {


	/**
	 * Subsecao::Subsecao()
	 * 
	 * @return void
	 */
	public function Subsecao()
	{
		parent::Controller();	
	}
                
        /*
         * FUNÇÕES RELACIONADAS AS VIEWS
         */

	/**
	 * Subsecao::index()
	 * 
     * @uses secao_model::get_all()
     * @uses subsecao_model::get_all()
     * @uses session::userdata()
	 * @return void
     * @access public
	 */
	public function index()
	{                      
	   
            $this->load->model('secao_model'); 
                
            $this->load->model('subsecao_model');
            
            if($this->session->userdata('logged_in')) {
                
                    $data['grao'] = array ('Conteúdo','Subseção');                

                    $data['secoes'] = $this->secao_model->get_all(); 
                    
                    $data['subsecoes'] = $this->subsecao_model->get_all();               

                    //ESTA VIEW SEMPRE ANTES DOS OUTROS
                    $this->load->view('dashboard_view',$data);

                    $this->load->view('subsecao/index');
                
            }else{
                
                redirect('Login');
                
            }
            
        }
        

        /**
         * Subsecao::secao_success()
         * 
         * Método para a tela de cadastro com sucesso.
         * 
         * @deprecated 1.0.1
         * @uses session::userdata()
         * @uses secao_model::get_all()
         * @return void
         * @access public
         */
        public function secao_success (){
            
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
        

        /**
         * Subsecao::nova_subsecao()
         * 
         * Método para criar a nova subseção. 
         * 
         * @uses form_validation::set_rules()
         * @uses form_validation::run()
         * @uses subsecao_model::add_records()
         * @uses Message::set()
         * @return void
         * @access public
         * 
         */
        public function nova_subsecao(){
            
            
            $this->load->model('subsecao_model');
            
            $this->form_validation->set_rules('secao','Secao','required');
            $this->form_validation->set_rules('subsecao','Nome da Subsecao','trim|required');
            
            if($this->form_validation->run()){
            
            $data = array(
                
                'sys_secao_id_sys_secao' => $this->input->post('secao'),
                'nome'  => $this->input->post('subsecao'),                

            );         
               
            if ($this->subsecao_model->add_records($data)){  
                
                    $this->subsecao_model->update_secao($this->input->post('secao'));
                
                    //$this->create_dir($data);
                  
                    $this->message->set('Subseção cadastrada com Sucesso!','success');
                    
                     redirect('Subsecao');
            }           
            
            }else{
                
                redirect('Subsecao');
                
            }
        }
        
        

        /**
         * Subsecao::subsecao_delete()
         * 
         * Método para deleção de subsecao.
         * 
         * @uses subsecao_model::delete_records()
         * @return void
         * @access public
         */
        public function subsecao_delete(){
            
             $this->load->model('subsecao_model');
             
             if($this->subsecao_model->delete_records()){
                 
                 redirect('Subsecao');
                 
             }                        
        }
        
        

        /**
         * Subsecao::subsecao_edit()
         * 
         * Método que monta a tela de edição.
         * 
         * @uses secao_model::get_all()
         * @uses subsecao_model::get_by_id()
         * @param int $id
         * @return void
         * @access public
         * 
         */
        public function subsecao_edit($id){

            
            $this->load->model('secao_model');
            
            $this->load->model('subsecao_model');
            
                    $data['secoes'] = $this->secao_model->get_all(); 
                    
                    $data['subsecao'] = $this->subsecao_model->get_by_id($id); 

                $data['grao'] = array ('Conteúdo','Subseção','Editar subseção');                

               //ESTA VIEW SEMPRE ANTES DOS OUTROS
                $this->load->view('dashboard_view',$data);

                $this->load->view('subsecao/edit');
                      
        }
        
        
        /**
         * Subsecao::subsecao_update()
         * 
         * Método que trata os dados para update do banco.
         * 
         * @uses form_validation::set_rules()
         * @uses form_validation::run()
         * @uses subsecao_model::update_record()
         * @param int $id
         * @return void
         * @access public
         * 
         */
        public function subsecao_update($id){
            
            $this->load->model('subsecao_model');
           
            $this->form_validation->set_rules('secao','Secao','required');
            $this->form_validation->set_rules('subsecao','Nome da subseção','trim|required');
            
            if($this->form_validation->run()){
                
                    $options = array(
                        
                        'secao' => $this->input->post('secao'),
                        'nome'  => $this->input->post('subsecao'),
                        'id' => $id,                
        
                    );                 
               
                        if($this->subsecao_model->update_record($options)){

                            redirect('Subsecao');

                        }   
           
            }else{
                
                redirect('Subsecao/subsecao_edit/'.$id);
                
            }

        }
        
        
        /**
         * Subsecao::create_dir()
         * 
         * @deprecated 
         * 
         * @param mixed $dir
         * @return void
         * @access private
         */
        private function create_dir($dir){
            
            
            if ($this->session->userdata('logged_in')) {    

                    
                    mkdir("./upload/galeria/".$dir,777) or die("erro ao criar diretório");
    
       
            }
            
        }
        
        
}

?>
