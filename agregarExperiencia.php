<?php
  if (isset($_POST) && !empty($_POST)){
    include('Experiencia.php');
    $experiencia = new Experiencia();
    $crear = $experiencia->crearExperiencia($_POST);
    if($crear){
      echo "Registro exitoso";
    }else{
      echo "error";
    }
  }
?>


<form method="POST" >
  <label for="empresa" > Empresa </label>
  <input name="empresa" id="empresa" type="text" />
  <label for="cargo" > Cargo </label>
  <input name="cargo" id="cargo" type="text" />
  <label for="ciudad" > Ciudad </label>
  <input name="ciudad" id="ciudad" type="text" />
  <label for="duracion" > Duración </label>
  <input name="duracion" id="duracion" type="text" />

  <input type="hidden" name="idPersona" value="<?= $_GET['id'] ?>" />
  <button> Guardar </button>
</form>