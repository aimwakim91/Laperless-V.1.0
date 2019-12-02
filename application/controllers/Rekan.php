<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekan extends CI_Controller
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
        $data['title'] = 'Vendor Pegawai';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['rekan'] = $this->All_model->getAllRekan();

        $this->load->view('template/dash_head', $data);
        $this->load->view('template/dash_menu', $data);
        $this->load->view('rekan/index', $data);
        $this->load->view('template/dash_foot');
    }

    public function tambah()
    {
        $data['title'] = 'Vendor Pegawai';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['max'] = $this->All_model->getMaxRekan();

        $this->form_validation->set_rules('nm_rekan', 'Nama Satuan Kerja', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('rekan/tambah', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->tambahDataRekan();
            $this->session->set_flashdata('flash', 'Data Berhasil Disimpan');
            redirect('rekan');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Vendor Pegawai';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['rekan'] = $this->All_model->getRekanById($id);

        $this->form_validation->set_rules('nm_rekan', 'Nama Vendor Pegawai', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('rekan/edit', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->editDataRekan();
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('rekan');
        }
    }

    public function hapus($id)
    {
        $this->All_model->hapusDataRekan($id);
        $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
        redirect('rekan');
    }
}
