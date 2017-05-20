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

	public function crear($nombre, $url, $subtitulo_id)
	{
		$items = ORM::for_table('items')->create();
		$items->set('subtitulo_id', $subtitulo_id);
		$items->set('nombre', $nombre);
		$items->set('url', $url);
		$items->save();

		return $items->id();
	}

	public function eliminar($id)
	{
		ORM::for_table('items')->where_equal('id', $id)->find_one()->delete();
	}

	public function menu($sistema, $nombre_modulo)
	{
		return ORM::for_table('items')->raw_query('
            SELECT I.nombre AS item, I.url, S.nombre AS subtitulo FROM items I
            INNER JOIN subtitulos S ON I.subtitulo_id = S.id
            INNER JOIN modulos M ON S.modulo_id = M.id
            INNER JOIN sistemas SI ON SI.id = M.sistema_id
            WHERE M.nombre = :nombre  AND SI.nombre = :sistema', array('nombre' => $nombre_modulo, 'sistema' => $sistema))->find_array();
	}

	public function listar_todos()
	{
		return ORM::for_table('items')->raw_query('
            SELECT M.nombre AS modulo , M.icono AS icono,S.nombre AS subtitulo,
            GROUP_CONCAT(I.nombre || "::" || I.url, "||") AS items
            FROM items I
            INNER JOIN subtitulos S ON I.subtitulo_id = S.id
            INNER JOIN modulos M ON S.modulo_id = M.id
            GROUP BY subtitulo
            ORDER BY modulo')->find_array();
	}
}

?>
