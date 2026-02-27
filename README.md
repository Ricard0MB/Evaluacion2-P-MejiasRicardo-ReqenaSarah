## Evaluación 2 - Cine
Universidad: UNIVERSIDAD POLITÉCNICA TERRITORIAL DEL ESTADO ARAGUA - "FEDERICO BRITO FIGUEROA"

## Carrera: Ingeniería de Sistemas

## Integrantes:
RICARDO ALEJANDRO MEJIAS BARRIOS ||
SARAH NATHALY REQUENA ROSALES

## Enunciado Asignado:

Enunciado 6: Cine - Relación (Padre -> 
Hijo) -Director-> Películas | Campos Mínimos (Tabla Hija) + 
Validación - titulo (required), duracion (integer), 
estreno (after:today).

Descripción del Proyecto
Aplicación web desarrollada en **Laravel 12** que implementa un CRUD completo para gestionar **películas** y **directores**, con relación de uno a muchos. Incluye validaciones, protección CSRF, mensajes flash y una mejora que permite **agregar un nuevo director directamente desde el formulario** de película, con autocompletado de nombres existentes.

## Instrucciones de Ejecución:

## 1. Clonar el repositorio
git clone https://github.com/Ricard0MB/Evaluacion2-P-MejiasRicardo-ReqenaSarah.git
cd Evaluacion2-P-MejiasRicardo-ReqenaSarah

## 2. Instalar dependencias
composer install

## 3. Configurar entorno
copy .env.example .env

## Luego edita el archivo .env con los datos de tu conexión a MySQL:

text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cine_db
DB_USERNAME=root
DB_PASSWORD=

## 4. Generar la clave de la aplicación
bash
php artisan key:generate

## 5. Ejecutar aplicación
php artisan serve
