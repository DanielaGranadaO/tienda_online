<?php
require('../modelo/conexion.php');

$con = connection();

$sql_ventas = "SELECT * FROM Sale";

$result_ventas = mysqli_query($con, $sql_ventas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Lista de Ventas</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://kit.fontawesome.com/7977b423c1.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
<img src="../img/Big_phone_with_cart.jpg">
    <h1>Lista de ventas</h1>
    <!-- Aquí puedes agregar cualquier otro contenido de tu cabecera -->
</header>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Valor</th>
                <th>Cliente</th>
            </tr>
        </thead>
        <tbody> 
            <?php while($row=mysqli_fetch_array($result_ventas)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['id_product'] ?></td>
                    <td><?= $row['valor'] ?></td>
                    <td><?= $row['id_customer'] ?></td>
                </tr>
            <?php endwhile; ?> 
        </tbody>
    </table>

    <h2>Tabla de descuentos</h2>
<table>
    <thead>
        <tr>
            <th>Referencia del Producto</th>
            <th>Cantidad Comprada</th>
            <th>Precio de Venta</th>
            <th>Precio con Descuento (10%)</th>
        </tr>
    </thead>
    <tbody> 
        <?php 
        $sql = "SELECT id_product, COUNT(*) AS cantidad FROM Sale GROUP BY id_product";
        $query = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $id_product = $row['id_product'];
            $cantidad = $row['cantidad'];

            // Obtener el precio de venta del producto
            $sqlPrecio = "SELECT nombre, valor FROM product WHERE id = $id_product";
            $queryPrecio = mysqli_query($con, $sqlPrecio);
            $rowPrecio = mysqli_fetch_assoc($queryPrecio);
            $precioVenta = $rowPrecio['valor'];
            $nombreProducto = $rowPrecio['nombre'];

            // Aplicar descuento si la cantidad es mayor o igual a 5
            $precioConDescuento = $cantidad >= 5 ? $precioVenta * 0.9 : $precioVenta;

            echo "<tr>";
            echo "<td>$nombreProducto</td>";
            echo "<td>$cantidad</td>";
            echo "<td>$precioVenta</td>";
            echo "<td>$precioConDescuento</td>";
            echo "</tr>";
        }
        ?> 
    </tbody>
</table>

</div>

</body>
</html>