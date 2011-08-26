<?php


/**
 * secao_model
 * 
 * @package Backend
 * @subpackage Models     
 * @author sistema
 * @copyright Gregori Maus
 * @version 2011
 * @access public
 */
class secao_model extends Model {
    
    
 
    /**
     * secao_model::get_all()
     * 
     * @return
     */
    public function get_all(){

        $query = $this->db->get('sys_secao');        
        return $query->result();

    }
    
    
 
    /**
     * secao_model::add_records()
     * 
     * @param mixed $valor
     * @return
     */
    public function add_records($valor){
        
        $this->db->set('nome', $valor);
        $this->db->insert('sys_secao');
        return $this->db->affected_rows();      
        
    }
    
 
    /**
     * secao_model::delete_records()
     * 
     * @return
     */
    public function delete_records(){
        
        $this->db->where('id_sys_secao',$this->uri->segment(3));
        $this->db->delete('sys_secao');
        return $this->db->affected_rows();
        
    }
    

    /**
     * secao_model::update_record()
     * 
     * @param mixed $options
     * @return
     */
    function update_record($options = array()){
        
        if(isset($options['nome']))            
            $this->db->set('nome',$options['subsecao']);
            
        if(isset($options['secao']))            
            $this->db->set('sys_secao_id_sys_secao',$options['secao']);
        
        $this->db->where('id_sys_subsecao',$options['id']);
        $this->db->update('sys_subsecao');
        
        return $this->db->affected_rows();         
        
    }
    
    /**
     * secao_model::get_by_id()
     * 
     * @return
     */
    /**
     * secao_model::get_by_id()
     * 
     * @param mixed $id
     * @return
     */
    public function get_by_id($id){
        
        $this->db->where('id_sys_secao',$id);
        $query = $this->db->get('sys_secao');
        return $query->row(0);
        
    }
    
    
}

?>
