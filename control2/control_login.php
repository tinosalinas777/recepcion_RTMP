<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Datos de la base de datos
$servername = "localhost";
$username = "pela";
$password = "H4sh1982";
$dbname = "login";

// Crear conexiÃ³n
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexiÃ³n
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

// Iniciar sesiÃ³n
session_start();

// Obtener los datos ingresados en el formulario
$usuario = $_POST['usuarioIn'];
$pass = $_POST['passIn'];

// Preparar la consulta SQL para obtener el usuario y el rol
$sql = "SELECT contraseña, rol FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si el usuario existe y la contraseÃ±a es correcta
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verificar la contraseÃ±a
    if (password_verify($pass, $row['contraseña'])) {
        // Usuario y contraseÃ±a correctos, iniciar la sesiÃ³n
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $row['rol'];
        $_SESSION['last_activity'] = time(); // Guardar la Ãºltima actividad

        // Redirigir segÃºn el rol del usuario
        if ($row['rol'] == 'user') {
            header("Location: ../administracion.php");
        } else {
            header("Location: ../usuario.php"); // PÃ¡gina para usuarios normales
        }
        exit();
    } else {
        // ContraseÃ±a incorrecta
        echo "<script>window.location.href = 'fail.html';</script>";
    }
} else {
    // Usuario no encontrado
    echo "<script>window.location.href = 'fail.html';</script>";
}

// Cerrar la conexiÃ³n
$stmt->close();
$conn->close();
?>
