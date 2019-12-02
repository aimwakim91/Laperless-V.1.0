<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Tambah Data Pegawai</h1>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= form_open_multipart('pegawai/tambah'); ?>
                        <div class="form-group">
                            <label>ID Pegawai :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="id" value="<?= $max['id'] + 1; ?>" readonly>
                            </div>
                            <small class="form-text text-danger"><?= form_error('id'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>NIK/NIPG :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="nik_pegawai" value="<?= set_value('nik_pegawai'); ?>">
                            </div>
                            <small class="form-text text-danger"><?= form_error('nik_pegawai'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Nama Pegawai :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="nm_pegawai" value="<?= set_value('nm_pegawai'); ?>">
                            </div>
                            <small class="form-text text-danger"><?= form_error('nm_pegawai'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Initial Pegawai :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="int_pegawai" value="<?= set_value('int_pegawai'); ?>">
                            </div>
                            <small class="form-text text-danger"><?= form_error('int_pegawai'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Jabatan :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="jbt_pegawai" value="<?= set_value('jbt_pegawai'); ?>">
                            </div>
                            <small class="form-text text-danger"><?= form_error('jbt_pegawai'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Email :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="email" value="<?= set_value('email'); ?>">
                            </div>
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Provider :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <select name="rekan_id" class="form-control">
                                    <option value="0">-- Pilih Provider Pegawai --</option>
                                    <?php foreach ($rekan as $rek) { ?>
                                        <option value="<?php echo $rek['id_rekan'] ?>"><?php echo $rek['nm_rekan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <small class="form-text text-danger"><?= form_error('rekan_id'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Area Kerja :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <select name="area_id" class="form-control">
                                    <option value="0">-- Pilih Area Kerja Pegawai --</option>
                                    <?php foreach ($area as $ar) { ?>
                                        <option value="<?php echo $ar['id_area'] ?>"><?php echo $ar['nm_area'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <small class="form-text text-danger"><?= form_error('area_id'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Foto Pegawai :</label>
                            <div class="row">
                                <div class="col-sm-3"><img class="profile-user-img img-responsive" src="<?= base_url('assets/img/profile/default.jpg'); ?>"></div>
                                <div class="col-sm-9"><input type="file" class="form-control" name="ft_pegawai"><br>
                                    <i class="text-danger"><b>*Maximum 1 MB. Hanya File Images</b></i></div>
                            </div>
                            <small class="form-text text-danger"><?= form_error('ft_pegawai'); ?></small>
                        </div><input type="hidden" name="password" value="1234">

                        <div class="form-group">
                            <a href="<?= base_url(); ?>pegawai" class="btn btn-sm btn-warning">Back</a>
                            <button name="tambah" type="submit" class="btn btn-sm btn-success pull-right">Submit</button>
                        </div>
                        </form>

                    </div>
                </div>
                <div class="box-footer">Selalu Kerjakan Apa Yang Menjadi Tanggungjawab Kita. Tetap Semangat</div>
            </div>
    </section>
</div>