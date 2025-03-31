<?php
include 'conexion.php';

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $fecha_nacimiento = $conn->real_escape_string($_POST['fecha_nacimiento']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encriptar la contraseña
    $fecha_registro = date('Y-m-d H:i:s'); // Fecha y hora exacta del registro

    // Consulta SQL para insertar el registro
    $sql = "INSERT INTO registro_usuarios (nombre_completo, fecha_nacimiento, correo_electronico, contraseña, fecha_registro)
            VALUES ('$nombre', '$fecha_nacimiento', '$correo', '$contraseña', '$fecha_registro')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Redirigir con un mensaje de éxito
        header("Location: usuarios.php?mensaje=Usuario registrado exitosamente");
        exit();
    } else {
        // Si hay un error, redirigir con un mensaje de error
        header("Location: index.html?mensaje=Error: " . $conn->error);
        exit();
    }
}

// Cerrar la conexión
$conn->close();
?>
