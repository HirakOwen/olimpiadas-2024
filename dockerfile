# Usa una imagen base de PHP
FROM php:7.4-apache

# Copia todo el contenido de tu proyecto en el contenedor
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80
