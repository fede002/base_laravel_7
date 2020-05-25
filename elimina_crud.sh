#!/bin/bash
#para ejecutar desde bash de git ./run.sh
echo "Secuencia bash para ejecutar los crud-generators"

rm "app/Http/Controllers/UsuarioController.php"
rm "app/Models/Usuario.php"
rm -r "resources/views/App/usuario"


echo "Termino!"
