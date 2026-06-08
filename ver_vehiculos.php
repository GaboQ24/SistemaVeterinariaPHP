<?php include('include/header.php');?>

<!-- informacion del ejercicio -->
<div class="container">
        <h2>Vehículos Registrados</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año de Fabricación</th>
                    <th>Tipo de Vehículo</th>
                    <th>Edad del Vehículo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (file_exists("vehiculos.txt")) {
                    $file = fopen("vehiculos.txt", "r");
                    while (($line = fgetcsv($file)) !== false) {
                        echo "<tr>";
                        echo "<td>" . $line[0] . "</td>";
                        echo "<td>" . $line[1] . "</td>";
                        echo "<td>" . $line[2] . "</td>";
                        echo "<td>" . $line[3] . "</td>";
                        echo "<td>" . $line[4] . "</td>";
                        echo "</tr>";
                    }
                    fclose($file);
                }
                ?>
            </tbody>
        </table>
        <a href="ejercicio3.php" class="btn btn-primary">Regresar al formulario</a>
    </div>

<?php include('include/footer.php'); ?>