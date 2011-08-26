<?php
	
    
     
/**
 * media_model
 * 
 * @package Backend
 * @subpackage Models  
 * @subpackage Models  
 * @author sistema
 * @copyright Gregori Maus
 * @version 2011
 * @access public
 */
class media_model extends Model {
    
    
    public function get_media_type(){
        
        
        $query = $this->db->get('sys_media_type');        
        return $query->result();        
        
    }
    
    
    public function get_type_images($id,$bool = true){
        
        
         
         if($bool == true){
            
            $this->db->where('sys_secao_id_sys_secao',$id); 
         
         }else{
            
            $this->db->where('sys_subsecao_id_sys_subsecao',$id); 
         
         }
         
         $this->db->where('sys_media_type_id_media_type',1); 
         
         $query =  $this->db->get('sys_media'); 
             
         return $query->result();        
        
    }
    
    
    
}
    
    
    
?>