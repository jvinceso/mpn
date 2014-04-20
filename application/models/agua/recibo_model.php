<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recibo_model extends CI_Model {
	private $nRecId = '';
	private $dRecFechaImpresion = '';
	private $fRecDeuda = '';
	private $fRecAbono = '';
	private $fRecDescuento = '';
	private $cRecPagado = '';
	private $dRecFechaPago = '';
	private $nFevId = '';
	private $nPerIdContribuyente = '';
	private $nPerIdTrabajador = '';

	public function set_dRecFechaImpresion( $dRecFechaImpresion ){
		$this->dRecFechaImpresion = $dRecFechaImpresion;
	}
	public function set_fRecDeuda( $fRecDeuda ){
		$this->fRecDeuda = $fRecDeuda;
	}
	public function set_fRecAbono( $fRecAbono ){
		$this->fRecAbono = $fRecAbono;
	}
	public function set_fRecDescuento( $fRecDescuento ){
		$this->fRecDescuento = $fRecDescuento;
	}
	public function set_cRecPagado( $cRecPagado ){
		$this->cRecPagado = $cRecPagado;
	}
	public function set_dRecFechaPago( $dRecFechaPago ){
		$this->dRecFechaPago = $dRecFechaPago;
	}
	public function set_nFevId( $nFevId ){
		$this->nFevId = $nFevId;
	}
	public function set_nPerIdContribuyente( $nPerIdContribuyente ){
		$this->nPerIdContribuyente = $nPerIdContribuyente;
	}
	public function set_nPerIdTrabajador( $nPerIdTrabajador ){
		$this->nPerIdTrabajador = $nPerIdTrabajador;
	}

	public function ins_procesar_recibos($anio){
		// nRecId
		// dRecFechaImpresion
		// fRecDeuda
		// fRecAbono
		// fRecDescuento
		// cRecPagado
		// dRecFechaPago
		// nFevId
		// nPerIdContribuyente
		// nPerIdTrabajador
		echo "procesando......";
		$nPerIdTrabajador = $this->session->userdata('IdPersona');
		$this->db->trans_start();
		$rsContribuyentes = $this->db->query('select p.nPerId from persona p
			inner join servicios_contribuyente sc on p.nPerId = sc.nPerId
			inner join costo_servicios_tipo cst on sc.nSetId = cst.nSetId
			where cPerEstado = 1 and cst.nCstAnio = '.$anio.'
			group by p.nPerId')->result_array();
		$rsCuotas = $this->db->query('select nFevId from fechas_vencimiento where nFevAnio = '.$anio.'')->result_array();
		foreach ($rsContribuyentes as $key => $value) {

			$nPerIdContribuyente = $value['nPerId'];
			foreach ( $rsCuotas as $indice => $valor) {
				$this->db->query("INSERT INTO recibo(nFevId,nPerIdContribuyente,nPerIdTrabajador)
					VALUES(".$valor['nFevId'].",".$nPerIdContribuyente.",".$nPerIdTrabajador.")");
				// print_p( $valor );
			}

		}
		// print_p($rsContribuyentes);

		$this->db->trans_complete();
		echo "<br>proceso terminado!!!!";
		    // print_p( $this->db );
		// if ($this->db->trans_status() === FALSE)
		// {
		//     // generate an error... or use the log_message() function to log your error
		//     $this->db->trans_rollback();
		// }else{
		// 	$this->db->trans_commit();
		// }		
	}


	// $this->db->trans_start();
	// $this->db->query('AN SQL QUERY...');
	// $this->db->query('ANOTHER QUERY...');
	// $this->db->query('AND YET ANOTHER QUERY...');
	// $this->db->trans_complete();

}

/* End of file recibo_model.php */
/* Location: ./application/models/agua/recibo_model.php */
?>