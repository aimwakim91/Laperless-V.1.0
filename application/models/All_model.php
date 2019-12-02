<?php
// Untuk Menyimpan Semua Code Databese Yang Nanti Di Load Ke Controller
class All_model extends CI_Model
{
    // TABEL PEGAWAI
    public function getMaxPg()
    {
        $this->db->SELECT_MAX('id');
        $query = $this->db->get('tb_pegawai');
        return $query->row_array();
    }

    public function getAllPegawai() // Semua Data Pegawai
    {
        $this->db->select('*');
        $this->db->join('tb_level', 'tb_level.id_level = tb_pegawai.level_id');
        $this->db->join('tb_rekan', 'tb_rekan.id_rekan = tb_pegawai.rekan_id');
        $this->db->join('tb_area', 'tb_area.id_area = tb_pegawai.area_id');
        $query = $this->db->get('tb_pegawai');
        return $query->result_array();
    }

    public function getPegawaiLogin() //Data Pegawai By Login User
    {
        $this->db->select('*');
        $this->db->join('tb_level', 'tb_level.id_level = tb_pegawai.level_id');
        $this->db->join('tb_rekan', 'tb_rekan.id_rekan = tb_pegawai.rekan_id');
        $this->db->join('tb_area', 'tb_area.id_area = tb_pegawai.area_id');
        $query  = $this->db->get_where('tb_pegawai', ['email' => $this->session->userdata('email')]);
        return $query->row_array();
    }

    public function getPegawaiById($id) // Data Pegawai By ID
    {
        $this->db->select('*');
        $this->db->join('tb_level', 'tb_level.id_level = tb_pegawai.level_id');
        $this->db->join('tb_rekan', 'tb_rekan.id_rekan = tb_pegawai.rekan_id');
        $this->db->join('tb_area', 'tb_area.id_area = tb_pegawai.area_id');
        return $this->db->get_where('tb_pegawai', ['id' => $id])->row_array();
    }

    public function hapusDataPegawai($id) //Hapus Data Pegawai By ID
    {
        $this->db->delete('tb_pegawai', ['id' => $id]);
    }

