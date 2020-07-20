<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	private $table = "data_pemasukan";
	private $pengeluaran = "data_pengeluaran";

	public function __construct()
	{
		$this->load->database();
	}

	

	protected function form_data()
	{
		$data = [
					"ID" => "",
					"Nama_pemasukan" => $this->input->post("pemasukan"), 
					"Hari_tanggal" => parent::day()." ".date("d m Y"),
					"Jam" => date("H:i"),
					"Nominal" => $this->input->post("nominal"), 
					"Keterangan" =>$this->input->post("keterangan"), 
				];
		return $data;
	}

	public function add()
	{
		date_default_timezone_set("Asia/Jakarta");

		if($this->db->insert($this->table , $this->form_data())){
			parent::getMessage("msg", "BERHASIL", "Data pemasukan bertambah", "success");
			redirect('Home/index','refresh');
		}
	}

	// Ambil total pemasukan
	public function pemasukan()
	{
		return parent::getSaldo($this->table, date("%d%m%Y%"));
	}

	
	
	// Ambil total pengeluaran dari File core/Model dan hitung dengan saldo yang ada

	public function saldo()
	{
		return ( parent::getSaldo( "$this->table", date("%d%m%Y%") ) + parent::getHutang( date("%d%m%Y%") , "Meminjam" ) ) - parent::getSaldo("$this->pengeluaran", date("%d%m%Y%"));	
	}

	public function showData(){

		$query =  $this->db->get( $this->table);
		return $query->result_array();
	}

	public function update($id)
	{
		if ( $this->db->update( $this->table, $this->form_data(), array("ID" => $id) ) ) {
			parent::getMessage("msg", "Berhasil", "Data Berhasil di Update", "success");
			redirect('Home/index','refresh');
		}
	}

	public function delete($id){

		$query = $this->db->delete($this->table, array("ID" => $id) );

		if ($query) {
			parent::getMessage("msg", "Berhasil", "Data berhasil di hapus", "success");
			redirect('Home/index','refresh');
		}
	}

}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */