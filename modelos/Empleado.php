<?php
require_once "./core/Modelo.php";
class Empleado extends Modelo
{
    private $_id;
    private $_nombres;
    private $_apellidos;
    private $_fechaNacimiento;
    private $_dni;
    private $_fechaAlta;
    private $_tipo;
    private $_login;
    private $_password;

    private $_tabla = 'empleados';
    private $_vista = 'v_empleados';

    public function __construct(
        $id = null,
        $nombre = null,
        $apellido = null,
        $fechaNacimiento = null,
        $DNI = 0,
        $fechaAlta = null,
        $tipo = null,
        $login = null,
        $password = null
    ) {
        $this->_id = $id;
        $this->_nombres = $nombre;
        $this->_apellidos = $apellido;
        $this->_fechaNacimiento = $fechaNacimiento;
        $this->_dni = $DNI;
        $this->_fechaAlta = $fechaAlta;
        $this->_tipo = $tipo;
        $this->_login = $login;
        $this->_password = $password;

        parent::__construct($this->_tabla);
    }
    public function getAll()
    {
        //parent::setTabla($this->_vista);
        parent::setTabla($this->_tabla);
        return parent::getAll();
    }
    public function getBy($columna, $valor)
    {
        //parent::setTabla($this->_vista);
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
            //'id' => $this->_id,
            'nombres' => "'$this->_nombres'",
            'apellidos' => "'$this->_apellidos'",
            'fechaNacimiento' => "'$this->_fechaNacimiento'",
            'dni' => "'$this->_dni'",
            'fecha_alta' => "'$this->_fechaAlta'",
            'tipo' => "'$this->_tipo'",
            'login' => "'$this->_login'",
            'password' => "'$this->_password'"
        );
        parent::setTabla($this->_tabla);
        /* var_dump($datos);
        exit; */
        // Assuming the 'insert' function saves the data to the database
        return $this->insert($datos);
    }
    public function actualizar()
    {
        $datos = array(
            'id' => $this->_id,
            'nombres' => "'$this->_nombres'",
            'apellidos' => "'$this->_apellidos'",
            'fechaNacimiento' => "'$this->_fechaNacimiento'",
            'dni' => "'$this->_dni'",
            'fecha_alta' => "'$this->_fechaAlta'",
            'tipo' => "'$this->_tipo'",
            'login' => "'$this->_login'",
            'password' => "'$this->_password'"
        );
        $wh = "id=$this->_id";

        return $this->update($wh, $datos);
    }
    public function login($login, $clave)
    {
        $this->_login = $login;
        $this->_password = $clave;

        $this->_sql->addWhere("`login`='$login'");
        $this->_sql->addWhere("`password`='$clave'");
        //echo $this->_sql;
        //exit;
        return $this->_bd->ejecutar($this->_sql);
    }
}
