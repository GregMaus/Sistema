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
class links_menu_model extends Model {
    
    
    public function get_all(){

        $this->db->select('*');
        $this->db->from('adm_links_menu');
        $this->db->join('adm_menu', 'id_adm_menu = adm_menu_id_adm_menu', 'left');
        $query = $this->db->get();
        
        return $query->result();

    }
    
    
    public function add_records($options = array()){
        
        $this->db->insert('adm_links_menu',$options);
        return $this->db->affected_rows();    
        
    }
    
    public function delete_records(){
        
        $this->db->where('id_adm_links_menu',$this->uri->segment(3));
        $this->db->delete('adm_links_menu');
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
        $query = $this->db->get('adm_links_menu');
        return $query->row(0);
        
    }
    
    
}

?>
