<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$this->load->library('midtrans');

		$params = array('server_key' => 'SB-Mid-server-WAmDqh1KDbdt3P63c7HkqHjX', 'production' => false);
		$this->midtrans->config($params);

		$this->load->model('OrderModel');
	}

	public function token()
	{
		$order = $this->OrderModel->getDetailByCode($this->input->get('code'));

		$transaction_details['order_id']		= $order['order_code'];
		$transaction_details['gross_amount']	= $order['order_total'];

		$customer_details['first_name']			= $order['member_name'];
		$customer_details['email']				= $order['member_email'];
		$customer_details['phone']				= $order['member_contact'];

		$shipping_address['first_name']			= $order['destination_name'];
		$shipping_address['email']				= $order['destination_email'];
		$shipping_address['phone']				= $order['destination_contact'];
		$shipping_address['city']				= $order['destination_city'];
		$shipping_address['address']			= $order['destination_address'];
		$shipping_address['postal_code']		= $order['destination_postal_code'];
		$shipping_address['country_code']		= 'IDN';

		$customer_details['shipping_address']	= $shipping_address;

		$credit_card['secure'] = true;

		$time = time();
		$custom_expiry['start_time']	= date("Y-m-d H:i:s O", $time);
		$custom_expiry['unit']			= 'minute';
		$custom_expiry['duration']		= 5;

		$transaction_data['transaction_details']	= $transaction_details;
		$transaction_data['customer_details']		= $customer_details;
		$transaction_data['credit_card']			= $credit_card;
		$transaction_data['expiry']					= $custom_expiry;

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);

		if (strpos($result['status_message'], 'Success') !== false) {
			$member	= $this->session->userdata('member');
			$order	= $this->OrderModel->getDetailByCode($result['order_id']);

			if ($member['member_id'] != $order['member_id']) {
				$this->session->set_flashdata('pesan', 'Data gagal diambil!');
				redirect('order', 'refresh');
			}

			if ($order['order_status'] != 'pending') {
				$this->session->set_flashdata('pesan', 'Data gagal diperbaharui!');
				redirect('order/detail/'.$order['order_code'], 'refresh');
			}

			$this->OrderModel->paid($order['order_code']);
			$this->OrderModel->packing($order['order_code']);
			$this->session->set_flashdata('pesan', 'Pembayaran berhasil diterima! Paket Akan segera dikemas dan dikirimkan');
			redirect('order/detail/'.$order['order_code'], 'refresh');

		}
	}
}
