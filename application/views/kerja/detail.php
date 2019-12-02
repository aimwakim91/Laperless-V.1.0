<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Detail Pekerjaan</h1>
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
                                <th><?= $revisi['0']['nm_kerja']; ?></th>
                            </tr>
                            <tr>
                                <th width="200px">No. Document Pekerjaan</th>
                                <th width="10px">:</th>
                                <th><?= $revisi[0]['no_doc']; ?></th>
                            </tr>
                            <tr>
                                <th width="200px">Jenis Pekerjaan</th>
                                <th width="10px">:</th>
                                <?php
                                if ($revisi[0]['jns_kerja'] == 1) {
                                    echo "<th>Fasilitas</th>";
                                } else {
                                    echo "<th>Jaringan</th>";
                                }
                                ?>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <table id="example2" class="table table-bordered">
                            <tr>
                                <th width="3%">No</th>
                                <th width="10%">Tanggal</th>
                                <th width="10%">Rev</th>
                                <th width="20%">Submit By</th>
                                <th width="47%">Deskripsi</th>
                                <th width="10%">Aksi</th>
                            </tr>
                            <tr><?php $no = 0;
                                foreach ($revisi as $r) : ?>
                                    <td><?= ++$no; ?></td>
                                    <td><?= $r['tgl_revisi']; ?></td>
                                    <td><?= $r['kd_revisi']; ?> </td>
                                    <td><?= $r['nm_pegawai']; ?></td>
                                    <td style="text-align:justify; "><?= $r['des_revisi']; ?></td>
                                    <td>
                                        <?php if (empty($r['kd_revisi'])) : ?>
                                            <a class="btn btn-xs btn-success" href="<?= base_url(); ?>kerja/erevisi/<?= $r['id_revisi']; ?>">Update</a>
                                            <a class="btn btn-xs btn-danger" href="<?= base_url(); ?>kerja/hrevisi/<?= $r['id_revisi']; ?>" onclick="return confirm('Yakin Akan Hapus Data Revisi??');">Delete</a>
                                        <?php else : ?>
                                            <a class="btn btn-xs btn-success disabled" href="<?= base_url(); ?>kerja/erevisi/<?= $r['id_revisi']; ?>">Update</a>
                                            <a class="btn btn-xs btn-danger disabled" href="<?= base_url(); ?>kerja/hrevisi/<?= $r['id_revisi']; ?>" onclick="return confirm('Yakin Akan Hapus Data Revisi??');">Delete</a>
                                        <?php endif; ?></td>
                            </tr><?php endforeach; ?>
                        </table>

                    </div>
                    <div class="box-foot pad">
                        <div class="mt-5">
                            <a class="btn btn-sm btn-warning fa fa-backward" href="<?= base_url(); ?>kerja"> Back</a>
                            <a class="btn btn-sm btn-success fa fa-file-pdf-o" href="<?= base_url(); ?>kerja/kprint/<?= $r['id_kerja']; ?>" target="blank"> Pdf</a>
                            <a class="btn btn-sm btn-info fa fa-file-word-o disabled" href="<?= base_url(); ?>kerja/kprint/<?= $r['id_kerja']; ?>" target="blank"> Word</a>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>