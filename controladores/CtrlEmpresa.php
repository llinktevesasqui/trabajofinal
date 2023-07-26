<?php
require_once "./core/Controlador.php";
require_once "./modelos/Empresa.php";
class CtrlEmpresa extends Controlador
{
    public function index(){
        $accion = isset ($_GET['accion'])?$_GET['accion']:'mostrar';

        switch ($accion) {
            case 'nuevo':
                $this->nuevo();
                break;
            case 'editar':
                $this->editar();
                break;
            case 'eliminar':
                $this->eliminar();
                break;
            case 'guardar':
                $this->guardar();
                break;
            
            default:
                $this->select();
                break;
        }
        
    }
    public function editar(){
        $id = $_GET['id'];

        $obj = new Empresa($id);

        $datosObj = $obj->getBy('idempresas',$id);

        $datos = array(
            'datos'=>$datosObj['data'][0]
        );
        $this->mostrar('empresas/formNuevo.php',$datos);
    }

    public function guardar(){
        $id = $_POST['id'];
        $nombre= $_POST['nombre'];
        $ruc= $_POST['ruc'];
        $direccion= $_POST['direccion'];

        $op = $_POST['op'];
        $obj = new Empresa($id,$nombre, 
                $ruc, $direccion);
        if ($op ==0){
            $obj->guardar();  //Guardar Nuevo
        } else {
            $obj->actualizar();// Editar (UPDATE)
        }
        
        $this->select();
    }

    public function nuevo(){
        $this->mostrar('empresas/formNuevo.php');
    }

    public function eliminar(){
        $id = $_GET['id'];
        $obj = new Empresa($id);
        $obj->eliminar();
        # var_dump($obj->eliminar()); exit;
        $this->select();
    }

    public function select(){
        $obj = new Empresa();
        $datosObjs= $obj->getAll();
        $datos = array(
            'datos'=>$datosObjs['data']
        );

        $this->mostrar('empresas/mostrar.php',$datos);
    }
}