<?php
require('modelo/conexion.php');

$con = connection();

$sql = "SELECT * FROM Customer";

$query=mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/7977b423c1.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   

   
</head>
<body>

<header>
<img src="img/Big_phone_with_cart.jpg">
    <h1>Tienda Online</h1>
    <!-- Aquí puedes agregar cualquier otro contenido de tu cabecera -->
</header>

<div class="container">
    <div class="form-container">
        <h2>Crear cliente</h2>
        <form action="controller/crear_cliente.php" method="POST">
            <input type="text" name="nombre" required>
            <input type="text" name="cedula" required >
            <input type="text" name="telefono" > 
            <input type="submit" value="Agregar usuario">
        </form>
    </div> 
 
    <h2>Lista de clientes</h2>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody> 
            <?php while($row=mysqli_fetch_array($query)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['cedula'] ?></td>
                <td><?= $row['telefono'] ?></td>
                <td><a href="controller/delete_user.php?id=<?= $row['id'] ?>"><i class="fa-regular fa-trash-can"></i></a></td>
                <td><a href="vista/update.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
            </tr>
            <?php endwhile; ?> 
        </tbody>
    </table>

    
    <form action="vista/ventas.php">
        <button type="submit">
            <i class="fa-brands fa-salesforce"></i> Ir a pantalla de ventas
        </button>
    </form>

</div>

</body>
</html>