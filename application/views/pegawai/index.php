<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h4><b>Daftar Pegawai PT. PGAS Solution Area Lampung</b>
                            <a href="<?php echo base_url(); ?>pegawai/tambah" class="btn btn-success fa fa-plus pull-right" title="Tambah Pegawai"></a></h4>
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
                                <th>Nik</th>
                                <th>Jabatan</th>
                                <th>Perusahaan</th>
                                <th>Area</th>
                                <th>Email</th>
                                <th width="55px">Photo</th>
                                <th width="130px">Aksi</th>
                            </tr>
                            <tr><?php $no = 0;
                                foreach ($pegawai as $pe) : ?>
                                    <td><?= ++$no; ?></td>
                                    <td><?= $pe['nm_pegawai']; ?></td>
                                    <td><?= $pe['nik_pegawai']; ?></td>
                                    <td><?= $pe['jbt_pegawai']; ?></td>
                                    <td><?= $pe['nm_rekan']; ?></td>
                                    <td><?= $pe['nm_area']; ?></td>
                                    <td><?= $pe['email']; ?></td>
                                    <td align="center"><img width="50px" height="60px" src="<?= base_url('\assets\img\profile') ?>\<?php echo $pe['ft_pegawai'] ?>"></td>
                                    <td>
                                        <a class="button btn-sm btn-success" href="<?= base_url(); ?>pegawai/edit/<?= $pe['id']; ?>">Update</a>
                                        <a class="button btn-sm btn-danger" href="<?= base_url(); ?>pegawai/hapus/<?= $pe['id']; ?>" onclick="return confirm('Yakin Akan Hapus Data Pegawai??');">Delete</a>
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