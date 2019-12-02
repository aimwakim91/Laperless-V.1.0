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
                        <?= form_open_multipart('pegawai/edit'); ?>
                        <div class="form-group">
                            <label>ID Pegawai :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="id" value="<?= $pegawai['id']; ?>" readonly>
                            </div>
                            <small class="form-text text-danger"><?= form_error('id'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>NIK/NIPG :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="nik_pegawai" value="<?= $pegawai['nik_pegawai']; ?>">
                            </div>
                            <small class="form-text text-danger"><?= form_error('nik_pegawai'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Nama Pegawai :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="nm_pegawai" value="<?= $pegawai['nm_pegawai']; ?>">
                            </div>
                            <small class="form-text text-danger"><?= form_error('nm_pegawai'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Initial Pegawai :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="int_pegawai" value="<?= $pegawai['int_pegawai']; ?>">
                            </div>
                            <small class="form-text text-danger"><?= form_error('int_pegawai'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Jabatan :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="jbt_pegawai" value="<?= $pegawai['jbt_pegawai']; ?>">
                            </div>
                            <small class="form-text text-danger"><?= form_error('jbt_pegawai'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Email :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="email" value="<?= $pegawai['email']; ?>" readonly>
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
                                    <option value="<?= $pegawai['id_rekan']; ?>"><?= $pegawai['nm_rekan']; ?></option>
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
                                    <option value="<?= $pegawai['id_area']; ?>"><?= $pegawai['nm_area']; ?></option>
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
                                <div class="col-sm-3"><img class="profile-user-img img-responsive" src="<?= base_url('assets/img/profile/') . $pegawai['ft_pegawai']; ?>"></div>
                                <div class="col-sm-9"><input type="file" class="form-control" name="ft_pegawai"><br>
                                    <i class="text-danger"><b>*Maximum 1 MB. Hanya File Images</b></i></div>
                            </div>
                            <small class="form-text text-danger"><?= form_error('ft_pegawai'); ?></small>
                        </div>

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