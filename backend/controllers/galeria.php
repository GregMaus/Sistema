<?php


/**
 * galeria
 * 
 * @package Backend
 * @subpackage controllers   
 * @author sistema
 * @copyright Gregori Maus
 * @version 2011
 * @access public
 */
class galeria extends Controller
{
 

    /**
     * galeria::Galeria()
     * 
     * @return
     */
    function Galeria()
    {
        parent::Controller();
    }


    /**
     * galeria::index()
     * 
     * @return
     */
    function index()
    {
        if ($this->session->userdata('logged_in')) {            
            
            $this->load->model('secao_model');

            $data['grao'] = array('Media','Galeria');            
            
            $data['dirs'] = $this->secao_model->get_all();
            
            

            //ESTA VIEW SEMPRE ANTES DOS OUTROS
            $this->load->view('dashboard_view', $data);

            $this->load->view('galeria/index');

        } else {

            redirect('Login');

        }

    }
    
    
        /**
         * galeria::create_dir()
         * 
         * @param string $dir
         * @return
         */
        function create_dir($dir = 'upload'){
            
            
            if ($this->session->userdata('logged_in')) {
    
    
                $this->form_validation->set_rules('dirname','Nome do Diretório','trim|required|alpha_numeric|max_length[10]');
                
                if($this->form_validation->run()){
                    
                    mkdir("./".$dir."/".$this->input->post('dirname'),777) or die("erro ao criar diretório");
                    
                    redirect('Media');
                    
                }else{
                    
                    redirect('Dashboard');
                    
                }
    
       
            }
            
        }
    
    
        /**
         * galeria::delete_dir()
         * 
         * @param mixed $valor
         * @return
         */
        function delete_dir($valor){
        
        
                if ($this->session->userdata('logged_in')) {
        
                    if(count(get_filenames('./upload/'.$valor))>=1){
                        
                            redirect('Media');
                        
                        }else{
                        
                        rmdir("./upload/".$valor) or die("erro ao apagar diretório");
                        
                            redirect('Media'); 
                        
                        }
        
           
                }
        
        }
        
        
        /**
         * galeria::delete_file()
         * 
         * @param mixed $dir
         * @param mixed $file
         * @return
         */
        function delete_file($dir,$file){
            
            
                if ($this->session->userdata('logged_in')) {
        
                        
                        unlink("./upload/".$dir.'/'.$file) or die("erro ao apagar diretório");
                        
                            redirect('Media/open_dir/'.$dir); 
                        
                        }     
            
            
        }
        
        
        /**
         * galeria::open_dir()
         * 
         * @param mixed $id
         * @return
         */
        function open_dir($id){
            
            
        if ($this->session->userdata('logged_in')) {
            
            $this->load->model('subsecao_model');

            $data['grao'] = array('Midia','Galeria');
            
                  
            $data['dirs'] = $this->subsecao_model->get_all();
     
            //ESTA VIEW SEMPRE ANTES DOS OUTROS
            $this->load->view('dashboard_view', $data);

            $this->load->view('galeria/dirfiles');

        } else {

            redirect('Login');

        }
            
            
            
        }
        
        
        
        /**
         * galeria::open_galeria()
         * 
         * @param mixed $dir
         * @return
         */
        function open_galeria($id,$bool = null){
            
            
        if ($this->session->userdata('logged_in')) {
            
            
            $this->load->model('media_model');

            $data['grao'] = array('Midia','Galeria');          
                
            
            $data['files'] = $this->media_model->get_type_images($id,$bool);
            
            

            //ESTA VIEW SEMPRE ANTES DOS OUTROS
            $this->load->view('dashboard_view', $data);

            $this->load->view('galeria/galeria');

        } else {

            redirect('Login');

        }
            
            
            
        }
        
        
        /**
         * galeria::download_file()
         * 
         * @param mixed $arquivo
         * @return
         */
        function download_file($arquivo){
            
            
                if(isset($arquivo) && file_exists($arquivo)){ // faz o teste se a variavel não esta vazia e se o arquivo realmente existe
                      switch(strtolower(substr(strrchr(basename($arquivo),"."),1))){ // verifica a extensão do arquivo para pegar o tipo
                         case "pdf": $tipo="application/pdf"; break;
                         case "exe": $tipo="application/octet-stream"; break;
                         case "zip": $tipo="application/zip"; break;
                         case "doc": $tipo="application/msword"; break;
                         case "xls": $tipo="application/vnd.ms-excel"; break;
                         case "ppt": $tipo="application/vnd.ms-powerpoint"; break;
                         case "gif": $tipo="image/gif"; break;
                         case "png": $tipo="image/png"; break;
                         case "jpg": $tipo="image/jpg"; break;
                         case "mp3": $tipo="audio/mpeg"; break;
                         case "php": // deixar vazio por seurança
                         case "htm": // deixar vazio por seurança
                         case "html": // deixar vazio por seurança
                      }
                      header("Content-Type: ".$tipo); // informa o tipo do arquivo ao navegador
                      header("Content-Length: ".filesize($arquivo)); // informa o tamanho do arquivo ao navegador
                      header("Content-Disposition: attachment; filename=".basename($arquivo)); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
                      readfile($arquivo); // lê o arquivo
                      exit; // aborta pós-ações
                   }
            
            
        }
    
    
}
    
    
?>