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

	public function index()
	{
		// Load tampilan dari controller yang sudah di modifikasi
		parent::getView("dashboard");
	}

}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */