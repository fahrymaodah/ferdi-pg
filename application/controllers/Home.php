<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (level('admin'))
			redirect('admin/dashboard', 'refresh');

		$this->load->model('ProductModel');
	}

	public function index()
	{
		$data['product'] = $this->ProductModel->getAll();

		$this->breadcrumbs->add('Home', 'home');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/home', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */