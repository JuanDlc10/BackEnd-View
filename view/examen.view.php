<?php

use controller\Productos;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
</head>

<body>
    <h1>Examen U2 FrontEnd</h1>
    <div>
        <h3>Muestra el total de productos existentes</h3>
        <?php Productos::total(); ?>
    </div>
    <div>
        <h3>Muestra como maximo 3 productos</h3>
        <?php Productos::limite(3); ?>
    </div>
    <div>
        <h3>Muestra los productos usando un filtro de tu elección</h3>
        <?php Productos::filtro(3); ?>
    </div>
    <div>
        <h3>Muestra Todos los registros de la tabla Productos</h3>
        <?php Productos::obtener_datos(); ?>
    </div>
    <div>
        <h3>Muestra solo 1 producto</h3>
        <?php Productos::first(); ?>
    </div>
    <div>
        <h3>Elimina 1 producto en base a su id</h3>
        <?php
            Productos::eliminar_datos(1);
            Productos::obtener_datos();
        ?>
    </div>
    <br>
</body>

</html>