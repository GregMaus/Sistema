<?php


/**
 * media
 * 
 * @package Backend
 * @subpackage controllers   
 * @author sistema
 * @copyright Gregori Maus
 * @version 2011
 * @access public
 */
class media extends Controller
{
    
    
    //http://www.iconesbr.net/down_ico/7520/folder_close_red

    /**
     * media::Media()
     * 
     * @return
     */
    function Media()
    {
        parent::Controller();
    }


    /**
     * media::index()
     * 
     * @return
     */
    function index()
    {
        if ($this->session->userdata('logged_in')) {

            $data['grao'] = array('Media','File Manager');
            
            $data['dirs'] = directory_map('./upload/',1); 

            //ESTA VIEW SEMPRE ANTES DOS OUTROS
            $this->load->view('dashboard_view', $data);

            $this->load->view('media/index');

        } else {

            redirect('Login');

        }

    }
    
    
        /**
         * media::create_dir()
         * 
         * @param string $dir
         * @return
         */
        function create_dir($dir = 'upload'){
            
            
            if ($this->session->userdata('logged_in')) {
    
    
                $this->form_validation->set_rules('dirname','Nome do Diret�rio','trim|required|alpha_numeric|max_length[10]');
                
                if($this->form_validation->run()){
                    
                    mkdir("./".$dir."/".$this->input->post('dirname'),777) or die("erro ao criar diret�rio");
                    
                    redirect('Media');
                    
                }else{
                    
                    redirect('Dashboard');
                    
                }
    
       
            }
            
        }
    
    
        /**
         * media::delete_dir()
         * 
         * @param mixed $valor
         * @return
         */
        function delete_dir($valor){
        
        
                if ($this->session->userdata('logged_in')) {
        
                    if(count(get_filenames('./upload/'.$valor))>=1){
                        
                            redirect('Media');
                        
                        }else{
                        
                        rmdir("./upload/".$valor) or die("erro ao apagar diret�rio");
                        
                            redirect('Media'); 
                        
                        }
        
           
                }
        
        }
        
        
        /**
         * media::delete_file()
         * 
         * @param mixed $dir
         * @param mixed $file
         * @return
         */
        function delete_file($dir,$file){
            
            
                if ($this->session->userdata('logged_in')) {
        
                        
                        unlink("./upload/".$dir.'/'.$file) or die("erro ao apagar diret�rio");
                        
                            redirect('Media/open_dir/'.$dir); 
                        
                        }     
            
            
        }
        
        
        /**
         * media::open_dir()
         * 
         * @param mixed $dir
         * @return
         */
        function open_dir($dir){
            
            
        if ($this->session->userdata('logged_in')) {

            $data['grao'] = array('Midia','File Manager',''.$dir.'');
            
            $data['dir'] = $dir;  
            
            $data['files'] = get_dir_file_info('./upload/'.$dir.'');          
            

            //ESTA VIEW SEMPRE ANTES DOS OUTROS
            $this->load->view('dashboard_view', $data);

            $this->load->view('media/dirfiles');

        } else {

            redirect('Login');

        }
            
            
            
        }
        
        
        /**
         * media::download_file()
         * 
         * @param mixed $arquivo
         * @return
         */
        function download_file($arquivo){
            
            
                if(isset($arquivo) && file_exists($arquivo)){ // faz o teste se a variavel n�o esta vazia e se o arquivo realmente existe
                      switch(strtolower(substr(strrchr(basename($arquivo),"."),1))){ // verifica a extens�o do arquivo para pegar o tipo
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
                         case "php": // deixar vazio por seuran�a
                         case "htm": // deixar vazio por seuran�a
                         case "html": // deixar vazio por seuran�a
                      }
                      header("Content-Type: ".$tipo); // informa o tipo do arquivo ao navegador
                      header("Content-Length: ".filesize($arquivo)); // informa o tamanho do arquivo ao navegador
                      header("Content-Disposition: attachment; filename=".basename($arquivo)); // informa ao navegador que � tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
                      readfile($arquivo); // l� o arquivo
                      exit; // aborta p�s-a��es
                   }
            
            
        }
    
    
}
    
    
?>