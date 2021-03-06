<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'usuario_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'login_controller';
$route['logout'] = 'login_controller/logout';
$route['usuarios'] = 'usuario_controller';
$route['usuarios/adicionar'] = 'usuario_controller/adicionar';
$route['usuarios/editar/(:any)'] = 'usuario_controller/editar/$1';
$route['usuarios/salvar'] = "usuario_controller/salvar_usuario";
$route['usuarios/atualizar/(:any)'] = "usuario_controller/atualizar_usuario/$1";
$route['usuarios/deletar/(:any)'] = 'usuario_controller/deletar/$1';
$route['clientes'] = 'cliente_controller';
$route['clientes/adicionar'] = 'cliente_controller/adicionar';
$route['clientes/editar/(:any)'] = 'cliente_controller/editar/$1';
$route['clientes/salvar'] = "cliente_controller/salvar_cliente";
$route['clientes/atualizar/(:any)'] = "cliente_controller/atualizar_cliente/$1";
$route['clientes/deletar/(:any)'] = 'cliente_controller/deletar/$1';
$route['produtos'] = 'produto_controller';
$route['produtos/adicionar'] = 'produto_controller/adicionar';
$route['produtos/editar/(:any)'] = 'produto_controller/editar/$1';
$route['produtos/salvar'] = "produto_controller/salvar_produto";
$route['produtos/atualizar/(:any)'] = "produto_controller/atualizar_produto/$1";
$route['produtos/deletar/(:any)'] = 'produto_controller/deletar/$1';
$route['vendas'] = 'venda_controller';
$route['vendas/adicionar'] = 'venda_controller/adicionar';
$route['vendas/salvar'] = "venda_controller/salvar_venda";

