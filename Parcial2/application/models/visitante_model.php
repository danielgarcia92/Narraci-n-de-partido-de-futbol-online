<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visitante_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function consultarTodo(){
		$query = $this->db->get('comentarios');
		$datos['filas'] = $query->num_rows();
		for ($i=1; $i <= $datos['filas']; $i++) { 
			$datos['fila'.$i] = $query->row($i-1);
		}
		return $datos; 
	}
	
}