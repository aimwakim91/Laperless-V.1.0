<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Tambah Rev Pekerjaan</h1>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>ID Rev. :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="id_rev" value="<?= $rev['id_rev']; ?>" readonly>
                                </div>
                                <small class="form-text text-danger"><?= form_error('id_rev'); ?></small>
                            </div>

                            <div class="form-group">
                                <label>Kode Rev. :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="nm_rev" value="<?= $rev['nm_rev']; ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('nm_rev'); ?></small>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Rev. :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="des_rev" value="<?= $rev['des_rev']; ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('des_rev'); ?></small>
                            </div>

                            <div class="form-group">
                                <a href="<?= base_url(); ?>area" class="btn btn-sm btn-warning">Back</a>
                                <button name="tambah" type="submit" class="btn btn-sm btn-success pull-right">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="box-footer">Selalu Kerjakan Apa Yang Menjadi Tanggungjawab Kita. Tetap Semangat</div>
            </div>
    </section>
</div>