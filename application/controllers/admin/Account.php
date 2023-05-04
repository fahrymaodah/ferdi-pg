<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdministratorModel');
	}

	public function index()
	{
		if (level('admin'))
			redirect('admin/dashboard', 'refresh');

		$this->form_validation->set_rules('email',		'Email',	'required|valid_email');
		$this->form_validation->set_rules('password',	'Password', 'required|min_length[6]');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$validasi = $this->AdministratorModel->validasi($formulir);
			if ($validasi == 'gagal')
				redirect('admin', 'refresh');

			redirect('admin/dashboard', 'refresh');
		}

		$this->load->view('template/login');
	}

	function profile()
	{
		$data['admin'] = $this->session->userdata('admin');

		$email_unik = $this->input->post('administrator_email') == $data['admin']['administrator_email'] ? '' : '|is_unique[administrator.administrator_email]';

		$this->form_validation->set_rules('administrator_name', 'Full Name', 'required');
		$this->form_validation->set_rules('administrator_email', 'Email', 'required|valid_email'.$email_unik);

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->AdministratorModel->update($data['admin']['administrator_id'], $formulir);
			$this->session->set_flashdata('pesan', 'Profil berhasil diperbaharui!');

			$this->session->set_userdata('member', $this->AdministratorModel->getDetail($data['admin']['administrator_id']));

			redirect('admin/profile' ,'refresh');
		}

		$this->breadcrumbs->add('Dashboard', 'admin/dashboard');
		$this->breadcrumbs->add('Profile', 'admin/profile');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/administratorProfile', $data);
		$this->load->view('template/footer');
	}

	function password()
	{
		if (!level('admin'))
			redirect('admin/login', 'refresh');

		$this->form_validation->set_rules('administrator_password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|min_length[6]|matches[administrator_password]');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->AdministratorModel->password($formulir);
			$this->session->set_flashdata('pesan', 'Password berhasil diperbaharui!');

			redirect('admin/password' ,'refresh');
		}

		$data['user'] = $this->session->userdata('admin');

		$this->breadcrumbs->add('Dashboard', 'admin/dashboard');
		$this->breadcrumbs->add('Profile', 'admin/profile');
		$this->breadcrumbs->add('Password', 'admin/password');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('template/password', $data);
		$this->load->view('template/footer');
	}

	function register()
	{
		$this->form_validation->set_rules('administrator_name', 'Full Name', 'required');
		$this->form_validation->set_rules('administrator_email', 'Email', 'required|valid_email|is_unique[administrator.administrator_email]');
		$this->form_validation->set_rules('administrator_password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|min_length[6]|matches[administrator_password]');

		if ($this->form_validation->run()) {
			$formulir = $this->input->post();

			$this->AdministratorModel->create($formulir);
			$this->session->set_flashdata('pesan', 'Pendaftaran berhasil!');

			redirect('admin' ,'refresh');
		}

		$this->load->view('template/register');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin', 'refresh');
	}

}

/* End of file Account.php */
/* Location: ./application/controllers/admin/Account.php */