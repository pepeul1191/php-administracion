<?php

class Empresas extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

  public function obtener($id)
	{
		return ORM::for_table('empresas')->select('id')->select('razon_social')->select('ruc')->select('direccion')->select('distrito_id')->where('id', $id)->find_array();
	}

  	public function guardar($id, $razon_social, $ruc, $direccion, $distrito_id)
    {
      $empresas = ORM::for_table('empresas')->where_equal('id', $id)->find_one();
      $empresas->set('razon_social', $razon_social);
      $empresas->set('ruc', $ruc);
      $empresas->set('direccion', $direccion);
      $empresas->set('distrito_id', $distrito_id);
      $empresas->save();
    }
}

?>
