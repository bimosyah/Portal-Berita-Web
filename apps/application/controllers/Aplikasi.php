<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAplikasi');
	}

	public function index()
	{
		$data = $this->mAplikasi->getData();
		echo json_encode($data);
	}
}

/* End of file Aplikasi.php */
/* Location: ./application/controllers/Aplikasi.php */