<?php
include('Database.php');
  class Persona{

    /**
     * Atributos
     */
    public $id;
    public $nombres;
    public $apellidos;
    public $profesion;
    public $descripcion;
    public $conn;

    /**
     * Método por donde empieza nuestra clase.
     */
    function __construct()
    {
      $db = new Database();
      $this->conn = $db->conectarse();
    }

    /**
     * Función para insertar una nueva persona.
     */
    function crearPersona($data){
      $nombres = $data['nombres'];
      $apellidos = $data['apellidos'];
      $profesion = $data['profesion'];
      $descripcion = $data['descripcion'];

      $sql = " INSERT INTO Personas ( nombres, apellidos, profesion, descripcion ) VALUES ( '$nombres', '$apellidos', '$profesion', '$descripcion' ) ";
      $res = mysqli_query($this->conn, $sql);
      if ($res){
        return true;
      }else{
        return false;
      }
    }


    function obtenerPersonas(){
      $sql = " SELECT * FROM Personas ";
      return mysqli_query( $this->conn, $sql );
    }

    /**
     * Función para obtener una persona por el id.
     */
    function obtenerPersona($id){
      $sql = " SELECT * FROM Personas WHERE id=$id ";
      return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }

    function modificarUsuario($data){
      $id = $data['id'];
      $nombres = $data['nombres'];
      $apellidos = $data['apellidos'];
      $profesion = $data['profesion'];
      $descripcion = $data['descripcion'];

      $sql = " UPDATE Personas SET nombres='$nombres', apellidos='$apellidos', profesion='$profesion', descripcion='$descripcion' WHERE id = $id ";
      $update = mysqli_query($this->conn, $sql);
      if($update){
        return true;
      }else{
        return false;
      }
    }

    function eliminarUsuario($id){
      $sql = " DELETE FROM Personas WHERE id = $id ";
      return mysqli_query($this->conn, $sql);
    }

  }
