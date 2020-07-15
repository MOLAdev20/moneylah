<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	private $table = "data_pemasukan";

	public function __construct()
	{
		$this->load->database();
	}

	protected function day()
	{
		$date = date("D");

		switch ($date) {
			case 'Sun':
			$date = "Minggu";
			break;

			case 'Mon':
			$date = "Senin";
			break;

			case 'Tue':
			$date = "Selasa";
			break;

			case 'Wed':
			$date = "Rabu";
			break;

			case 'Thu':
			$date = "Kamis";
			break;
			
			case 'Fri':
			$date = "Jum'at";
			break;

			case 'Sat':
			$date = "Sabtu";
			break;
		}

		return $date;

	}

	public function add()
	{
		date_default_timezone_set("Asia/Jakarta");
		$data = [
					"ID" => "",
					"Nama_pemasukan" => $this->input->post("pemasukan"), 
					"Hari_tanggal" => $this->day()." ".date("d m Y"),
					"Jam" => date("H:i"),
					"Nominal" => $this->input->post("nominal"), 
					"Keterangan" =>$this->input->post("keterangan"), 
				];

		if($this->db->insert($this->table , $data)){
			parent::getMessage("msg", "BERHASIL", "Data pemasukan bertambah", "success");
			redirect('Home/index','refresh');
		}
	}

	public function showData(){
		$query =  $this->db->get($this->table);
		return $query->result_array();
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