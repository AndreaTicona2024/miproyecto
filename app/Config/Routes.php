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

// Ruta para mostrar usuarios activos
$routes->get('Login/usuariosActivos', 'Login::usuariosActivos');

// Rutas para productos
$routes->get('productos/crear', 'Productos::crear');
$routes->post('productos/guardar', 'Productos::guardar');
$routes->get('productos', 'Productos::index');
$routes->get('productos/editar/(:num)', 'Productos::editar/$1');
$routes->post('productos/actualizar/(:num)', 'Productos::actualizar/$1');
$routes->delete('productos/eliminar/(:num)', 'Productos::eliminar/$1');

// Rutas para reportes
$routes->get('reportes', 'Reportes::index'); // Listar reportes
$routes->get('reportes/crear', 'Reportes::crear'); // Formulario para crear un nuevo reporte
$routes->post('reportes/guardar', 'Reportes::guardar'); // Guardar un nuevo reporte
$routes->get('reportes/editar/(:num)', 'Reportes::editar/$1'); // Formulario para editar un reporte
$routes->post('reportes/actualizar/(:num)', 'Reportes::actualizar/$1'); // Actualizar un reporte
$routes->delete('reportes/eliminar/(:num)', 'Reportes::eliminar/$1'); // Eliminar un reporte
$routes->get('reportes/generar/(:num)', 'Reportes::generar/$1'); // Generar un reporte específico


// Definir rutas de pruebas si es necesario
$routes->get('test', 'TestController::index');
// Rutas para ventas
$routes->get('ventas', 'Ventas::index'); // Listar ventas
$routes->get('ventas/crear', 'Ventas::crear'); // Formulario para crear una nueva venta
$routes->post('ventas/guardar', 'Ventas::guardar'); // Guardar una nueva venta
$routes->get('ventas/editar/(:num)', 'Ventas::editar/$1'); // Formulario para editar una venta
$routes->post('ventas/actualizar/(:num)', 'Ventas::actualizar/$1'); // Actualizar una venta
$routes->delete('ventas/eliminar/(:num)', 'Ventas::eliminar/$1'); // Eliminar una venta
$routes->get('ventas/generar/(:num)', 'Ventas::generar/$1'); // Generar un reporte de una venta específica

