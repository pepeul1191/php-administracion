<?php

class Sedes extends Database
{
    public function __construct()
    {
      parent::__construct();
    }

    public function listar($empresa_id)
    {
      return ORM::for_table('sedes')->select('id')->select('nombre')->select('direccion')->select('distrito_id')->where('empresa_id', $empresa_id)->find_array();
    }

    public function crear($nombre, $distrito_id, $direccion, $empresa_id)
    {
      $sedes = ORM::for_table('sedes')->create();
      $sedes->set('nombre', $nombre);
      $sedes->set('distrito_id', $distrito_id);
      $sedes->set('direccion', $direccion);
      $sedes->set('empresa_id', $empresa_id);
      $sedes->save();

      return $sedes->id();
    }

    public function editar($id, $nombre, $distrito_id, $direccion)
    {
      $sedes = ORM::for_table('sedes')->where_equal('id', $id)->find_one();
      $sedes->set('nombre', $nombre);
      $sedes->set('distrito_id', $distrito_id);
      $sedes->set('direccion', $direccion);
      $sedes->save();
    }

    public function eliminar($id)
    {
      ORM::for_table('sedes')->where_equal('id', $id)->find_one()->delete();
    }
}

?>
