<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Tambah Vendor Pegawai</h1>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>ID Vendor :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="id_rekan" value="<?= $max['id_rekan'] + 1; ?>" readonly>
                                </div>
                                <small class="form-text text-danger"><?= form_error('id_rekan'); ?></small>
                            </div>

                            <div class="form-group">
                                <label>Nama Vendor :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="nm_rekan">
                                </div>
                                <small class="form-text text-danger"><?= form_error('nm_rekan'); ?></small>
                            </div>

                            <div class="form-group">
                                <a href="<?= base_url(); ?>rekan" class="btn btn-sm btn-warning">Back</a>
                                <button name="tambah" type="submit" class="btn btn-sm btn-success pull-right">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="box-footer">Selalu Kerjakan Apa Yang Menjadi Tanggungjawab Kita. Tetap Semangat</div>
            </div>
    </section>
</div>