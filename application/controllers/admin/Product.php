<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!level('admin'))
			redirect('admin', 'refresh');

		$this->load->model('CategoryModel');
		$this->load->model('ProductModel');
	}

	public function index()
	{
		$data['product'] = $this->ProductModel->getAll();

		$this->breadcrumbs->add('Product', 'admin/product');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/productReadAll', $data);
		$this->load->view('template/footer');		
	}

	public function create()
	{
		$data['category'] = $this->CategoryModel->getAll();

		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('product_code', 'Product Code', 'required');
		$this->form_validation->set_rules('product_name', 'Product Name', 'required|is_unique[product.product_name]');
		$this->form_validation->set_rules('product_description', 'Product Description', 'required');
		$this->form_validation->set_rules('product_price', 'Product Pirce', 'required|numeric');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->ProductModel->create($formulir);
			$this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');

			redirect('admin/product' ,'refresh');
		}

		$this->breadcrumbs->add('Product', 'admin/product');
		$this->breadcrumbs->add('Create', 'admin/product/create');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/productCreate', $data);
		$this->load->view('template/footer');
	}

	public function detail($product_id)
	{
		$data['product']	= $this->ProductModel->getDetail($product_id);

		$this->form_validation->set_rules('stock[]', 'Stock', 'is_natural');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->ProductModel->stock($formulir);
			$this->session->set_flashdata('pesan', 'Data berhasil diperbaharui!');

			redirect('admin/product/detail/'.$product_id ,'refresh');
		}

		$this->breadcrumbs->add('Product', 'admin/product');
		$this->breadcrumbs->add($data['product']['product_code'], 'admin/product/detail/'.$data['product']['product_id']);
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/productReadDetail', $data);
		$this->load->view('template/footer');
	}

	public function update($product_id)
	{
		$data['category']	= $this->CategoryModel->getAll();
		$data['product']	= $this->ProductModel->getDetail($product_id);

		$name_unik = $this->input->post('product_name') == $data['product']['product_name'] ? '' : '|is_unique[product.product_name]';

		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('product_code', 'Product Code', 'required');
		$this->form_validation->set_rules('product_name', 'Product Name', 'required'.$name_unik);
		$this->form_validation->set_rules('product_description', 'Product Description', 'required');
		$this->form_validation->set_rules('product_price', 'Product Pirce', 'required|numeric');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->ProductModel->update($product_id, $formulir);
			$this->session->set_flashdata('pesan', 'Data berhasil diperbaharui!');

			redirect('admin/product' ,'refresh');
		}

		$this->breadcrumbs->add('Product', 'admin/product');
		$this->breadcrumbs->add('Update', 'admin/product/update');
		$this->breadcrumbs->add($data['product']['product_code'], 'admin/product/update/'.$data['product']['product_id']);
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/productUpdate', $data);
		$this->load->view('template/footer');
	}

	public function delete($product_id)
	{
		$status	= $this->ProductModel->delete($product_id);
		$pesan	= $status ? 'Data berhasil dihapus!' : 'Data gagal dihapus! Terkait dengan data lain.';

		$this->session->set_flashdata('pesan', $pesan);
		redirect('admin/product' ,'refresh');
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/admin/Product.php */