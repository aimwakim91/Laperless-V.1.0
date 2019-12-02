<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('All_model');
        $this->load->library('form_validation');
        cek_not_login();
        //is_login();
    }
    public function Index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->All_model->getPegawaiLogin();

        $this->load->view('template/dash_head', $data);
        $this->load->view('template/dash_menu', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/dash_foot');
    }
}
