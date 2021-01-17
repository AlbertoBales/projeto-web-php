<?php


class estado_model extends CI_model{

	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		return $this->db
			->order_by('nome')
			->get('estado');
	}
public function selectestados(){
	$options = "<option value=''>Selecione o Estado</option>";

	$estados = $this->getAll();

	foreach($estados -> result() as $estado){
		$options .= "<option value='{$estado->id}'>{$estado->nome}</option>";
	}

	return $options;
 }
}
