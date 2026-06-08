<!-- ejercicios/ejercicio5.php -->
<?php include('include/header.php');?>

<!-- informacion del ejercicio -->
<div class="container mt-5">
        <h2>Servicio de Mensajería</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombreRemitente = $_POST['nombre_remitente'];
            $telefonoRemitente = $_POST['telefono_remitente'];
            $correoRemitente = $_POST['correo_remitente'];
            $nombreDestinatario = $_POST['nombre_destinatario'];
            $telefonoDestinatario = $_POST['telefono_destinatario'];
            $ciudadDestinatario = $_POST['ciudad_destinatario'];
            $direccionDestinatario = $_POST['direccion_destinatario'];
            $tipoMensaje = $_POST['tipo_mensaje'];
            $contenidoMensaje = $_POST['contenido_mensaje'];

            $tiempoEntrega = 0;
            switch ($ciudadDestinatario) {
                case 'misma_ciudad':
                    $tiempoEntrega = 1;
                    break;
                case 'ciudad_cercana':
                    $tiempoEntrega = 2;
                    break;
                case 'otra_region':
                    $tiempoEntrega = 5;
                    break;
            }

            $mensaje = "Remitente: $nombreRemitente\nTeléfono Remitente: $telefonoRemitente\nCorreo Remitente: $correoRemitente\n";
            $mensaje .= "Destinatario: $nombreDestinatario\nTeléfono Destinatario: $telefonoDestinatario\nCiudad Destinatario: $ciudadDestinatario\n";
            $mensaje .= "Dirección Destinatario: $direccionDestinatario\nTipo de Mensaje: $tipoMensaje\nContenido: $contenidoMensaje\n";
            $mensaje .= "Tiempo Estimado de Entrega: $tiempoEntrega días\n\n";

            file_put_contents('mensajes.txt', $mensaje, FILE_APPEND);

            echo '<div class="alert alert-success" role="alert">El mensaje ha sido enviado con éxito.</div>';
        }
        ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nombre_remitente">Nombre del Remitente</label>
                <input type="text" class="form-control" id="nombre_remitente" name="nombre_remitente" required>
            </div>
            <div class="form-group">
                <label for="telefono_remitente">Teléfono del Remitente</label>
                <input type="number" class="form-control" id="telefono_remitente" name="telefono_remitente" required>
            </div>
            <div class="form-group">
                <label for="correo_remitente">Correo del Remitente</label>
                <input type="email" class="form-control" id="correo_remitente" name="correo_remitente" required>
            </div>
            <div class="form-group">
                <label for="nombre_destinatario">Nombre del Destinatario</label>
                <input type="text" class="form-control" id="nombre_destinatario" name="nombre_destinatario" required>
            </div>
            <div class="form-group">
                <label for="telefono_destinatario">Teléfono del Destinatario</label>
                <input type="number" class="form-control" id="telefono_destinatario" name="telefono_destinatario" required>
            </div>
            <div class="form-group">
                <label for="ciudad_destinatario">Ciudad del Destinatario</label>
                <select class="form-control" id="ciudad_destinatario" name="ciudad_destinatario" required>
                    <option value="misma_ciudad">Misma ciudad</option>
                    <option value="ciudad_cercana">Otra ciudad cercana</option>
                    <option value="otra_region">Otra región</option>
                </select>
            </div>
            <div class="form-group">
                <label for="direccion_destinatario">Dirección del Destinatario</label>
                <input type="text" class="form-control" id="direccion_destinatario" name="direccion_destinatario" required>
            </div>
            <div class="form-group">
                <label for="tipo_mensaje">Tipo de Mensaje</label>
                <select class="form-control" id="tipo_mensaje" name="tipo_mensaje" required>
                    <option value="normal">Normal</option>
                    <option value="urgente">Urgente</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contenido_mensaje">Contenido del Mensaje</label>
                <textarea class="form-control" id="contenido_mensaje" name="contenido_mensaje" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
        </form>
        <br>
        <form method="POST" action="ver_mensajes.php">
            <button type="submit" class="btn btn-info">Ver Mensajes Enviados</button>
        </form>
    </div>

<?php include('include/footer.php'); ?>