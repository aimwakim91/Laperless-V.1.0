<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Profile</h1>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="col-md-2">
                                <img src="<?= base_url('/assets/img/profile/') . $user['ft_pegawai']; ?>" class="pull-center" alt="<?= $user['nm_pegawai']; ?>" width="190px" height="190px">
                            </div>
                            <div class="col-md-10">
                                <?= form_open_multipart('user/edit'); ?>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">ID Pegawai :</i>
                                        </div>
                                        <input type="text" class="form-control" name="id" value="<?= $user['id']; ?>" readonly>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('id'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">NIK/NIPG :</i>
                                        </div>
                                        <input type="text" class="form-control" name="nik_pegawai" value="<?= $user['nik_pegawai']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('nik_pegawai'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">Nama Pegawai :</i>
                                        </div>
                                        <input type="text" class="form-control" name="nm_pegawai" value="<?= $user['nm_pegawai']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('nm_pegawai'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">Initial Pegawai :</i>
                                        </div>
                                        <input type="text" class="form-control" name="int_pegawai" value="<?= $user['int_pegawai']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('int_pegawai'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">Jabatan :</i>
                                        </div>
                                        <input type="text" class="form-control" name="jbt_pegawai" value="<?= $user['jbt_pegawai']; ?>">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('jbt_pegawai'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">Email :</i>
                                        </div>
                                        <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>" readonly>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">Provider :</i>
                                        </div>
                                        <select name="rekan_id" class="form-control">
                                            <option value="<?= $user['id_rekan']; ?>"><?= $user['nm_rekan']; ?></option>
                                            <?php foreach ($rekan as $rek) { ?>
                                                <option value="<?php echo $rek['id_rekan'] ?>"><?php echo $rek['nm_rekan'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('rekan_id'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">Area Kerja :</i>
                                        </div>
                                        <select name="area_id" class="form-control">
                                            <option value="<?= $user['id_area']; ?>"><?= $user['nm_area']; ?></option>
                                            <?php foreach ($area as $ar) { ?>
                                                <option value="<?php echo $ar['id_area'] ?>"><?php echo $ar['nm_area'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('area_id'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="row">
                                            <div class="col-sm-3"><img class="profile-user-img img-responsive" src="<?= base_url('assets/img/profile/') . $user['ft_pegawai']; ?>"></div>
                                            <div class="col-sm-9"><input type="file" class="form-control" name="ft_pegawai"><br>
                                                <i class="text-danger"><b>*Maximum 1 MB. Hanya File Images</b></i></div>
                                        </div>
                                        <small class="form-text text-danger"><?= form_error('ft_pegawai'); ?></small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <a href="<?= base_url(); ?>user" class="btn btn-sm btn-warning">Back</a>
                                    <button name="tambah" type="submit" class="btn btn-sm btn-success pull-right">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">Selalu Kerjakan Apa Yang Menjadi Tanggungjawab Kita. Tetap Semangat</div>
            </div>
    </section>
</div>