<?php include('include/header.php');?>

<!-- informacion del ejercicio -->
 <div class="container">
        <h2>Empleados Registrados</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del Empleado</th>
                    <th>Salario Base</th>
                    <th>Deducción (%)</th>
                    <th>Salario Neto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (file_exists("empleados.txt")) {
                    $file = fopen("empleados.txt", "r");
                    while (($line = fgetcsv($file)) !== false) {
                        echo "<tr>";
                        echo "<td>" . $line[0] . "</td>";
                        echo "<td>" . $line[1] . "</td>";
                        echo "<td>" . $line[2] . "</td>";
                        echo "<td>" . $line[3] . "</td>";
                        echo "</tr>";
                    }
                    fclose($file);
                }
                ?>
            </tbody>
        </table>
        <a href="ejercicio2.php" class="btn btn-primary">Regresar al Formulario</a>
    </div>


<?php include('include/footer.php'); ?>