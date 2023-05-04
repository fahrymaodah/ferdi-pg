<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!level('admin'))
			redirect('admin', 'refresh');

		$this->load->model('MemberModel');
		$this->load->model('OrderModel');
	}

	public function index()
	{
		$data['member'] = $this->MemberModel->getAll();

		$this->breadcrumbs->add('Customer', 'admin/member');
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/memberReadAll', $data);
		$this->load->view('template/footer');
	}

	public function detail($member_id)
	{
		$data['member']	= $this->MemberModel->getDetail($member_id);
		$data['order']	= $this->OrderModel->getOrderByMember($member_id);

		$this->breadcrumbs->add('Customer', 'admin/member');
		$this->breadcrumbs->add('Detail', 'admin/member/detail');
		$this->breadcrumbs->add($data['member']['member_email'], 'admin/member/detail/'.$data['member']['member_id']);
		$header['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('template/header', $header);
		$this->load->view('content/memberReadDetail', $data);
		$this->load->view('template/footer');
	}
}

/* End of file Member.php */
/* Location: ./application/controllers/admin/Member.php */