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

        $this->db->select('lin.label as linklabel,sub.*');
        $this->db->from('adm_sublink_menu as sub');
        $this->db->join('adm_links_menu as lin', 'lin.id_adm_links_menu = sub.adm_links_menu_id_adm_links_menu', 'left');
        $query = $this->db->get();
        
        return $query->result();

    }
    
    
    public function add_records($options = array()){
        
        $this->db->insert('adm_sublink_menu',$options);
        return $this->db->affected_rows();     
        
    }
    
    public function delete_records(){
        
        $this->db->where('id_sublink_menu',$this->uri->segment(3));
        $this->db->delete('adm_sublink_menu');
        return $this->db->affected_rows();
        
    }
    
    function update_record($options = array()){
        
        if(isset($options['links']))            
            $this->db->set('adm_links_menu_id_adm_links_menu',$options['links']);
        
        if(isset($options['label']))            
            $this->db->set('label',$options['label']);
        
        if(isset($options['link']))            
            $this->db->set('anchor',$options['link']);
        
        $this->db->where('id_sublink_menu',$options['id']);
        $this->db->update('adm_sublink_menu');
        
        return $this->db->affected_rows();        
        
    }
    
    public function get_by_id($id){
        
        $this->db->where('id_sublink_menu',$id);
        $query = $this->db->get('adm_sublink_menu');
        return $query->row(0);
        
    }
    
    
}

?>
