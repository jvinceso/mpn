<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prueba extends CI_Controller {

	public function index()
	{
		$this->load->library('table');
				
				$data = array(
					array('name', 'Color', 'Size'),
					array('Fred', 'Blue', 'Small'),
					array('Mary', 'Red', 'Large'),
					array('John', 'Green', 'Medium')
				);
				
				echo $this->table->generate($data);		
	}

}

/* End of file prueba.php */
/* Location: ./application/controllers/prueba.php */
?>