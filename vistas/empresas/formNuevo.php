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
    <?php 
    # var_dump($datos);
    $id = isset($datos['idempresas'])?$datos['idempresas']:'';
    $nombre= isset($datos['nombre'])?$datos['nombre']:'';
    $ruc= isset($datos['ruc'])?$datos['ruc']:'';
    $direccion= isset($datos['direccion'])?$datos['direccion']:'';
    $editar = ($id!='')?1:0;
    $titulo= ($editar==1)?'Editar Empresa':'Nueva Empresa';
    ?>
    <h1><?=$titulo?></h1>

    <form action="?ctrl=CtrlEmpresa&accion=guardar" method="post">
        Id: <input class="form-control" 
        type="text" name="id" value="<?=$id?>">
        <br>
        Nombre: <input class="form-control" 
        type="text" name="nombre" value="<?=$nombre?>">
        <br>

        Ruc: <input class="form-control" 
        type="text" name="ruc" value="<?=$ruc?>">
        <br>
        
        Dirección: <input class="form-control" 
        type="text" name="direccion" value="<?=$direccion?>">
        <br>

        <input type="hidden" name="op" value="<?=$editar?>">

        <input type="submit" value="Guardar">
    </form>
</body>
</html>