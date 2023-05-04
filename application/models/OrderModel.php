<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model {
	public function getAll()
	{
		$this->db->join('member', 'order.member_id = member.member_id', 'left');
		$this->db->join('destination', 'order.order_id = destination.order_id', 'left');
		return $this->db->get('order')->result_array();
	}

	public function getDetail($order_id)
	{
		
	}

	public function getDetailByCode($order_code)
	{
		$this->db->join('member', 'order.member_id = member.member_id', 'left');
		$this->db->join('destination', 'order.order_id = destination.order_id', 'left');
		$data = $this->db->where('order_code', $order_code)->get('order')->row_array();

		$this->db->join('order', 'order_product.order_id = order.order_id', 'left');
		$this->db->join('product_size', 'order_product.product_size_id = product_size.product_size_id', 'left');
		$this->db->join('product', 'product_size.product_id = product.product_id', 'left');
		$this->db->join('category', 'product.category_id = category.category_id', 'left');
		$this->db->join('size', 'product_size.size_id = size.size_id', 'left');
		$data['product'] = $this->db->where('order_code', $order_code)->get('order_product')->result_array();

		return $data;
	}

	public function getOrderByMember($member_id)
	{
		$this->db->join('member', 'order.member_id = member.member_id', 'left');
		$this->db->join('destination', 'order.order_id = destination.order_id', 'left');
		return $this->db->where('member.member_id', $member_id)->get('order')->result_array();
	}

	public function createOrder($member_id, $formulir)
	{
		$jumlah = $this->db->like('order_code', 'INV-'.date('ymd'), 'after')->get('order')->num_rows();
		$urutan = str_pad($jumlah+1, 3, '0', STR_PAD_LEFT);

		$this->db->join('product_size', 'cart.product_size_id = product_size.product_size_id', 'left');
		$this->db->join('product', 'product_size.product_id = product.product_id', 'left');
		$cart	= $this->db->where('member_id', $member_id)->get('cart')->result_array();

		$total	= 0;
		foreach ($cart as $key => $value) { $total += $value['product_price'] * $value['cart_qty']; }

		// Masukin data order
		$order['member_id']			= $member_id;
		$order['order_code']		= 'INV-'.date('ymd').$urutan;
		$order['order_total']		= $total;
		$order['order_payment']		= 'Direct Bank Transfer';
		$order['order_service']		= $formulir['order_service'];
		$order['order_status']		= 'pending';
		$order['order_datetime']	= date('Y-m-d H:i:s');

		$this->db->insert('order', $order);
		$order_id	= $this->db->insert_id();

		// Masukin data product dan hapus keranjang
		foreach ($cart as $key => $value)
		{
			$product['order_id']			= $order_id;
			$product['product_size_id']		= $value['product_size_id'];
			$product['order_product_qty']	= $value['cart_qty'];
			$product['order_product_price']	= $value['product_price'];

			$this->db->insert('order_product', $product);
		}

		$this->db->where('member_id', $member_id)->delete('cart');

		// Masukin data destinasi
		$destination['order_id']				= $order_id;
		$destination['destination_name']		= $formulir['destination_name'];
		$destination['destination_email']		= $formulir['destination_email'];
		$destination['destination_contact']		= $formulir['destination_contact'];
		$destination['destination_city']		= $formulir['destination_city'];
		$destination['destination_address'] 	= $formulir['destination_address'];
		$destination['destination_postal_code']	= $formulir['destination_postal_code'];

		$this->db->insert('destination', $destination);

		$order = $this->db->where('order_id', $order_id)->get('order')->row_array();
		return $order['order_code'];
	}

	public function paid($order_code)
	{
		$this->db->set('order_status', 'paid')->where('order_code', $order_code)->update('order');
	}

	public function packing($order_code)
	{
		$this->db->set('order_status', 'packing')->where('order_code', $order_code)->update('order');
	}

	public function sending($order_code, $destination_tracking)
	{
		$order = $this->db->where('order_code', $order_code)->get('order')->row_array();
		$this->db->set('destination_tracking', $destination_tracking)->where('order_id', $order['order_id'])->update('destination');

		$this->db->set('order_status', 'sending')->where('order_code', $order_code)->update('order');
	}

	public function completed($order_code)
	{
		$this->db->set('order_status', 'completed')->where('order_code', $order_code)->update('order');
	}

	public function cancelled($order_code)
	{
		$this->db->set('order_status', 'cancelled')->where('order_code', $order_code)->update('order');
	}
}

/* End of file OrderModel.php */
/* Location: ./application/models/OrderModel.php */