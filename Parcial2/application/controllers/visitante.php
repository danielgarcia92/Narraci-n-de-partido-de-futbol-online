<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visitante extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('visitante_model');
		$this->load->database('default');
		$this->load->helper(array('url'));
	}
	
	public function index(){
		$consulta = $this->visitante_model->consultarTodo();
		$datos['filas'] = $consulta['filas'];

		for ($i=1; $i <= $datos['filas']; $i++){
			$datos['minuto'][$i] = $consulta['fila'.$i]->minuto;
			$datos['equipo1'][$i] = $consulta['fila'.$i]->equipo1;
			$datos['equipo2'][$i] = $consulta['fila'.$i]->equipo2;
			$datos['comentarios'][$i] = $consulta['fila'.$i]->comentarios;
			$datos['golesEquipo1'][$i] = $consulta['fila'.$i]->golesEquipo1;
			$datos['golesEquipo2'][$i] = $consulta['fila'.$i]->golesEquipo2;
		}

		$this->load->view('visitante_view',$datos);
	}

}