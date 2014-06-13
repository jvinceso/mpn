<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/third_party/tcpdf/tcpdf.php"; 
class Pdf extends TCPDF
{
  protected 	$ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        parent::__construct();
	}

	

}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */
