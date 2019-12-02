<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Change Password</h1>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <!--Div Bayangan-->
                <?php if ($this->session->flashdata('flash')) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i>Oops....!!!</h4><?= $this->session->flashdata('flash'); ?>
                    </div>
                <?php endif; ?>
                <!--Tutup Div Bayangan-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="col-md-2">
                                <img src="<?= base_url('/assets/img/profile/') . $user['ft_pegawai']; ?>" class="pull-center" alt="<?= $user['nm_pegawai']; ?>" width="190px" height="190px">
                            </div>
                            <div class="col-md-10">
                                <?= form_open_multipart('user/change'); ?>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">Email :</i>
                                        </div>
                                        <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>" readonly>
                                        <input type="hidden" class="form-control" name="id" value="<?= $user['id']; ?>" readonly>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">NIK/NIPG :</i>
                                        </div>
                                        <input type="text" class="form-control" name="nik_pegawai" value="<?= $user['nik_pegawai']; ?>" readonly>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('nik_pegawai'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">Current Password :</i>
                                        </div>
                                        <input type="password" class="form-control" name="cur_pas">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('cur_pas'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">New Password :</i>
                                        </div>
                                        <input type="password" class="form-control" name="new_pas1">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('new_pas1'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="#">Verify Password :</i>
                                        </div>
                                        <input type="password" class="form-control" name="new_pas2">
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('new_pas2'); ?></small>
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