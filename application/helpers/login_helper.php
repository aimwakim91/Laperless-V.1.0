<?php
function cek_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('email');

    if ($user_session) {
        redirect('admin');
    }
}

function cek_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('email');

    if (!$user_session) {
        redirect('auth');
    }
}

function isAdmin()
{
    $ci = &get_instance();
    $level = $ci->session->userdata('level_id');
    $menu = $ci->uri->segment(1);

    $QMenu = $ci->db->get_where('tb_menu', ['link_menu' => $menu])->row_array();
    $menuId = $QMenu['for_menu'];

    $ci->db->LIKE($menuId, $level);
    $query = $ci->db->get('tb_menu')->result_array();

    if (!$query) {
        redirect('welcome');
    }
}
