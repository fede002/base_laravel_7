# base_laravel_7X
Proyecto base PHP de laravel 7.12.X con recursos comunes para nuevos desarrollos

## Instalación
* Puede descargar el proyecto o clonarlo.
Una vez descargado en su ambiente de desarrollo ejecutar la instalación de dependencias por medio de composer

* Ubicado en el directorio del proyecto, ejecutar:
```
composer install
```
* Luego debe copiar y editar el archivo .env para el proyecto nuevo
```
cp .env.example .env
```
En el mismo tiene las variables de configuración para acceso a db, servidor de mail, etc, para editar segun se requiera

* debe generar un nueva key laravel para el proyecto
```
php artisan key:generate
```

* debe crear la tabla de usuarios ejecutando el migrate
```
php artisan migrate
```

* debe crear el usuario administrador con un seeder
```
php artisan db:seed --class=UsuarioSeeder
```
* debe vincular el storage de imagenes
```
php artisan storage:link
```

## El proyecto base cuenta con :

### Recursos para el cliente
#### Diseño
* [SB Admin 2](https://startbootstrap.com/themes/sb-admin-2/) - Template css para view free tipo dashboard
#### Script javascript
* [blockui](http://malsup.com/jquery/block/) - permite el block de pantalla para obligar a la espera de una solicitud
* [bootstrap](https://getbootstrap.com/) - 
* [chart.js](https://www.chartjs.org/) -
* [datatables](https://datatables.net/) - 


### Recursos de server
* [Laravel](https://laravel.com/) -	Base de laravel (actualmente laravel 7.12.x con PHP 7.3.12)
* [html2pdf](https://github.com/spipu/html2pdf) - Generador de PDF en base a HTML
* [SS datatables.js](https://github.com/yajra/laravel-datatables) - Server side for DataTable.js controller 		
* [Script Jenkins](http://jenkins.grupobasa.com.ar/) - Script para deploy, se debe editar los mismos para que apunten al ambiente correspondiente

## Mejoreas pendientes

******
1. mejorar los popup de errro con un grow
2. el destacado de los mensajes al lado de los campos, ponerlos a nivel del label con estilo danger
3. registro con hash en clave
4. envio de cambio de clave por mail y, solicitud de blanqueo
******
