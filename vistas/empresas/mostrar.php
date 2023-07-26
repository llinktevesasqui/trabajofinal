<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    <h1>Empresas</h1>
<a href="?ctrl=CtrlEmpresa&accion=nuevo"> Nueva Empresa</a>
    <table class="table table-striped table-hover">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Ruc</th>
            <th>Dirección</th>
            <th colspan="2">Operaciones</th>
        </tr>
    <?php  
        # var_dump($datos);exit;
        if (is_array($datos))
        foreach ($datos as $d) { ?>
        
        <tr>
            <td><?=$d['idempresas']?></td>
            <td><?=$d['nombre']?></td>
            <td><?=$d['ruc']?></td>
            <td><?=$d['direccion']?></td>
            <td><a href="?ctrl=CtrlEmpresa&accion=editar&id=<?=$d['idempresas']?>"> Editar</a></td>
            <td><a href="?ctrl=CtrlEmpresa&accion=eliminar&id=<?=$d['idempresas']?>"> Eliminar</a></td>
        </tr>
        <?php } ?>
    </table>
<p></p>

</body>
</html>