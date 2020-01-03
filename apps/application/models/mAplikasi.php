<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mAplikasi extends CI_Model {	
	public function getData()
	{
		return $this->db->get('aplikasi')->result();
	}

	public function updateData()
	{
		$object = array(
				'nama' => $this->input->post('nama'),
				'slogan' => $this->input->post('slogan')
			);
		$this->db->update('aplikasi', $object);
	}

	public function cekLogin($object)
	{
		$cek = $this->db->get_where('login',$object)->num_rows();
		// if ($cek == 1)
		// 	return true;
		// else 
		// 	return false;		
		return $cek;
	}
}

/* End of file Aplikasi.php */
/* Location: ./application/models/Aplikasi.php */