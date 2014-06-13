<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recibo_detalle extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('agua/recibo_detalle_model','objReciboDetalle');
	}
	public function index()
	{
		
	}

	function recalcularRecibo()
	{
		$atrib = $this->input->post('atributos');
		$result = $this->objReciboDetalle->recalcularRecibo($atrib);
		// print_p($atrib);exit();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}
// 	<pre>Array
// (
//     [0] => Array
//         (
//             [cRedPrecio] => 7.50
//             [nRedId] => 3
//         )

//     [1] => Array
//         (
//             [cRedPrecio] => 3.50
//             [nRedId] => 4
//         )

//     [2] => Array
//         (
//             [cRedPrecio] => 3.50
//             [nRedId] => 5
//         )

//     [3] => Array
//         (
//             [cRedPrecio] => 0.50
//             [nRedId] => 6
//         )

// )
// </pre>
}