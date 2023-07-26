<a href="?ctrl=CtrlEmpleado&accion=nuevo" class="btn btn-primary"> Nuevo Empleado</a>

<a href="#" id="imprimir" class="btn btn-success">Imprimir</a>

<a href="#" id="imprimir1" class="btn btn-success">Imprimir AutoTabla</a>


<table class="table table-striped table-hover">
  <tr>
    <th>id</th>
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>FechaNacimiento</th>
    <th>dni</th>
    <th>Fecha_alta</th>
    <th>Tipo</th>
    <th>Login</th>
    <th>Password</th>
    <th colspan="2">Operaciones</th>
  </tr>
  <?php
  # var_dump($datos);exit;
  if (is_array($datos))
    foreach ($datos as $d) { ?>

    <tr>
      <td><?= $d['id'] ?></td>
      <td><?= $d['nombres'] ?></td>
      <td><?= $d['apellidos'] ?></td>
      <td><?= $d['fechaNacimiento'] ?></td>
      <td><?= $d['dni'] ?></td>
      <td><?= $d['fecha_alta'] ?></td>
      <td><?= $d['tipo'] ?></td>
      <td><?= $d['login'] ?></td>
      <td><?= $d['password'] ?></td>
      <td><a href="?ctrl=CtrlEmpleado&accion=editar&id=<?= $d['id'] ?>"> Editar</a></td>
      <td><a href="?ctrl=CtrlEmpleado&accion=eliminar&id=<?= $d['id'] ?>"> Eliminar</a></td>
    </tr>
  <?php } ?>
</table>
<p></p>

<p></p>
<a href="?">Retornar</a>

<script type="text/javascript">
  $(function() {
    $('#imprimir').click(function() {
      // alert ("Imprimiendo");
      var datos = <?= json_encode(isset($datos) ? $datos : ''); ?>;

      console.log(datos)

      const doc = new jsPDF();

      doc.text("REPORTE", 50, 30);

      for (i = 0; i < datos.length; i++) {
        doc.text(datos[i]['id'], 30, 50 + i * 10)
        doc.text(datos[i]['nombre'], 50, 50 + i * 10)
      }
      doc.save("prueba.pdf");

    });

    $('#imprimir1').click(function() {
      var datos = <?= json_encode(isset($datos) ? $datos : ''); ?>;

      console.log(datos)

      const doc = new jsPDF();
      doc.setFontSize(20)
      doc.setTextColor(255, 0, 0) // Rojo
      doc.text("REPORTE", 50, 30);

      doc.setFontSize(10)
      doc.setTextColor(0, 0, 0) // Negro

      let columnas = []
      columnas.push(Object.keys(datos[0]))

      let data = []

      for (let i in datos) {
        data.push(Object.values(datos[i]));
      }
      doc.autoTable({
        head: columnas,
        body: data,
        margin: {
          top: 40
        }
      })


      doc.save("prueba.pdf");
    });
  });
</script>