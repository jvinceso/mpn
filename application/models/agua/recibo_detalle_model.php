<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recibo_detalle_model extends CI_Model {
	private $nRedId = '';
	private $nRecId = '';
	private $nSecId = '';
	private $dRedFechaRegistro = '';
	private $cRedEstado = '';
	private $cRedPrecio = '';

	public function set_nRedId( $nRedId ){
		$this->nRedId = $nRedId;
	}

	public function set_nRecId( $nRecId ){
		$this->nRecId = $nRecId;
	}

	public function set_nSecId( $nSecId ){
		$this->nSecId = $nSecId;
	}

	public function set_dRedFechaRegistro( $dRedFechaRegistro ){
		$this->dRedFechaRegistro = $dRedFechaRegistro;
	}

	public function set_cRedEstado( $cRedEstado ){
		$this->cRedEstado = $cRedEstado;
	}

	public function set_cRedPrecio( $cRedPrecio ){
		$this->cRedPrecio = $cRedPrecio;
	}

	public	function get_nRedId(){
		return $this->nRedId;
	}

	public	function get_nRecId(){
		return $this->nRecId;
	}

	public	function get_nSecId(){
		return $this->nSecId;
	}

	public	function get_dRedFechaRegistro(){
		return $this->dRedFechaRegistro;
	}

	public	function get_cRedEstado(){
		return $this->cRedEstado;
	}

	public	function get_cRedPrecio(){
		return $this->cRedPrecio;
	}

	public function recalcularRecibo( $atrib ){

		$this->db->update_batch('recibo_detalle', $atrib, 'nRedId');


		// $this->db   
		// ->select_sum('cRedPrecio')
		// ->where('nRecId',$atrib[0]['nRecId'])
		// ->where('cRedEstado', '1');
		// $total = $this->db->get('recibo_detalle');



		$this->db->select('SUM(cRedPrecio) as cRedPrecio');
		$this->db->where('nRecId',$atrib[0]['nRecId']);
		$this->db->where('cRedEstado','1');
		$q=$this->db->get('recibo_detalle');
		$row=$q->row();
		$score=$row->cRedPrecio;

		$data = array(
			'fRecDeuda'  =>  $score
			);
		$this->db->where('nRecId', $atrib[0]['nRecId']);
		$this->db->update('recibo', $data); 


		return $this->db->affected_rows();

// UPDATE `recibo` SET `fRecDeuda` = WHERE `nRecId` = '2'
	}
}