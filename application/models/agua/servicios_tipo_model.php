<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 30-03-2014 00:08:07 */
	class Servicios_tipo_model extends CI_Model {
		//Atributos de Clase
		private $nSetId = '';
		private $nMulServicio = '';
		private $nMulTipoServicio = '';
		private $dSetFechaRegistro = '';
		private $cSetEstado = '';

		//Constructor de Clase
		function __construct(){
			parent::__construct();
		}

		//FUNCIONES Set
		function set_nSetId($nSetId){
			$this->nSetId = $nSetId;
		}
		function set_nMulServicio($nMulServicio){
			$this->nMulServicio = $nMulServicio;
		}
		function set_nMulTipoServicio($nMulTipoServicio){
			$this->nMulTipoServicio = $nMulTipoServicio;
		}
		function set_dSetFechaRegistro($dSetFechaRegistro){
			$this->dSetFechaRegistro = $dSetFechaRegistro;
		}
		function set_cSetEstado($cSetEstado){
			$this->cSetEstado = $cSetEstado;
		}

		//FUNCIONES Get
		function get_nSetId(){
			return $this->nSetId;
		}
		function get_nMulServicio(){
			return $this->nMulServicio;
		}
		function get_nMulTipoServicio(){
			return $this->nMulTipoServicio;
		}
		function get_dSetFechaRegistro(){
			return $this->dSetFechaRegistro;
		}
		function get_cSetEstado(){
			return $this->cSetEstado;
		}
		//Obtener Objeto SERVICIOS_TIPO
		function get_ObjServicios_tipo($CAMPO){
			$query = $this->db->query("SELECT * FROM SERVICIOS_TIPO WHERE CAMPO=?", array($CAMPO));
			if ($query->num_rows() > 0){
				$row = $query->row();
				//CREANDO EL OBJETO
			}
		}
//me llena la lista que da la funcionalidad para escoger varios tipos de servcio 
		public function qryServicioTipo(){
			 $query = $this->db->query("select nMulId,cMulDescripcion from multitabla where nMulIdPadre = 47");
			 return  $query->result_array();
		}

		public function insServiciosTipo( $serviciosTipo ){
			$this->db->insert_batch('servicios_tipo', $serviciosTipo);
			return $this->db->insert_id();
		}

//Llena la tabla con todos los servcios con sus respectivos tipos		
		public function qryServiciosTipo(){
			$query = $this->db->query("
						select 
							st.nSetId as ID
							,m.cMulDescripcion as servicio 
							,mt.cMulDescripcion as tipo 
							,ifnull(cst.fCstPago,'0') as costo
							,ifnull(cst.nCstAnio,'-') as Anio
						from servicios_tipo st 
										inner join multitabla m on m.nMulId = st.nMulServicio
										inner join multitabla mt on mt.nMulId = st.nMulTipoServicio
										left join costo_servicios_tipo cst on cst.nSetId = st.nSetId and cst.nCstAnio = year(now())
										where st.cSetEstado = 1
									order by m.cMulDescripcion asc;

			");
			return  $query->result_array();
		}

		public function listaServicioXDireccion($objDireccionCalle){
			$query = $this->db->query("select m.cMulDescripcion as Servicio ,mt.cMulDescripcion as Tipo from servicios_contribuyente sc
				inner join servicios_tipo st on st.nSetId = sc.nSetId
				inner join multitabla m on m.nMulId = st.nMulServicio
				inner join multitabla mt on mt.nMulId = st.nMulTipoServicio
			where sc.nDicId ='".$objDireccionCalle->get_nDicId()."' and  sc.cSecEstado = 1");
			return  $query->result_array();
		}
		public function listarServiciostipo(){
			$query = $this->db->query("select st.nSetId,CONCAT(m.cMulDescripcion,' - ',mt.cMulDescripcion) as serviciotipo from servicios_tipo st 
					inner join multitabla m on m.nMulId = st.nMulServicio
					inner join multitabla mt on mt.nMulId = st.nMulTipoServicio
					where st.cSetEstado = 1
				order by 1 asc;");
			return  $query->result_array();
		}		

		function getServicios($nSetId){		
			$query = $this->db->query("
						select c.nCalId ,c.cCalNombre ,s.nSecId, v.nViaId ,c.dCalFechaRegistro from calle c
						inner join  sector s on c.nSecId = s.nSecId
						inner join  via v on c.nViaId = v.nViaId
						where nCalId = '".$nCalId."' and c.nCalEstado = 1
									
			");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	}
?>
