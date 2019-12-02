<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h4><b>List Pekerjaan PT. PGAS Solution Area Lampung</b>
                            <a href="<?php echo base_url(); ?>kerja/tambah" class="btn btn-success fa fa-plus pull-right" title="Tambah Pekerjaan"></a></h4>
                    </div>

                    <!--Masukan Tabel Disini-->
                    <div class="box-body">
                        <!--Div Bayangan-->
                        <?php if ($this->session->flashdata('flash')) : ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i>Sukses....!!!</h4><?= $this->session->flashdata('flash'); ?>
                            </div>
                        <?php endif; ?>
                        <!--Tutup Div Bayangan-->
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <th width="12px">No</th>
                                <th>Nama Pekerjaan</th>
                                <th>Jenis Pekerjaan</th>
                                <th>No. Dokument</th>
                                <th>Dokument</th>
                                <th width="200px">Rev.</th>
                                <th width="90px">Oleh</th>
                                <th width="225px">Aksi</th>
                            </tr>
                            <tr><?php $no = 0;
                                foreach ($kerja as $k) : ?>
                                    <td><?= ++$no; ?></td>
                                    <?php
                                        $id_kerja = $k['id_kerja'];
                                        $query1 = "SELECT * FROM `tb_revisi` WHERE `kerja_id`= $id_kerja";
                                        $cek = $this->db->query($query1)->result_array();
                                        ?>
                                    <?php if ($cek == FALSE) : ?>
                                        <td><?= $k['nm_kerja']; ?></td>
                                    <?php else : ?>
                                        <td><a href="<?= base_url('kerja/detail/') . $k['id_kerja']; ?>"> <?= $k['nm_kerja']; ?></a></td>
                                    <?php endif; ?>

                                    <?php
                                        if ($k['jns_kerja'] == 1) {
                                            echo "<td>Fasilitas</td>";
                                        } elseif ($k['jns_kerja'] == 2) {
                                            echo "<td>Jaringan</td>";
                                        } else {
                                            echo "<td>Error</td>";
                                        }
                                        ?>
                                    <td><?= $k['no_doc']; ?></td>
                                    <td><a href="<?= base_url('assets/doc/') . $k['doc']; ?>" target="_blank"><?= $k['doc']; ?></a></td>
                                    <td><?= $k['nm_rev'] . " - " . $k['des_rev']; ?></td>
                                    <td><?= $k['nm_pegawai']; ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="<?= base_url(); ?>kerja/revisi/<?= $k['id_kerja']; ?>">Revisi</a>
                                        <?php
                                            $id_kerja = $k['id_kerja'];
                                            $query1 = "SELECT * FROM `tb_revisi` WHERE `kerja_id`= $id_kerja";
                                            $cek = $this->db->query($query1)->result_array();
                                            ?>
                                        <?php if ($cek == FALSE) : ?>
                                            <a class="btn btn-xs btn-success disabled" href="#">Update</a>
                                            <a class="btn btn-xs btn-warning disabled" href="#">Re-Submit</a>
                                        <?php else : ?>
                                            <a class="btn btn-xs btn-success" href="<?= base_url(); ?>kerja/edit/<?= $k['id_kerja']; ?>">Update</a>
                                            <a class="btn btn-xs btn-warning" href="<?= base_url(); ?>kerja/resubmit/<?= $k['id_kerja']; ?>">Re-Submit</a>
                                        <?php endif; ?>

                                        <a class="btn btn-xs btn-danger" href="<?= base_url(); ?>kerja/hapus/<?= $k['id_kerja']; ?>" onclick="return confirm('Yakin Akan Hapus Data Pekerjaan??');">Delete</a>
                                    </td>
                            </tr><?php endforeach; ?>
                        </table>
                    </div>
                    <!--Akhir Masukan Tabel Disini-->
                    <div class="box-footer"></div>
                </div>
            </div>
    </section>
</div>