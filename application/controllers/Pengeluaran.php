<?php

defined("BASEPATH") Or exit("No direct script access allowed");

class Pengeluaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Pengeluaran_model");
	}

	public function index()
	{
		$data['pengeluaran'] = [ $this->Pengeluaran_model->showdb(), $this->Pengeluaran_model->showPengeluaran() ];
		$data['totalSaldo'] = $this->Pengeluaran_model->saldo();
		parent::getView("V_pengeluaran", $data);
	}

	protected function data_form()
	{
		$this->form_validation->set_rules("pengeluaran", "pengeluaran", "required");
		$this->form_validation->set_rules("nominal", "nominal", "required");
	}

	public function create()
	{
		$this->data_form();

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata("form", "<div class='alert bg-danger'>Semua form wajib di isi</div>");
			redirect('Pengeluaran','refresh');
		}else{
			$this->Pengeluaran_model->add();
		}

	}

	public function edit($id = [])
	{
		if (!empty($id)) {
			$id = decrypt_url($id);
			$this->Pengeluaran_model->update($id);
		}else{
			show_404();
		}
	}
}