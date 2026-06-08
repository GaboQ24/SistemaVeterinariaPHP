<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $salario_base = $_POST['salario_base'];
    $deduccion = $_POST['deduccion'];

    // Cálculo del salario neto
    $salario_neto = $salario_base - ($salario_base * ($deduccion / 100));

    // Almacenar en archivo de texto
    $file = fopen("empleados.txt", "a");
    fwrite($file, "$nombre,$salario_base,$deduccion,$salario_neto\n");
    fclose($file);

    // Retornar éxito
    $response = array(
        'success' => true,
        'message' => 'Datos enviados con éxito'
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>