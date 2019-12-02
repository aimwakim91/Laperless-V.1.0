<div class="register-box">
    <div class="register-logo">
        <img src="<?= base_url('assets/'); ?>img/PGASOL.png" alt="Logo" height="80px" width="320px">
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <form class="user" action="<?= base_url('auth/registration') ?>" method="post">
            <div class="input-group has-feedback">
                <div class="input-group-addon">
                    <i class="fa fa-user fa-fw"></i>
                </div>
                <input type="text" value="<?= set_value('name'); ?>" name="name" class="form-control" placeholder="Full name">
            </div><?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?><br>
            <div class="input-group has-feedback">
                <div class="input-group-addon">
                    <i class="fa fa-envelope fa-fw"></i>
                </div>
                <input type="text" value="<?= set_value('email'); ?>" name="email" class="form-control" placeholder="Email">
            </div><?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?><br>
            <div class="input-group has-feedback">
                <div class="input-group-addon">
                    <i class="fa fa-building fa-fw"></i>
                </div>
                <select name="rekan" class="form-control">
                    <option value="0">Select Your Company</option>
                    <?php foreach ($rekan as $re) { ?>
                        <option value="<?php echo $re['id_rekan'] ?>"><?php echo $re['nm_rekan'] ?></option>
                    <?php } ?>
                </select>
            </div><br>
            <div class="input-group has-feedback">
                <div class="input-group-addon">
                    <i class="fa fa-globe fa-fw"></i>
                </div>
                <select name="area" class="form-control">
                    <option value="0">Select Your Area</option>
                    <?php foreach ($area as $ar) { ?>
                        <option value="<?php echo $ar['id_area'] ?>"><?php echo $ar['nm_area'] ?></option>
                    <?php } ?>
                </select>
            </div><br>
            <div class="input-group has-feedback">
                <div class="input-group-addon">
                    <i class="fa  fa-lock fa-fw"></i>
                </div>
                <input type="password" name="password1" class="form-control" placeholder="Password">
            </div><?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?><br>
            <div class="input-group has-feedback">
                <div class="input-group-addon">
                    <i class="fa fa-sign-out fa-fw"></i>
                </div>
                <input type="password" name="password2" class="form-control" placeholder="Password">
            </div><?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?><br>
            <div class="row">
                <div class="col-xs-6">
                    <div class="checkbox icheck">
                        <label>

                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register Account</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="<?= base_url('auth'); ?>" class="btn btn-block btn btn-warning btn-user btn-flat">Forgot Password?</a>
        <a href="<?= base_url('auth'); ?>" class="btn btn-block btn btn-success btn-user btn-flat">Already have an account? Login!</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->