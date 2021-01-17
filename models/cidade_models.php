<?php

/**
 * 
 */
class Cidade_model extends CI_model{
	public function __construct(){
		parent::__construct();
	}

	public function getcidadesByestado($id_estado = null){

		return $this-> db
			- >Where("id_estado", $id_estado)
			- >order_by('nome')
			- >get('cidade');
	}
}