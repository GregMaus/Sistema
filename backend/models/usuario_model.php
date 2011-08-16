<?php

/**
 * Description of usuario_model
 *
 * @author Greg
 */
class usuario_model extends Model {    
    
    
    
    public function usuario_login($login,$senha){        
            
        $query = $this->db->query("select nome,login,senha from adm_usuario where login = '$login' AND senha = '$senha' ");        
        $row = $query->row();           
        
        $data =  (object)array(

                'rows' => $query->num_rows(),
                'nome'  => $row->nome,
                'login'  => $row->login,
                'senha'  => $row->senha
            );

        return $data;             
        
    }
    
    
    public function get_all(){

        $this->db->select('t.tipo as tipo, u.id_usuario,u.nome,u.login,u.created_at');
        $this->db->from('adm_usuario as u');
        $this->db->join('adm_tipo_usuario as t', 'u.adm_tipo_usuario_id_tipo_usuario = t.id_tipo_usuario', 'left');
        $query = $this->db->get();
        
        return $query->result();

    }
    
    
    public function get_tipo(){

           $query = $this->db->get('adm_tipo_usuario');        
            return $query->result();

    }
    
    
    public function add_records($options = array()){
        
        $this->db->insert('adm_usuario',$options);
        return $this->db->affected_rows();     
        
    }
    
    
    public function get_by_id($id){
        
        $this->db->where('id_usuario',$id);
        $query = $this->db->get('adm_usuario');
        return $query->row(0);
        
    }
    
    
   function update_record($options = array()){
        
        if(isset($options['nome']))            
            $this->db->set('nome',$options['nome']);
            
        if(isset($options['email']))            
            $this->db->set('email',$options['email']);
            
        if(isset($options['login']))            
            $this->db->set('login',$options['login']);
            
        if(isset($options['senha']))            
            $this->db->set('senha',$options['senha']);
        
        $this->db->where('id_usuario',$options['id']);
        $this->db->update('adm_usuario');
        
        return $this->db->affected_rows();        
        
    }
    
    
    public function delete_records(){
        
        $this->db->where('id_usuario',$this->uri->segment(3));
        $this->db->delete('adm_usuario');
        return $this->db->affected_rows();
        
    }
    
    
    
}

?>
