<?php
require('../modelo/conexion.php');
$con = connection();

$id=$_GET["id"];

$sql= "SELECT * FROM Customer WHERE id='$id'";
$query= mysqli_query($con, $sql);
$row= mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://kit.fontawesome.com/7977b423c1.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
<img src="../img/Big_phone_with_cart.jpg">
    <h1>Tienda Online</h1>
</header>

<div class="container">
    <div class="form-container">
        <h2>Editar cliente</h2>
        <form action="../controller/update_user.php" method="POST" >
            <input type="hidden" name="id" value=" <?= $row['id'] ?> ">
            <input type="text" name="nombre" placeholder="Nombre" value="<?= $row['nombre'] ?>">
            <input type="text" name="cedula" placeholder="Apellido" value="<?= $row['cedula'] ?>">
            <input type="text" name="telefono" placeholder="Usuario" value="<?= $row['telefono'] ?>"> 
            <input type="submit" value="Editar cliente">
        </form>
    </div> 
</div>
</body>
</html>