<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!level('member'))
			redirect('', 'refresh');

		if (level('admin'))
			redirect('admin/dashboard', 'refresh');

		$this->load->model('ProductModel');
		$this->load->model('OrderModel');
	}

	public function index()
	{
		$data['member']		= $this->session->userdata('member');
		$data['product']	= $this->ProductModel->getCart($data['member']['member_id']);

		if (empty($data['product'])) {
			$this->session->set_flashdata('pesan', 'Data keranjang kosong! Silahkan tambahkan produk yang anda inginkan!');
			redirect('home' ,'refresh');
		}

		$this->breadcrumbs->add('Dashboard', 'dashboard');
		$this->breadcrumbs->add('Cart', 'cart');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/cart', $data);
		$this->load->view('template/footer');
	}

	public function delete($cart_id)
	{
		$member = $this->session->userdata('member');

		if (empty($member)) {
			$this->session->set_flashdata('pesan', 'Data keranjang gagal dihapus! Login Terlebih dahulu!');
			redirect('login' ,'refresh');
		}
		else {
			$check = $this->ProductModel->deleteFromCart($member['member_id'], $cart_id);
			if ($check) {
				$this->session->set_flashdata('pesan', 'Data keranjang berhasil dihapus!');
				redirect('cart' ,'refresh');
			}
			else {
				$this->session->set_flashdata('pesan', 'Data keranjang gagal dihapus!');
				redirect('cart' ,'refresh');				
			}
		}
	}

	public function clear()
	{
		$member = $this->session->userdata('member');

		if (empty($member)) {
			$this->session->set_flashdata('pesan', 'Data keranjang gagal dihapus! Login Terlebih dahulu!');
			redirect('login' ,'refresh');
		}
		else {
			$this->ProductModel->clearCart($member['member_id']);
			$this->session->set_flashdata('pesan', 'Data keranjang berhasil dihapus!');
			redirect('home' ,'refresh');
		}
	}

	public function checkout()
	{
		$data['member']		= $this->session->userdata('member');
		$data['product']	= $this->ProductModel->getCart($data['member']['member_id']);

		if (empty($data['product'])) {
			$this->session->set_flashdata('pesan', 'Data keranjang kosong! Silahkan tambahkan produk yang anda inginkan!');
			redirect('home' ,'refresh');
		}
		
		$this->form_validation->set_rules('destination_name', 'Name', 'required');
		$this->form_validation->set_rules('destination_email', 'Email', 'required');
		$this->form_validation->set_rules('destination_contact', 'Contact', 'required');
		$this->form_validation->set_rules('destination_provincy', 'Provincy', 'required');
		$this->form_validation->set_rules('destination_city', 'City', 'required');
		$this->form_validation->set_rules('destination_address', 'Address', 'required');
		$this->form_validation->set_rules('destination_postal_code', 'Postal Code', 'required');
		$this->form_validation->set_rules('order_service', 'Delivery Service', 'required');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$order_code = $this->OrderModel->createOrder($data['member']['member_id'], $formulir);
			$this->session->set_flashdata('pesan', 'Data pesanan berhasil dibuat!');

			redirect('order/detail/'.$order_code ,'refresh');
		}

		$this->breadcrumbs->add('Dashboard', 'dashboard');
		$this->breadcrumbs->add('Checkout', 'checkout');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/checkout', $data);
		$this->load->view('template/footer');
	}
}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */