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
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
$route['default_controller'] = 'Inicio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Usuário
$route['painel_controle/usuarios'] = 'usuario/sel_user';
$route['painel_controle/cadastro/usuario'] = 'usuario/ins_user';
$route['painel_controle/cadastrar/usuario'] = 'usuario/ins_user/ins_usuario';
$route['alterar/usuario/(:num)'] = 'usuario/alt_user/alterar/$1';
$route['painel_controle/usuario/alterar/(:num)'] = 'usuario/alt_user/alterar/$1';
$route['painel_controle/usuario/alterar/senha/(:num)'] = 'usuario/alt_senha/alterar/$1';

// Grupo
$route['painel_controle/grupos'] = 'grupo/sel_grupo';
$route['painel_controle/cadastrar/grupo'] = 'grupo/ins_grupo/ins_n_grupo';
$route['painel_controle/cadastro/grupo'] = 'grupo/ins_grupo';
$route['painel_controle/grupo/(:num)'] = 'grupo/alt_grupo/alterar/$1';
$route['painel_controle/alterar/grupo/(:num)'] = 'grupo/alt_grupo/alterar/$1';

// Login
$route['inicio'] = 'login/user';
$route['login'] = 'login/user/login';
$route['logout'] = 'login/user/logout';

// Painel de controle
$route['painel_controle'] = 'painel/painel_controle';














