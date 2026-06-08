<!-- ejercicios/ejercicio1.php -->
<?php include('include/header.php'); ?>

<!-- informacion del ejercicio -->
<div class="container">
    <h1 class="mt-5">Registro de Ventas</h1>
    <div id="alerta" class="alert alert-success" role="alert" style="display:none;">
        Datos enviados con éxito
    </div>
    <form id="registroVentas" action="guardar_ventas.php" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre del Cliente</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="producto">Producto</label>
            <input type="text" class="form-control" id="producto" name="producto" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
        </div>
        <div class="form-group">
            <label for="precio_unitario">Precio Unitario</label>
            <input type="number" step="0.01" class="form-control" id="precio_unitario" name="precio_unitario" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Venta</button>
    </form>
    <br>
    <a href="ver_ventas.php" class="btn btn-info">Ver Ventas Guardadas</a>
</div>

<script>
    document.getElementById('registroVentas').addEventListener('submit', function(event) {
        event.preventDefault();

        var form = event.target;
        var formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('alerta').style.display = 'block';
                setTimeout(() => {
                    document.getElementById('alerta').style.display = 'none';
                }, 3000);
            } else {
                alert('Ocurrió un error al guardar la información.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al guardar la información.');
        });
    });
</script>

<?php include('include/footer.php'); ?>