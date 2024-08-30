<?php
session_start();

// Tiempo de expiración en segundos (2 minutos)
$expire_time = 1 * 60;

// Verificar si la sesión ha expirado
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $expire_time) {
    session_unset();     // Elimina todas las variables de sesión
    session_destroy();   // Destruye la sesión
    echo '<script>sessionExpired = true;</script>'; // Agregar un script para manejar la expiración
} else {
    $_SESSION['last_activity'] = time(); // Actualizar el tiempo de la última actividad
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PÃ¡gina de Administrador</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Verificar si la variable de expiraciÃ³n de sesiÃ³n estÃ¡ definida
            if (typeof sessionExpired !== 'undefined' && sessionExpired) {
                // Redirigir al login si la sesiÃ³n ha expirado
                window.location.href = "index.php?session_expired=true";
            } else {
                // Comprobar la expiraciÃ³n de la sesiÃ³n cada 30 segundos
                setInterval(function() {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'check_session.php', true); // Archivo que verifica la sesiÃ³n
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            if (xhr.responseText === 'expired') {
                                window.location.href = "index.php?session_expired=true";
                            }
                        }
                    };
                    xhr.send();
                }, 30000); // Intervalo de 30 segundos
            }
        });
    </script>
</head>
<body>
    <h1>Hola, Administrador</h1>
    <!-- Contenido de la pÃ¡gina -->
</body>
</html>
