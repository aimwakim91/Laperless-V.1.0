<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h4><b>Daftar Area Kerja PT. PGAS Solution Area Lampung</b>
                            <a href="<?php echo base_url(); ?>area/tambah" class="btn btn-success fa fa-plus pull-right" title="Tambah Area"></a></h4>
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
                                <th>Area Kerja</th>
                                <th width="130px">Aksi</th>
                            </tr>
                            <tr><?php $no = 0;
                                foreach ($area as $ar) : ?>
                                    <td><?= ++$no; ?>
                                    <td><?= $ar['nm_area']; ?></td>
                                    <td>
                                        <a class="button btn-success btn-sm" href="<?= base_url(); ?>area/edit/<?= $ar['id_area']; ?>">Update</a>
                                        <a class="button btn-danger btn-sm" href="<?= base_url(); ?>area/hapus/<?= $ar['id_area']; ?>" onclick="return confirm('Yakin Akan Hapus Data Ini??');">Delete</a>
                                    </td>
                            </tr><?php endforeach; ?>
                        </table>
                    </div>
                    <!--Akhir Masukan Tabel Disini-->
                    <div class="box-footer"></div>
                </div>


                <div class="box">
                    <div class="box-header">
                        <h4><b>Daftar Rev Pekerjaan</b>
                            <a href="<?php echo base_url(); ?>area/tambah_rev" class="btn btn-success fa fa-plus pull-right" title="Tambah Rev."></a></h4>
                    </div>
                    <!--Masukan Tabel Disini-->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <th width="12px">No</th>
                                <th>Kode Rev</th>
                                <th>Deskripsi Rev</th>
                                <th width="130px">Aksi</th>
                            </tr>
                            <tr><?php $no = 0;
                                foreach ($rev as $re) : ?>
                                    <td><?= ++$no; ?>
                                    <td><?= $re['nm_rev']; ?></td>
                                    <td><?= $re['des_rev']; ?></td>
                                    <td>
                                        <a class="button btn-success btn-sm" href="<?= base_url(); ?>area/edit_rev/<?= $re['id_rev']; ?>">Update</a>
                                        <a class="button btn-danger btn-sm" href="<?= base_url(); ?>area/hapus_rev/<?= $re['id_rev']; ?>" onclick="return confirm('Yakin Akan Hapus Data Ini??');">Delete</a>
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