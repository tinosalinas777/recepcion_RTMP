<?php
session_start();

// Tiempo de expiraciÃ³n en segundos (2 minutos)
$expire_time = 1 * 60;

// Verificar si la sesiÃ³n ha expirado
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $expire_time) {
    session_unset();     // Elimina todas las variables de sesiÃ³n
    session_destroy();   // Destruye la sesiÃ³n
    echo 'expired'; // Indicar que la sesiÃ³n ha expirado
} else {
    echo 'active'; // Indicar que la sesiÃ³n estÃ¡ activa
}
?>
