<?php

class Proveedores extends Database
{
    public function __construct()
    {
      parent::__construct();
    }

    public function listar()
    {
      return ORM::for_table('proveedores')->select('id')->select('razon_social')->select('ruc')->find_array();
    }

    public function crear($razon_social, $ruc, $direccion, $distrito_id)
    {
      $proveedores = ORM::for_table('proveedores')->create();
      $proveedores->set('razon_social', $razon_social);
      $proveedores->set('ruc', $ruc);
      $proveedores->set('direccion', $direccion);
      $proveedores->set('distrito_id', $distrito_id);
      $proveedores->save();

      return $proveedores->id();
    }

    public function editar($id, $razon_social, $ruc, $direccion, $distrito_id)
    {
      $proveedores = ORM::for_table('proveedores')->where_equal('id', $id)->find_one();
      $proveedores->set('razon_social', $razon_social);
      $proveedores->set('ruc', $ruc);
      $proveedores->set('direccion', $direccion);
      $proveedores->set('distrito_id', $distrito_id);
      $proveedores->save();
    }
}

?>
