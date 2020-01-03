<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mArtikel');
	}
	public function index()
	{
		$data['arr_artikel_sains'] = $this->mArtikel->getLimit4Sains();
		$data['arr_artikel_tekno'] = $this->mArtikel->getLimit4Tekno();
		$data['arr_artikel_bisnis'] = $this->mArtikel->getLimit4Bisnis();
		$data['arr_artikel_tokoh'] = $this->mArtikel->getLimit4Tokoh();
		$data['arr_artikel_ulasan'] = $this->mArtikel->getLimit4Ulasan();
		$data['arr_artikel_top4'] = $this->mArtikel->getTop4();
		$this->load->view('home/home',$data);
	}

	public function a()
	{
		$this->load->view('home/tes');
	}

	public function b()
	{
		$a = "Menurut laporan riset WeAreSocial.Net dan Hootsuite yang bertajuk Digital in 2018, Singapura merupakan negara yang memiliki kecepatan downlink (unduh) internet dengan menggunakan fixed broadband tercepat di dunia. Kecepatan unduh jaringan internet di Negeri Singa tersebut mencapai 161,2 Mega Byte per Second (MBps), yang berarti mengalami peningkatan sebesar 18,1% dari";
		echo strlen($a);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */