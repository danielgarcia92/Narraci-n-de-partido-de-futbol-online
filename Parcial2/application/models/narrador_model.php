<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Narrador_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function insertar($datos){
        $query = $this->db->insert('comentarios',$datos); 
	}

	public function consultarUltimaFila(){
		$query = $this->db->get('comentarios');
		$datos['filas'] = $query->num_rows();
		$datos['fila']  = $query->row($datos['filas'] - 1);
		return $datos; 
	}
	
}