<?php

class Controller_Proveedor extends Controller
{
      public static function listar()
      {
          $proveedores = Controller::load_model('proveedores');
          echo json_encode($proveedores->listar());
      }

      public static function guardar()
      {
          $data = json_decode(Flight::request()->query['data']);
          $rpta = [];

          try {
            if($data->{'id'} == 'E'){
                $id_generado = self::crear($data->{'razon_social'}, $data->{'ruc'}, $data->{'direccion'}, $data->{'distrito_id'}, $data->{'imagen_dni_id'}, $data->{'imagen_ruc_id'});
                $rpta['mensaje'] = ['Se ha creado un nuevo proveedor', $id_generado];
            }else{
                self::editar($data->{'id'}, $data->{'razon_social'}, $data->{'ruc'}, $data->{'direccion'}, $data->{'distrito_id'}, $data->{'imagen_dni_id'}, $data->{'imagen_ruc_id'});
                $rpta['mensaje'] = ['Los datos del proveedor se han actualizado'];
            }
            $rpta['tipo_mensaje'] = 'success';
          }catch (Exception $e) {
              #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
              $rpta['tipo_mensaje'] = 'error';
              $rpta['mensaje'] = ['Se ha producido un error en guardar los datos del proveedor', $e->getMessage()];
          }

          echo json_encode($rpta);
      }

      public static function crear($razon_social, $ruc, $direccion, $distrito_id, $imagen_dni_id, $imagen_ruc_id)
      {
          $proveedores = Controller::load_model('proveedores');
          return $proveedores->crear($razon_social, $ruc, $direccion, $distrito_id, $imagen_dni_id, $imagen_ruc_id);
      }

      public static function editar($id, $razon_social, $ruc, $direccion, $distrito_id, $imagen_dni_id, $imagen_ruc_id)
      {
          $proveedores = Controller::load_model('proveedores');
          $proveedores->editar($id, $razon_social, $ruc, $direccion, $distrito_id, $imagen_dni_id, $imagen_ruc_id);
      }

      public static function obtener($id)
      {
          $proveedores = Controller::load_model('proveedores');
          $rs = $proveedores->obtener($id);
          if (empty($rs)) {
              echo '';
          }else{
              echo json_encode($rs[0]);
          }
      }
}

?>
