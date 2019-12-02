<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Revisi Pekerjaan</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <table id="example2" class="table table-bordered">
                            <tr>
                                <th width="200px">Nama Pekerjaan</th>
                                <th width="10px">:</th>
                                <th><?= $kerja['nm_kerja']; ?></th>
                            </tr>
                            <tr>
                                <th width="200px">No. Document Pekerjaan</th>
                                <th width="10px">:</th>
                                <th><?= $kerja['no_doc']; ?></th>
                            </tr>
                            <tr>
                                <th width="200px">Jenis Pekerjaan</th>
                                <th width="10px">:</th>
                                <?php
                                if ($kerja['jns_kerja'] == 1) {
                                    echo "<th>Fasilitas</th>";
                                } else {
                                    echo "<th>Jaringan</th>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <th width="200px">Tanggal</th>
                                <th width="10px">:</th>
                                <th>
                                    <?php
                                    foreach ($krev as $key) :
                                        echo $key['tgl_rev'] . "&nbsp; &nbsp; Rev. " . $key['nm_rev'] . "&nbsp;-&nbsp;" . $key['des_rev'] . "<br>";
                                    endforeach;
                                    ?>
                                </th>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <?= form_open_multipart('kerja/revisi'); ?>
                        <div class="form-group">

                            <!--HIDDEN INPUT-->

                            <!--END HIDDEN INPUT-->

                            <label>ID Revisi :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="id_revisi" value="<?= $max['id_revisi'] + 1; ?>" readonly>
                            </div>
                            <small class="form-text text-danger"><?= form_error('id_revisi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Nama Pekerjaan :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div><input type="hidden" class="form-control" name="id_kerja" value="<?= $kerja['id_kerja']; ?>">
                                <input type="text" class="form-control" value="<?= $kerja['nm_kerja']; ?>" readonly>
                            </div>
                            <small class="form-text text-danger"><?= form_error('id_kerja'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Revisi :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="tgl_revisi" value="<?= date('d-m-Y'); ?>" readonly>
                            </div>
                            <small class="form-text text-danger"><?= form_error('tgl_revisi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Direviei Oleh :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div><input type="hidden" class="form-control" name="pegawai_id" value="<?= $user['id']; ?>">
                                <input type="text" class="form-control" value="<?= $user['nm_pegawai']; ?>" readonly>
                            </div>
                            <small class="form-text text-danger"><?= form_error('revisi_by'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <textarea name="des_revisi" class="textarea" style="width: 100%; height: 300px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                            <small class="form-text text-danger"><?= form_error('des_revisi'); ?></small>
                        </div>

                        <div class="form-group">
                            <a href="<?= base_url(); ?>kerja" class="btn btn-sm btn-warning">Back</a>
                            <button name="tambah" type="submit" class="btn btn-sm btn-success pull-right">Submit</button>
                        </div>

                        </form>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>