# CRUD de Países y consulta de casos SARS-CoV-2

_El proyecto consiste en crear un CRUD de sus acrónimos (Create | Read | Update | Delete) de países para consultar los casos registrados de SARS-Cov-2 con base al consumo de la API Covid19 
[consultar más información](https://documenter.getpostman.com/view/10808728/SzS8rjbc#b07f97ba-24f4-4ebe-ad71-97fa35f3b683)._

<br>

<img src="https://raw.githubusercontent.com/oscar-er/sars/master/public/assets/containers/sars.png">

<br>


## Introducción 📖


Sigue las instrucciones para que puedas tener una réplica del proyecto en funcionamiento en tu máquina local.


### Comencemos 🚀

Recuerda que necesitas contar con un entorno de desarrollo ya integrado en tu equipo local que nos permita trabajar con <b>MySQL/MariaDB</b>, <b>Apache o Nginx</b> y <b>PHP</b>.
Si aún no lo tienes instalado puedes consultar la [documentación oficial](https://www.apachefriends.org/es/index.html) de XAMPP Server donde a detalle te explican como instalar dichas herramientas.


#### Composer

<b>Composer</b> nos permite manejar dependencias y librerías para PHP.

_Para su <b>instalación</b> [consulta la documentación oficial](https://getcomposer.org/doc/00-intro.md)._


#### Laravel
Ya instalado el gestor de dependencias de Composer vamos a instalar <b>Laravel</b>.

Para ello, desde la terminal de tu sistema operativo escribimos la siguiente instrucción:

```
composer global require laravel/installer
```

<b>Listo, ya tenemos preparado nuestro entorno de desarrollo para clonar nuestro proyecto.</b>

<br>
<br>

##Descarga y ejecución del proyecto 📂

#### Git clone
Abre una <b>terminal</b> de tu sistema operativo y dirígete a la <b>ruta</b> donde deseas descargar el repositorio y escribimos la siguiente instrucción:

````
git clone https://github.com/oscar-er/sars.git
````


#### Dependencias para PHP

Gracias a <b>Composer</b> podemos agregar las dependencias para PHP que son necesarias para nuestro proyecto, para ello, debemos cambiar a la ubicación del proyecto desde la terminal y escribir el siguiente comando:

````
composer install
````



#### Creación de la Base de Datos

_Recuerda que necesitamos contar con nuestro gestor de base de datos <b>MySQL/MariaDB</b>, para el cual, vamos a crear nuestra DB haciendo uso de nuestro manejador favorito con el siguiente script SQL_

````
create database `sars` default charset utf8 collate utf8_spanish_ci;
````


#### Sistema de migración de la Base de Datos

El sistema de migraciones de Laravel nos permite crear fácilmente nuestras tablas en la Base de Datos. 

_IMPORTANTE: antes ejecutar el sistema de migraciones debes tener en cuenta lo siguiente:_

* Dentro de la carpeta del proyecto se encuentra un archivo llamado <b>.env</b> que contiene toda la configuración para la conexión a la base de datos, asegurate de modificar la información DB_USERNAME  y DB_PASSWORD si es necesario.
<br>
<br>DB_USERNAME=root
<br>DB_PASSWORD=
<br><br>



Para ejecutar el sistema de migraciones de Laravel es necesario usar la siguiente instrucción:

````
php artisan migrate
````

_<b>IMPORTANTE: recuerda que debes cambiar a la ubicación del proyecto desde la terminal.</b>_ 

<br>

#### Ejecución de la aplicación


Para ejecutar nuestra aplicación desde la terminal vamos a escribir la siguiente instrucción:

````
php artisan serve
````

_Recuerda que nuestra aplicación se encuentra en funcionamiento en la URL:
<br>
<br>
<b>[http://127.0.0.1:8000](http://127.0.0.1:8000)</b>_
<br>
<br>
<b>¡Felicidades!</b> Ya tenemos nuestra aplicación en funcionamiento.....
Comienza a realizar tus primeros registros y consulta los casos actuales de Coronavirus SARS-CoV-2.


<br>

## Autor 👨‍💻

* <b>[Oscar Reyes](https://oscarreyes.alwaysdata.net)</b>

<br>
<br>
<br>
<br>

## Desarrollado con

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


