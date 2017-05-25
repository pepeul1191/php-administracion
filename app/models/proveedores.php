<?php

class Proveedores extends Database
{
    public function __construct()
    {
      parent::__construct();
    }

    public function listar()
    {
      return ORM::for_table('proveedores')->select('id')->select('razon_social')->select('ruc')->select('direccion')->select('distrito_id')->find_array();
    }

    public function crear($razon_social, $ruc, $direccion, $distrito_id, $imagen_dni_id, $imagen_ruc_id)
    {
      $proveedores = ORM::for_table('proveedores')->create();
      $proveedores->set('razon_social', $razon_social);
      $proveedores->set('ruc', $ruc);
      $proveedores->set('direccion', $direccion);
      $proveedores->set('distrito_id', $distrito_id);
      $proveedores->set('imagen_dni_id', $imagen_dni_id);
      $proveedores->set('imagen_ruc_id', $imagen_ruc_id);
      $proveedores->save();

      return $proveedores->id();
    }

    public function editar($id, $razon_social, $ruc, $direccion, $distrito_id, $imagen_dni_id, $imagen_ruc_id)
    {
      $proveedores = ORM::for_table('proveedores')->where_equal('id', $id)->find_one();
      $proveedores->set('razon_social', $razon_social);
      $proveedores->set('ruc', $ruc);
      $proveedores->set('direccion', $direccion);
      $proveedores->set('distrito_id', $distrito_id);
      $proveedores->set('imagen_dni_id', $imagen_dni_id);
      $proveedores->set('imagen_ruc_id', $imagen_ruc_id);
      $proveedores->save();
    }

    public function obtener($id)
    {
      return ORM::for_table('proveedores')->select('id')->select('razon_social')->select('ruc')->select('direccion')->select('distrito_id')->select('distrito_id')->select('imagen_dni_id')->select('imagen_ruc_id')->where('id', $id)->find_array();
    }

    public function archivos_ids()
    {
       return ORM::for_table('vw_ids_archivos_proveedores')->find_array();
    }
}

?>
