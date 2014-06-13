<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/third_party/PHPExcel.php"; 
class Excel extends PHPExcel{
  protected 	$ci;
  	//Clase que heredara interactuara e implementara todos los metodos de la Clase Padre PHPExcel
	public function __construct()
	{
        $this->ci =& get_instance();
        parent::__construct();
	}

	

}

/* End of file Excel.php */
/* Location: ./application/libraries/Excel.php */

?>