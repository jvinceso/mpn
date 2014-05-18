<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sectoresyvias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('agua/sector_model','objSector');
		$this->load->model('agua/via_model','objVia');
		$this->load->helper('tables_helper');
	}
	public function index()
	{
		$data['main_content'] = 'agua/sectoresyvias/panel_view';
		$data['aplicacion'] = 'Agua';
		$data['objeto'] = 'Sectores y Vías';
		$this->load->view('plantilla/template', $data);			
	}
	function prueba(){
		echo json_encode(array(1));
	}
	function insSector(){
		$this->objSector->set_cSecNombre( $this->input->post('txt_ins_sec_nom') );
		$result = $this->objSector->insSector();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function insVia(){
		$this->objVia->set_cViaNombre( $this->input->post('txt_ins_via_nom') );
		$result = $this->objVia->insVia();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}

	function listarSectores(){
		$opciones = array(
			'Editar' => array(
				'color'=>'blue'
				,'icono'=>'edit'
				,'tooltip'=>'info'
				),
			'Eliminar' => array(
				'color'=>'red'
				,'icono'=>'trash'
				,'tooltip'=>'danger'
				)
			);
		$tabla_data = $this->objSector->qrySector();
		$funciones = array(
			'initEvtOpcPopupId("edit","sectoresyvias/getSector/","Editar Sector",700,200,"func_close")',
			'initEvtDel("confirmarDeleteSector")'
			);
		$nameTable = 'tabla-Sector';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}

	function listarVias(){
		$opciones = array(
			'Editar' => array(
				'color'=>'blue'
				,'icono'=>'edit'
				,'tooltip'=>'info'
				),
			'Eliminar' => array(
				'color'=>'red'
				,'icono'=>'trash'
				,'tooltip'=>'danger'
				)
			);
		$tabla_data = $this->objVia->qryVias();
		$funciones = array(
			'initEvtOpcPopupId("edit","sectoresyvias/getVia/","Editar Vía",700,200,"func_close")',
			'initEvtDel("confirmarDeleteVia")'
			);
		$nameTable = 'tabla-Vias';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}

	function getSector($nSecId) {
		// echo $nPerId;
		$fila = $this->objSector->getSector($nSecId);
        // print_p($fila);
		if ($fila) {
			$filax["fila"] = $fila;
			$this->load->view('agua/sectoresyvias/upd_sector_view', $filax);
		} else {
			echo "Error";
		}
	}

	function getVia($nViaId) {
		// echo $nPerId;
		$fila = $this->objVia->getVia($nViaId);
        // print_p($fila);
		if ($fila) {
			$filax["fila"] = $fila;
			$this->load->view('agua/sectoresyvias/upd_via_view', $filax);
		} else {
			echo "Error";
		}
	}

    public function updSector() {
        $this->objSector->set_nSecId($this->input->post('txt_upd_nSecId'));
        $this->objSector->set_cSecNombre($this->input->post('txt_upd_sec_nom'));
        $result = $this->objSector->updSector();
//        print_p($result);
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function updVia() {
        $this->objVia->set_nViaId($this->input->post('txt_upd_nViaId'));
        $this->objVia->set_cViaNombre($this->input->post('txt_upd_via_nom'));
        $result = $this->objVia->updVia();
//        print_p($result);
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    }

    function delSector(){
		$this->objSector->set_nSecId( $this->input->post('nSecId') );
		if ($this->objSector->delSector()) {	
			echo "1";
		}else{
			echo "0";
		}
	} 

	function delVia(){
		$this->objVia->set_nViaId( $this->input->post('nViaId') );
		if ($this->objVia->delVia()) {	
			echo "1";
		}else{
			echo "0";
		}
	}
}
?>