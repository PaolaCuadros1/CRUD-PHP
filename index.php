<?php
include('Persona.php'); //Llamamos al archivo
$persona = new Persona(); //Creamos una nueva instancia de persona.

//Validamos si ya se envió algun dato desde el formulario.
if ( isset($_POST) && !empty($_POST) ){
  $insert = $persona->crearPersona($_POST); //Enviamos los parametros del post a la función de crearPersona().
  if ($insert){
    echo "Registro exitoso";
  }else{
    echo "Falló... ";
  }
}

$todasLasPersonas =  $persona->obtenerPersonas();


?>


<form method="POST">
  <label for="nombres"> Nombre </label>
  <input name="nombres" id="nombres" placeholder="Ingresa tu nombre" type="text" require /> <br />

  <label for="apellidos"> Apellido </label>
  <input name="apellidos" id="apellidos" placeholder="Ingresa tu apellido" type="text" require /> <br />

  <label for="profesion"> Profesión </label>
  <input name="profesion" id="profesion" placeholder="Ingresa tu email" type="text" require /> <br />

  <label for="descripcion"> Descripción </label>
  <textarea id="descripcion" name="descripcion"> </textarea>

  <button> Enviar </button>

</form>

<table>
  <th> Nombres </th>
  <th> Apellidos </th>
  <th> Profesión </th>
  <th> Descripción </th>
  <th> Modificar </th>
  <th> Eliminar </th>

  <?php 
  while( $pers = mysqli_fetch_object($todasLasPersonas) ){
    echo " <tr> ";
    echo " <td> $pers->nombres </td> ";
    echo " <td> $pers->apellidos </td> ";
    echo " <td> $pers->profesion </td> ";
    echo " <td> $pers->descripcion </td> ";
    echo " <td><a href='modificar.php?id=$pers->id'>Modificar</a></td>";
    echo " <td><a href='eliminar.php?id=$pers->id'>Eliminar</a></td>";
    echo " </tr> ";
  }
  ?>

</table>