<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('App\Controllers\Front\Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/**Grupo de Rutas Front*/
$routes->group('/',['namespace' => 'App\Controllers\Front'],function($routes){
	$routes->get('', 'Home::index', ['as' => 'home']);
	$routes->get('articulo/(:segment)', 'Home::article/$1', ['as' => 'article']);
});
/**Grupo de Rutas Auth*/
$routes->group('auth',['namespace' => 'App\Controllers\Auth'],function($routes){
	$routes->get('registro', 'Register::index', ['as' => 'register']);
	$routes->get('ingresar', 'Login::index', ['as' => 'login']);
	$routes->get('salir', 'Login::signout', ['as' => 'signout']);

	$routes->post('registrarme', 'Register::store', ['as' => 'store']);
	$routes->post('ingresando', 'Login::signin', ['as' => 'signin']);
});
/**Grupo de Rutas Administrador 
 * usamos un filtro para validar si el usuario inicio sesión
 * también le pasamos parámetros para ver que roles pueden ingresar
*/
$routes->group('admin',['namespace' => 'App\Controllers\Admin', 'filter' => 'auth:Admin'],function($routes){
	//Posts
	$routes->get('articulos', 'Post::index', ['as' => 'posts']);
	$routes->get('articulo/crear', 'Post::create', ['as' => 'post_create']);
	$routes->post('articulo/guardar', 'Post::store', ['as' => 'post_store']);
	$routes->get('articulo/editar/(:any)', 'Post::edit/$1', ['as' => 'post_edit']);
	$routes->post('articulo/actualizar', 'Post::update', ['as' => 'post_update']);
	$routes->get('articulo/eliminar/(:any)', 'Post::delete/$1', ['as' => 'post_delete']);
	
	//Categorias
	$routes->get('categorias', 'Category::index', ['as' => 'categories']);

	$routes->get('categoria/crear', 'Category::create', ['as' => 'category_create']);
	$routes->post('categoria/guardar', 'Category::store', ['as' => 'category_store']);

	$routes->get('categoria/editar/(:any)', 'Category::edit/$1', ['as' => 'category_edit']);
	$routes->post('categoria/actualizar', 'Category::update', ['as' => 'category_update']);
	$routes->get('categoria/eliminar/(:any)', 'Category::delete/$1', ['as' => 'category_delete']);
});
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
