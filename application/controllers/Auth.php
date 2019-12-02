<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        cek_already_login();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Laperless | User Login';
            $this->load->view('template/auth_head', $data);
            $this->load->view('auth/log');
            $this->load->view('template/auth_foot');
        } else {
            //Validasi Success
            $this->_login();
        }
    }

    private function _login()
    {
        $mail = $this->input->post('email');
        $pass = $this->input->post('password');
        $user = $this->db->get_where('tb_pegawai', ['email' => $mail])->row_array();
        //Jika Email Terdaftar
        if ($user) {
            //Cek Password
            if (password_verify($pass, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'level_id' => $user['level_id']
                ];

                $this->session->set_userdata($data);
                if ($user['active'] == 1) {
                    $this->session->set_userdata($data);
                    if ($user['level_id'] == 1) {
                        redirect('admin');
                    } elseif ($user['level_id'] == 2) {
                        redirect('kerja');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Login Gagal !!!</b><br>Akun Anda Belum Aktif. Silahkan Hubungi Adminitrator.<br> Terima Kasih</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Not Registred !</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[tb_pegawai.email]',
            ['is_unique' => 'This Email Has Already Registrerd !']
        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password Not Match !',
            'min_length' => 'Password Too Short !'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Laperless | User Registration';
            $data['area']  = $this->db->get('tb_area')->result_array();
            $data['rekan']  = $this->db->get('tb_rekan')->result_array();

            $this->load->view('template/auth_head', $data);
            $this->load->view('auth/reg', $data);
            $this->load->view('template/auth_foot');
        } else {
            $data = [
                'nm_pegawai' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'ft_pegawai' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'area_id'  => htmlspecialchars($this->input->post('area', true)),
                'rekan_id'  => htmlspecialchars($this->input->post('rekan', true)),
                'jbt_pegawai' => 'TBA',
                'nik_pegawai' => 'TBA',
                'int_pegawai' => 'TBA',
                'level_id' => '3',
                'active' => '0'
            ];
            $this->db->insert('tb_pegawai', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation ! Your Account Has Been Created. Please Login</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have Been Logged Out !</div>');
        redirect('auth');
    }

    public function block()
    {
        echo 'Blok Nih';
    }
}
