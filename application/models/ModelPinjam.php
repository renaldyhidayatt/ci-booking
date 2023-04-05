<?php
class ModelPinjam extends CI_Model{
    public function simpanPinjam($data)	{ $this->db->insert('pinjam', $data); }

	public function selectData($table, $where) { return $this->db->get($table, $where); }

	public function updateData($data, $where) { $this->db->update('pinjam', $data, $where); }
	
	public function deleteData($tabel, $where) { $this->db->delete($tabel, $where); }
	
	public function joinData() 
	{
		$this->db->select('*');
		$this->db->from('pinjam');
		$this->db->join('detail_pinjam', 'detail_pinjam.no_pinjam=pinjam.no_pinjam', 'Right');

		return $this->db->get()->result_array();
	}
}