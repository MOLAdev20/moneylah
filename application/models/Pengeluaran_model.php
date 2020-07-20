<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Pengeluaran_model extends CI_Model {

	protected $table = "data_pengeluaran";
	protected $pengeluaran = "data_pengeluaran";

	protected function data_form()
	{

		$data = [
					"ID" => "",
					"Nama_pengeluaran" => $this->input->post("pengeluaran"),
					"Hari_tanggal" => parent::day()." ".date("d m Y"),
					"Jam" => date("H:i"), 
					"Nominal" => $this->input->post("nominal"),
					"Catatan" => $this->input->post("catatan") 
				];
		return $data;
	}

	public function add() 
	{
		if( $this->db->insert($this->table, $this->data_form()) ){
			parent::getMessage("msg", "Ditambahkan", "Pengeluaran di tambahkan", "warning");
			redirect('Pengeluaran','refresh');
		}
	}

	public function showdb()
	{
		return $this->db->get($this->table)->result_array();
	}

	public function saldo()
	{
		return ( parent::getSaldo( "$this->table", date("%d%m%Y%") ) + parent::getHutang( date("%d%m%Y%") , "Meminjam" ) ) - parent::getSaldo("$this->pengeluaran", date("%d%m%Y%"));
	}

	// Ambil dan hitung semua data pengeluaran

	public function showPengeluaran()
	{
		foreach ( $this->db->query(" SELECT SUM(Nominal) FROM $this->table ")->result_array() as $key ) {
			return $key["SUM(Nominal)"];
		}

	}

	public function update($id)
	{
		$query = $this->db->update($this->table, $this->data_form(), array("ID" => $id));

		if ($query) {
			parent::getMessage("msg", "Data di ubah", "Data pengeluaran di update", "success");
			redirect('Pengeluaran','refresh');
		}
	}

}