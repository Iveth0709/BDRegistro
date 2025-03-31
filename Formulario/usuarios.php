<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Consulta SQL para obtener los datos de los usuarios
$sql = "SELECT id, nombre_completo, fecha_nacimiento, correo_electronico, fecha_registro FROM registro_usuarios";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Registrados</title>
</head>
<body>
    <h2>Usuarios Registrados</h2>

    <?php if (isset($_GET['mensaje'])): ?>
        <!-- Mensaje de confirmación cuando se registra un nuevo usuario -->
        <div style="color: green;"><?php echo $_GET['mensaje']; ?></div>
    <?php endif; ?>

    <!-- Tabla para mostrar los usuarios registrados -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Fecha de Nacimiento</th>
            <th>Correo Electrónico</th>
            <th>Fecha de Registro</th>
        </tr>

        <?php
        // Verificar si se encontraron registros en la base de datos
        if ($resultado->num_rows > 0) {
            // Mostrar cada usuario en una fila de la tabla
            while ($fila = $resultado->fetch_assoc()) {
                echo '<tr>
                        <td>' . htmlspecialchars($fila["id"]) . '</td>
                        <td>' . htmlspecialchars($fila["nombre_completo"]) . '</td>
                        <td>' . htmlspecialchars($fila["fecha_nacimiento"]) . '</td>
                        <td>' . htmlspecialchars($fila["correo_electronico"]) . '</td>
                        <td>' . htmlspecialchars($fila["fecha_registro"]) . '</td>
                    </tr>';
            }
        } else {
            // Si no hay usuarios, mostrar un mensaje
            echo '<tr><td colspan="5">No hay usuarios registrados.</td></tr>';
        }
        ?>

    </table>

    <!-- Enlace para volver al formulario de registro -->
    <br>
    <a href="index.html"><button>Volver al formulario de registro</button></a>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>
