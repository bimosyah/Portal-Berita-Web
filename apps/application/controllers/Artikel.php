<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mArtikel');
		$this->load->library('pagination');
	}

	public function index($id)
	{
                $getJumlahKlik = $this->mArtikel->getArtikelCount($id);
                $jumlahKlik = 0;
                foreach ($getJumlahKlik->result() as $value) {
                       $jumlahKlik = $value->klik;
               }
               $jumlahKlik+= 1;
               $object = array('klik' => $jumlahKlik);
               $this->mArtikel->CountArtikel($id,$object);
               
               $data['arr_artikeltop4all'] = $this->mArtikel->getArtikelTop4($id);
               $data['arr_artikel'] = $this->mArtikel->getDataById($id);
               $this->load->view('home/view',$data);
       }

       public function getArtikelByKategori($id)
       {
		 //konfigurasi pagination
        // $config['base_url'] = site_url('artikel/getArtikelByKategori/').$id; //site url
        // $config['total_rows'] = $this->mArtikel->totalRowsByKategori($id); //total row
        // $config['per_page'] = 5;  //show record per halaman
        // $config["uri_segment"] = 3;  // uri parameter
        // $choice = $config["total_rows"] / $config["per_page"];
        // $config["num_links"] = floor($choice);

        // // Membuat Style pagination untuk BootStrap v4
        // $config['first_link']       = 'First';
        // $config['last_link']        = 'Last';
        // $config['next_link']        = 'Next';
        // $config['prev_link']        = 'Prev';
        // $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        // $config['full_tag_close']   = '</ul></nav></div>';
        // $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        // $config['num_tag_close']    = '</span></li>';
        // $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        // $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        // $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        // $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['prev_tagl_close']  = '</span>Next</li>';
        // $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        // $config['first_tagl_close'] = '</span></li>';
        // $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['last_tagl_close']  = '</span></li>';

        // $this->pagination->initialize($config);
        // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        // $data['data'] = $this->mArtikel->getArtikelByKategoriPaging($id,$config["per_page"], $data['page']);           
        // $data['pagination'] = $this->pagination->create_links();

        // //load view mahasiswa view
        // $this->load->view('home/kategori',$data);

               $data['arr_artikeltop4all'] = $this->mArtikel->getArtikelTop4($id);
               $data['arr_artikel'] = $this->mArtikel->getArtikelByKategori($id);
               $data['arr_artikeltop'] = $this->mArtikel->getArtikelByKategoriLimit1($id);
               $data['arr_artikeltopsub'] = $this->mArtikel->getArtikelByKategoriLimit3($id);
               $this->load->view('home/kategori', $data);
       }

       function ArtikelShow()
       {
         $status_tampil = $this->input->post('status_tampil');
         $id_artikel = $this->input->post('id_artikel');

         $object = array('tampil' => $status_tampil);
         $data = $this->mArtikel->updateArtikelShow($id_artikel,$object);
         echo json_encode($data);
       }

       function ArtikelDelete()
       {
         $id_artikel = $this->input->post('id_artikel');
         $data = $this->mArtikel->deleteData($id_artikel);
         echo json_encode($data);
       }

       public function getIsiArtikel($id)
        {
         $data = $this->mArtikel->getIsiArtikel($id);
         echo json_encode($data);
        }
}

/* End of file Tekno.php */
/* Location: ./application/controllers/Tekno.php */
