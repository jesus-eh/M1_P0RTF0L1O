<?php
include './Bbdd.php';
include './Vistas.php';

$vista = new Vistas();
$db = new Bbdd();
$db->conecta();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ALTAS SORTEO COCHE</title>
    <link rel="stylesheet" href="estilos.css"/>
  </head>
  <body>
  <h1>SORTEO COCHE:</h1>
  <br>
    <form action="index.php" method="POST" id="seleccionColoresCoche">
      ¿Acepta los terminos y condiciones del sorteo?
      <input type="checkbox" name="check" id="check" required>
      Color: 
      <select id="seleccionColores" name="seleccionColores">
        <?php
        $vista->seleccionColores($db->consulta("SELECT * FROM colores"));
        ?>
      </select>
      Nombre: 
      <input type="text" name="nombre" id="nombre">
      Correo: 
      <input type="email" name="email" id="email">
      <input type="submit" id="send" name="send" value="Alta"/>
    </form>



    <?php if($_POST) {  ?>
    <h1>PARTICIPANTES:</h1>
    <table>
      <tr>
        <td>Correo</td>
        <td>Nombre</td>
        <td>Color</td>
      </tr>
      <?php
      $email = $_POST['email'];
      $nombre = $_POST['nombre'];
      $seleccionColores = $_POST['seleccionColores'];

      $rm = $db->consulta("SELECT Correo FROM sorteoinfo");

      $check = 0;

      while ($row = $rm->fetch_array())
      {
        if(strtoupper($email)==strtoupper($row[0])){
          echo("El correo que ha introducido ya esta registrado");
          $check=1;
        }
      }


      if ($check==1) {
      } else{
        $ins = $db->consulta("INSERT INTO sorteoinfo VALUES ('$email', '$nombre', '$seleccionColores')");

        $rs = $db->consulta("SELECT * FROM sorteoinfo");

        $contador=0;
        while ($row = $rs->fetch_array())
        {
        $contador++;
        $vista->listaParticipantes($row);
        }

        if ($contador>7) {
          $vista->botonSorteo();
        }
      }
          
      ?>
    </table>
    <script src="javascript.js" type="text/javascript"></script>

    <?php }
     ?>


  </body>
</html>
<?php
$db->desconecta();
?>
