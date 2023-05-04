<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MemberModel');

		if (level('admin'))
			redirect('admin/dashboard', 'refresh');
	}

	public function index()
	{
		if (level('member'))
			redirect('', 'refresh');

		$this->form_validation->set_rules('email',		'Email',	'required|valid_email');
		$this->form_validation->set_rules('password',	'Password', 'required|min_length[6]');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$validasi = $this->MemberModel->validasi($formulir);
			if ($validasi == 'gagal')
				redirect('login', 'refresh');

			redirect('', 'refresh');
		}

		$this->load->view('template/login');
	}

	function profile()
	{
		$data['member'] = $this->session->userdata('member');

		$email_unik		= $this->input->post('member_email') == $data['member']['member_email'] ? '' : '|is_unique[member.member_email]';
		$contact_unik	= $this->input->post('member_contact') == $data['member']['member_contact'] ? '' : '|is_unique[member.member_contact]';

		$this->form_validation->set_rules('member_name', 'Full Name', 'required');
		$this->form_validation->set_rules('member_email', 'Email', 'required|valid_email'.$email_unik);
		$this->form_validation->set_rules('member_contact', 'Contact', 'required|numeric'.$contact_unik);

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->MemberModel->update($data['member']['member_id'], $formulir);
			$this->session->set_flashdata('pesan', 'Profil berhasil diperbaharui!');

			$this->session->set_userdata('member', $this->MemberModel->getDetail($data['member']['member_id']));

			redirect('profile' ,'refresh');
		}

		$this->breadcrumbs->add('Dashboard', 'dashboard');
		$this->breadcrumbs->add('Profile', 'profile');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/profile', $data);
		$this->load->view('template/footer');
	}

	function password()
	{
		if (!level('member'))
			redirect('login', 'refresh');

		$this->form_validation->set_rules('member_password', 'New Password', 'required|min_length[6]');
		$this->form_validation->set_rules('password_confirmation', 'Confirm New Password', 'required|min_length[6]|matches[member_password]');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->MemberModel->password($formulir);
			$this->session->set_flashdata('pesan', 'Password berhasil diperbaharui!');

			redirect('profile' ,'refresh');
		}

		$data['user'] = $this->session->userdata('member');

		$this->breadcrumbs->add('Dashboard', 'dashboard');
		$this->breadcrumbs->add('Profile', 'profile');
		$this->breadcrumbs->add('Password', 'password');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('template/password', $data);
		$this->load->view('template/footer');
	}

	function register()
	{
		$this->form_validation->set_rules('member_name', 'Full Name', 'required');
		$this->form_validation->set_rules('member_email', 'Email', 'required|valid_email|is_unique[member.member_email]');
		$this->form_validation->set_rules('member_password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|min_length[6]|matches[member_password]');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->MemberModel->create($formulir);
			$this->session->set_flashdata('pesan', 'Pendaftaran berhasil!');

			redirect('login' ,'refresh');
		}

		$this->load->view('template/register');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}

}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */