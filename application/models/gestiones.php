<?php

class Gestiones extends CI_Model 
{
    
    function __construct()
    {
    }
    
            
            
    function get_tipos_gestion()
    {
        $sql = "SELECT * FROM  tipos_gestion";                
        //die($sql);
        $query = $this->db->query($sql);                   
        return $query->result();        
    }  
    
    function get_gestiones()
    {
        $sql = "SELECT * FROM gestiones";                
        //die($sql);
        $query = $this->db->query($sql);                   
        return $query->result();          
    }
    
    function getTipoById($id_tipo_gestion)
    {
        $query = $this->db->get_where('tipos_gestion', array('id_tipos_gestion' => $id_tipo_gestion));
        if ($query->num_rows > 0) return $query->result();
        return false;            
    }
                
    function insert_gestion($gestionParams)
    {
        $this->db->insert('gestiones', $gestionParams);   
        return $this->db->insert_id();         
    }   
    
    function insert_tipo_gestion($tipoGParams)
    {
        $id_tipos_gestion = 0;
        $this->db->insert('tipos_gestion', $tipoGParams);   
        $id_tipos_gestion = $this->db->insert_id();
        return $id_tipos_gestion;
    }      
    
    function modificar_tipo_gestion($tipoGParams)
    {
        $this->db->where('id_tipos_gestion', $tipoGParams['id_tipos_gestion']);
        $this->db->update('tipos_gestion', $tipoGParams);
        return($this->db->affected_rows() > 0);
    }      
    
    function modificar_gestion($gestionParams)
    {
        $this->db->where('id_gestion', $gestionParams['id_gestion']);
        $this->db->update('gestiones', $gestionParams);  
        if($this->db->_error_message() == '') return true;
        return false;         
        //return($this->db->affected_rows() > 0);
    }     
    
    function eliminar_gestion($id_gestion)
    {
        $this->db->delete('gestiones', array('id_gestion' => $id_gestion));
        return($this->db->affected_rows() > 0);        
    }
                     
    public function eliminar_tipo_gestion($id_tipo_gestion)                     
    {
        $this->db->delete('tipos_gestion', array('id_tipos_gestion' => $id_tipo_gestion));
        return($this->db->affected_rows() > 0);        
    }

    function getById($id_gestion)
    {
        $query = $this->db->get_where('gestiones', array('id_gestion' => $id_gestion));
        if ($query->num_rows > 0) return $query->result();
        return false;        
    }    
}

?>