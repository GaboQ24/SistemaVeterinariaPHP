<?php
// guardar_venta.php

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$precio_unitario = $_POST['precio_unitario'];

// Abrir el archivo ventas.txt y agregar la nueva venta
$file = fopen('ventas.txt', 'a');
fwrite($file, "Nombre: $nombre, Producto: $producto, Cantidad: $cantidad, Precio Unitario: $precio_unitario\n");
fclose($file);

// Devolver una respuesta JSON
$response = array("success" => true, "message" => "La información ha sido guardada correctamente.");
echo json_encode($response);
?>