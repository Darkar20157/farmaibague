<?php
try{
  $conexion = mysqli_connect("localhost", "root", "", "FarmaIbague");
  $conexion->set_charset("utf8mb4");
  if(!$conexion){
    throw new Exception('No se pudo conectar a la DB');
  }
}catch(Exception $ex){
  echo "No se pudo conectar ".$ex;
}
?>