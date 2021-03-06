<?php
require_once('Participante.php');
/**
 * class Cliente
 * autor: gestion
 * 
 */

class Cliente extends Participante
{
    
    protected $es_cliente=true;
    
    /* Constructor */
    public function __construct($params = array())
    {
        parent::__construct($params);
    }
    

    /* Miembros estáticos, manejan funcionalidad de todos */
    
    public static function getAll($limit = 0, $offset = -1)
    {
        $arrayClientes = array();
        $paramsCliente = array();
        $ci =& get_instance();
        $data = $ci->personas->get_all_personas(true, $limit, $offset);
        foreach($data as $p)
        {
            $paramsCliente["id_persona"] = $p->id_persona;   
            $paramsCliente["nombre"] = $p->nombre;    
            $paramsCliente["apellido"] = $p->apellido;    
            $paramsCliente["email"] = $p->email;    
            $paramsCliente["direccion"] = $p->direccion;    
            $paramsCliente["telefono"] = $p->telefono;    
            $paramsCliente["ci"] = $p->ci;    
            $paramsCliente["adjuntos"] = array();    
            
            $adjuntos = $ci->datos_complementarios->get_adjuntos($p->id_persona);    
            foreach ($adjuntos as $a) 
            {
                $attsAdjuntos = array('id' => $a->id_dato_complementario,'nombre' => $a->nombre, 'archivo' => $a->archivo, 'tipo' => $a->mime, 'from' => 'datos_complementarios');
                $Adjunto = new Adjunto($attsAdjuntos);
                array_push($paramsCliente["adjuntos"],$Adjunto);
            }  
            
            $Cliente = new Cliente($paramsCliente);   
            $arrayClientes[] = $Cliente;
        }

        return $arrayClientes;
    }
    
    public function getByCI(){
        parent::getByCI();
        $paramsCliente["adjuntos"] = array();         
        $ci =& get_instance();
        $adjuntos = $ci->datos_complementarios->get_adjuntos($this->id_persona); 
 
            foreach ($adjuntos as $a) 
            {
                $attsAdjuntos = array('id' => $a->id_dato_complementario,'nombre' => $a->nombre, 'archivo' => utf8_encode($a->archivo), 'tipo' => $a->mime, 'from' => 'datos_complementarios');
                $Adjunto = new Adjunto($attsAdjuntos);
                array_push($paramsCliente["adjuntos"],$Adjunto);
            }  
            
        $this->adjuntos=$paramsCliente;
    }
    
    public function eliminarByCI(){
        return parent::eliminarByCI();
    }    
    
    public function update()
    {
        return parent::update();
    }    
            

}


?>