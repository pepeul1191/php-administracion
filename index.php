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

Flight::route('GET /estado_usuario/listar', array('Controller_Estado_Usuario','listar'));
Flight::route('GET /item/listar/menu', array('Controller_Item','menu'));
Flight::route('GET /item/listar_todos', array('Controller_Item','listar_todos'));
Flight::route('GET /item/listar/@subtitulo_id', array('Controller_Item','listar'));
Flight::route('POST /item/guardar', array('Controller_Item','guardar'));

Flight::map('notFound', function(){
	Flight::redirect('/error/404');
});
*/

Flight::route('GET /empresa/@id', array('Controller_Empresa','obtener'));
Flight::route('POST /empresa/guardar', array('Controller_Empresa','guardar'));

Flight::start();

?>
