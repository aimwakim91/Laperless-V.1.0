<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('All_model');
        $this->load->library('form_validation');
        cek_not_login();

        //is_login();
    }

    public function index()
    {
        $data['title'] = 'Management Pegawai';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['pegawai'] = $this->All_model->getAllPegawai();

        $this->load->view('template/dash_head', $data);
        $this->load->view('template/dash_menu', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('template/dash_foot');
    }

    public function tambah()
    {
        $data['title'] = 'Management Pegawai';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['max'] = $this->All_model->getMaxPg();
        $data['area'] = $this->All_model->getAllArea();
        $data['rekan'] = $this->All_model->getAllRekan();

        $this->form_validation->set_rules('id', 'ID Pegawai', 'required');
        $this->form_validation->set_rules('nm_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('int_pegawai', 'Initial Pegawai', 'required');
        $this->form_validation->set_rules(
            'nik_pegawai',
            'NIK Pegawai',
            'required|trim|is_unique[tb_pegawai.nik_pegawai]',
            ['is_unique' => 'This NIK Already Registrerd !']
        );
        $this->form_validation->set_rules('jbt_pegawai', 'Jabatan Pegawai', 'required');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[tb_pegawai.email]',
            ['is_unique' => 'This Email Has Already Registrerd !']
        );

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('pegawai/tambah', $data);
            $this->load->view('template/dash_foot');
        } else {
            //Cek Ada Gambar Atau Tidak
            $upload_images = $_FILES['ft_pegawai']['name'];
            if ($upload_images) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']     = '1024';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('ft_pegawai')) {
                    //Gambar Sudah Di Upload
                    $new_images = $this->upload->data('file_name');
                    $this->All_model->tambahDataPegawai();
                    $this->session->set_flashdata('flash', 'Data Berhasil Ditambah');
                    redirect('pegawai');
                } else {
                    $this->session->set_flashdata('flash', $this->upload->display_errors());
                    //echo $this->upload->display_errors();
                    redirect('pegawai');
                }
            } else {
                $this->All_model->tambahDataTanpaPegawai(); //Ga Ada Gambar
                $this->session->set_flashdata('flash', 'Data Berhasil Ditambah');
                redirect('pegawai');
            }
        }
    }

    public function hapus($id)
    {
        $data['pegawai'] = $this->All_model->getPegawaiById($id);
        $this->All_model->hapusDataPegawai($id);
        $old_images = $data['pegawai']['ft_pegawai'];
        if ($old_images != 'default.jpg') {
            unlink(FCPATH . '/assets/img/profile/' . $old_images);
        }
        $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
        redirect('pegawai');
    }

    public function edit($id)
    {
        $data['title'] = 'Management Pegawai';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['area'] = $this->All_model->getAllArea();
        $data['rekan'] = $this->All_model->getAllRekan();
        $data['pegawai'] = $this->All_model->getPegawaiById($id);


        $this->form_validation->set_rules('nm_pegawai', 'Nama Pegawai', 'required|trim');
        $this->form_validation->set_rules('int_pegawai', 'Initial Pegawai', 'required|trim');
        $this->form_validation->set_rules('nik_pegawai', 'NIK Pegawai', 'required|trim');
        $this->form_validation->set_rules('jbt_pegawai', 'Jabatan Pegawai', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('pegawai/edit', $data);
            $this->load->view('template/dash_foot');
        } else {
            $id                = $this->input->post('id', TRUE);
            $nm_pegawai        = $this->input->post('nm_pegawai', TRUE);
            $int_pegawai       = $this->input->post('int_pegawai', TRUE);
            $nik_pegawai       = $this->input->post('nik_pegawai', TRUE);
            $jbt_pegawai       = $this->input->post('jbt_pegawai', TRUE);
            $email             = $this->input->post('email', TRUE);
            $area_id           = $this->input->post('area_id', TRUE);
            $rekan_id          = $this->input->post('rekan_id', TRUE);

            $upload_ft = $_FILES['ft_pegawai']['name'];
            if ($upload_ft) {
                //Cek Ada Gambar Atau Tidak
                $config['allowed_types']        = 'gif|jpg|png|JPG';
                $config['max_size']             = 1024;
                $config['upload_path']          = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('ft_pegawai')) {
                    //Gambar Sudah Terupload
                    $data['pegawai'] = $this->All_model->getPegawaiById($id);
                    $old_images = $data['pegawai']['ft_pegawai'];
                    if ($old_images != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_images);
                    }
                    $new_ft = $this->upload->data('file_name');
                    $this->db->set('ft_pegawai', $new_ft);
                } else {
                    $this->session->set_flashdata('flash', $this->upload->display_errors());
                    redirect('pegawai');
                }
            }

            $this->db->set('nm_pegawai', $nm_pegawai);
            $this->db->set('int_pegawai', $int_pegawai);
            $this->db->set('nik_pegawai', $nik_pegawai);
            $this->db->set('jbt_pegawai', $jbt_pegawai);
            $this->db->set('rekan_id', $rekan_id);
            $this->db->set('area_id', $area_id);
            $this->db->where('id', $id);
            $this->db->update('tb_pegawai');
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('pegawai');
        }
    }
}
