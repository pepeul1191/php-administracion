<?php

class Tipos_Almacenes extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	public function crear($nombre)
	{
		$departamentos = ORM::for_table('tipos_almacenes')->create();
		$departamentos->set('nombre', $nombre);
		$departamentos->save();

		return $departamentos->id();
	}

	public function editar($id, $nombre)
	{
		$departamentos = ORM::for_table('tipos_almacenes')->where_equal('id', $id)->find_one();
		$departamentos->set('nombre', $nombre);
		$departamentos->save();
	}

	public function eliminar($id)
	{
		ORM::for_table('tipos_almacenes')->where_equal('id', $id)->find_one()->delete();
	}

	public function listar()
	{
		return ORM::for_table('tipos_almacenes')->select('id')->select('nombre')->find_array();
	}
}

?>
