# MyTasks - Gestión de Tareas y Proyectos

¡Bienvenido a **MyTasks**! Esta es una aplicación web para la gestión de tareas, proyectos y escritorios, diseñada para organizar y simplificar tu flujo de trabajo.

## 📝 Descripción

MyTasks te permite gestionar:
- **Escritorios**: Representan un espacio para organizar proyectos.
- **Proyectos**: Dividen tus metas en secciones específicas.
- **Tareas**: Detallan las actividades a realizar dentro de un proyecto.

Cuenta con controles de permisos, asegurando que los usuarios puedan interactuar únicamente con sus escritorios, proyectos y tareas.

---

## 📋 Funcionalidades

1. **Escritorios**:
   - Crear escritorios asociados al usuario.
   - Ver los escritorios propios.
   
2. **Proyectos**:
   - Crear y listar proyectos asociados a un escritorio.
   - Subir al nivel de escritorios desde la vista de proyectos.
   
3. **Tareas**:
   - Crear, listar, editar, y eliminar tareas.
   - Actualizar el estado de las tareas (no iniciada, en progreso, finalizada, abandonada).
   - Subir al nivel de proyectos desde la vista de tareas.

4. **Control de Acceso y Seguridad**:
   - Políticas de acceso para garantizar que cada usuario solo pueda gestionar sus propios datos.
   - Errores manejados con mensajes de acceso restringido (`403 Forbidden`) para proteger los datos sensibles.

---

## 🚀 Instalación

Sigue estos pasos para ejecutar el proyecto en tu entorno local:

### Prerrequisitos
- **PHP >= 8.1**
- **Composer**
- **Laravel >= 10**
- **Base de datos**: MySQL, PostgreSQL u otra compatible con Laravel
- **Node.js y npm** para compilar assets front-end

### Instrucciones

1. **Clonar el repositorio:**
    
    git clone https://github.com/Elgrendar/MyTasks.git
    cd MyTasks

3. **Instalar dependencias

    composer install
    npm install
    npm run dev

4. **Configurar el archivo .env:

    Copia el archivo .env.example y cámbiale el nombre a .env.
    Configura las credenciales de la base de datos y otras variables de entorno necesarias.

5. **Generar la clave de la aplicación:

    php artisan key:generate

6. **Ejecutar migraciones:

    php artisan migrate

7. **Iniciar el servidor de desarrollo:

    php artisan serve
   
8. **Abre tu navegador y navega a tu url
