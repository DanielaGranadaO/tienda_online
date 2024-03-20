<?php
 require('../modelo/conexion.php');

 $con = connection();

 
 $nombre = $_POST['nombre'];
 $cedula = $_POST['cedula'];
 $telefono = $_POST['telefono'];
 

 $sql= " INSERT INTO `Customer`( `nombre`, `cedula`, `telefono`) VALUES ('$nombre','$cedula','$telefono')";
 echo $sql;
 $query= mysqli_query($con,$sql);
if($query){
 header("location:../index.php");
};
mysqli_close($con);
?>