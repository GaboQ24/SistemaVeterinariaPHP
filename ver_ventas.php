<?php include('include/header.php');?>

<!-- informacion del ejercicio -->
<div class="container">
    <h1 class="mt-5">Ventas Guardadas</h1>
    <table class="table table-striped">
        <!-- encabezado de la tabla -->
        <thead>
            <tr>
                <th>Nombre del Cliente</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
            </tr>
        </thead>
        <!-- partes de la tabla -->
        <tbody>
            <?php
            if (file_exists("../examen_php/ventas.txt")) {
                $archivo = fopen("../examen_php/ventas.txt", "r");
                while (($linea = fgets($archivo)) !== false) {
                    // Eliminar los espacios en blanco y parsear los valores
                    $partes = explode(", ", trim($linea));
                    $nombre = explode(": ", $partes[0])[1];
                    $producto = explode(": ", $partes[1])[1];
                    $cantidad = explode(": ", $partes[2])[1];
                    $precio_unitario = explode(": ", $partes[3])[1];
                    $total = $cantidad * $precio_unitario;
                    echo "<tr>
                            <td>$nombre</td>
                            <td>$producto</td>
                            <td>$cantidad</td>
                            <td>$precio_unitario</td>
                            <td>$total</td>
                          </tr>";
                }
                fclose($archivo);
            }
            ?>
        </tbody>
    </table>
    <a href="ejercicio1.php" class="btn btn-primary">Regresar al Formulario</a>
</div>

<?php include('include/footer.php'); ?>