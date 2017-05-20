<?php

class Controller_Empresa extends Controller
{
    public static function guardar()
    {
        $data = json_decode(Flight::request()->query['data']);
        $empresas = Controller::load_model('empresas');
        $rpta = [];

        try {
          $empresas->guardar($data->{'id'}, $data->{'razon_social'}, $data->{'ruc'}, $data->{'direccion'}, $data->{'distrito_id'});
          $rpta['tipo_mensaje'] = 'success';
        	$rpta['mensaje'] = ['Los datos de la empresa se han actualizado'];
        }catch (Exception $e) {
            #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            $rpta['tipo_mensaje'] = 'error';
            $rpta['mensaje'] = ['Se ha producido un error en guardar la actulazación de los datos de la empresa', $e->getMessage()];
        }

        echo json_encode($rpta);
    }

    public static function obtener($id)
    {
    		$empresas = Controller::load_model('empresas');
        $rs = $empresas->obtener($id);
        echo json_encode($rs[0]);
    }
}

?>
