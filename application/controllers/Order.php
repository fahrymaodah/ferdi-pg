<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!level('member'))
			redirect('', 'refresh');

		if (level('admin'))
			redirect('admin/dashboard', 'refresh');

		$this->load->model('OrderModel');
	}

	public function index()
	{
		$member			= $this->session->userdata('member');
		$data['order']	= $this->OrderModel->getOrderByMember($member['member_id']);

		$this->breadcrumbs->add('Dashboard', 'dashboard');
		$this->breadcrumbs->add('Order History', 'order');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/order', $data);
		$this->load->view('template/footer');
	}

	public function detail($order_code)
	{
		$member			= $this->session->userdata('member');
		$data['order']	= $this->OrderModel->getDetailByCode($order_code);

		if ($member['member_id'] != $data['order']['member_id']) {
			$this->session->set_flashdata('pesan', 'Data gagal diambil!');
			redirect('order', 'refresh');
		}

		$this->breadcrumbs->add('Order', 'order');
		$this->breadcrumbs->add('Detail', 'order/detail/'.$data['order']['order_code']);
		$this->breadcrumbs->add('#'.$data['order']['order_code'], 'None');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/orderDetail', $data);
		$this->load->view('template/footer');
	}

	public function invoice($order_code)
	{
		$member			= $this->session->userdata('member');
		$data['order']	= $this->OrderModel->getDetailByCode($order_code);

		if ($member['member_id'] != $data['order']['member_id']) {
			$this->session->set_flashdata('pesan', 'Data gagal diambil!');
			redirect('order', 'refresh');
		}

		$this->breadcrumbs->add('Order', 'order');
		$this->breadcrumbs->add('Detail', 'order/detail/'.$data['order']['order_code']);
		$this->breadcrumbs->add('Invoice', 'order/invoice/'.$data['order']['order_code']);
		$this->breadcrumbs->add('#'.$data['order']['order_code'], 'None');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/orderDetailInvoice', $data);
		$this->load->view('template/footer');
	}

	public function completed($order_code)
	{
		$member			= $this->session->userdata('member');
		$data['order']	= $this->OrderModel->getDetailByCode($order_code);

		if ($member['member_id'] != $data['order']['member_id']) {
			$this->session->set_flashdata('pesan', 'Data gagal diambil!');
			redirect('order', 'refresh');
		}

		if ($data['order']['order_status'] != 'sending') {
			$this->session->set_flashdata('pesan', 'Data gagal diperbaharui!');
			redirect('order/detail/'.$order_code, 'refresh');
		}

		$this->OrderModel->completed($order_code);
		$this->session->set_flashdata('pesan', 'Data berhasil diperbaharui!');
		redirect('order/detail/'.$order_code, 'refresh');
	}

	public function cancelled($order_code)
	{
		$member			= $this->session->userdata('member');
		$data['order']	= $this->OrderModel->getDetailByCode($order_code);

		if ($member['member_id'] != $data['order']['member_id']) {
			$this->session->set_flashdata('pesan', 'Data gagal diambil!');
			redirect('order', 'refresh');
		}

		if ($data['order']['order_status'] != 'pending') {
			$this->session->set_flashdata('pesan', 'Data gagal diperbaharui!');
			redirect('order/detail/'.$order_code, 'refresh');
		}

		$this->OrderModel->cancelled($order_code);
		$this->session->set_flashdata('pesan', 'Data berhasil diperbaharui!');
		redirect('order/detail/'.$order_code, 'refresh');
	}

}

/* End of file Order.php */
/* Location: ./application/controllers/Order.php */