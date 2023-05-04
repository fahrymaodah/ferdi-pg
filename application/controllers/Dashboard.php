<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!level('member'))
			redirect('', 'refresh');

		if (level('admin'))
			redirect('admin/dashboard', 'refresh');

		$this->load->model('MemberModel');
		$this->load->model('OrderModel');
	}

	public function index()
	{
		$data['member']	= $this->session->userdata('member');
		$data['order']	= $this->OrderModel->getOrderByMember($data['member']['member_id']);

		$formulir = $this->input->post();
		if ($formulir) {
			$panel = $formulir['panel']; unset($formulir['panel']);
			$this->session->set_userdata('panel', $panel);

			if ($panel == 'profile') {
				$email_unik		= $this->input->post('member_email') == $data['member']['member_email'] ? '' : '|is_unique[member.member_email]';
				$contact_unik	= $this->input->post('member_contact') == $data['member']['member_contact'] ? '' : '|is_unique[member.member_contact]';

				$this->form_validation->set_rules('member_name', 'Full Name', 'required');
				$this->form_validation->set_rules('member_email', 'Email', 'required|valid_email'.$email_unik);
				$this->form_validation->set_rules('member_contact', 'Contact', 'required|numeric'.$contact_unik);

				if ($this->form_validation->run()) {
					$this->MemberModel->update($data['member']['member_id'], $formulir);
					$this->session->set_flashdata('pesan', 'Profil berhasil diperbaharui!');

					$this->session->set_userdata('member', $this->MemberModel->getDetail($data['member']['member_id']));

					redirect('dashboard' ,'refresh');
				}
			}
			elseif ($panel == 'password') {
				$this->form_validation->set_rules('member_password', 'New Password', 'required|min_length[6]');
				$this->form_validation->set_rules('password_confirmation', 'Confirm New Password', 'required|min_length[6]|matches[member_password]');

				if ($this->form_validation->run()) {
					$this->MemberModel->password($formulir);
					$this->session->set_flashdata('pesan', 'Password berhasil diperbaharui!');

					redirect('dashboard' ,'refresh');
				}
			}
		}

		$data['panel'] = $this->session->userdata('panel') ?? 'order';

		$this->breadcrumbs->add('Dashboard', 'dashboard');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/dashboard', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */