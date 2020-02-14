<?php
  include('Persona.php');
  $persona = new Persona();
  $dp = $persona->obtenerPersona($_GET['id']);

  if ( isset($_POST) && !empty($_POST) ){
    $modificar = $persona->modificarUsuario($_POST);
    if ($modificar){
      echo " Modificación exitosa ";
    }else{
      echo "Error!";
    }
  }

?>

<form method="POST">
  <label for="nombres"> Nombre </label>
  <input name="nombres" id="nombres" placeholder="Ingresa tu nombre" type="text" require value=" <?= $dp->nombres ?> "  /> <br />

  <label for="apellidos"> Apellido </label>
  <input name="apellidos" id="apellidos" placeholder="Ingresa tu apellido" type="text" require value=" <?= $dp->apellidos ?> " /> <br />

  <label for="profesion"> Profesión </label>
  <input name="profesion" id="profesion" placeholder="Ingresa tu email" type="text" require value=" <?= $dp->profesion ?> " /> <br />

  <label for="descripcion"> Descripción </label>
  <textarea id="descripcion" name="descripcion"><?= $dp->descripcion ?> </textarea>

  <input type="hidden" name="id" value="<?= $dp->id ?>" />

  <button> Modificar </button>

</form>