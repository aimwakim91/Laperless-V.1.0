<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h4><b>Daftar Vendor Pegawai PT. PGAS Solution Area Lampung</b>
                            <a href="<?php echo base_url(); ?>rekan/tambah" class="btn btn-success fa fa-plus pull-right" title="Tambah Vendor"></a></h4>
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
                                <th>Vendor</th>
                                <th width="130px">Aksi</th>
                            </tr>
                            <tr><?php $no = 0;
                                foreach ($rekan as $rek) : ?>
                                    <td><?= ++$no; ?>
                                    <td><?= $rek['nm_rekan']; ?></td>
                                    <td>
                                        <a class="button btn-success btn-sm" href="<?= base_url(); ?>rekan/edit/<?= $rek['id_rekan']; ?>">Update</a>
                                        <a class="button btn-danger btn-sm" href="<?= base_url(); ?>rekan/hapus/<?= $rek['id_rekan']; ?>" onclick="return confirm('Yakin Akan Hapus Data Ini??');">Delete</a>
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