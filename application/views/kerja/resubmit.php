<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Update Pekerjaan</h1>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= form_open_multipart('kerja/resubmit'); ?>
                        <div class="form-group">
                            <label>ID Pekerjaan :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="id_kerja" value="<?= $kerja['id_kerja']; ?>" readonly>
                                <!--Hidden Input-->
                                <input type="text" class="form-control" name="id_revisi" value="<?= $maxr['id_revisi'] + 1; ?>">
                                <input type="text" class="form-control" name="tgl_revisi" value="<?= date('d-m-Y'); ?>">
                                <!--End Hidden Input-->
                            </div>
                            <small class="form-text text-danger"><?= form_error('id_kerja'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Submit By :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div><input type="hidden" class="form-control" name="pegawai_id" value="<?= $kerja['pegawai_id']; ?>">
                                <input type="text" class="form-control" value="<?= $kerja['nm_pegawai']; ?>" readonly>
                            </div>
                            <small class="form-text text-danger"><?= form_error('pegawai_id'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Nama Pekerjaan :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="nm_kerja" value="<?= $kerja['nm_kerja']; ?>" readonly>
                            </div>
                            <small class="form-text text-danger"><?= form_error('nm_kerja'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>No. Document Pekerjaan :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="no_doc" value="<?= $kerja['no_doc']; ?>" readonly>
                            </div>
                            <small class="form-text text-danger"><?= form_error('no_doc'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Jenis Pekerjaan :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <select name="jns_kerja" class="form-control">
                                    <?php
                                    if ($kerja['jns_kerja'] == 1) {
                                        echo "<option selected='selected' value='1'>Fasilitas</option>";
                                    } else {
                                        echo "<option selected='selected' value='2'>Jaringan</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <small class="form-text text-danger"><?= form_error('jns_kerja'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Rev. :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <select name="rev_id" class="form-control">
                                    <option value="<?php echo $kerja['id_rev'] ?>"><?php echo $kerja['nm_rev'] . " - " . $kerja['des_rev']; ?></option>
                                    <?php foreach ($rev as $r) { ?>
                                        <option value="<?php echo $r['id_rev'] ?>"><?php echo $r['nm_rev'] . " - " . $r['des_rev']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <small class="form-text text-danger"><?= form_error('rev_ke'); ?></small>
                        </div>
                        <input type="hidden" class="form-control" name="id_update" value="<?= $max['id_update'] + 1; ?>">

                        <div class="form-group">
                            <label>Tanggal :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="tgl_kerja" value="<?= date('d-m-Y'); ?>" readonly>
                            </div>
                            <small class="form-text text-danger"><?= form_error('tgl_kerja'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Document :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-dot-circle-o"></i>
                                </div>
                                <input type="text" class="form-control" name="doc_lama" value="<?php echo $kerja['doc'] ?>" readonly>
                                <input type="file" class="form-control" name="doc">
                            </div>
                            <i class="text-danger"><b>*Maximum 10 MB. Hanya File Bertipe Document</b></i>
                            <small class="form-text text-danger"><?= form_error('doc'); ?></small>
                        </div>

                        <div class="form-group">
                            <a href="<?= base_url(); ?>kerja" class="btn btn-sm btn-warning">Back</a>
                            <button name="tambah" type="submit" class="btn btn-sm btn-success pull-right">Submit</button>
                        </div>
                        </form>

                    </div>
                </div>
                <div class="box-footer">Selalu Kerjakan Apa Yang Menjadi Tanggungjawab Kita. Tetap Semangat</div>
            </div>
    </section>
</div>