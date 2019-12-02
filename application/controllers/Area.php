<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Area extends CI_Controller
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
        $data['title'] = 'Area Kerja';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['area'] = $this->All_model->getAllArea();
        $data['rev'] = $this->All_model->getAllRev();

        $this->load->view('template/dash_head', $data);
        $this->load->view('template/dash_menu', $data);
        $this->load->view('area/index', $data);
        $this->load->view('template/dash_foot');
    }

    public function tambah()
    {
        $data['title'] = 'Area Kerja';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['max'] = $this->All_model->getMaxArea();

        $this->form_validation->set_rules('nm_area', 'Nama Area Kerja', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('area/tambah', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->tambahDataArea();
            $this->session->set_flashdata('flash', 'Data Berhasil Disimpan');
            redirect('area');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Area Kerja';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['area'] = $this->All_model->getAreaById($id);

        $this->form_validation->set_rules('nm_area', 'Nama Area Kerja', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('area/edit', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->editDataArea();
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('area');
        }
    }

    public function hapus($id)
    {
        $this->All_model->hapusDataArea($id);
        $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
        redirect('area');
    }

    public function tambah_rev()
    {
        $data['title'] = 'Area Kerja';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['max'] = $this->All_model->getMaxRev();

        $this->form_validation->set_rules('nm_rev', 'Kode Rev', 'required');
        $this->form_validation->set_rules('des_rev', 'Deskripsi Rev', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('area/tambah_rev', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->tambahDataRev();
            $this->session->set_flashdata('flash', 'Data Rev Berhasil Ditambah');
            redirect('area');
        }
    }

    public function edit_rev($id)
    {
        $data['title'] = 'Area Kerja';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['rev'] = $this->All_model->getRevById($id);

        $this->form_validation->set_rules('nm_rev', 'Kode Rev', 'required');
        $this->form_validation->set_rules('des_rev', 'Deskripsi Rev', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('area/edit_rev', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->editDataRev();
            $this->session->set_flashdata('flash', 'Data Rev Berhasil Diubah');
            redirect('area');
        }
    }

    public function hapus_rev($id)
    {
        $this->All_model->hapusDataRev($id);
        $this->session->set_flashdata('flash', 'Data Rev Berhasil Dihapus');
        redirect('area');
    }
}
