<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mArtikel');
		$this->load->library('dompdf_gen');
	}
	
	public function index()
	{
		$data['Artikel'] = $this->mArtikel->getDataOrderByKlik();
		$this->load->view('admin/laporan/preview', $data);
	}

	function cetakPdf()
	{
		$data['Artikel'] = $this->mArtikel->getDataOrderByKlik();
		$this->load->view('admin/laporan/print', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$dompdf = new DOMPDF();
		$tanggal = date("Y-m-d");
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan - ".$tanggal);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */