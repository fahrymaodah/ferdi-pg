<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!level('admin'))
			redirect('admin', 'refresh');

		$this->load->model('CategoryModel');
		$this->load->model('SizeModel');
	}

	public function index()
	{
		$data['size'] = $this->SizeModel->getAll();

		$this->breadcrumbs->add('Size', 'admin/size');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/sizeReadAll', $data);
		$this->load->view('template/footer');		
	}

	public function create()
	{
		$data['category'] = $this->CategoryModel->getAll();

		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('size_name', 'Size Name', 'required');
		$this->form_validation->set_rules('size_description', 'Size Description', 'required');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->SizeModel->create($formulir);
			$this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');

			redirect('admin/size' ,'refresh');
		}

		$this->breadcrumbs->add('Size', 'admin/size');
		$this->breadcrumbs->add('Create', 'admin/size/create');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/sizeCreate', $data);
		$this->load->view('template/footer');
	}

	public function update($size_id)
	{
		$data['category']	= $this->CategoryModel->getAll();
		$data['size']		= $this->SizeModel->getDetail($size_id);

		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('size_name', 'Size Name', 'required');
		$this->form_validation->set_rules('size_description', 'Size Description', 'required');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->SizeModel->update($size_id, $formulir);
			$this->session->set_flashdata('pesan', 'Data berhasil diperbaharui!');

			redirect('admin/size' ,'refresh');
		}

		$this->breadcrumbs->add('Size', 'admin/size');
		$this->breadcrumbs->add('Update', 'admin/size/update');
		$this->breadcrumbs->add($data['size']['size_name'], 'admin/size/update/'.$data['size']['size_id']);
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/sizeUpdate', $data);
		$this->load->view('template/footer');
	}

	public function delete($size_id)
	{
		$status	= $this->SizeModel->delete($size_id);
		$pesan	= $status ? 'Data berhasil dihapus!' : 'Data gagal dihapus! Terkait dengan data lain.';

		$this->session->set_flashdata('pesan', $pesan);
		redirect('admin/size' ,'refresh');
	}

}

/* End of file Size.php */
/* Location: ./application/controllers/admin/Size.php */