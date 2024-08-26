<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reinicio de sistema VANT</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        background-image: url('./img/fondo3.jpg');
        background-size: cover; /* Ajusta la imagen para cubrir el área completa */
        background-position: center; /* Centra la imagen en la página */
        background-repeat: no-repeat; /* Evita que la imagen se repita */
    }
    .button-container {
        text-align: center;
    }
    .btn {
        padding: 15px 30px; /* Aumenta el tamaño de los botones */
        font-size: 20px; /* Aumenta el tamaño de la fuente */
        color: #fff;
        border: none;
        border-radius: 10px; /* Redondea más las esquinas */
        cursor: pointer;
        margin: 15px;
        transition: background-color 0.3s; /* Ajusta la transición */
        width: 200px; /* Opcional: tamaño fijo para todos los botones */
        position: relative; /* Necesario para la animación del borde */
        overflow: hidden; /* Para que el borde no se desborde */
    }
    .btn-inicio {
        background-color: #4CAF50; /* Verde */
    }
    .btn-inicio:hover {
        background-color: #8A2BE2; /* Violeta */
        box-shadow: 0 0 10px 5px rgba(255, 165, 0, 0.75); /* Luz naranja alrededor */
    }
    .btn-reinicio {
        background-color: #f44336; /* Rojo */
    }
    .btn-reinicio:hover {
        background-color: #8A2BE2; /* Violeta */
        box-shadow: 0 0 10px 5px rgba(255, 165, 0, 0.75); /* Luz naranja alrededor */
    }
   /* .btn-agregar {
        background-color: #2196F3; /* Azul */
   /* }
    .btn-agregar:hover {
        background-color: #8A2BE2; /* Violeta */
       /* box-shadow: 0 0 10px 5px rgba(255, 165, 0, 0.75); /* Luz naranja alrededor */
   /* }
    /* Animación del borde */
    .btn::before {
        content: '';
        position: absolute;
        top: -5px; left: -5px;
        width: calc(100% + 10px);
        height: calc(100% + 10px);
        border-radius: 15px; /* Alinea con el border-radius de .btn */
        border: 2px solid rgba(255, 165, 0, 0.75); /* Borde naranja */
        opacity: 0.5;
        pointer-events: none; /* Evita que el borde interfiera con el clic */
        z-index: -1; /* Coloca el borde detrás del contenido del botón */
        animation: borderGlow 2s infinite linear;
    }
    @keyframes borderGlow {
        0% {
            transform: rotate(0deg);
            border-color: rgba(255, 165, 0, 0.75);
        }
        100% {
            transform: rotate(360deg);
            border-color: rgba(255, 165, 0, 0.75);
        }
    }
</style>


</head>
<body>
    <div class="button-container">
        <button class="btn btn-inicio" onclick="ejecutarScript()">Inicio</button>
        <button class="btn btn-reinicio" onclick="reinicio()">Stop</button>
      	
    </div>

    <script>
        
            function ejecutarScript() {
            fetch('ejecutar_script.php')
                .then(response => response.text())
                .then(data => {
                    alert('Servicio INICIADO por favor verifique la recepcion de video');
                })
                .catch(error => {
                    alert('Error al ejecutar el script');
                    console.error('Error:', error);
                });
        }
            // Aquí puedes agregar la acción que deseas que ocurra al presionar el botón Inicio
        

        function reinicio() {
		fetch('detener_script.php')
                .then(response => response.text())
                .then(data => {
                    alert('Servicio Terminado por favor presione el boton inicio para recepcionar video nuevamente');
                })
                .catch(error => {
                    alert('Error al ejecutar el script');
                    console.error('Error:', error);
                });

            
            // Aquí puedes agregar la acción que deseas que ocurra al presionar el botón Reinicio
        }

       // function agregarUsuario() {
            
            // Aquí puedes agregar la acción que deseas que ocurra al presionar el botón Agregar Usuario
	//	window.location.href = 'add_user.html'; // Redirige a add_user.html
       // }
    </script>
</body>
</html>
