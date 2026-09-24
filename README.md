Sistema para Gimnasio SAYAGYM - Actualizado por el equipo

## Descripción del proyecto
Es un sistema para el registro de usuarios y productos diseñado para facilitar la administración de cualquier gimnasio. En este caso, el proyecto se está adaptando específicamente para nuestro cliente: **SAYAGYM**.

## Integrantes
Bautista Hernández Aída
Mancillas Hernández Patricia Elizabeth 
Reyes Rodríguez Joselín Catalina 
Ruiz Olvera Bryan Anderei 
Sánchez Roa Santiago
Vargas Vega Alejandro

## Tecnologías utilizadas
* **Backend:** PHP
* **Base de datos:** SQL
* **Frontend:** HTML, CSS
* **Control de versiones y Planeación:** Git, GitHub, GitHub Projects

## Arquitectura y microservicios
El sistema se divide modularmente para facilitar el desarrollo continuo:
1. **Microservicio de Registro de Clientes:** Gestiona el alta de nuevos usuarios, membresías, inicio de sesión y perfiles.
2. **Microservicio de Registro de Productos:** Administra el inventario del gimnasio, permitiendo registrar entradas, salidas y consultar el catálogo de productos disponibles.

## Requisitos e instalación
* Tener instalado un entorno de servidor local como **XAMPP**, **WAMP** o similar (que incluya Apache y MySQL).
* Tener instalado **Git** en el equipo.
* Navegador Web actualizado.

## Instrucciones de ejecución
1. Clonar este repositorio en tu equipo local abriendo la terminal y ejecutando:
   `git clone https://github.com/roasanty/DESARROLLO-GYM-TUTORA.git`
2. Mover la carpeta del proyecto clonado a la carpeta pública de tu servidor local (por ejemplo, `C:\xampp\htdocs\` si usas XAMPP).
3. Abrir el panel de control de tu servidor (XAMPP/WAMP) e iniciar los módulos de **Apache** y **MySQL**.
4. Importar el archivo `.sql` de la base de datos en `phpMyAdmin`.
5. Abrir el navegador e ingresar a la ruta local: `http://localhost/DESARROLLO-GYM-TUTORA`

## Evidencias
*(Nota para el equipo: Insertar aquí las capturas de pantalla del repositorio, los commits realizados, la estructura de carpetas y el tablero Kanban de GitHub Projects).*

## Estado del proyecto
**Fase Inicial (En progreso):** Configuración del repositorio, creación de la estructura base, planeación del tablero de actividades e implementación del flujo de trabajo (CI/CD).
