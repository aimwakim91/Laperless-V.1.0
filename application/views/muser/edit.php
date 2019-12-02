<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Edit Data Pegawai</h1>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post"><input type="hidden" name="id" value="<?= $pegawai['id'] ?>">
                            <div class="form-group">
                                <label>Nama Pegawai :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="nm_pegawai" value="<?= $pegawai['nm_pegawai']; ?>" disabled>
                                </div>
                                <small class="form-text text-danger"><?= form_error('nm_pegawai'); ?></small>
                            </div>

                            <div class="form-group">
                                <label>Jabatan :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="jbt_pegawai" value="<?= $pegawai['jbt_pegawai']; ?>" disabled>
                                </div>
                                <small class="form-text text-danger"><?= form_error('jbt_pegawai'); ?></small>
                            </div>

                            <div class="form-group">
                                <label>Level :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <select name="level_id" class="form-control">
                                        <option value="<?php echo $pegawai['level_id'] ?>"><?php echo $pegawai['nm_level'] ?></option>
                                        <?php foreach ($level as $lev) { ?>
                                            <option value="<?php echo $lev['id_level'] ?>"><?php echo $lev['nm_level'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <small class="form-text text-danger"><?= form_error('level_id'); ?></small>
                            </div>

                            <div class="form-group">
                                <a href="<?= base_url(); ?>muser" class="btn btn-sm btn-warning">Back</a>
                                <button name="tambah" type="submit" class="btn btn-sm btn-success pull-right">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="box-footer">Selalu Kerjakan Apa Yang Menjadi Tanggungjawab Kita. Tetap Semangat</div>
            </div>
    </section>
</div>