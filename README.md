# Prueba PHP

## XAMPP 
- PHP 8.3
- PUERTA 80

## Categorías

### Formulario de productos

### Editar productos

### Validación al eliminar un producto

# Prueba de Laravel 
- PHP 8.3
- Composer 2.8.5
- Laravel versión 11 
- `php artisan serve`
- Puerta 8000
- MySQL 8
- Configuración `.env` MySQL
    - `DB_CONNECTION=mysql`
    - `DB_HOST=127.0.0.1`
    - `DB_PORT=3306`
    - `DB_DATABASE=movisat_app`
    - `DB_USERNAME=root`
    - `DB_PASSWORD=123@mudar`
- `docker-compose.yml`
- Ruta home

## Rutas

### Register

### Login

### Con prefijo
- `http://localhost:8000/movisat/dashboard`

### Usuario

### Editar usuario

### Roles

### Permisos

### Editar permisos

### Asignar permisos

## Pantallas y Funcionalidades

### 1. Pantalla de Bienvenida
- **URL:** `/`
- **Descripción:** Página inicial del sistema que muestra un mensaje de bienvenida.

### 2. Panel de Control
- **URL:** `/movisat/dashboard`
- **Descripción:** Página principal después del inicio de sesión, donde el usuario puede ver un resumen de actividades o información importante.

### 3. Perfil del Usuario
- **URLs:**
    - Editar Perfil: `/movisat/profile`
    - Actualizar Perfil: `/movisat/profile` (PATCH)
    - Eliminar Perfil: `/movisat/profile` (DELETE)
- **Descripción:** Permite al usuario editar, actualizar y eliminar su perfil.

### 4. Gestión de Usuarios
- **URLs:**
    - Listar Usuarios: `/movisat/users`
    - Crear Usuario: `/movisat/users/create`
    - Guardar Nuevo Usuario: `/movisat/users` (POST)
    - Editar Usuario: `/movisat/users/{user}/edit`
    - Actualizar Usuario: `/movisat/users/{user}` (PUT)
    - Eliminar Usuario: `/movisat/users/{user}` (DELETE)
    - Asignar Roles a Usuario: `/movisat/users/{user}/assign_roles`
    - Guardar Roles Asignados: `/movisat/users/{user}/assign_roles` (POST)
- **Descripción:** Permite listar, crear, editar, actualizar, eliminar usuarios y asignar roles a ellos.

### 5. Gestión de Roles
- **URLs:**
    - Listar Roles: `/movisat/roles`
    - Crear Rol: `/movisat/roles/create`
    - Guardar Nuevo Rol: `/movisat/roles` (POST)
    - Editar Rol: `/movisat/roles/{role}/edit`
    - Actualizar Rol: `/movisat/roles/{role}` (PUT)
    - Eliminar Rol: `/movisat/roles/{role}` (DELETE)
    - Asignar Permisos a Rol: `/movisat/roles/{role}/assign_permissions`
    - Guardar Permisos Asignados: `/movisat/roles/{role}/assign_permissions` (POST)
- **Descripción:** Permite listar, crear, editar, actualizar, eliminar roles y asignar permisos a ellos.

### 6. Gestión de Permisos
- **URLs:**
    - Listar Permisos: `/movisat/permiso`
    - Crear Permiso: `/movisat/permiso/create`
    - Guardar Nuevo Permiso: `/movisat/permiso` (POST)
    - Editar Permiso: `/movisat/permiso/{permiso}/edit`
    - Actualizar Permiso: `/movisat/permiso/{permiso}` (PUT)
    - Eliminar Permiso: `/movisat/permiso/{permiso}` (DELETE)
- **Descripción:** Permite listar, crear, editar, actualizar y eliminar permisos.

## Pantallas de Registro

### 1. Pantalla de Registro de Usuarios
- **URL:** `/movisat/users/create`
- **Descripción:** Formulario para crear un nuevo usuario.
- **Campos:**
    - Nombre
    - Correo Electrónico
    - Contraseña
    - Confirmación de Contraseña

### 2. Pantalla de Edición de Usuarios
- **URL:** `/movisat/users/{user}/edit`
- **Descripción:** Formulario para editar un usuario existente.
- **Campos:**
    - Nombre
    - Correo Electrónico
    - Contraseña (opcional)
    - Confirmación de Contraseña (opcional)

### 3. Pantalla de Asignación de Roles a Usuarios
- **URL:** `/movisat/users/{user}/assign_roles`
- **Descripción:** Formulario para asignar roles a un usuario.
- **Campos:**
    - Lista de Roles (selección múltiple)

### 4. Pantalla de Registro de Roles
- **URL:** `/movisat/roles/create`
- **Descripción:** Formulario para crear un nuevo rol.
- **Campos:**
    - Nombre

### 5. Pantalla de Edición de Roles
- **URL:** `/movisat/roles/{role}/edit`
- **Descripción:** Formulario para editar un rol existente.
- **Campos:**
    - Nombre

### 6. Pantalla de Asignación de Permisos a Roles
- **URL:** `/movisat/roles/{role}/assign_permissions`
- **Descripción:** Formulario para asignar permisos a un rol.
- **Campos:**
    - Lista de Permisos (selección múltiple)

### 7. Pantalla de Registro de Permisos
- **URL:** `/movisat/permiso/create`
- **Descripción:** Formulario para crear un nuevo permiso.
- **Campos:**
    - Nombre

### 8. Pantalla de Edición de Permisos
- **URL:** `/movisat/permiso/{permiso}/edit`
- **Descripción:** Formulario para editar un permiso existente.
- **Campos:**
    - Nombre
