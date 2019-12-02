<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Controller
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

    public function index()
    {
        $data['title'] = 'Management User';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['pegawai'] = $this->All_model->getAllPegawai();

        $this->load->view('template/dash_head', $data);
        $this->load->view('template/dash_menu', $data);
        $this->load->view('muser/index', $data);
        $this->load->view('template/dash_foot');
    }

    public function hapus($id)
    {
        $this->All_model->hapusDataPegawai($id);
        $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
        redirect('muser');
    }

    public function edit($id)
    {
        $data['title'] = 'Management User';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['pegawai'] = $this->All_model->getPegawaiById($id);

        $this->form_validation->set_rules('level_id', 'Level Belum Dipilih', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['level'] = $this->All_model->getAllLevel();

            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('muser/edit', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->editLevelPegawai();
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('muser');
        }
    }

    public function aktif($id)
    {
        $data['title'] = 'Management User';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['pegawai'] = $this->All_model->getPegawaiById($id);

        $this->form_validation->set_rules('active', 'Status Active Belum Dipilih', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['level'] = $this->All_model->getAllLevel();

            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('muser/aktif', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->editAktifPegawai();
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('muser');
        }
    }
}
