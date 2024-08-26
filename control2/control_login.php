<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Datos de la base de datos
$servername = "localhost";
$username = "pela"; // Cambia 'tu_usuario' por tu usuario de MySQL
$password = "H4sh1982"; // Cambia 'tu_contraseña' por tu contraseña de MySQL
$dbname = "login"; // Cambia 'nombre_de_tu_base_de_datos' por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos ingresados en el formulario
$usuario = $_POST['usuarioIn'];
$pass = $_POST['passIn'];

// Preparar la consulta SQL para obtener el usuario
$sql = "SELECT contraseña FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si el usuario existe y la contraseña es correcta
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verificar la contraseña
    if (password_verify($pass, $row['contraseña'])) {
        // Usuario y contraseña correctos
        header("Location: ../administracion.php"); // Redirigir a add_user.html
        exit();
    } else {
        // Contraseña incorrecta
        
            echo "<script>
           
            window.location.href = 'fail.html';
        </script>";
    }
} else {
    // Usuario no encontrado
   
             echo "<script>
           
            window.location.href = 'fail.html';
        </script>";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
