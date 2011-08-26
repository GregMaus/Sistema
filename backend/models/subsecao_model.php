<?php


/**
 * subsecao_model
 * 
 * @package Backend
 * @subpackage Models     
 * @author sistema
 * @copyright Gregori Maus
 * @version 2011
 * @access public
 */
class subsecao_model extends Model {
    
    

    /**
     * subsecao_model::get_all()
     * 
     * @return
     */
    public function get_all(){

        $this->db->select('sec.nome as secanome,sub.*');
        $this->db->from('sys_subsecao as sub');
        $this->db->join('sys_secao as sec', 'sec.id_sys_secao = sub.sys_secao_id_sys_secao', 'left');
        $query = $this->db->get();
        
        return $query->result(); 

    }
    
    

    /**
     * subsecao_model::add_records()
     * 
     * @param mixed $options
     * @return
     */
    public function add_records($options = array()){
        
        $this->db->insert('sys_subsecao',$options);
        return $this->db->affected_rows();     
        
    }
    

    /**
     * subsecao_model::delete_records()
     * 
     * @return
     */
    public function delete_records(){
        
        $this->db->where('id_sys_subsecao',$this->uri->segment(3));
        $this->db->delete('sys_subsecao');
        return $this->db->affected_rows();
        
    }
    

    /**
     * subsecao_model::update_record()
     * 
     * @param mixed $options
     * @return
     */
    function update_record($options = array()){
        
        if(isset($options['id']))            
            $this->db->set('nome',$options['nome']);
            
        if(isset($options['secao']))            
            $this->db->set('sys_secao_id_sys_secao',$options['secao']);
        
        $this->db->where('id_sys_subsecao',$options['id']);
        $this->db->update('sys_subsecao');     
        
        return $this->db->affected_rows();         
        
    }
    
    
    /**
     * subsecao_model::update_secao()
     * 
     * @param mixed $options
     * @return
     */
    function update_secao($id){        
            
                
        $this->db->set('qnt_sub', 'qnt_sub+1',false);       
        $this->db->where('id_sys_secao',$id);
        $this->db->update('sys_secao');     
        
        return $this->db->affected_rows();         
        
    }
    

    /**
     * subsecao_model::get_by_id()
     * 
     * @param mixed $id
     * @return
     */
    public function get_by_id($id){
        
        $this->db->where('id_sys_subsecao',$id);
        $query = $this->db->get('sys_subsecao');
        return $query->row(0);
        
    }
    
    
}

?>
