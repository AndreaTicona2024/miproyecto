<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

// Define el espacio de nombres, controlador y método predeterminados
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->setAutoRoute(true);

// Rutas básicas

// Ruta para la página de inicio
$routes->get('/', 'Home::index');

// Ruta para la página de inicio de sesión
$routes->get('login', 'Login::index');

// Ruta para crear una cuenta de usuario
$routes->get('register', 'Login::create');

// Ruta para manejar el registro de un nuevo usuario
$routes->post('register', 'Login::registrarUsuario');

// Ruta para mostrar un usuario por ID
$routes->get('users/(:num)', 'Users::show/$1');

// Ruta para actualizar un usuario por ID (requiere método POST)
$routes->post('users/update/(:num)', 'Users::update/$1');

// Ruta para eliminar un usuario por ID (requiere método DELETE)
$routes->delete('users/delete/(:num)', 'Users::delete/$1');

// Ruta para mostrar el perfil de un usuario (requiere nombre de usuario como parámetro)
$routes->get('profile/(:segment)', 'Users::profile/$1');

// Ruta para mostrar una página de error personalizada (Ejemplo: error 404)
$routes->get('404', 'Errors::show404');

// Ruta para verificar el correo electrónico
$routes->get('verificarCorreo', 'Login::verificarCorreo');
$routes->get('Login/usuariosActivos', 'Login::usuariosActivos');
