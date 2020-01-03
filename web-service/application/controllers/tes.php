<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

	public function index()
	{
		$artikel = $this->db->get('artikel')->result();
		header('Content-Type: application/json');
		//echo json_encode($artikel);
		$response = array('status' => 'OK');

		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($artikel, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
		->_display();
	}

}

/* End of file tes.php */
/* Location: ./application/controllers/tes.php */