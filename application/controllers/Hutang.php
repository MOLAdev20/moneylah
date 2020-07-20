<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hutang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Hutang_model");
	}

	public function index()
	{

		// Tampilkan ke database dan ambil tampilannya
		$data["pinjaman"] = [ $this->Hutang_model->showdb("Meminjam"), $this->Hutang_model->showdb("Dipinjam") ];
		$data['totalSaldo'] = $this->Hutang_model->saldo();
		parent::getView("V_hutang", $data);
		
	}

	protected function form_confirmation()
	{
		$this->form_validation->set_rules("nama", "nama", "required");
		$this->form_validation->set_rules("nominal", "nominal", "required");
		$this->form_validation->set_rules("catatan", "catatan", "required");
	}

	// CREATE
	public function create($status = [])
	{
		if (!empty($status)) {
			$this->form_confirmation();

			// Form Validation
			if ($this->form_validation->run() == TRUE ) {
				$this->Hutang_model->add($status);
			}else{
				$this->session->set_flashdata("form", "<div class='alert bg-danger'>Semua form wajib di isi</div>");
				redirect('Hutang/index','refresh');
			}
		}else{
			show_404();
		}
	}

	// UPDATE
	public function update($id = [], $status = [] )
	{
		if (!empty($id)) {
			$id = decrypt_url($id);
			$this->form_confirmation();

			// Form Validation
			if ($this->form_validation->run() == TRUE ) {
				$this->Hutang_model->update($id, $status);
			}else{
				$this->session->set_flashdata("form", "<div class='alert bg-danger'>Semua form wajib di isi</div>");
				redirect('Hutang/index','refresh');
			}
		}else{
			show_404();
		}
	}

	public function delete($id = [])
	{

		if (!empty($id)) {
			$id = decrypt_url($id);
			$this->Hutang_model->delete($id);
		}else{
			show_404();
		}
	}

}

