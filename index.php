<?php

require 'app/vendor/autoload.php';

header('x-powered-by: PHP');
header('Server: Ubuntu');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-type: text/html; charset=UTF-8');

Configuration::init( realpath(dirname(__FILE__)) . '/app/', 'http://localhost:5001/', realpath(dirname(__FILE__) . '/db/' . 'db_accesos.db'));

Flight::register('view', 'Smarty', array(), function($smarty){
    $smarty->template_dir = 'app/templates/';
    $smarty->compile_dir = 'app/templates_c/';
    $smarty->config_dir = 'app/config/';
    $smarty->cache_dir = 'app/cache/';
});

/*
Flight::route('GET /', array('Controller_Index','index'));
Flight::route('GET /error/404', array('Controller_Error','error_404'));
Flight::map('notFound', function(){
	Flight::redirect('/error/404');
});
*/

Flight::route('GET /empresa/@id', array('Controller_Empresa','obtener'));
Flight::route('POST /empresa/guardar', array('Controller_Empresa','guardar'));

Flight::route('GET /sede/listar/@id', array('Controller_Sede','listar'));
Flight::route('POST /sede/guardar', array('Controller_Sede','guardar'));

Flight::route('GET /tipos_almacen/listar', array('Controller_Tipos_Almacen','listar'));
Flight::route('POST /tipos_almacen/guardar', array('Controller_Tipos_Almacen','guardar'));

Flight::route('GET /proveedor/listar', array('Controller_Proveedor','listar'));
Flight::route('POST /proveedor/guardar', array('Controller_Proveedor','guardar'));
Flight::route('GET /proveedor/obtener/@id', array('Controller_Proveedor','obtener'));
Flight::route('GET /proveedor/archivos_ids', array('Controller_Proveedor','archivos_ids'));

Flight::start();

?>
