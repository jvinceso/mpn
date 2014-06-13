<?php
	class mysql2php extends CI_Model {
		function __construct(){
			parent::__construct();
		}
		function GenerarMultiplesClases($database){
			$sqltablas = $this->db->query("SELECT 
												TABLE_NAME AS TABLA
											FROM
												information_schema.TABLES
											WHERE
												TABLE_SCHEMA LIKE '".$database."'");

			if ($sqltablas->num_rows() > 0){
				foreach ($sqltablas->result_array() as $key=>$value){  
					$sqlcampos = $this->db->query("SELECT 
														COLUMN_NAME AS CAMPO
													FROM
														information_schema.COLUMNS
													WHERE
														TABLE_SCHEMA LIKE '".$database."' AND TABLE_NAME = '".$value["TABLA"]."'");
					$text = "<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');\r\n";
					$text .= "/*Autogenered Developed by @divisoft*/\r\n/* fecha : ".date('d-m-Y H:i:s')." */\n\r";
					//DECLARACION DE LA CLASE
					$text .="\tclass ".ucwords(strtolower($value["TABLA"]))."_model extends CI_Model {\n";
					
					//VARIABLES
					$variables="\t\t//Atributos de Clase\n";
					$funcionSet ="\t\t//FUNCIONES Set\n";
					$funcionGet ="\t\t//FUNCIONES Get\n";

					foreach ($sqlcampos->result_array() as $key2=>$value2){ 
						$variables .= "\t\tprivate \$".$value2["CAMPO"]." = '';\n"; 
							
						$funcionSet .= "\t\tfunction set_".$value2["CAMPO"]."(\$".$value2["CAMPO"]."){\n";
						$funcionSet .= "\t\t\t\$this->".$value2["CAMPO"]." = \$".$value2["CAMPO"].";\n";
						$funcionSet .= "\t\t}\n";	

						// $funcionGet .= "\t\tfunction get_".$value2["CAMPO"]."(){\n";
						// $funcionGet .= "\t\t\treturn \$this->".$value2["CAMPO"].";\n";
						// $funcionGet .= "\t\t}\n";	
					}
					$text.=$variables."\n";

					//CONSTRUCTOR DE LA CLASE
					$construct = "\t\t//Constructor de Clase\n";
					$construct .= "\t\tfunction __construct(){\n";
					$construct .= "\t\t\tparent::__construct();\n";
					$construct .= "\t\t}\n";
					$text .=$construct."\n";

					$text .= $funcionSet."\n";
					// $text .= $funcionGet;

					$objeto = "\t\t//Obtener Objeto ".strtoupper($value["TABLA"])."\n";
					$objeto .= "\t\tfunction get_Obj".ucfirst($value["TABLA"])."(\$CAMPO){\n";	
					/*INICIO VALIDO PARA CODEIGNITER - Comentar si fuera necesario*/
					$objeto .= "\t\t\t\$query = \$this->db->query(\"SELECT * FROM ".strtoupper($value["TABLA"])." WHERE CAMPO=?\", array(\$CAMPO));\n";
					$objeto .= "\t\t\tif (\$query->num_rows() > 0){\n";
					$objeto .= "\t\t\t\t\$row = \$query->row();\n";
					$objeto .= "\t\t\t\t//CREANDO EL OBJETO\n";
					$objeto .= "\t\t\t}\n"; 
					/*FIN VALIDO PARA CODEIGNITER*/
					$objeto .= "\t\t}\n";

					$text .= $objeto;
					$text .= "\t}\n";
					$text .= "?>";
					// print $text;
					file_put_contents('result/'.strtolower( $value["TABLA"] ).'_model.php', $text, LOCK_EX);
				}
			}

		 	 
		}
	}
?>