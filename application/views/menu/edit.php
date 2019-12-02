<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Edit Menu</h1>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>ID Menu :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="id_menu" value="<?= $menu['id_menu']; ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('id_menu'); ?></small>
                            </div>

                            <div class="form-group">
                                <label>Nama Menu :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="nm_menu" value="<?= $menu['nm_menu']; ?>">
                                </div>
                                <small class=" form-text text-danger"><?= form_error('nm_menu'); ?></small>
                            </div>

                            <div class="form-group">
                                <label>URL Menu :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="link_menu" value="<?= $menu['link_menu']; ?>">
                                </div>
                                <small class=" form-text text-danger"><?= form_error('link_menu'); ?></small>
                            </div>

                            <div class="form-group">
                                <label>Icon Menu :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="icon_menu" value="<?= $menu['icon_menu']; ?>">
                                </div>
                                <small class=" form-text text-danger"><?= form_error('icon_menu'); ?></small>
                            </div>

                            <div class="form-group">
                                <label>Status Menu :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-dot-circle-o"></i>
                                    </div>
                                    <select name="aktif_menu" class="form-control">
                                        <?php
                                        if ($menu['aktif_menu'] == '1') {
                                            echo "<option value='1' selected>Aktif</option>";
                                            echo "<option value='0'> Tidak Aktif</option>";
                                        } else {
                                            echo "<option value='0' selected> Tidak Aktif</option>";
                                            echo "<option value='1' >Aktif</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <small class=" form-text text-danger"><?= form_error('aktif_menu'); ?></small>
                            </div>

                            <div class="form-group">
                                <label>For Menu :</label>
                                <?php
                                $QFor = "SELECT * FROM tb_level ORDER BY id_level";
                                $nama  = $this->db->query($QFor)->result_array();

                                $for = explode(' ', $menu['for_menu']);
                                ?>
                                <div class="custom-control custom-checkbox">
                                    <?php foreach ($nama as $n) : ?>
                                        <input class="custom-control-input" type="checkbox" name="for_menu[]" value="<?= $n['id_level']; ?>" <?php if (in_array($n['id_level'], $for)) {
                                                                                                                                                        echo "checked=checked";
                                                                                                                                                    } ?>>
                                        <label class="custom-control-label"><?= $n['nm_level']; ?></label>&nbsp;&nbsp;&nbsp;
                                    <?php endforeach; ?>
                                </div>
                                <small class=" form-text text-danger"><?= form_error('icon_menu'); ?></small>
                            </div>

                            <div class="form-group">
                                <a href="<?= base_url(); ?>menu" class="btn btn-sm btn-warning">Back</a>
                                <button name="tambah" type="submit" class="btn btn-sm btn-success pull-right">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="box-footer">Selalu Kerjakan Apa Yang Menjadi Tanggungjawab Kita. Tetap Semangat</div>
            </div>
    </section>
</div>