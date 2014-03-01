<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @jvinceso*/
/* Date : 22-06-2013 01:02:43 */
	class Objeto_model extends CI_Model {

		function get_ObjMenu($CAMPO){
			$query = $this->db->query("SELECT * FROM MENU WHERE CAMPO=?", array($CAMPO));
			if ($query->num_rows() > 0){
				$row = $query->row();
				//CREANDO EL OBJETO
			}
		}

		//LISTA DE MENU + OPCIONES
        public function listaMenuOpciones(){
        	$resultado = array();  
        	$ul="";
        	$active="";
        	$nAplIds="";
        	$opciones="";
        	$url = $this->session->userdata('url');
			$query = $this->db->query("SELECT nAplId,cAplNombre,cAplIcono FROM aplicacion ORDER BY nAplOrden");  
			foreach ($query->result() as $row){
        		$opt = $this->listaSubMenus($row->nAplId);
        		// $nAplIds.=$row->nAplId.',';
				if($opt != null){ 
					$active = "";
					$ul='class="ocultar"';
					$array = array();
					foreach ($opt->result() as $opcion){
						if($url){
							// var_dump($url);
							// echo "desde BD";
							// var_dump($opcion->cOdetNombreArchivo);
							if($opcion->cOdetNombreArchivo==$url){
								$active = " class=\"current\"";
								$ul='class="current"';
							}
							else{
								$active = "class=\"ocultar\"";
							}
						}  
						$array[] = array(
							"value" => $opcion->cObjNombre,
							"active" => $active,
							"url" => $opcion->cOdetNombreArchivo
						);
					}

					$resultado[] =  array(
						'menu' => $row->cAplNombre,
						'datos' => $array,
						"papa" => $row->nAplId,
						"icon" => $row->cAplIcono,
						'active' => $active,
						'ul' => $ul);
				}
			} 
			// print_p($nAplIds);exit();
			// $salida['aplicacion'] = $resultado;
			// $salida['objeto'] = $this->listaSubMenus(substr($nAplIds, 0, -1));
            return $resultado;
        }

        //LISTA DE OPCIONES DEL MENU
        function listaSubMenus($nAplId){
        	// print_p( $this->session->userdata );
        	$nUsuId = $this->session->userdata('nUsuId');
        	$query = $this->db->query("SELECT od.cOdetNombreArchivo, o.cObjNombre, o.nAplId FROM usuario_objeto uo
			INNER JOIN usuario u on u.nUsuId = uo.nUsuId
			INNER JOIN objeto o on o.nObjId = uo.nObjId
			INNER JOIN objeto_detalle od ON od.nObjId = o.nObjId
			WHERE o.nAplId = ? AND u.nUsuId = ? AND uo.cUobEstado = 1 AND o.cObjEstado = 1
        		ORDER BY o.nAplId,o.nObjOrden",array($nAplId,$nUsuId));

            if($query->num_rows() > 0){
            	// print_p($query->result_object());
            	// return $query->result_array();
            	return $query;
            }
            return null;
        }     
	}
?>