<!-- ejercicios/ejercicio4.php -->
<?php include('include/header.php');?>

<!-- informacion del ejercicio -->
<div class="container">
        <h2>Agendar Cita en el Veterinario para una Mascota</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre_dueno = $_POST["nombre_dueno"];
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];
            $nombre_mascota = $_POST["nombre_mascota"];
            $tipo_mascota = $_POST["tipo_mascota"];
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
            $fecha_cita = $_POST["fecha_cita"];
            $hora_cita = $_POST["hora_cita"];
            $motivo_cita = $_POST["motivo_cita"];
            $veterinario_asignado = $_POST["veterinario_asignado"];
            
            // Calcular edad de la mascota
            $fecha_nacimiento_dt = new DateTime($fecha_nacimiento);
            $hoy = new DateTime();
            $edad_mascota = $hoy->diff($fecha_nacimiento_dt)->y;
            
            // Guardar los datos en citas_veterinario.txt
            $cita = [
                $nombre_dueno, $telefono, $correo, $nombre_mascota, $tipo_mascota, $fecha_nacimiento, $edad_mascota,
                $fecha_cita, $hora_cita, $motivo_cita, $veterinario_asignado
            ];
            $file = fopen("citas_veterinario.txt", "a");
            fputcsv($file, $cita);
            fclose($file);
            
            echo '<div class="alert alert-success">La cita ha sido guardada correctamente.</div>';
        }
        ?>
        <form action="ejercicio4.php" method="post">
            <div class="form-group">
                <label for="nombre_dueno">Nombre del Dueño</label>
                <input type="text" class="form-control" id="nombre_dueno" name="nombre_dueno" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="number" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="nombre_mascota">Nombre de la Mascota</label>
                <input type="text" class="form-control" id="nombre_mascota" name="nombre_mascota" required>
            </div>
            <div class="form-group">
                <label for="tipo_mascota">Tipo de Mascota</label>
                <select class="form-control" id="tipo_mascota" name="tipo_mascota" required>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento de la Mascota</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <div class="form-group">
                <label for="fecha_cita">Fecha de la Cita</label>
                <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" required>
            </div>
            <div class="form-group">
                <label for="hora_cita">Hora de la Cita</label>
                <input type="time" class="form-control" id="hora_cita" name="hora_cita" required>
            </div>
            <div class="form-group">
                <label for="motivo_cita">Motivo de la Cita</label>
                <textarea class="form-control" id="motivo_cita" name="motivo_cita" required></textarea>
            </div>
            <div class="form-group">
                <label for="veterinario_asignado">Veterinario Asignado</label>
                <select class="form-control" id="veterinario_asignado" name="veterinario_asignado" required>
                    <option value="Dr. Smith">Dr. Smith</option>
                    <option value="Dra. Johnson">Dra. Johnson</option>
                    <option value="Dr. Williams">Dr. Williams</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agendar Cita</button>
        </form>
        <a href="ver_citas.php" class="btn btn-info">Ver Citas Agendadas</a>
    </div>


<?php include('include/footer.php'); ?>