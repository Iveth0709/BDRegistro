<?php
// Parámetros de conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_datos = "formulario";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contraseña, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer el conjunto de caracteres
$conn->set_charset("utf8");
?>
