<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu_model
 *
 * @author Gregori
 */
class sublinks_menu_model extends Model {
    
    
    public function get_all(){

        $query = $this->db->get('adm_sublink_menu');        
        return $query->result();

    }
    
    
    public function add_records($valor){
        
        $this->db->set('nome', $valor);
        $this->db->insert('adm_sublink_menu');
        return $this->db->affected_rows();      
        
    }
    
    public function delete_records(){
        
        $this->db->where('id_adm_links_menu',$this->uri->segment(3));
        $this->db->delete('adm_sublink_menu');
        return $this->db->affected_rows();
        
    }
    
    function update_record($options = array()){
        
        if(isset($options['nome']))            
            $this->db->set('nome',$option['nome']);
        
        if(isset($options['email']))            
            $this->db->set('email',$option['email']);
        
        if(isset($options['senha']))            
            $this->db->set('senha',$option['senha']);
        
        $this->db->where('id',$options['id']);
        $this->db->update('usuario');
        
        return $this->db->affected_rows();        
        
    }
    
    public function get_by_id($id){
        
        $this->db->where('id',$id);
        $query = $this->db->get('adm_sublink_menu');
        return $query->row(0);
        
    }
    
    
}

?>
