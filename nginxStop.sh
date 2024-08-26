#!/bin/bash

# Ruta al binario
BINARIO="/usr/local/nginx/sbin/nginx"

# Verifica si el binario existe
if [ ! -f "$BINARIO" ]; then
    echo "Error: El binario no existe en $BINARIO"
    exit 1
fi

# Ejecuta el binario con el argumento -s stop
echo "Ejecutando el binario..."
$BINARIO -s stop

# Captura el código de retorno
RET=$?

# Verifica el código de retorno
if [ $RET -eq 0 ]; then
    echo "El binario se ejecutó correctamente."
else
    echo "Error al ejecutar el binario. Código de retorno: $RET"
    exit $RET
fi




