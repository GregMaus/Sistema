<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of secao_model
 *
 * @author Gregori
 */
class secao_model extends Model {
    
    
    public function get_all(){

        $query = $this->db->get('sys_secao');        
        return $query->result();

    }
    
    
    public function add_records($valor){
        
        $this->db->set('nome', $valor);
        $this->db->insert('sys_secao');
        return $this->db->affected_rows();      
        
    }
    
    public function delete_records(){
        
        $this->db->where('id_sys_secao',$this->uri->segment(3));
        $this->db->delete('sys_secao');
        return $this->db->affected_rows();
        
    }
    
    function update_record($options = array()){
        
        if(isset($options['id']))            
            $this->db->set('nome',$options['secao']);
        
        $this->db->where('id_sys_secao',$options['id']);
        $this->db->update('sys_secao');
        
        return $this->db->affected_rows();         
        
    }
    
    public function get_by_id($id){
        
        $this->db->where('id_sys_secao',$id);
        $query = $this->db->get('sys_secao');
        return $query->row(0);
        
    }
    
    
}

?>
