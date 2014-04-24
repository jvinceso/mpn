<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recibo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('agua/costo_servicios_tipo_model','objCosto');
		$this->load->model('agua/recibo_model','objRecibo');
		$this->load->model('multitabla_model','objMultitabla');
		//Do your magic here
	}
	public function index()
	{
		$this->loaders->verificaAcceso();
		$data['main_content'] = 'agua/recibos/panel_view';
		$data['aplicacion'] = 'Agua';
		$data['objeto'] = 'Recibos';
		$this->objMultitabla->set_nMulIdPadre(51);//nMulIdPadre->Servicios=51
		$data['cboServicio'] = $this->objMultitabla->qrymultitabla();
		$this->load->view('plantilla/template', $data);			
	}
	function obtenerAnios(){
		$cboAniosFiscales = $this->objCosto->getAniosFiscales( $this->input->post('servicio') );
		// print_p($cboAniosFiscales);
		if( !empty($cboAniosFiscales) )	echo form_dropdown("cbo_anios", creaCombo($cboAniosFiscales),'', 'id="cbo_anios" class="chosen-select w360"');
		else echo "2";
	}
	function procesar_recibos( $anio ){
		$this->objRecibo->ins_procesar_recibos( $anio );
	}
	function scraping(){
		// http://www.sunat.gob.pe/w/wapS01Alias?ruc=10463979729
		// $url = "http://www.sunat.gob.pe/w/wapS01Alias?ruc=10463979729";		 
		$url = "http://localhost/mpn/wapS01Alias.xml";		 
		$raw = file_get_contents($url);
		$newlines = array("\t","\n","\r","\x20\x20","\0","\x0B");		 
		$content = str_replace($newlines, "", html_entity_decode($raw));

		$start = strpos($content,'<p>');
		// $start = strpos($content,'<card title="Resultado" id="frstcard">');
		$end = strpos($content,'</p>',$start);
		// $end = strpos($content,'</card>',$start) + 8;
		$card_info = substr($content,$start,$end-$start);
		print_p("info necesaria");
		var_dump($card_info);
		preg_match_all("|<small><b>Número Ruc. </b> (.*) <br/></small>|U",$card_info,$numRuc);
		var_dump( $numRuc[1] );
		$rt = $numRuc[1][0];
		$dat = explode(' - ', $rt );
		echo "ruc : ".$dat[0].'<br />';
		echo "nombre : ".$dat[1];
		var_dump( $dat );//Aqui Tenemos el Ruc Limpio de Etiquetas
		preg_match_all("|<small><b>Estado.</b>(.*)</small><br/>|U",$card_info,$estadoContribuyente);
		// var_dump( $estadoContribuyente[1] );//Aqui Tenemos el Estado Según Sunat
		print_p( $estadoContribuyente[1] );//Aqui Tenemos el Estado de Contribuyente Según Sunat
		preg_match_all("|<small><b>Nombre Comercial.</b><br/>(.*)</small><br/>|U",$card_info,$nombreComercial);
		print_p( $nombreComercial[1] );//Aqui Tenemos el nombreComercial Según Sunat
		preg_match_all("|<small><b>Dirección.</b><br/>(.*)</small><br/>|U",$card_info,$direccion);
		print_p( $direccion[1] );//Aqui Tenemos el direccion Según Sunat
		preg_match_all("|<small><b>Tipo.</b><br/> (.*)</small><br/>|U",$card_info,$tipoPersona);
		print_p( $tipoPersona[1] );//Aqui Tenemos el tipoPersona Según Sunat
		preg_match_all("|<small>Situación.<b>(.*)</b></small><br/>|U",$card_info,$situacionSunat);
		print_p( $situacionSunat[1] );//Aqui Tenemos el situacionSunat Según Sunat
		preg_match_all("|<small><b>Teléfono\(s\).</b><br/>(.*)</small><br/>|U",$card_info,$telefonos);
		print_p( $telefonos[1] );//Aqui Tenemos el telefonos Según Sunat
		if ( $tipoPersona[1]== 'PERSONA NATURAL SIN NEGOCIO' ) {
			preg_match_all("|<small><b>DNI</b> : (.*)</small><br/>|U",$card_info,$dni);
			print_p( $dni[1] );//Aqui Tenemos el Dni Según Sunat
			preg_match_all("|<small><b>Fecha Nacimiento.</b> (.*)</small><br/>|U",$card_info,$fechaNacimiento);
			print_p( $fechaNacimiento[1] );//Aqui Tenemos el Dni Según Sunat
			# code...
		}
		// $numero_ruc = "<small><b>N&#xFA;mero Ruc. </b>";
	}
	function scraping_dinamico(){
		// http://www.sunat.gob.pe/w/wapS01Alias?ruc=10463979729
		// $url = "http://www.sunat.gob.pe/w/wapS01Alias?ruc=10463979729";		 
		$url = "http://localhost/mpn/wapS01Alias.xml";		 
		$raw = file_get_contents($url);
		$newlines = array("\t","\n","\r","\x20\x20","\0","\x0B");		 
		$content = str_replace($newlines, "", html_entity_decode($raw));

		$start = strpos($content,'<p>');
		// $start = strpos($content,'<card title="Resultado" id="frstcard">');
		$end = strpos($content,'</p>',$start);
		// $end = strpos($content,'</card>',$start) + 8;
		$card_info = substr($content,$start,$end-$start);
		print_p("info necesaria");
		// var_dump($card_info);
		preg_match_all("|<small><b>(.*)</small>|U",$card_info,$fila);
		// var_dump( $fila );
		// var_dump( $fila );
		foreach ($fila[1] as $indice => $valor) {
			if ( $valor != '-' ) {
				$valor = strip_tags( $valor,'<b>') ;
				// var_dump( $valor );
				$start_indice = 0 ;
				// $start_indice = strpos($valor,'<b>');//Original pero que resulta siendo false ~ 0
				// var_dump( "start_indice" );
				// var_dump( $start_indice );
				$end_indice = strpos($valor,'</b>',0);
				// var_dump( $end );
				// $start_data = strpos( $end_indice );
				$indice = substr( $valor,$start_indice,$end_indice );
				$info = substr( $valor,$end_indice+4 );
				$info = trim($info);
				if ( $indice == 'DNI' ) {
					// $temp = explode(':', $info);
					// $info = trim($temp[1]) ; //al parecer esto se puede abreviar xD
					$info = trim(explode(':', $info)[1]) ;
				}
				echo "<br /> Indice : ".$indice."<br />";
				print_p( $info );
				var_dump( $info );
			}
		}
	}

}
/* End of file recibo.php */
/* Location: ./application/controllers/agua/recibo.php */
?>