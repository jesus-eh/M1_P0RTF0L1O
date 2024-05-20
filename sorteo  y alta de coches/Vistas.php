<?php

class Vistas
{

  public function seleccionColores($rs)
  {

    while ($row = $rs->fetch_array())
    {
	
      echo '<option value="' . $row[0] . '">
                           ' . $row[0] . '</option>';
    }
  }

  public function listaParticipantes($row)
  {
    echo '<tr>
           <td class="mayusculas">' . $row['Correo'] . '</td>
           <td class="mayusculas">' . $row['Nombre'] . '</td>
           <td class="mayusculas">' . $row['Color'] . '</td>
          </tr>';
  }

  public function botonSorteo()
  {
    echo '<form action="sorteo.php" method="POST" id="sorteo">
	<input type="submit" id="send" name="send" value="Sorteo"/>
	</form>';
  }

}
