<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
use Restserver\Libraries\REST_Controller;


class Komentar extends REST_Controller {

	public function __construct($config = 'rest')
	{
		parent::__construct($config);
		//Do your magic here
	}

	function index_get()
	{
		$id = $this->get('id_artikel');
		if ($id == '') {
			$komentar = $this->db->get('komentar')->result();
		} else {
			$this->db->where('fk_id_artikel', $id);
			$komentar = $this->db->get('komentar')->result();
		}
		$this->response($komentar, 200);
	}

	function index_post() {
		$data = array(
			'fk_id_artikel' => $this->post('id_artikel'),
			'komentar' => $this->post('komentar'));
		$insert = $this->db->insert('komentar', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}


}

/* End of file Komentar.php */
/* Location: ./application/controllers/Komentar.php */