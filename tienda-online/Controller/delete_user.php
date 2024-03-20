<?php
 require('../modelo/conexion.php');
 $con = connection();

 $id= $_GET['id'];

 $sql= " DELETE FROM Customer WHERE id='$id' ";
 echo $sql;
 $query= mysqli_query($con,$sql);
    if($query){
    header("location:../index.php");
    };
    mysqli_close($con);
?>
