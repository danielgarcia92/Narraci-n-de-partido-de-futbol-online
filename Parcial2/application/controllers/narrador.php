<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Narrador extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('narrador_model');
		$this->load->database('default');
		$this->load->helper(array('url'));
	}
	
	public function index(){
		$consulta = $this->narrador_model->consultarUltimaFila();
		$datos['fila'] = $consulta['fila'];
		$this->load->view('narrador_view',$datos);
	}

	public function insertarComentario(){
		$datos['minuto'] = $_POST['minuto'];
		$datos['equipo1'] = $_POST['equipo1'];
		$datos['equipo2'] = $_POST['equipo2'];
		$datos['comentarios'] = $_POST['comentarios'];
		$datos['golesEquipo1'] = $_POST['golesEquipo1'];
		$datos['golesEquipo2'] = $_POST['golesEquipo2'];
		$this->narrador_model->insertar($datos);
	}

}