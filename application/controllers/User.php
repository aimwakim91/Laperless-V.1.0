<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['title'] = 'Profile';
        $data['user'] = $this->All_model->getPegawaiLogin();

        $this->load->view('template/dash_head', $data);
        $this->load->view('template/dash_menu', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/dash_foot');
    }

    public function edit()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['area'] = $this->All_model->getAllArea();
        $data['rekan'] = $this->All_model->getAllRekan();


        $this->form_validation->set_rules('nm_pegawai', 'Nama Pegawai', 'required|trim');
        $this->form_validation->set_rules('int_pegawai', 'Initial Pegawai', 'required|trim');
        $this->form_validation->set_rules('nik_pegawai', 'NIK Pegawai', 'required|trim');
        $this->form_validation->set_rules('jbt_pegawai', 'Jabatan Pegawai', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('user/edit', $data);
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
            redirect('user');
        }
    }

    public function change()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->All_model->getPegawaiLogin();

        $this->form_validation->set_rules('cur_pas', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_pas1', 'New Password', 'required|trim|min_length[4]|matches[new_pas2]', [
            'matches' => 'Password Not Match !',
            'min_length' => 'Password Too Short !'
        ]);
        $this->form_validation->set_rules('new_pas2', 'Verify Password', 'required|trim|matches[new_pas1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('user/change', $data);
            $this->load->view('template/dash_foot');
        } else {
            $cur_pas = $this->input->post('cur_pas');
            $new_pas = $this->input->post('new_pas1');
            $email = $this->input->post('email');

            if (!password_verify($cur_pas, $data['user']['password'])) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Wrong Current Password !!!</div>');
                redirect('user/change');
            } else {
                if ($cur_pas == $new_pas) {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">New Password Same With Current Password</div>');
                    redirect('user/change');
                } else {
                    //PASSWORD OK
                    $pass_hash = password_hash($new_pas, PASSWORD_DEFAULT);

                    $this->db->set('password', $pass_hash);
                    $this->db->where('email', $email);
                    $this->db->update('tb_pegawai');
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Congratulation ! Your Password Has Been Change.</div>');
                    redirect('user');
                }
            }
        }
    }
}
