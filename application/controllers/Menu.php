<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('All_model');
        $this->load->library('form_validation');
        cek_not_login();
        isAdmin();

        // is_login();
    }

    public function index()
    {
        $data['title'] = 'Management Menu';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['menu'] = $this->All_model->getAllMenu();

        $this->load->view('template/dash_head', $data);
        $this->load->view('template/dash_menu', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('template/dash_foot');
    }

    public function tambah()
    {
        $data['title'] = 'Management Menu';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['max'] = $this->All_model->getMaxMenu();
        $data['level'] = $this->All_model->getAllLevel();

        $this->form_validation->set_rules('id_menu', 'ID Menu', 'required');
        $this->form_validation->set_rules('nm_menu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('link_menu', 'Link Menu', 'required');
        $this->form_validation->set_rules('icon_menu', 'Icon Menu', 'required');
        $this->form_validation->set_rules('aktif_menu', 'Status Menu', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('menu/tambah', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->tambahDataMenu();
            $this->session->set_flashdata('flash', 'Data Berhasil Disimpan');
            redirect('menu');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Management Menu';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['menu'] = $this->All_model->getMenuById($id);

        $this->form_validation->set_rules('nm_menu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('link_menu', 'Link Menu', 'required');
        $this->form_validation->set_rules('icon_menu', 'Icon Menu', 'required');
        $this->form_validation->set_rules('aktif_menu', 'Status Menu', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('menu/edit', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->editDataMenu();
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('menu');
        }
    }

    public function hapus($id)
    {
        $this->All_model->hapusDataMenu($id);
        $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
        redirect('menu');
    }
}
