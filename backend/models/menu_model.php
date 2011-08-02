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
class menu_model extends Model {
    
    
    public function get_all(){

        $query = $this->db->get('adm_menu');        
        return $query->result();

    }
    
    
    public function add_records($valor){
        
        $this->db->set('nome', $valor);
        $this->db->insert('adm_menu');
        return $this->db->affected_rows();      
        
    }
    
    public function delete_records(){
        
        $this->db->where('id_adm_menu',$this->uri->segment(3));
        $this->db->delete('adm_menu');
        return $this->db->affected_rows();
        
    }
    
    function update_record($options = array()){
        
        if(isset($options['menu']))            
            $this->db->set('nome',$options['menu']);
        
        $this->db->where('id_adm_menu',$options['id']);
        $this->db->update('adm_menu');
        
        return $this->db->affected_rows();        
        
    }
    
    public function get_by_id($id){
        
        $this->db->where('id_adm_menu',$id);
        $query = $this->db->get('adm_menu');
        return $query->row(0);
        
    }
    
    
}

?>