    public function editLevelPegawai() //Update LEVEL Pegawai
    {
        $data = [
            "level_id" => $this->input->post('level_id', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_pegawai', $data);
    }

    public function editAktifPegawai() //Update AKTIF Pegawai
    {
        $data = [
            "active" => $this->input->post('active', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_pegawai', $data);
    }

    public function tambahDataTanpaPegawai()
    {
        //Add Pegawai
        $data = [
            "password"          => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            "id"                => $this->input->post('id', TRUE),
            "nm_pegawai"        => $this->input->post('nm_pegawai', TRUE),
            "int_pegawai"       => $this->input->post('int_pegawai', TRUE),
            "nik_pegawai"       => $this->input->post('nik_pegawai', TRUE),
            "jbt_pegawai"       => $this->input->post('jbt_pegawai', TRUE),
            "email"             => $this->input->post('email', TRUE),
            "area_id"           => $this->input->post('area_id', TRUE),
            "rekan_id"          => $this->input->post('rekan_id', TRUE),
            "ft_pegawai"        => 'default.jpg',
            "level_id"          => '8'
        ];
        $this->db->insert('tb_pegawai', $data);
    }

    public function tambahDataPegawai()
    {
        $new_images = $this->upload->data('file_name');
        $data = [
            "password"          => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            "id"                => $this->input->post('id', TRUE),
            "nm_pegawai"        => $this->input->post('nm_pegawai', TRUE),
            "int_pegawai"       => $this->input->post('int_pegawai', TRUE),
            "nik_pegawai"       => $this->input->post('nik_pegawai', TRUE),
            "jbt_pegawai"       => $this->input->post('jbt_pegawai', TRUE),
            "email"             => $this->input->post('email', TRUE),
            "area_id"           => $this->input->post('area_id', TRUE),
            "rekan_id"          => $this->input->post('rekan_id', TRUE),
            "level_id"          => '8',
            "ft_pegawai"        => $new_images
        ];
        $this->db->insert('tb_pegawai', $data);
    }

    //TABEL MENU
    public function getAllMenu()
    {
        $query = $this->db->get('tb_menu');
        return $query->result_array();
    }
    public function getMaxMenu()
    {
        $this->db->SELECT_MAX('id_menu');
        $query = $this->db->get('tb_menu');
        return $query->row_array();
    }
    public function getMenuById($id)
    {
        return $this->db->get_where('tb_menu', ['id_menu' => $id])->row_array();
    }

    public function editDataMenu()
    {
        $for = implode(' ', $this->input->post('for_menu', TRUE));
        //$for_menu = implode(' ', $for);
        $data = [
            "nm_menu" => $this->input->post('nm_menu', true),
            "link_menu" => $this->input->post('link_menu', true),
            "icon_menu" => $this->input->post('icon_menu', true),
            "for_menu" => $for,
            "aktif_menu" => $this->input->post('aktif_menu', true)
        ];
        $this->db->where('id_menu', $this->input->post('id_menu'));
        $this->db->update('tb_menu', $data);
    }

    public function tambahDataMenu()
    {
        $for = implode(' ', $this->input->post('for_menu', TRUE));
        //$for_menu = implode(' ', $for);
        $data = [
            "id_menu" => $this->input->post('id_menu', true),
            "nm_menu" => $this->input->post('nm_menu', true),
            "link_menu" => $this->input->post('link_menu', true),
            "icon_menu" => $this->input->post('icon_menu', true),
            "for_menu" => $for,
            "aktif_menu" => $this->input->post('aktif_menu', true)
        ];
        $this->db->insert('tb_menu', $data);
    }

    public function hapusDataMenu($id)
    {
        $this->db->delete('tb_menu', ['id_menu' => $id]);
    }

    //TABEL LEVEL
    public function getAllLevel()
    {
        $query = $this->db->get('tb_level');
        return $query->result_array();
    }

    public function getMaxLevel()
    {
        $this->db->SELECT_MAX('id_level');
        $query = $this->db->get('tb_level');
        return $query->row_array();
    }

    public function getLevelById($id)
    {
        return $this->db->get_where('tb_level', ['id_level' => $id])->row_array();
    }

    public function editDataLevel()
    {
        $data = [
            "nm_level" => $this->input->post('nm_level', true)
        ];
        $this->db->where('id_level', $this->input->post('id_level'));
        $this->db->update('tb_level', $data);
    }

    public function tambahDatalevel()
    {
        $data = [
            "id_level" => $this->input->post('id_level', true),
            "nm_level" => $this->input->post('nm_level', true)
        ];
        $this->db->insert('tb_level', $data);
    }

    public function hapusDataLevel($id)
    {
        $this->db->delete('tb_level', ['id_level' => $id]);
    }


    //TABEL REKAN
    public function getMaxRekan()
    {
        $this->db->SELECT_MAX('id_rekan');
        $query = $this->db->get('tb_rekan');
        return $query->row_array();
    }

    public function getAllRekan()
    {
        $query = $this->db->get('tb_rekan');
        return $query->result_array();
    }

    public function getRekanById($id)
    {
        return $this->db->get_where('tb_rekan', ['id_rekan' => $id])->row_array();
    }

    public function editDataRekan()
    {
        $data = [
            "nm_rekan" => $this->input->post('nm_rekan', true)
        ];
        $this->db->where('id_rekan', $this->input->post('id_rekan'));
        $this->db->update('tb_rekan', $data);
    }

    public function tambahDataRekan()
    {
        $data = [
            "id_rekan" => $this->input->post('id_rekan', true),
            "nm_rekan" => $this->input->post('nm_rekan', true)
        ];
        $this->db->insert('tb_rekan', $data);
    }

    public function hapusDataRekan($id)
    {
        $this->db->delete('tb_rekan', ['id_rekan' => $id]);
    }

    //TABEL AREA
    public function getAllArea()
    {
        $query = $this->db->get('tb_area');
        return $query->result_array();
    }

    public function getMaxArea()
    {
        $this->db->SELECT_MAX('id_area');
        $query = $this->db->get('tb_area');
        return $query->row_array();
    }

    public function getAreaById($id)
    {
        return $this->db->get_where('tb_area', ['id_area' => $id])->row_array();
    }

    public function editDataArea()
    {
        $data = [
            "nm_area" => $this->input->post('nm_area', true)
        ];
        $this->db->where('id_area', $this->input->post('id_area'));
        $this->db->update('tb_area', $data);
    }

    public function tambahDataArea()
    {
        $data = [
            "id_area" => $this->input->post('id_area', true),
            "nm_area" => $this->input->post('nm_area', true)
        ];
        $this->db->insert('tb_area', $data);
    }

    public function hapusDataArea($id)
    {
        $this->db->delete('tb_area', ['id_area' => $id]);
    }

    //TABEL REV
    public function getAllRev()
    {
        $query = $this->db->get('tb_rev');
        return $query->result_array();
    }

    public function getMaxRev()
    {
        $this->db->SELECT_MAX('id_rev');
        $query = $this->db->get('tb_rev');
        return $query->row_array();
    }

    public function tambahDataRev()
    {
        $data = [
            "id_rev" => $this->input->post('id_rev', true),
            "nm_rev" => $this->input->post('nm_rev', true),
            "des_rev" => $this->input->post('des_rev', true)
        ];
        $this->db->insert('tb_rev', $data);
    }

    public function getRevById($id)
    {
        return $this->db->get_where('tb_rev', ['id_rev' => $id])->row_array();
    }

    public function editDataRev()
    {
        $data = [
            "nm_rev" => $this->input->post('nm_rev', true),
            "des_rev" => $this->input->post('des_rev', true)
        ];
        $this->db->where('id_rev', $this->input->post('id_rev'));
        $this->db->update('tb_rev', $data);
    }

    public function hapusDataRev($id)
    {
        $this->db->delete('tb_rev', ['id_rev' => $id]);
    }


    //TABEL KERJA
    public function getAllKerja()
    {
        $this->db->select('*');
        $this->db->join('tb_kerja', 'tb_kerja.id_kerja = tb_kerja_update.kerja_id');
        $this->db->join('tb_rev', 'tb_rev.id_rev = tb_kerja_update.rev_id');
        $this->db->join('tb_pegawai', 'tb_pegawai.id = tb_kerja_update.pegawai_id');
        $query  = $this->db->get('tb_kerja_update');
        return $query->result_array();
    }

    public function getAllKerjaForIndex()
    {
        $QueryIndex = "SELECT * FROM tb_kerja_update
                       JOIN tb_kerja ON tb_kerja.id_kerja = tb_kerja_update.kerja_id
                       JOIN tb_rev ON tb_rev.id_rev = tb_kerja_update.rev_id
                       JOIN tb_pegawai ON tb_pegawai.id = tb_kerja_update.pegawai_id
                       WHERE id_update IN (SELECT MAX(id_update) FROM tb_kerja_update
                       GROUP BY kerja_id ) ORDER BY id_kerja DESC";
        return $this->db->query($QueryIndex)->result_array();
        //return $QueryIndex
    }

    public function getKerjaById($id) // Data Pegawai By ID
    {
        $this->db->select('*');
        $this->db->join('tb_kerja', 'tb_kerja.id_kerja = tb_kerja_update.kerja_id');
        $this->db->join('tb_rev', 'tb_rev.id_rev = tb_kerja_update.rev_id');
        $this->db->join('tb_pegawai', 'tb_pegawai.id = tb_kerja_update.pegawai_id');
        return $this->db->get_where('tb_kerja_update', ['kerja_id' => $id])->row_array();
    }

    public function getKerjaRevisi($id) // Data Pegawai By ID
    {
        $this->db->select('*');
        $this->db->join('tb_kerja', 'tb_kerja.id_kerja = tb_kerja_update.kerja_id');
        $this->db->join('tb_rev', 'tb_rev.id_rev = tb_kerja_update.rev_id');
        $this->db->join('tb_pegawai', 'tb_pegawai.id = tb_kerja_update.pegawai_id');
        return $this->db->get_where('tb_kerja_update', ['kerja_id' => $id])->result_array();
    }

    public function getMaxKerja()
    {
        $this->db->SELECT_MAX('id_kerja');
        $query = $this->db->get('tb_kerja');
        return $query->row_array();
    }

    public function hapusDataKerja($id)
    {
        $this->db->delete('tb_kerja', ['id_kerja' => $id]);
    }

    public function tambahDataKerja()
    {
        $new_doc = $this->upload->data('file_name');
        $data = [
            "id_kerja"          => $this->input->post('id_kerja', TRUE),
            "nm_kerja"          => $this->input->post('nm_kerja', TRUE),
            "no_doc"            => $this->input->post('no_doc', TRUE),
            "jns_kerja"         => $this->input->post('jns_kerja', TRUE),
            "doc"               => $new_doc
        ];
        $this->db->insert('tb_kerja', $data);
    }

    public function uploadDoc()
    {
        $config['upload_path']          = './assets/doc/';
        $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx';
        $config['file_name']            = $this->input->post('no_doc');
        $config['overwrite']            = true;
        $config['max_size']             = 10240; // 10MB
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('doc')) {
            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('flash', $this->upload->display_errors());
            redirect('kerja');
        }
    }

    //TABEL REVISI
    public function getMaxRevisi()
    {
        $this->db->SELECT_MAX('id_revisi');
        $query = $this->db->get('tb_revisi');
        return $query->row_array();
    }

    public function tambahDataRevisi()
    {
        $data = [
            "id_revisi"          => $this->input->post('id_revisi', TRUE),
            "kerja_id"        => $this->input->post('id_kerja', TRUE),
            "revisi_by"          => $this->input->post('pegawai_id', TRUE),
            "des_revisi"            => $this->input->post('des_revisi', TRUE),
            "tgl_revisi"         => $this->input->post('tgl_revisi', TRUE),
            "kd_revisi"         => $this->input->post('kd_revisi', TRUE)
        ];
        $this->db->insert('tb_revisi', $data);
    }

    public function getRevisiKerja($id) // Data Pegawai By ID
    {
        $this->db->SELECT('*');
        $this->db->JOIN('tb_revisi', 'tb_revisi.kerja_id = tb_kerja.id_kerja');
        $this->db->JOIN('tb_pegawai', 'tb_revisi.revisi_by = tb_pegawai.id');
        return $this->db->get_where('tb_kerja', ['id_kerja' => $id])->result_array();
    }

    public function getRevisiById($id) // Data Pegawai By ID
    {
        $this->db->SELECT('*');
        $this->db->JOIN('tb_kerja', 'tb_kerja.id_kerja = tb_revisi.kerja_id');
        $this->db->JOIN('tb_pegawai', 'tb_revisi.revisi_by = tb_pegawai.id');
        return $this->db->get_where('tb_revisi', ['id_revisi' => $id])->row_array();
    }

    public function hapusDataRevisi($id)
    {
        $this->db->delete('tb_revisi', ['id_revisi' => $id]);
    }

    public function hapusDataRevisiKerja($id)
    {
        $this->db->delete('tb_revisi', ['kerja_id' => $id]);
    }

    public function editDataRevisi()
    {
        $data = [
            "kerja_id"        => $this->input->post('id_kerja', TRUE),
            "revisi_by"          => $this->input->post('revisi_by', TRUE),
            "des_revisi"            => $this->input->post('des_revisi', TRUE),
            "tgl_revisi"         => $this->input->post('tgl_revisi', TRUE),
            "kd_revisi"         => $this->input->post('kd_revisi', TRUE)
        ];
        $this->db->where('id_revisi', $this->input->post('id_revisi'));
        $this->db->update('tb_revisi', $data);
    }

    //TABEL KERJA UPDATE
    public function getMaxUpdate()
    {
        $this->db->SELECT_MAX('id_update');
        $query = $this->db->get('tb_kerja_update');
        return $query->row_array();
    }

    public function tambahKerjaUpdate()
    {
        $data = [
            "id_update"       => $this->input->post('id_update', TRUE),
            "kerja_id"        => $this->input->post('id_kerja', TRUE),
            "rev_id"          => $this->input->post('rev_id', TRUE),
            "pegawai_id"      => $this->input->post('pegawai_id', TRUE),
            "tgl_rev"         => $this->input->post('tgl_kerja', TRUE)
        ];
        $this->db->insert('tb_kerja_update', $data);
    }

    public function editKerjaUpdate()
    {
        $data = [
            "kerja_id"        => $this->input->post('id_kerja', TRUE),
            "rev_id"          => $this->input->post('rev_id', TRUE),
            "pegawai_id"        => $this->input->post('pegawai_id', TRUE),
            "tgl_rev"      => $this->input->post('tgl_kerja', TRUE)
        ];
        $this->db->where('id_update', $this->input->post('id_update'));
        $this->db->update('tb_kerja_update', $data);
    }

    public function hapusDataUpdateKerja($id)
    {
        $this->db->delete('tb_kerja_update', ['kerja_id' => $id]);
    }
}
