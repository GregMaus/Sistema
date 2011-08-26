<?php


/**
 * menu_model
 * 
 * @package Backend
 * @subpackage Models    
 * @author sistema
 * @copyright Gregori Maus
 * @version 2011
 * @access public
 */
class menu_model extends Model {
    
    
    /**
     * menu_model::get_all()
     * 
     * @return
     */
    public function get_all(){

        $query = $this->db->get('adm_menu');        
        return $query->result();

    }
    
    
    /**
     * menu_model::add_records()
     * 
     * @param mixed $valor
     * @return
     */
    public function add_records($valor){
        
        $this->db->set('nome', $valor);
        $this->db->insert('adm_menu');
        return $this->db->affected_rows();      
        
    }
    
    /**
     * menu_model::delete_records()
     * 
     * @return
     */
    public function delete_records(){
        
        $this->db->where('id_adm_menu',$this->uri->segment(3));
        $this->db->delete('adm_menu');
        return $this->db->affected_rows();
        
    }
    
    /**
     * menu_model::update_record()
     * 
     * @param mixed $options
     * @return
     */
    function update_record($options = array()){
        
        if(isset($options['id']))            
            $this->db->set('nome',$options['menu']);
        
        $this->db->where('id_adm_menu',$options['id']);
        $this->db->update('adm_menu');
        
        return $this->db->affected_rows();        
        
    }
    
    /**
     * menu_model::get_by_id()
     * 
     * @param mixed $id
     * @return
     */
    public function get_by_id($id){
        
        $this->db->where('id_adm_menu',$id);
        $query = $this->db->get('adm_menu');
        return $query->row(0);
        
    }
    
    
}

?>
