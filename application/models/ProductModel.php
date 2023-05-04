<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {
	public function getAll()
	{
		$this->db->join('category', 'product.category_id = category.category_id', 'left');
		$data = $this->db->get('product')->result_array();

		foreach ($data as $key => $value)
		{
			$product_size = $this->db->where('product_id', $value['product_id'])->get('product_size')->result_array();

			$data[$key]['product_stock'] = 0;
			foreach ($product_size as $k => $val) { $data[$key]['product_stock'] += $val['product_size_stock']; }
		}

		return $data;
	}

	public function create($formulir)
	{
		// upload file baru kalau ada
		$config['upload_path']		= FCPATH.'assets/img/product/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['detect_mime']		= true;

		$this->upload->initialize($config);
		$this->upload->do_upload('product_image');

		$formulir['product_url']	= url_title($formulir['product_name'], '-', true);
		$formulir['product_image']	= $this->upload->data('file_name');
		$this->db->insert('product', $formulir);

		$product_id	= $this->db->insert_id();
		$size		= $this->db->where('category_id', $formulir['category_id'])->get('size')->result_array();
		foreach ($size as $key => $value)
		{
			$product_size['product_id']	= $product_id;
			$product_size['size_id']	= $value['size_id'];

			$this->db->insert('product_size', $product_size);
		}
	}

	public function getDetail($product_id)
	{
		$this->db->join('category', 'product.category_id = category.category_id', 'left');
		$detail = $this->db->where('product_id', $product_id)->get('product')->row_array();

		$this->db->join('size', 'product_size.size_id = size.size_id', 'left');
		$detail['product_size'] = $this->db->where('product_id', $product_id)->get('product_size')->result_array();

		$detail['product_stock'] = 0;
		foreach ($detail['product_size'] as $key => $value) { $detail['product_stock'] += $value['product_size_stock']; }

		return $detail;
	}

	public function update($product_id, $formulir)
	{
		$product = $this->getDetail($product_id);

		$config['upload_path']		= FCPATH.'assets/img/product/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['detect_mime']		= true;

		$this->upload->initialize($config);
		if ($this->upload->do_upload('product_image')) {
			$image = $product['product_image'];
			if ($image != '') {
				if (file_exists(FCPATH.'assets/img/product/'.$image)) { unlink(FCPATH.'assets/img/product/'.$image); }
			}

			$formulir['product_image'] = $this->upload->data('file_name');
		}

		if ($product['category_id'] != $formulir['category_id']) {
			$this->db->where('product_id', $product_id)->delete('product_size');

			$size = $this->db->where('category_id', $formulir['category_id'])->get('size')->result_array();
			foreach ($size as $key => $value)
			{
				$product_size['product_id']	= $product_id;
				$product_size['size_id']	= $value['size_id'];

				$this->db->insert('product_size', $product_size);
			}
		}

		$formulir['product_url'] = url_title($formulir['product_name'], '-', true);
		$this->db->where('product_id', $product_id)->update('product', $formulir);
	}

	public function stock($formulir)
	{
		if (empty($formulir))
			return ;
		
		foreach ($formulir['id'] as $key => $id)
		{
			$this->db->set('product_size_stock', $formulir['stock'][$key])->where('product_size_id', $id)->update('product_size');
		}
	}

	public function getByCategory($category_url)
	{
		$this->db->join('category', 'product.category_id = category.category_id', 'left');
		$data = $this->db->where('category_url', $category_url)->get('product')->result_array();

		foreach ($data as $key => $value)
		{
			$data[$key]['product_size'] = $this->db->where('product_id', $value['product_id'])->get('product_size')->result_array();

			$data[$key]['product_stock'] = 0;
			foreach ($data[$key]['product_size'] as $k => $val) { $data[$key]['product_stock'] += $val['product_size_stock']; }
		}

		return $data;
	}

	public function getDetailByUrl($product_url)
	{
		$this->db->join('category', 'product.category_id = category.category_id', 'left');
		$detail = $this->db->where('product_url', $product_url)->get('product')->row_array();

		$this->db->join('size', 'product_size.size_id = size.size_id', 'left');
		$detail['product_size'] = $this->db->where('product_id', $detail['product_id'])->get('product_size')->result_array();

		$detail['product_stock'] = 0;
		foreach ($detail['product_size'] as $key => $value) { $detail['product_stock'] += $value['product_size_stock']; }

		return $detail;
	}

	public function checkStock($product_size_id)
	{
		return $this->db->where('product_size_id', $product_size_id)->get('product_size')->row_array();
	}

	public function getCart($member_id)
	{
		$this->db->join('product_size', 'cart.product_size_id = product_size.product_size_id', 'left');
		$this->db->join('product', 'product_size.product_id = product.product_id', 'left');
		$this->db->join('category', 'product.category_id = category.category_id', 'left');
		$this->db->join('size', 'product_size.size_id = size.size_id', 'left');
		return $this->db->where('member_id', $member_id)->get('cart')->result_array();
	}

	public function addToCart($member_id, $formulir)
	{
		$check = $this->db->where('member_id', $member_id)->where('product_size_id', $formulir['product_size_id'])->get('cart')->row_array();

		if (empty($check)) {
			$add['member_id']		= $member_id;
			$add['product_size_id']	= $formulir['product_size_id'];
			$add['cart_qty']		= $formulir['cart_qty'];

			$this->db->insert('cart', $add);
		}
		else {
			$this->db->set('cart_qty', $check['cart_qty'] + $formulir['cart_qty'])->where('cart_id', $check['cart_id'])->update('cart');
		}

		$this->db->where('product_size_id', $formulir['product_size_id']);
		$this->db->set('product_size_stock', 'product_size_stock - '.$formulir['cart_qty'], FALSE);
		$this->db->update('product_size');
	}

	public function deleteFromCart($member_id, $cart_id)
	{
		$cart = $this->db->where('cart_id', $cart_id)->get('cart')->row_array();

		if ($member_id == $cart['member_id']) {
			$this->db->where('product_size_id', $cart['product_size_id']);
			$this->db->set('product_size_stock', 'product_size_stock + '.$cart['cart_qty'], FALSE);
			$this->db->update('product_size');

			$this->db->where('cart_id', $cart_id)->delete('cart');

			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function clearCart($member_id)
	{
		$cart = $this->db->get('cart')->result_array();
		foreach ($cart as $key => $value)
		{
			$this->db->where('product_size_id', $value['product_size_id']);
			$this->db->set('product_size_stock', 'product_size_stock + '.$value['cart_qty'], FALSE);
			$this->db->update('product_size');
		}

		$this->db->where('member_id', $member_id)->delete('cart');
	}

	public function delete($product_id)
	{
		$product = $this->db->where('product_id', $product_id)->get('product_size')->num_rows();

		if ($product <= 0) {
			$detail	= $this->getDetail($product_id);
			$image	= $detail['product_image'];
			if ($image != '') {
				if (file_exists(FCPATH.'assets/img/product/'.$image)) { unlink(FCPATH.'assets/img/product/'.$image); }
			}

			$this->db->where('product_id', $product_id)->delete('product_size');
			$this->db->where('product_id', $product_id)->delete('product');
			return true;
		}
		else {
			return false;
		}
	}
}

/* End of file ProductModel.php */
/* Location: ./application/models/ProductModel.php */