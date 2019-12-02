<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h4><b>Daftar User Aplikasi</b></h4>
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
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Level</th>
                                <th width="50px">Status</th>
                                <th width="173px">Aksi</th>
                            </tr>
                            <tr><?php $no = 0;
                                foreach ($pegawai as $pe) : ?>
                                    <td><?= ++$no; ?></td>
                                    <td><?= $pe['nm_pegawai']; ?></td>
                                    <td><?= $pe['jbt_pegawai']; ?></td>
                                    <td><?= $pe['nm_level']; ?></td>
                                    <td align="center">
                                        <?php
                                            if ($pe['active'] == '1') {
                                                echo "<span class='button btn-sm btn-success fa fa-check-square-o' title='Aktif'></span>";
                                            } else {
                                                echo "<span class='button btn-sm btn-danger fa fa-times' title='Tidak Aktif'></span>";
                                            }
                                            ?>
                                    </td>
                                    <td>
                                        <a class="button btn-sm btn-primary " href="<?= base_url(); ?>muser/aktif/<?= $pe['id']; ?>">Active</a>
                                        <a class="button btn-sm btn-success" href="<?= base_url(); ?>muser/edit/<?= $pe['id']; ?>">Level</a>
                                        <a class="button btn-sm btn-danger" href="<?= base_url(); ?>muser/hapus/<?= $pe['id']; ?>" onclick="return confirm('Yakin Akan Hapus Data Pegawai??');">Delete</a>
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