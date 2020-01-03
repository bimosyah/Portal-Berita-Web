<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mArtikel extends CI_Model {

	public function getData()
	{
		return $this->db->get('artikel');
	}

	public function getDataOrderByKlik()
	{
		$this->db->order_by('klik', 'desc');
		return $this->db->get('artikel');
	}

	public function getArtikelByKategori($id)
	{
		$this->db->where('tampil', '1');
		$this->db->where('id_kategori',$id);
		$this->db->order_by('tgl_dibuat', 'desc');
		return $this->db->get('artikel',10000,4);
	}

	public function getArtikelTop4($id)
	{
		$this->db->where('tampil', '1');
		$this->db->order_by('klik', 'desc');
		return $this->db->get('artikel',4);
	}

	public function getArtikelByKategoriLimit3($id)
	{
		$this->db->where('tampil', '1');
		$this->db->where('id_kategori',$id);
		$this->db->order_by('tgl_dibuat', 'desc');
		return $this->db->get('artikel',3,1);
	}

	public function getArtikelByKategoriLimit1($id)
	{
		$this->db->where('tampil', '1');
		$this->db->where('id_kategori',$id);
		$this->db->order_by('tgl_dibuat', 'desc');
		return $this->db->get('artikel',1);
	}

	public function getArtikelByKategoriPaging($id,$limit,$start)
	{
		$this->db->where('id_kategori',$id);
		return $this->db->get('artikel',$limit,$start);
	}

	function totalRowsByKategori($id){
		$this->db->where('id_kategori',$id);
		return $this->db->count_all('artikel');
	}

	public function insertData($object)
	{
		$this->db->insert('artikel', $object);
	}

	public function updateData($id,$object)
	{
		$this->db->where('id_artikel',$id);
		$this->db->update('artikel', $object);
	}

	public function updateStatus($id,$object)
	{
		$this->db->where('id_artikel',$id);
		$this->db->update('artikel', $object);
	}

	public function deleteData($id)
	{
		$this->db->where('id_artikel',$id);
		return $this->db->delete('artikel');
	}

	public function getDataWhere($id)
	{
		$this->db->where('id_artikel',$id);
		return $this->db->get('artikel')->row();
	}

	public function getDataById($id)
	{
		$this->db->where('id_artikel',$id);
		return $this->db->get('artikel');
	}

	public function getLimit4Tekno()
	{
		$this->db->where('tampil', '1');
		$this->db->where('id_kategori', "31");
		$this->db->order_by("tgl_dibuat", "desc");
		return $this->db->get('artikel', 4);
	}

	public function getLimit4Sains()
	{
		$this->db->where('tampil', '1');
		$this->db->where('id_kategori', "32");
		$this->db->order_by("tgl_dibuat", "desc");
		return $this->db->get('artikel', 4);
	}

	public function getLimit4Bisnis()
	{
		$this->db->where('tampil', '1');
		$this->db->where('id_kategori', "34");
		$this->db->order_by("tgl_dibuat", "desc");
		return $this->db->get('artikel', 4);
	}

	public function getLimit4Tokoh()
	{
		$this->db->where('tampil', '1');
		$this->db->where('id_kategori', "35");
		$this->db->order_by("tgl_dibuat", "desc");
		return $this->db->get('artikel', 4);
	}

	public function getLimit4Ulasan()
	{
		$this->db->where('tampil', '1');
		$this->db->where('id_kategori', "36");
		$this->db->order_by("tgl_dibuat", "desc");
		return $this->db->get('artikel', 4);
	}

	public function getTop4()
	{
		$this->db->where('tampil', '1');
		$this->db->order_by("tgl_dibuat", "desc");
		return $this->db->get('artikel', 4);
	}

	public function getArtikelCount($id)
	{
		$this->db->where('id_artikel', $id);
		return $this->db->get('artikel');
	}

	public function CountArtikel($id,$object)
	{
		$this->db->where('id_artikel', $id);
		return $this->db->update('artikel', $object);
	}

	public function updateArtikelShow($id,$object)
	{
		$this->db->where('id_artikel', $id);
		$this->db->update('artikel', $object);
	}

	public function getIsiArtikel($id)
	{
		$this->db->where('id_artikel',$id);
		return $this->db->get('artikel')->result();
	}
}

/* End of file Kateogori.php */
/* Location: ./application/models/Kateogori.php */