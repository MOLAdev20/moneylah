<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hutang_model extends CI_Model {

	protected $table = "data_hutang";

	protected function data($status)
	{
		$data = [
			"Nama" => $this->input->post("nama"),
			"Hari_tanggal" => parent::day()." ".date("d m Y"),
			"Jam" => date("H:i"),
			"Nominal" => $this->input->post("nominal"),
			"Catatan" => $this->input->post("catatan"),
			"Status" => $status
		];
		return $data;
	}

	public function showDb($status)
	{
		return $this->db->get_where($this->table, array("Status" => $status) )->result_array();
	}

	public function add($status)
	{
		$query = $this->db->insert($this->table, $this->data($status));

		if ($query) {
			parent::getMessage("msg", "Berhasil", "Daftar ".$status." Saya Bertambah", "success");
			redirect('Hutang/index','refresh');
		}
		show_404();
	}

	public function saldo()
	{
		return parent::getSaldo("data_pemasukan", date("%d%m%Y%")) - parent::getSaldo("data_pengeluaran", date("%d%m%Y%"));
	}

	public function update($id, $status)
	{
		$query = $this->db->update($this->table , $this->data($status), ["ID" => $id]);

		if ($query) {
			parent::getMessage("msg", "Berhasil", "Data berhasil di update", "success");
			redirect('Hutang/index','refresh');
		}
	}

	public function delete($id)
	{
		$query = $this->db->delete( $this->table, ["ID" => $id] );

		if ($query) {
			parent::getMessage("msg", "Dihapus", "Data Terhapus", "success");
			redirect('Hutang/index','refresh');
		}
	}

}

/* End of file Hutang_model.php */
/* Location: ./application/models/Hutang_model.php */