# Agenda de Contactos (CRUD con PHP y MySQL)
## Información general
**Asignatura:** Programación Web

**Unidad:** Unidad 4 – Programación del lado del servidor con PHP

**Tipo de proyecto:** Mini proyecto

## Integrantes
* Yazmin Guadalupe Chacón Hernandez 
* Mariana Chávez Nuricumbo 
* Eva del Carmen González Santiz

## Descripción del proyecto
Este proyecto consiste en el desarrollo de una aplicación web dinámica que permite gestionar una agenda de contactos mediante operaciones CRUD (Crear, Leer, Actualizar y Eliminar).
El sistema fue desarrollado utilizando PHP y MySQL, implementando buenas prácticas de programación del lado del servidor, conexión segura a base de datos mediante PDO y validaciones tanto en cliente como en servidor.

## Tecnologías utilizadas
* PHP
* MySQL / MariaDB
* PDO (PHP Data Objects)
* HTML5
* CSS3
* Bootstrap Icons

## Funcionalidades implementadas

- Crear nuevos contactos
- Visualizar lista de contactos
- Ver detalle individual de contacto
- Editar información de contacto
- Eliminar contactos con confirmación
- Subida de imágenes (foto de contacto)
- Búsqueda dinámica de contactos
- Validación de formularios (cliente y servidor)
- Seguridad con sentencias preparadas (PDO)
- Sanitización de datos con `htmlspecialchars()`

## Seguridad implementada

* Uso de **PDO con sentencias preparadas** (prevención de SQL Injection)
* Validación de datos en servidor (PHP)
* Validación en cliente con HTML5
* Sanitización de salida con `htmlspecialchars()` (prevención XSS)
* Eliminación de registros mediante método POST
* Confirmación antes de eliminar datos

## Funcionamiento del sistema

El sistema permite al usuario:
1. Registrar contactos mediante un formulario
2. Visualizar todos los contactos en una tabla
3. Buscar contactos por nombre, teléfono o email
4. Editar información existente
5. Eliminar contactos con confirmación
6. Ver detalles completos de cada contacto

## Enlaces
Sistema en línea: *https://agendadecontactos.infinityfreeapp.com/*

Repositorio: *https://github.com/MarianaNuri/AgendaDeContactos*
