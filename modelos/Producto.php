<?php
require_once "./core/Modelo.php";
class Producto extends Modelo
{
    private $_id;
    private $_nombre;
    private $_descripcion;
    private $_pu;
    private $_stock;
    private $_imagen;
    private $_carta;
    private $_estado;
    private $_tabla = 'producto';
    private $_vista = 'v_productos';

    public function __construct(
        $id = null,
        $nombre = null,
        $descripcion = null,
        $pu = 0,
        $stock = 0,
        $imagen = null,
        //$marca = null
        $stado = null
    ) {
        $this->_id = $id;
        $this->_nombre = $nombre;
        $this->_descripcion = $descripcion;
        $this->_pu = $pu;
        $this->_stock = $stock;
        $this->_imagen = $imagen;
        $this->_estado = $stado;
        //$this->_carta = $marca;

        parent::__construct($this->_tabla);
    }
    public function getAll()
    {
        parent::setTabla($this->_tabla);
        return parent::getAll();
    }
    public function getBy($columna, $valor)
    {
        parent::setTabla($this->_tabla);
        return parent::getBy($columna, $valor);
    }
    public function eliminar()
    {

        return $this->deleteBy('id', $this->_id);
    }
    public function guardar()
    {
        $datos = array(
            'id' => $this->_id,
            'nombre' => "'$this->_nombre'",
            'descripcion' => "'$this->_descripcion'",
            'precio_unitario' => $this->_pu,
            'stock' => $this->_stock,
            'imagen' => "'$this->_imagen'",
            'estado' => "'$this->_estado'",
            //'id'=>$this->_carta
            // 'id'=>$this->_carta->getId()
        );
        /* var_dump($datos);
        exit; */
        return $this->insert($datos);
    }

    public function actualizar()
    {
        $datos = array(
            'nombre' => "'$this->_nombre'",
            'descripcion' => "'$this->_descripcion'",
            'precio_unitario' => $this->_pu,
            'stock' => $this->_stock,
            'imagen' => "'$this->_imagen'",
            'estado' => "'$this->_estado'",
            //'id' => $this->_carta
            // 'id'=>$this->_carta->getId()
        );
        $wh = "id=$this->_id";

        return $this->update($wh, $datos);
    }
}
