<?php
include('Database.php');
class Experiencia{
  public $id;
  public $empresa;
  public $ciudad;
  public $duracion;
  public $cargo;
  public $idPersona;
  public $conn;

  function __construct()
  {
    $db = new Database();
    $this->conn = $db->conectarse();
  }

  function crearExperiencia($data){
    $empresa = $data['empresa'];
    $ciudad = $data['ciudad'];
    $duracion = $data['duracion'];
    $cargo = $data['cargo'];
    $idPersona = $data['idPersona'];

    $sql = " INSERT INTO experiencias ( empresa, ciudad, duracion, cargo, idPersona ) VALUES ( '$empresa', '$ciudad', '$duracion', '$cargo', $idPersona ) ";
    echo $sql;
    $crear = mysqli_query($this->conn, $sql);
    if ($crear){
      return true;
    }else{
      return false;
    }
  }

}
?>