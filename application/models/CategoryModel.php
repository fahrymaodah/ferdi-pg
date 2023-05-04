<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {
	public function getAll()
	{
		return $this->db->get('category')->result_array();
	}

	public function create($formulir)
	{
		$formulir['category_url'] = url_title($formulir['category_name'], '-', true);
		$this->db->insert('category', $formulir);
	}

	public function getDetail($category_id)
	{
		return $this->db->where('category_id', $category_id)->get('category')->row_array();
	}

	public function getDetailByUrl($category_url)
	{
		return $this->db->where('category_url', $category_url)->get('category')->row_array();
	}

	public function update($category_id, $formulir)
	{
		$formulir['category_url'] = url_title($formulir['category_name'], '-', true);
		$this->db->where('category_id', $category_id)->update('category', $formulir);
	}

	public function delete($category_id)
	{
		$size		= $this->db->where('category_id', $category_id)->get('size')->num_rows();
		$product	= $this->db->where('category_id', $category_id)->get('product')->num_rows();

		if ($size <= 0 || $product <= 0) {
			$this->db->where('category_id', $category_id)->delete('category');
			return true;
		}
		else {
			return false;
		}
	}
}

/* End of file CategoryModel.php */
/* Location: ./application/models/CategoryModel.php */ ?>