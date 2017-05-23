<?php

class Controller_Tipos_Almacen extends Controller
{
  public static function guardar()
	{
		$data = json_decode(Flight::request()->query['data']);
		$nuevos = $data->{'nuevos'};
		$editados = $data->{'editados'};
		$eliminados = $data->{'eliminados'};
		$rpta = []; $array_nuevos = [];

    try {
			if(count($nuevos) > 0){
				foreach ($nuevos as &$nuevo) {
				    $id_generado = self::crear($nuevo->{'nombre'});
				    $temp = [];
				    $temp['temporal'] = $nuevo->{'id'};
	              $temp['nuevo_id'] = $id_generado;
	              array_push( $array_nuevos, $temp );
				}
			}
			if(count($editados) > 0){
				foreach ($editados as &$editado) {
					self::editar($editado->{'id'}, $editado->{'nombre'});
				}
			}
			if(count($eliminados) > 0){
				foreach ($eliminados as &$eliminado) {
			    	self::eliminar((int)$eliminado);
				}
			}
			$rpta['tipo_mensaje'] = 'success';
        	$rpta['mensaje'] = ['Se ha registrado los cambios en los tipos de almacenes', $array_nuevos];
		} catch (Exception $e) {
		    #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		    $rpta['tipo_mensaje'] = 'error';
        	$rpta['mensaje'] = ['Se ha producido un error en guardar la tabla de tipos de almacenes', $e->getMessage()];
		}

		echo json_encode($rpta);
	}

    public static function listar()
    {
    		$tipos_almacen = Controller::load_model('tipos_almacenes');
        	echo json_encode($tipos_almacen->listar());
    }

    public static function crear($nombre)
    {
    	$tipos_almacen = Controller::load_model('tipos_almacenes');
		  return $tipos_almacen->crear($nombre);
    }

    public static function editar($id, $nombre)
    {
    	$tipos_almacen = Controller::load_model('tipos_almacenes');
		  $tipos_almacen->editar($id, $nombre);
    }

    public static function eliminar($id)
    {
    	$tipos_almacen = Controller::load_model('tipos_almacenes');
		  $tipos_almacen->eliminar($id);
    }
}

?>
