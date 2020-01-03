<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mKategori extends CI_Model {

	public function getData()
	{
		return $this->db->get('kategori');
	}

	public function insertData($object)
	{
		$this->db->insert('kategori', $object);
	}

	public function updateData($id,$object)
	{
		$this->db->where('id_kategori',$id);
		$this->db->update('kategori', $object);
	}
	public function deleteData($id)
	{
		$this->db->where('id_kategori',$id);
		$this->db->delete('kategori');
	}

	public function getDataWhere($id)
	{
		$this->db->where('id_kategori',$id);
		return $this->db->get('kategori')->row();
	}
}

/* End of file Kateogori.php */
/* Location: ./application/models/Kateogori.php */