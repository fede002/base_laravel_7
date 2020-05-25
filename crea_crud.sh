#!/bin/bash
#para ejecutar desde bash de git ./run.sh
echo "Secuencia bash para ejecutar los crud-generators"

php artisan crud:generate Usuario  --fields_from_file="resources\crud-generator\json\usuario.json" --controller-namespace="App\Http\Controllers"  --model-namespace="Models" --soft-deletes=yes --view-path=App --form-helper=html --route=no

echo "Correr migrate a mano: php artisan migrate"
echo "Termino!"
