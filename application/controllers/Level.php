<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('All_model');
        $this->load->library('form_validation');
        cek_not_login();
        isAdmin();

        //is_login();
    }

    public function Index()
    {
        $data['title'] = 'Management Level';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['level'] = $this->All_model->getAllLevel();

        $this->load->view('template/dash_head', $data);
        $this->load->view('template/dash_menu', $data);
        $this->load->view('level/index', $data);
        $this->load->view('template/dash_foot');
    }

    public function tambah()
    {
        $data['title'] = 'Management Level';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['max'] = $this->All_model->getMaxLevel();

        $this->form_validation->set_rules('nm_level', 'Nama Level User', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('level/tambah', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->tambahDataLevel();
            $this->session->set_flashdata('flash', 'Data Berhasil Disimpan');
            redirect('level');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Management Level';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['level'] = $this->All_model->getLevelById($id);

        $this->form_validation->set_rules('nm_level', 'Nama Level User', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('level/edit', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->editDataLevel();
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('level');
        }
    }

    public function hapus($id)
    {
        $this->All_model->hapusDataLevel($id);
        $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
        redirect('level');
    }
}
