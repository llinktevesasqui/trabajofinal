<?php
session_start();

require_once "./core/Controlador.php";
require_once "./modelos/Empleado.php";

class CtrlEmpleado extends Controlador
{
    public function index()
    {
        $accion = isset($_GET['accion']) ? $_GET['accion'] : 'login';
        //$accion = isset($_GET['accion']);
        switch ($accion) {
            case 'login':
                $this->login();
                break;
            case 'logout':
                $this->logout();
                break;
            case 'validar':
                $this->validar();
                break;
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
            case 'index':
                $this->select();
                break;
            default:
                $this->select();
                break;
        }
    }
    public function login()
    {
        /*         $datos = array(
            'contenido' => $this->mostrar('empleados/login.php', '', true)
        );
        $this->mostrar('principal.php', $datos); */
        header('Location: ?ctrl=CtrlPrincipal');
    }
    public function validar()
    {
        $obj = new Empleado();
        $login = $_POST['usuario'];
        $clave = $_POST['clave'];

        $data = $obj->login($login, $clave);
        //echo $data;
        //var_dump($data);
        //exit;

        if ($data['data'] != null) {
            $_SESSION['usuario'] = $data['data'][0]['nombres'] . ' ' . $data['data'][0]['apellidos'];
            $_SESSION['menu'] = $this->getMenu();
            // echo $SESSION['usuario']; exit;     
            //header('Location: ?ctrl=CtrlPrincipal');
            $datos = array(
                'contenido' => $this->mostrar('empleados/dashboard.php', '', true)
            );
            $this->mostrar('principal.php', $datos);
        } else {
            echo "Usuario o Clave incorrecta";
            $this->login();
        }
    }
    public function logout()
    {
        session_unset();
        session_destroy();

        $this->login();

        exit;
    }
    public function editar()
    {
        /*         $id = $_GET['id'];

        $obj = new Producto($id);
        $obj = $obj->getBy('id', $id);
        $marcas = $this->getMarcas();
        $datos = array(
            'datos' => $obj['data'][0],
            'marcas' => $marcas['data']
        );
        $this->mostrar('empleados/formNuevo.php', $datos); */

        $id = $_GET['id'];

        $m = new Empleado($id);
        $Empleado = $m->getBy('id', $id);

        $data = array(
            'datos' => $Empleado['data'][0]
        );

        $datos = array(
            'contenido' => $this->mostrar('empleados/formNuevo.php', $data, true)
        );
        $this->mostrar('principal.php', $datos);
    }

    public function guardar()
    {
        $id = $_POST['id'];
        $nombres  = $_POST['nombre'];
        $apellidos  = $_POST['apellidos'];
        $fechaNacimiento  = $_POST['fechaNacimiento'];
        $dni  = $_POST['dni'];
        $fechaAlta  = $_POST['fecha_alta'];
        $tipo  = $_POST['tipo'];
        $login = $_POST['login'];
        $password = $_POST['password'];

        $op = $_POST['op'];
        //$obj = new Empleado($id, $nombre, $descripcion, $pu, $stock, $imagen, $idMarca);


        $obj = new Empleado($id, $nombres, $apellidos, $fechaNacimiento, $dni, $fechaAlta, $tipo, $login, $password);

        if ($op == 0) {
            $obj->guardar();  //Guardar Nuevo
            /*  var_dump($obj->guardar());
            exit; */
        } else {
            $obj->actualizar(); // Editar (UPDATE)
        }

        $this->select();
    }

    private function getMarcas()
    {
        /*    $m = new Marca(); */
        /*    return $m->getAll(); */
    }
    public function nuevo()
    {
        $datos = array(
            'contenido' => $this->mostrar('empleados/formNuevo.php', '', true)
        );
        $this->mostrar('principal.php', $datos);
        /*     $marcas = $this->getMarcas();
        $datos = array(
            'marcas'=>$marcas['data']
        );
        $this->mostrar('productos/formNuevo.php',$datos); */
    }

    public function eliminar()
    {
        $id = $_GET['id'];
        $obj = new Empleado($id);
        $obj->eliminar();
        # var_dump($obj->eliminar()); exit;
        $this->select();
    }

    public function select()
    {

        $m = new Empleado();
        $marcas = $m->getAll();
        $data = array(
            'datos' => $marcas['data']
        );
        //var_dump($data);
        //exit;
        $datos = array(
            'contenido' => $this->mostrar('empleados/mostrar.php', $data, true),
            'migas' => array('Empleados', 'Home')
        );
        $this->mostrar('principal.php', $datos);
    }

    private function getMenu()
    {
        return array(
            'CtrlEmpresa' => 'Empresas',
            'CtrlMarca' => 'Cartas',
            'CtrlProducto&accion=index' => 'Productos',
            'CtrlEmpleado&accion=index' => 'Empleados',
            'CtrlCliente' => 'Clientes'

        );
    }
}
