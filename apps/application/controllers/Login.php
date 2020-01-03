<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAplikasi');
		
		// if($this->session->userdata('status')){
		// 	redirect(base_url("admin/dashboard"));
		// }
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

	public function Login()
	{
		$this->load->view('admin/login');
	}

	function logout(){
		$this->session->unset_userdata($data_session);
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}
}

	/* End of file Login.php */
/* Location: ./application/controllers/Login.php */