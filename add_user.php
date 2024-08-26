<?php
// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Datos de la base de datos
$servername = "localhost";
$username = "pela"; // Cambia 'root' por tu usuario de MySQL
$password = "H4sh1982"; // Cambia 'tu_contraseña' por tu contraseña de MySQL
$dbname = "login"; // Cambia 'nombre_de_tu_base_de_datos' por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Encriptar la contraseña (opcional pero recomendado)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Preparar la consulta SQL para insertar el usuario
$sql = "INSERT INTO usuarios (usuario, contraseña) VALUES (?, ?)";

// Crear una declaración preparada
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $hashed_password);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Usuario agregado exitosamente.";
} else {
    echo "Error al agregar el usuario: " . $stmt->error;
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>
