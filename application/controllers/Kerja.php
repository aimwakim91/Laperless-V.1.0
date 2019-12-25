<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('All_model');
        $this->load->library('form_validation');
        cek_not_login();
        //$this->load->library('pdf');

        //is_login();
    }

    public function Index()
    {
        $data['title'] = 'Submit Pekerjaan';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['kerja'] = $this->All_model->getAllKerjaForIndex();

        $this->load->view('template/dash_head', $data);
        $this->load->view('template/dash_menu', $data);
        $this->load->view('kerja/index', $data);
        $this->load->view('template/dash_foot');
    }

    //PADA SAAT PROSES TAMBAH DATA PEKERJAAN
    //LAKUKAN INPUT KE DUA TABEL "tb_kerja & tb_kerja_update"
    public function tambah()
    {
        $data['title'] = 'Submit Pekerjaan';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['max'] = $this->All_model->getMaxKerja();
        $data['rev'] = $this->All_model->getAllRev();
        $data['maxu'] = $this->All_model->getMaxUpdate();
        $data['maxr'] = $this->All_model->getMaxRevisi();

        $this->form_validation->set_rules('nm_kerja', 'Nama Pekerjaan', 'required|trim');
        $this->form_validation->set_rules(
            'no_doc',
            'No. Document',
            'required|trim|is_unique[tb_kerja.no_doc]',
            ['is_unique' => 'This Number Has Already Used !']
        );
        if (empty($_FILES['doc']['name'])) {
            $this->form_validation->set_rules('doc', 'Document Pekerjaan', 'required|trim');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('kerja/tambah', $data);
            $this->load->view('template/dash_foot');
        } else {
            //Cek Ada Gambar Atau Tidak
            $upload_doc = $_FILES['doc']['name'];
            if ($upload_doc) {
                $no_doc     = $this->input->post('no_doc');
                $config['upload_path']      = './assets/doc/';
                $config['allowed_types']    = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
                $config['max_size']         = '10000';
                $config['file_name']        = md5($no_doc);

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('doc')) {
                    //Gambar Sudah Di Upload
                    $new_doc = $this->upload->data('file_name');
                    $this->All_model->tambahDataKerja(); //Insert ke tb_kerja
                    $this->All_model->tambahKerjaUpdate(); //Insert ke tb_kerja_update
                    $this->All_model->tambahDataRevisi(); //Insert ke tb_kerja_update
                    $this->session->set_flashdata('flash', 'Data Berhasil Ditambah');
                    redirect('kerja');
                } else {
                    $this->session->set_flashdata('flash', $this->upload->display_errors());
                    redirect('kerja');
                }
            } else {
                $this->session->set_flashdata('flash', $this->upload->display_errors());
                redirect('kerja');
            }
        }
    }

    public function hapus($id)
    {
        $data['kerja'] = $this->All_model->getKerjaById($id);
        $this->All_model->hapusDataKerja($id);
        $this->All_model->hapusDataRevisiKerja($id);
        $this->All_model->hapusDataUpdateKerja($id);
        $old_images = $data['kerja']['doc'];
        unlink(FCPATH . '/assets/doc/' . $old_images);
        $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
        redirect('kerja');
    }

    //PADA SAAT PROSES EDIT DATA PEKERJAAN
    //LAKUKAN INPUT KE DUA TABEL "tb_kerja & tb_kerja_update"
    public function edit($id)
    {
        $data['title'] = 'Submit Pekerjaan';
        $data['kerja'] = $this->All_model->getKerjaById($id);
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['rev'] = $this->All_model->getAllRev();

        $this->form_validation->set_rules('nm_kerja', 'Nama Pekerjaan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('kerja/edit', $data);
            $this->load->view('template/dash_foot');
        } else {
            $id_kerja   = $this->input->post('id_kerja', TRUE);
            $nm_kerja   = $this->input->post('nm_kerja', TRUE);
            $no_doc     = $this->input->post('no_doc', TRUE);
            $tgl_kerja  = $this->input->post('tgl_kerja', TRUE);
            $rev_id     = $this->input->post('rev_id', TRUE);
            $jns_kerja = $this->input->post('jns_kerja', TRUE);

            $edit_doc = $_FILES['doc']['name'];
            if ($edit_doc) {
                //Cek Ada Gambar Atau Tidak
                $no_doc     = $this->input->post('no_doc');
                $config['upload_path']      = './assets/doc/';
                $config['allowed_types']    = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
                $config['max_size']         = '10000';
                $config['file_name']        = md5($no_doc);
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('doc')) {
                    //Document Sudah Terupload
                    $data['old'] = $this->db->get_where('tb_kerja', ['id_kerja' => $id_kerja])->row_array();
                    $old_doc = $data['old']['doc'];
                    if ($old_doc != 'NULL') {
                        unlink(FCPATH . 'assets/doc/' . $old_doc);
                    }

                    $new_doc = $this->upload->data('file_name');
                    $this->db->set('doc', $new_doc);
                } else {
                    $this->session->set_flashdata('flash', $this->upload->display_errors());
                    redirect('kerja');
                }
            }

            $this->db->set('nm_kerja', $nm_kerja);
            $this->db->set('no_doc', $no_doc);
            $this->db->set('jns_kerja', $jns_kerja);
            $this->db->where('id_kerja', $id_kerja);
            $this->db->update('tb_kerja');
            $this->All_model->editKerjaUpdate();
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('kerja');
        }
    }

    public function revisi($id)
    {
        $data['title'] = 'Submit Pekerjaan';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['max'] = $this->All_model->getMaxRevisi();
        $data['kerja'] = $this->All_model->getKerjaById($id);
        $data['krev'] = $this->All_model->getKerjaRevisi($id);

        $this->form_validation->set_rules('des_revisi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('kerja/revisi', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->tambahDataRevisi();
            $this->session->set_flashdata('flash', 'Data Berhasil Disimpan');
            redirect('kerja');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Submit Pekerjaan';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['max'] = $this->All_model->getMaxRevisi();
        $data['kerja'] = $this->All_model->getKerjaById($id);
        $data['revisi'] = $this->All_model->getRevisiKerja($id);
        $data['krev'] = $this->All_model->getKerjaRevisi($id);

        $this->form_validation->set_rules('des_revisi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('kerja/detail', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->tambahDataRevisi();
            $this->session->set_flashdata('flash', 'Data Berhasil Disimpan');
            redirect('kerja');
        }
    }

    public function hrevisi($id)
    {
        $this->All_model->hapusDataRevisi($id);
        $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
        redirect('kerja');
    }

    public function erevisi($id)
    {
        $data['title'] = 'Submit Pekerjaan';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['revisi'] = $this->All_model->getRevisiById($id);
        $data['krev'] = $this->All_model->getKerjaRevisi($id);

        $this->form_validation->set_rules('des_revisi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('kerja/erevisi', $data);
            $this->load->view('template/dash_foot');
        } else {
            $this->All_model->editDataRevisi();
            $this->session->set_flashdata('flash', 'Data Berhasil Disimpan');
            redirect('kerja');
        }
    }

    public function resubmit($id)
    {
        $data['title'] = 'Submit Pekerjaan';
        $data['kerja'] = $this->All_model->getKerjaById($id);
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['rev'] = $this->All_model->getAllRev();
        $data['max'] = $this->All_model->getMaxUpdate();
        $data['maxr'] = $this->All_model->getMaxRevisi();

        $this->form_validation->set_rules('nm_kerja', 'Nama Pekerjaan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/dash_head', $data);
            $this->load->view('template/dash_menu', $data);
            $this->load->view('kerja/resubmit', $data);
            $this->load->view('template/dash_foot');
        } else {
            $id_kerja   = $this->input->post('id_kerja', TRUE);
            $nm_kerja   = $this->input->post('nm_kerja', TRUE);
            $no_doc     = $this->input->post('no_doc', TRUE);
            $tgl_kerja  = $this->input->post('tgl_kerja', TRUE);
            $pegawai_id = $this->input->post('pegawai_id', TRUE);
            $rev_id     = $this->input->post('rev_id', TRUE);
            $jns_kerja = $this->input->post('jns_kerja', TRUE);

            $edit_doc = $_FILES['doc']['name'];
            if ($edit_doc) {
                //Cek Ada Gambar Atau Tidak
                $no_doc     = $this->input->post('no_doc');
                $config['upload_path']      = './assets/doc/';
                $config['allowed_types']    = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
                $config['max_size']         = '10000';
                $config['file_name']        = md5($no_doc);
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('doc')) {
                    //Document Sudah Terupload
                    $data['old'] = $this->db->get_where('tb_kerja', ['id_kerja' => $id_kerja])->row_array();
                    $old_doc = $data['old']['doc'];
                    if ($old_doc != 'NULL') {
                        unlink(FCPATH . 'assets/doc/' . $old_doc);
                    }

                    $new_doc = $this->upload->data('file_name');
                    $this->db->set('doc', $new_doc);
                } else {
                    $this->session->set_flashdata('flash', $this->upload->display_errors());
                    redirect('kerja');
                }
            }

            $this->db->set('nm_kerja', $nm_kerja);
            $this->db->set('no_doc', $no_doc);
            $this->db->set('jns_kerja', $jns_kerja);
            $this->db->where('id_kerja', $id_kerja);
            $this->db->update('tb_kerja');
            $this->All_model->tambahKerjaUpdate();
            //INSERT DATA REVISI
            $cek = "SELECT * FROM tb_rev WHERE id_rev='$rev_id'";
            $r   = $this->db->query($cek)->row_array();
            $kd_revisi  = $r['nm_rev'];
            $des_revisi = $r['des_rev'];
            $this->db->set('id_revisi', $this->input->post('id_revisi', TRUE));
            $this->db->set('revisi_by', $this->input->post('pegawai_id', TRUE));
            $this->db->set('tgl_revisi', $this->input->post('tgl_revisi', TRUE));
            $this->db->set('kerja_id', $id_kerja, TRUE);
            $this->db->set('des_revisi', $des_revisi, TRUE);
            $this->db->set('kd_revisi', $kd_revisi, TRUE);
            $this->db->insert('tb_revisi');

            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('kerja');
        }
    }

    public function kprint($id)
    {
        $data['title'] = 'Submit Pekerjaan';
        $data['user'] = $this->All_model->getPegawaiLogin();
        $data['kerja'] = $this->All_model->getKerjaById($id);
        $data['revisi'] = $this->All_model->getRevisiKerja($id);

        //$this->load->view('kerja/print', $data);

        $html1 = $this->load->view('kerja/cetak', $data, TRUE);
        $html2 = $this->load->view('kerja/cetak2', $data, TRUE);
        //LOAD MPDF
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 20,
            'margin_top' => 20,
            'margin_bottom' => 30,
            'margin_header' => 10,
            'margin_footer' => 20
        ]);

        // WRITE ISI DOKUMENT
        $mpdf->WriteHTML($html1);
        $mpdf->WriteHTML($html2);

        //Sett FIle Name
        $query = $this->db->query("SELECT no_doc FROM tb_kerja WHERE id_kerja='$id'");
        $row = $query->row();
        $file_name = $row->no_doc . '.pdf';
        $mpdf->Output($file_name, 'I');
    }
}
