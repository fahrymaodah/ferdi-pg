<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!level('admin'))
			redirect('admin', 'refresh');
	}

	public function index()
	{
		$this->breadcrumbs->add('Dashboard', 'admin/dashboard');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/dashboardAdministrator');
		$this->load->view('template/footer');
		
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */