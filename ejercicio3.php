<!-- ejercicios/ejercicio3.php -->
<?php include('include/header.php');?>

<!-- informacion del ejercicio -->
<div class="container">
        <h2>Registro de Vehículos</h2>
        <div id="alerta" class="alert alert-success" role="alert" style="display:none;">
            Datos enviados con éxito
        </div>
        <form id="formulario" action="registro_vehiculos.php" method="post">
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>
            <div class="form-group">
                <label for="anio_fabricacion">Año de Fabricación:</label>
                <input type="number" class="form-control" id="anio_fabricacion" name="anio_fabricacion" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de Vehículo:</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="ver_vehiculos.php" class="btn btn-info">Ver Vehículos Registrados</a>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $("#formulario").submit(function (event) {
                event.preventDefault(); // Evitar el envío normal del formulario

                $.ajax({
                    url: 'registro_vehiculos.php',
                    type: 'post',
                    data: $("#formulario").serialize(),
                    success: function (response) {
                        if (response == "success") {
                            $("#alerta").show();
                            setTimeout(function () {
                                $("#alerta").hide();
                                $("#formulario")[0].reset();
                            }, 3000);
                        } else {
                            alert("Error en el envío de datos: " + response);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error en la solicitud AJAX: " + textStatus + " - " + errorThrown);
                    }
                });
            });
        });
    </script>


<?php include('include/footer.php'); ?>