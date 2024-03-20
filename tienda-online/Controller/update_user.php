<?php
 require('../modelo/conexion.php');

 $con = connection();

 $id= $_POST['id'];
 $nombre = $_POST['nombre'];
 $cedula= $_POST['cedula'];
 $telefono= $_POST['telefono']; 
 $sql= " UPDATE `Customer` SET `id`='$id',`nombre`='$nombre',`cedula`='$cedula',`telefono`='$telefono' WHERE id='$id'";
 echo $sql;
 $query= mysqli_query($con,$sql);
if($query){
 header("location:../index.php");
};
mysqli_close($con);
?>