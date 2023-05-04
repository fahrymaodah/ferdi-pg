<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
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
		
		$this->breadcrumbs->add('Product', 'product');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/product', $data);
		$this->load->view('template/footer');
	}

	public function detail($product_url)
	{
		$data['member']		= $this->session->userdata('member');
		$data['product']	= $this->ProductModel->getDetailByUrl($product_url);

		$formulir = $this->input->post();
		if ($formulir) {
			if (!isset($data['member']) || empty($data['member'])) {
				$this->session->set_flashdata('pesan', 'Gagal menambah ke keranjang. Login Terlebih dahulu!');
				redirect('login', 'refresh');
			}

			if (isset($formulir['product_size_id']) && !empty($formulir['product_size_id'])) {
				$check_stock = $this->ProductModel->checkStock($formulir['product_size_id']);
				$stock = $check_stock['product_size_stock'];
			}
			else {
				$stock = 0;
			}

			$this->form_validation->set_rules('product_size_id',	'Size',	'required');
			$this->form_validation->set_rules('cart_qty',			'Qty',	'required|less_than_equal_to['.$stock.']|greater_than_equal_to[1]');

			if ($this->form_validation->run()) {
				$this->ProductModel->addToCart($data['member']['member_id'], $formulir);
				$this->session->set_flashdata('pesan', 'Produk berhasil ditambahkan ke keranjang!');

				redirect('cart' ,'refresh');
				// redirect('product/detail/'.$product_url ,'refresh');
			}
		}

		$this->breadcrumbs->add('Product', 'product');
		$this->breadcrumbs->add($data['product']['category_name'], 'category/'.$data['product']['category_url']);
		$this->breadcrumbs->add($data['product']['product_code'], 'product/detail/'.$data['product']['product_url']);
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/productDetail', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */