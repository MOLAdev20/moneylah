<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		// Load Constructor Parent
		parent::__construct();
		
		// Load Model
		$this->load->model('Home_model');
	}

	protected function form_confirmation()
	{
		$this->form_validation->set_rules("pemasukan", "pemasukan", "required");
		$this->form_validation->set_rules("nominal", "nominal", "required");
	}

	public function index()
	{
		// Load tampilan dari controller yang sudah di modifikasi
		$data['pemasukan'] = [ $this->Home_model->showData() , $this->Home_model->pemasukan() ];
		$data['totalSaldo'] = $this->Home_model->saldo();
		parent::getView("dashboard", $data);

	}

	public function create()
	{
		$this->form_confirmation();

		if ($this->form_validation->run() == TRUE) {
			$this->Home_model->add();
		}else{
			$this->session->set_flashdata("form", "<div class='alert bg-danger' role='alert'>Semua Form wajib di isi</div>");
			redirect('Home/index','refresh');
		}
		show_404();
	}

	public function delete($id = []){

		if (!empty($id)) {
			$id = decrypt_url($id);
			$this->Home_model->delete($id);
		}else{
			show_404();
		}
		
	}

	public function update($id)
	{
		
		$this->form_confirmation();

		if (!empty($id)) {
			$id = decrypt_url($id);
			$this->Home_model->update($id);
		}
		show_404();
	}

	public function debug()
	{
		$this->db->truncate("data_pemasukan");
		$this->db->truncate("data_pengeluaran");
		$this->db->truncate("data_hutang");
		$this->db->truncate("data_penghutang");
		redirect('Home/index','refresh');
	}
}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */