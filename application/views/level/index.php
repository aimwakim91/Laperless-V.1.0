<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h4><b>Level User Management</b>
                            <a href="<?php echo base_url(); ?>level/tambah" class="btn btn-success fa fa-plus pull-right" title="Tambah Level"></a></h4>
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
                                <th>Nama Level</th>
                                <th width="130px">Aksi</th>
                            </tr>
                            <tr><?php $no = 0;
                                foreach ($level as $le) : ?>
                                    <td><?= ++$no; ?></td>
                                    <td><?= $le['nm_level']; ?></td>
                                    <td>
                                        <a class="button btn-sm btn-success" href="<?= base_url(); ?>level/edit/<?= $le['id_level']; ?>">Update</a>
                                        <a class="button btn-sm btn-danger" href="<?= base_url(); ?>level/hapus/<?= $le['id_level']; ?>" onclick="return confirm('Yakin Akan Hapus Data Ini ??');">Delete</a>
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