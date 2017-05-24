<?php

class Controller_Sede extends Controller
{
    public static function guardar()
    {
        $data = json_decode(Flight::request()->query['data']);
        $nuevos = $data->{'nuevos'};
        $editados = $data->{'editados'};
        $eliminados = $data->{'eliminados'};
        $empresa_id = $data->{"extra"}->{'empresa_id'};
        $rpta = []; $array_nuevos = [];

        try {
          if(count($nuevos) > 0){
            foreach ($nuevos as &$nuevo) {
                $id_generado = self::crear($nuevo->{'nombre'}, $nuevo->{'distrito_id'}, $nuevo->{'direccion'}, $empresa_id);
                $temp = [];
                $temp['temporal'] = $nuevo->{'id'};
                    $temp['nuevo_id'] = $id_generado;
                    array_push( $array_nuevos, $temp );
            }
          }
          if(count($editados) > 0){
            foreach ($editados as &$editado) {
              self::editar($editado->{'id'}, $editado->{'nombre'}, $editado->{'distrito_id'}, $editado->{'direccion'});
            }
          }
          if(count($eliminados) > 0){
            foreach ($eliminados as &$eliminado) {
                self::eliminar((int)$eliminado);
            }
          }
          $rpta['tipo_mensaje'] = 'success';
              $rpta['mensaje'] = ['Se ha registrado los cambios en las sedes', $array_nuevos];
        } catch (Exception $e) {
            #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            $rpta['tipo_mensaje'] = 'error';
              $rpta['mensaje'] = ['Se ha producido un error en guardar la tabla de sedes', $e->getMessage()];
        }
        echo json_encode($rpta);
      }

      public static function crear($nombre, $distrito_id, $direccion, $empresa_id)
      {
          $sedes = Controller::load_model('sedes');
          return $sedes->crear($nombre, $distrito_id, $direccion, $empresa_id);
      }

      public static function editar($id, $nombre, $distrito_id, $direccion)
      {
          $sedes = Controller::load_model('sedes');
          $sedes->editar($id, $nombre, $distrito_id, $direccion);
      }

      public static function eliminar($id)
      {
          $sedes = Controller::load_model('sedes');
          $sedes->eliminar($id);
       }

      public static function listar($empresa_id)
      {
          $sedes = Controller::load_model('sedes');
          echo json_encode($sedes->listar($empresa_id));
      }
}

?>
