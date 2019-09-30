<?php
/**
* 
*/
class Mproducto extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getProducto(){
	    $query = $this->db->get('productos');
    	return $query->result();
	}

	public function getProductoId($id){
	    //$query = $this->db->get('imagenes');
    	//return $query->result();
		//$s = $this->db->get_where('ciudades');
		$this->db->select('idProducto,nombre,descripcion,peso,precioUSD,categoria,foto');
		//$this->db->select('ruta');
		$this->db->from('productos');
		$this->db->where('idProducto',$id);
		$s = $this->db->get();

		return $s->result();
	}
    
    
    function subirProducto($param)
    {
        $campos = array(
			'nombre' => $param['nombre'],
			'descripcion' => $param['desc'],
			'peso' => $param['peso'],
			'precioUSD' => $param['USD'],
			'categoria' => $param['catego'],
			'foto' => $param['foto']
        );

		return $this->db->insert('productos',$campos);
    }
	/*public function getCiudadByNombre($text){
		
		$this->db->from('ciudades');
		$this->db->like('ciudad',$text,'both');
		$r = $this->db->get();
		return $r->result();
	}*/
    
	public function actualizarProducto($param){
		$id = $param['idProducto'];
		$campos = array(
			'nombre' => $param['nombre'],
			'descripcion' => $param['desc'],
			'peso' => $param['peso'],
			'precioUSD' => $param['USD'],
			'categoria' => $param['catego']
			//'foto' => $param['foto']
        );
		$this->db->where('idProducto',$id);
		$this->db->update('productos',$campos);
		return 1;
	}
	public function eliminarProducto($id){
		$this->db->where('idProducto',$id);
		$this->db->delete('productos');

		//$r = $this->db->get();
		return 1;
	}
}