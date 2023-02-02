<?php
try{
  $conexion = mysqli_connect("localhost", "FarmaIbague", "FarmaIbague2023*", "FarmaIbague");
  if(!$conexion){
    throw new Exception('No se pudo conectar a la DB');
  }
}catch(Exception $ex){
  echo "No se pudo conectar ".$ex;
}
?>