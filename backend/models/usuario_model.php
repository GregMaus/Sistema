<?php

/**
 * Description of usuario_model
 *
 * @author Greg
 */
class usuario_model extends Model {
    
    
    
    
    public function usuario_login($login,$senha){        
            
        $query = $this->db->query("select * from adm_usuario where login = '$login' AND senha = '$senha' ");
        return $query->num_rows();      
        
    }
    
    
}

?>
