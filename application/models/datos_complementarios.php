<?php

class Datos_complementarios extends CI_Model 
{
    
    function __construct()
    {       

    }
    
    function add($adjunto, $id_persona)
    {
        $sql =
            "INSERT INTO datos_complementarios 
            (archivo, mime, nombre, id_persona) values
            ('".$adjunto->getArchivo()."', '".$adjunto->getTipo()."','".$adjunto->getNombre()."', '".$id_persona."')";
        $this->db->query($sql);            
        return $this->db->insert_id();               
    }     
    
    function get_adjuntos($id_persona)
    {
        $sql = "SELECT * FROM datos_complementarios as d where d.id_persona=".$id_persona;                
        $query = $this->db->query($sql);   
        //var_dump("qr ");      
       // var_dump($query->result());          
        return $query->result();   
    }       
    
    function get_blob($id)
    {
        $sql = "SELECT * FROM datos_complementarios as d where d.id_dato_complementario=".$id;                
        $query = $this->db->query($sql);                   
        return $query->result();   
    }   
        
    function eliminar($id)
    {
        $sql = "DELETE FROM datos_complementarios where id_dato_complementario=".$id;   
        //$query = $this->db->query($sql);                   
        return $this->db->query($sql);          
    }        
}

?>