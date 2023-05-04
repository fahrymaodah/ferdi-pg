<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberModel extends CI_Model {
	function validasi($formulir)
	{
		$email = $formulir['email'];
		$password = sha1($formulir['password']);

		$data = $this->db->where('member_email', $email)->where('member_password', $password)->get('member')->row_array();

		if (empty($data))
			return 'gagal';

		$this->session->set_userdata('member', $data);
		return 'sukses';
	}

	function password($formulir)
	{
		$member = $this->session->userdata('member');

		$this->db->set('member_password', sha1($formulir['member_password']));
		$this->db->where('member_id', $member['member_id']);
		$this->db->update('member');
	}

	function getAll()
	{
		return $this->db->get('member')->result_array();
	}

	function create($formulir)
	{
		unset($formulir['password_confirmation']);
		$formulir['member_password'] = sha1($formulir['member_password']);
		$this->db->insert('member', $formulir);
	}

	function getDetail($member_id)
	{
		return $this->db->where('member_id', $member_id)->get('member')->row_array();
	}

	function update($member_id, $formulir)
	{
		$this->db->where('member_id', $member_id)->update('member', $formulir);
	}

	function delete($member_id)
	{
		$this->db->where('member_id', $member_id)->delete('member');
	}
}

/* End of file MemberModel.php */
/* Location: ./application/models/MemberModel.php */