<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Data Diri Pegawai</h1>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <!--Div Bayangan-->
                <?php if ($this->session->flashdata('flash')) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?= $this->session->flashdata('flash'); ?>
                    </div>
                <?php endif; ?>
                <!--Tutup Div Bayangan-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="col-md-2">
                                <img src="<?= base_url('/assets/img/profile/') . $user['ft_pegawai']; ?>" class="card-img pull-center" alt="<?= $user['nm_pegawai']; ?>" width="190px" height="190px">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title"><b><?= $user['nm_pegawai']; ?></b> ( <?= $user['nik_pegawai']; ?> )</h5>
                                    <table>
                                        <tr>
                                            <td width="100px">Jabatan</td>
                                            <td width="30px">:</td>
                                            <td><?= $user['jbt_pegawai']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="100px">Vendor</td>
                                            <td>:</td>
                                            <td><?= $user['nm_rekan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="100px">Area Kerja</td>
                                            <td>:</td>
                                            <td><?= $user['nm_area']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="100px">Level</td>
                                            <td>:</td>
                                            <td><?= $user['nm_level']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="100px">Email</td>
                                            <td>:</td>
                                            <td><?= $user['email']; ?></td>
                                        </tr>
                                    </table>
                                </div><br>
                                <div class="form-group">
                                    <a href="<?= base_url(); ?>user" class="btn btn-sm btn-warning">Back</a>
                                    <a href="<?= base_url(); ?>user/edit" class="btn btn-sm btn-success">Update</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">Selalu Kerjakan Apa Yang Menjadi Tanggungjawab Kita. Tetap Semangat</div>
            </div>
    </section>
</div>