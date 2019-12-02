<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function cekLogin()
    {
        // Jika belum ada session username maka 
        // redirect ke halaman auth/login
        if (!$this->session->userdata('email')) {
            redirect('auth/log');
        }
    }

    public function getUserData()
    {
        // Ambil semua data session
        $userData = $this->session->userdata();

        // Return userdata
        return $userData;
    }

    public function isAdmin()
    {
        // Mengambil data session
        $userData = $this->getUserData();

        // Jika level user bukan administrator
        // maka redirect ke halaman 404
        if ($userData['id_level'] !== '1') show_404();
    }
}
