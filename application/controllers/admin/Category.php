<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!level('admin'))
			redirect('admin', 'refresh');

		$this->load->model('CategoryModel');
	}

	public function index()
	{
		$data['category'] = $this->CategoryModel->getAll();

		$this->breadcrumbs->add('Category', 'admin/category');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/categoryReadAll', $data);
		$this->load->view('template/footer');
	}

	public function create()
	{
		$this->form_validation->set_rules('category_name', 'Category Name', 'required|is_unique[category.category_name]');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->CategoryModel->create($formulir);
			$this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');

			redirect('admin/category' ,'refresh');
		}

		$this->breadcrumbs->add('Category', 'admin/category');
		$this->breadcrumbs->add('Create', 'admin/category/create');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/categoryCreate');
		$this->load->view('template/footer');
	}

	public function update($category_id)
	{
		$data['category'] = $this->CategoryModel->getDetail($category_id);

		$name_unik = $this->input->post('category_name') == $data['category']['category_name'] ? '' : '|is_unique[category.category_name]';

		$this->form_validation->set_rules('category_name', 'Category Name', 'required'.$name_unik);

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->CategoryModel->update($category_id, $formulir);
			$this->session->set_flashdata('pesan', 'Data berhasil diperbaharui!');

			redirect('admin/category' ,'refresh');
		}

		$this->breadcrumbs->add('Category', 'admin/category');
		$this->breadcrumbs->add('Update', 'admin/category/update');
		$this->breadcrumbs->add($data['category']['category_name'], 'admin/category/update/'.$data['category']['category_id']);
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/categoryUpdate', $data);
		$this->load->view('template/footer');
	}

	public function delete($category_id)
	{
		$status	= $this->CategoryModel->delete($category_id);
		$pesan	= $status ? 'Data berhasil dihapus!' : 'Data gagal dihapus! Terkait dengan data lain.';

		$this->session->set_flashdata('pesan', $pesan);
		redirect('admin/category' ,'refresh');
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/admin/Category.php */