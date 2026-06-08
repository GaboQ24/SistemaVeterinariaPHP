<!-- ejercicios/ejercicio2.php -->
<?php include('include/header.php');?>

<!-- informacion del ejercicio -->
  <div class="container">
    <h2>Registro de Empleados</h2>
    <div id="alerta" class="alert alert-success" role="alert" style="display:none;">
        Datos enviados con éxito
    </div>
    <form id="formulario" action="registro.php" method="post">
        <div class="form-group">
            <label for="nombre">Nombre del Empleado:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="salario_base">Salario Base:</label>
            <input type="number" class="form-control" id="salario_base" name="salario_base" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="deduccion">Deducción (%):</label>
            <input type="number" class="form-control" id="deduccion" name="deduccion" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="ver_empleados.php" class="btn btn-info">Ver Empleados Registrados</a>
    </form>
</div>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function () {
        $("#formulario").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: 'registro.php',
                type: 'post',
                data: $("#formulario").serialize(),
                success: function (response) {
                    if (response.success) {
                        $("#alerta").show();
                        setTimeout(function () {
                            $("#alerta").hide();
                            $("#formulario")[0].reset();
                        }, 3000);
                    } else {
                        alert('Ocurrió un error al guardar la información.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    alert('Ocurrió un error en la solicitud AJAX.');
                }
            });
        });
    });
</script>

<?php include('include/footer.php'); ?>