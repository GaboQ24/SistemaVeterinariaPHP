<?php include('include/header.php');?>

<div class="container mt-5">
        <h2>Mensajes Enviados</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Remitente</th>
                    <th>Teléfono Remitente</th>
                    <th>Correo Remitente</th>
                    <th>Destinatario</th>
                    <th>Teléfono Destinatario</th>
                    <th>Ciudad Destinatario</th>
                    <th>Dirección Destinatario</th>
                    <th>Tipo de Mensaje</th>
                    <th>Contenido</th>
                    <th>Tiempo de Entrega</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $mensajes = file('mensajes.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $mensajeIndividual = [];
                foreach ($mensajes as $linea) {
                    if (trim($linea) === '') {
                        continue; // Saltar líneas vacías
                    }
                    $mensajeIndividual[] = $linea;
                    if (count($mensajeIndividual) === 10) { // Hay 10 líneas por mensaje
                        echo '<tr>';
                        foreach ($mensajeIndividual as $detalle) {
                            $partes = explode(': ', $detalle, 2);
                            echo '<td>' . htmlspecialchars($partes[1]) . '</td>';
                        }
                        echo '</tr>';
                        $mensajeIndividual = []; // Reiniciar para el siguiente mensaje
                    }
                }
                ?>
            </tbody>
        </table>
		<a href="ejercicio5.php" class="btn btn-primary">Regresar al formulario</a>
    </div>
	
	<?php include('include/footer.php'); ?>