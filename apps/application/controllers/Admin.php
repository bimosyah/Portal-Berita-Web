<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('mAplikasi');
		$this->load->model('mArtikel');
		$this->load->model('mKategori');
		//$this->load->helper('url','form');

		if(!$this->session->userdata('status')){
			redirect(base_url("admin"));
		}

		// if($this->session->userdata('status')){
		// 	redirect(base_url("admin/dashboard"));
		// }
	}

	public function Login()
	{
		$this->load->view('admin/login');
	}

	public function cekLogin()
	{
		$object = array(
			'user' => $this->input->post('user'),
			'pass' => md5($this->input->post('pass'))
		);

		$cek = $this->mAplikasi->cekLogin($object);
		if ($cek) {
			$data_session = array(
				'nama' => $this->input->post('user'),
				'status' => 'login'
			);

			$this->session->set_userdata($data_session);
			echo json_encode($cek);
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Admin/Login'));
	}

	public function Artikel()
	{
		$data['artikel'] = $this->mKategori->getData();
		$this->load->view('admin/artikel/artikel',$data);
	}

	public function dashboard()
	{
		$this->load->view('admin/dashboard/home');
	}

	public function Aplikasi()
	{
		$this->load->view('admin/aplikasi/aplikasi');
	}

	public function AplikasiRead()
	{
		$data = $this->mAplikasi->getData();
		echo json_encode($data);
	}

	public function AplikasiUpdate()
	{
		$data = $this->mAplikasi->updateData($object);
		echo json_encode($data);
	}

	public function Kategori()
	{
		$this->load->view('admin/kategori/kategori');
	}

	public function KategoriInsert()
	{
		$object = array(
			'nama' => $this->input->post('nama')
		);
		$data = $this->mKategori->insertData($object);
		echo json_encode($data);
	}

	public function KategoriUpdate($id)
	{
		$object = array(
			'nama' => $this->input->post('nama')
		);
		$data = $this->mKategori->updateData($id,$object);
		echo json_encode($data);
	}

	public function KategoriRead()
	{
          // Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$kategori = $this->mKategori->getData();

		$data = array();

		foreach ($kategori->result() as $value) {
			$row = array();
			$row[] = $value->id_kategori;
			$row[] = $value->nama;
			// $row[] = '
			// <a id="btn_edit" href="#" onclick="editKategori('."'".$value->id_kategori."'".')" class="uk-button uk-button-default">Edit</a>
			// &nbsp;
			// <a id="btn_delete" href="javascript:void(0)" onclick="deleteKategori('."'".$value->id_kategori."'".')" class="uk-button uk-button-default">Hapus</a>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $kategori->num_rows(),
			"recordsFiltered" => $kategori->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();

		// $data = $this->mKategori->getData();
		// echo json_encode($data);
	}

	public function KategoriDelete($id)
	{
		$data = $this->mKategori->deleteData($id);
		echo json_encode($data);
	}

	public function KategoriEdit($id)
	{
		$data = $this->mKategori->getDataWhere($id);
		echo json_encode($data);
	}

	public function ArtikelInsert()
	{
		$data['artikel'] = $this->mKategori->getData();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('isi', 'Isi Artikel', 'required');
		$this->form_validation->set_rules('sumber', 'Sumber Artikel', 'required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/artikel/artikel',$data);
		} else {
			date_default_timezone_set("Asia/Jakarta");
			$tgl = date("Y-m-d H:i:s");
			$id = mt_rand();

			$config['upload_path']		= './assets/uploads';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= 10000000000000;
			$config['max_width']		= 10240;
			$config['max_height']		= 7680;
			$config['file_name']		= $id;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('foto')) {
				$gbr = $this->upload->data();
                //Compress Image
				$config['image_library']='gd2';
				$config['source_image']='./assets/uploads/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '100%';
				$config['width']= 400;
				$config['height']= 300;
				$config['new_image']= './assets/uploads/'.'thumbnail_'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			}


			if ( ! $this->image_lib->resize())
			{
				echo $this->image_lib->display_errors();
			}

			$object = array(
				'id_artikel' => $id,
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'tgl_dibuat' => $tgl,
				'foto'=>$this->upload->data('file_name'),
				'foto_thumbnail'=> 'thumbnail_'.$gbr['file_name'],
				'sumber' => $this->input->post('sumber'),
				'id_kategori' => $this->input->post('kategori')
			);
			$this->mArtikel->insertData($object);
			redirect('Admin/Artikel','refresh');
		}	
	}

	public function artikelUpdate($id)
	{
		
		$data['artikel'] = $this->mKategori->getData();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('isi', 'Isi Artikel', 'required');
		$this->form_validation->set_rules('sumber', 'Sumber Artikel', 'required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/artikel/artikel',$data);
		} else {
			date_default_timezone_set("Asia/Jakarta");
			$tgl = date("Y-m-d H:i:s");

			$config['upload_path']		= './assets/uploads';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= 10000000000000;
			$config['max_width']		= 10240;
			$config['max_height']		= 7680;
			$config['file_name']		= $id;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('foto')) {
				$gbr = $this->upload->data();
                //Compress Image
				$config['image_library']='gd2';
				$config['source_image']='./assets/uploads/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '100%';
				$config['width']= 400;
				$config['height']= 300;
				$config['new_image']= './assets/uploads/'.'thumbnail_'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			}


			if ( ! $this->image_lib->resize())
			{
				echo $this->image_lib->display_errors();
			}

			$object = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'tgl_dibuat' => $tgl,
				'foto'=>$this->upload->data('file_name'),
				'foto_thumbnail'=> 'thumbnail_'.$gbr['file_name'],
				'sumber' => $this->input->post('sumber'),
				'id_kategori' => $this->input->post('kategori')
			);
			$this->mArtikel->updateData($id,$object);
			redirect('admin/ArtikelData','refresh');
		}	
	}

	public function ArtikelData()
	{
		$id = $this->uri->segment(3);
		if (is_null($id)) {
			$data['list_artikel'] = $this->mArtikel->getData();
			$this->load->view('admin/artikel/list',$data);	
		}else{
			$data['kategori'] = $this->mKategori->getData();
			$data['artikel'] = $this->mArtikel->getDataById($id)->result();
			$this->load->view('admin/artikel/edit',$data);
		}
		
	}

	public function ArtikelStatus($id)
	{
		$object = array(
			'tampil' => $this->input->post('status'),
		);
		$data = $this->mArtikel->updateStatus($id,$object);
		echo json_encode($data);
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */