<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		if (level('admin'))
			redirect('admin/dashboard', 'refresh');

		$this->load->model('CategoryModel');
		$this->load->model('ProductModel');
	}

	public function index($link = '')
	{
		$data['category']	= $this->CategoryModel->getDetailByUrl($link);
		$data['product']	= $this->ProductModel->getByCategory($link);

		$this->breadcrumbs->add('Product', 'product');
		$this->breadcrumbs->add($data['category']['category_name'], 'category/'.$link);
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/category', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */