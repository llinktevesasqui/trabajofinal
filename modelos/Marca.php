<?php
require_once "./core/Modelo.php";
class Marca extends Modelo
{
    private $_id;
    private $_nombre;

    private $_tabla = 'carta';

    public function __construct($id=null, $nombre=null){
        $this->_id = $id;
        $this->_nombre = $nombre;
        parent::__construct($this->_tabla);
    }
    public function eliminar(){
        
        return $this->deleteBy('id',$this->_id);
    }
    public function guardar(){
        $datos = array(
            'id'=>$this->_id,
            'nombre'=>"'$this->_nombre'"
        );

        return $this->insert($datos);
    }

    public function actualizar(){
        $datos = array(
            'nombre'=>"'$this->_nombre'"
        );
        $wh="id='$this->_id'";
        
        return $this->update($wh, $datos);
    }
    public function getId(){
        return $this->_id;
    }
}