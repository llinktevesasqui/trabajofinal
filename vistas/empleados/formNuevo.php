    <?php
    # var_dump($datos);
    $id = isset($datos['id']) ? $datos['id'] : '';
    $nombres = isset($datos['nombres']) ? $datos['nombres'] : '';
    $apellidos = isset($datos['apellidos']) ? $datos['apellidos'] : '';
    $fechaNacimiento = isset($datos['fechaNacimiento']) ? $datos['fechaNacimiento'] : '';
    $dni = isset($datos['dni']) ? $datos['dni'] : '';
    $fechaAlta = isset($datos['fecha_alta']) ? $datos['fecha_alta'] : '';
    $tipo = isset($datos['tipo']) ? $datos['tipo'] : '';
    $login = isset($datos['login']) ? $datos['login'] : '';
    $password = isset($datos['password']) ? $datos['password'] : '';
    $editar = ($id != '') ? 1 : 0;
    $titulo = ($editar == 1) ? 'Editar Empleado' : 'Nuevo Empleado';
    ?>
    <h1><?= $titulo ?></h1>

    <form action="?ctrl=CtrlEmpleado&accion=guardar" method="post">
        Id: <input class="form-control" type="text" name="id" value="<?= $id ?>">
        <br>
        Nombre: <input class="form-control" type="text" name="nombre" value="<?= $nombres ?>">
        <br>
        Apellidos: <input class="form-control" type="text" name="apellidos" value="<?= $apellidos ?>">
        <br>
        Fecha de Nacimiento: <input class="form-control" type="date" name="fechaNacimiento" value="<?= $fechaNacimiento ?>">
        <br>
        DNI: <input class="form-control" type="text" name="dni" value="<?= $dni ?>">
        <br>
        Fecha de Alta: <input class="form-control" type="text" name="fecha_alta" value="<?= $fechaAlta ?>">
        <br>
        Tipo: <input class="form-control" type="text" name="tipo" value="<?= $tipo ?>">
        <br>
        Login: <input class="form-control" type="text" name="login" value="<?= $login ?>">
        <br>
        Password: <input class="form-control" type="text" name="password" value="<?= $password ?>">
        <input type="hidden" name="op" value="<?= $editar ?>">

        <input type="submit" value="Guardar">
    </form>

    <a href="?ctrl=CtrlEmpleado&accion=index">Retornar</a>