<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SizeModel extends CI_Model {
	public function getAll()
	{
		$this->db->join('category', 'size.category_id = category.category_id', 'left');
		return $this->db->get('size')->result_array();
	}

	public function create($formulir)
	{
		$this->db->insert('size', $formulir);
	}

	public function getDetail($size_id)
	{
		return $this->db->where('size_id', $size_id)->get('size')->row_array();
	}

	public function update($size_id, $formulir)
	{
		$this->db->where('size_id', $size_id)->update('size', $formulir);
	}

	public function delete($size_id)
	{
		$product = $this->db->where('size_id', $size_id)->get('product_size')->num_rows();

		if ($product <= 0) {
			$this->db->where('size_id', $size_id)->delete('size');
			return true;
		}
		else {
			return false;
		}
	}
}

/* End of file SizeModel.php */
/* Location: ./application/models/SizeModel.php */