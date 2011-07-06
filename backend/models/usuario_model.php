<?php

/**
 * Description of usuario_model
 *
 * @author Greg
 */
class usuario_model extends Model {
    
    
    
    
    public function usuario_login($login,$senha){        
            
        $query = $this->db->query("select nome,login,senha from adm_usuario where login = '$login' AND senha = '$senha' ");        
        $row = $query->row();           
        
        $data =  (object)array(

                'rows' => $query->num_rows(),
                'nome'  => $row->nome,
                'login'  => $row->login,
                'senha'  => $row->senha
            );

        return $data;             
        
    }   
    
}

?>
