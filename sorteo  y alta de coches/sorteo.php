<?php
include './Bbdd.php';
include './Vistas.php';

$vista = new Vistas();
$db = new Bbdd();
$db->conecta();
?>

<!doctype html>
<html>
  <head>
    <title>Entrega de Premios</title>
    <link rel="stylesheet" href="estilos.css"/>
  </head>
  <body>
    <h1>GANADORES DEL SORTEO:</h1>
    <table>
      <tr>
        <td>Correo</td>
        <td>Nombre</td>
        <td>Color</td>
      </tr>
      <?php
      $rs = $db->consulta("SELECT * FROM sorteoinfo ORDER BY RAND() LIMIT 3");

      $contador=0;
      while ($row = $rs->fetch_array())
      {
        $contador++;
        $vista->listaParticipantes($row);
      }

      if ($contador>8) {
        $vista->botonSorteo();
      }
      ?>
    </table>
    <script src="javascript.js" type="text/javascript"></script>
  </body>
</html>
<?php
$db->desconecta();
?>