<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorModel extends CI_Model {
	function validasi($formulir)
	{
		$email = $formulir['email'];
		$password = sha1($formulir['password']);

		$data = $this->db->where('administrator_email', $email)->where('administrator_password', $password)->get('administrator')->row_array();

		if (empty($data))
			return 'gagal';

		$this->session->set_userdata('admin', $data);
		return 'sukses';
	}

	function password($formulir)
	{
		$admin = $this->session->userdata('admin');

		$this->db->set('administrator_password', sha1($formulir['administrator_password']));
		$this->db->where('administrator_id', $admin['administrator_id']);
		$this->db->update('administrator');
	}

	function getAll()
	{
		return $this->db->get('administrator')->result_array();
	}

	function create($formulir)
	{
		unset($formulir['password_confirmation']);
		$formulir['administrator_password'] = sha1($formulir['administrator_password']);
		$this->db->insert('administrator', $formulir);
	}

	function getDetail($administrator_id)
	{
		return $this->db->where('administrator_id', $administrator_id)->get('administrator')->row_array();
	}

	function update($administrator_id, $formulir)
	{
		$this->db->where('administrator_id', $administrator_id)->update('administrator', $formulir);
	}

	function delete($administrator_id)
	{
		$this->db->where('administrator_id', $administrator_id)->delete('administrator');
	}
}

/* End of file AdministratorModel.php */
/* Location: ./application/models/AdministratorModel.php */