<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!level('admin'))
			redirect('admin', 'refresh');

		$this->load->model('OrderModel');
	}

	public function index()
	{
		$data['order'] = $this->OrderModel->getAll();

		$this->breadcrumbs->add('Order', 'admin/order');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/orderReadAll', $data);
		$this->load->view('template/footer');
	}

	public function detail($order_code)
	{
		$data['order'] = $this->OrderModel->getDetailByCode($order_code);

		$this->form_validation->set_rules('destination_tracking', 'Tracking Code', 'required');

		if ($this->form_validation->run() && $data['order']['order_status'] == 'packing') {
			$formulir = $this->input->post();

			$this->OrderModel->sending($order_code, $formulir['destination_tracking']);
			$this->session->set_flashdata('pesan', 'Data berhasil diperbaharui!');

			redirect('admin/order/detail/'.$order_code ,'refresh');
		}

		$this->breadcrumbs->add('Order', 'admin/order');
		$this->breadcrumbs->add('Detail', 'admin/order/detail/'.$data['order']['order_code']);
		$this->breadcrumbs->add('#'.$data['order']['order_code'], 'None');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/orderReadDetail', $data);
		$this->load->view('template/footer');
	}

	public function invoice($order_code)
	{
		$data['order'] = $this->OrderModel->getDetailByCode($order_code);

		$this->breadcrumbs->add('Order', 'admin/order');
		$this->breadcrumbs->add('Detail', 'admin/order/detail/'.$data['order']['order_code']);
		$this->breadcrumbs->add('Invoice', 'admin/order/invoice/'.$data['order']['order_code']);
		$this->breadcrumbs->add('#'.$data['order']['order_code'], 'None');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/orderReadDetailInvoice', $data);
		$this->load->view('template/footer');
	}
}

/* End of file Order.php */
/* Location: ./application/controllers/admin/Order.php */