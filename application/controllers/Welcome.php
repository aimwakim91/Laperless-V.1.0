<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->library('form_validation');
		//cek_not_login();
		//isAdmin();

		// is_login();
	}

	public function index()
	{
		$data['title'] = 'Laperless | Forbiden Page';
		$data['user'] = $this->All_model->getPegawaiLogin();
		$data['menu'] = $this->All_model->getAllMenu();
		$this->load->view('template/dash_head', $data);
		$this->load->view('template/dash_menu', $data);
		$this->load->view('template/welcome');
		$this->load->view('template/dash_foot');
	}
}
