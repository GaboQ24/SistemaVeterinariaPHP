<?php include('include/header.php');?>

<!-- informacion del ejercicio -->
<div class="container">
    <h2>Citas Agendadas</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nombre del Dueño</th>
            <th>Teléfono</th>
            <th>Correo Electrónico</th>
            <th>Nombre de la Mascota</th>
            <th>Tipo de Mascota</th>
            <th>Fecha de Nacimiento</th>
            <th>Edad de la Mascota</th>
            <th>Fecha de la Cita</th>
            <th>Hora de la Cita</th>
            <th>Motivo de la Cita</th>
            <th>Veterinario Asignado</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (($file = fopen("citas_veterinario.txt", "r")) !== FALSE) {
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                echo "<tr>";
                foreach ($data as $field) {
                    echo "<td>" . htmlspecialchars($field) . "</td>";
                }
                echo "</tr>";
            }
            fclose($file);
        } else {
            echo "<tr><td colspan='11'>No se encontraron citas agendadas.</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="ejercicio4.php" class="btn btn-primary">Agendar Nueva Cita</a>
</div>

<?php include('include/footer.php'); ?>