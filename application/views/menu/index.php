<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h4><b>Menu Management</b>
                            <a href="<?php echo base_url(); ?>menu/tambah" class="btn btn-success fa fa-plus pull-right" title="Tambah Menu"></a></h4>
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
                                <th>Nama Menu</th>
                                <th>URL Menu</th>
                                <th>Icon Menu</th>
                                <th width="20px">Active</th>
                                <th width="130px">Aksi</th>
                            </tr>
                            <tr><?php $no = 0;
                                foreach ($menu as $sm) : ?>
                                    <td><?= ++$no; ?></td>
                                    <td><?= $sm['nm_menu']; ?></td>
                                    <td><?= $sm['link_menu']; ?></td>
                                    <td><?= $sm['icon_menu']; ?></td>
                                    <?php if ($sm['aktif_menu'] == '1') : ?>
                                        <td><span class="fa fa-check-square-o btn-sm btn-success" title="Aktif"></span></td>
                                    <?php else : ?>
                                        <td><span class="fa fa-times btn-sm btn-danger" title="Tidak Aktif"></span></td>
                                    <?php endif; ?>
                                    <td>
                                        <a class="button btn-sm btn-success" href="<?= base_url(); ?>menu/edit/<?= $sm['id_menu']; ?>">Update</a>
                                        <a class="button btn-sm btn-danger" href="<?= base_url(); ?>menu/hapus/<?= $sm['id_menu']; ?>" onclick="return confirm('Yakin Akan Hapus Data Ini ??');">Delete</a>
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