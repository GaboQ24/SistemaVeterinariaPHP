<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio_fabricacion = $_POST['anio_fabricacion'];
    $tipo = $_POST['tipo'];

    // Cálculo de la edad del vehículo
    $anio_actual = date("Y");
    $edad_vehiculo = $anio_actual - $anio_fabricacion;

    // Almacenar en archivo de texto
    $file = fopen("vehiculos.txt", "a");
    fwrite($file, "$marca,$modelo,$anio_fabricacion,$tipo,$edad_vehiculo\n");
    fclose($file);

    // Retornar éxito
    echo "success";
} else {
    echo "Error: método de solicitud no válido.";
}
?>