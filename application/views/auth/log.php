<div class="login-box">
    <div class="login-logo">
        <img src="<?= base_url('assets/'); ?>img/PGASOL.png" alt="Logo" height="80px" width="320px">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?= $this->session->flashdata('message'); ?>
        <form class="user" action="<?= base_url('auth/index'); ?>" method="post">
            <div class="input-group has-feedback">
                <div class="input-group-addon">
                    <i class="fa fa-envelope fa-fw"></i>
                </div>
                <input type="text" value="<?= set_value('email'); ?>" class="form-control" id="email" name="email" placeholder="Enter Email Address">
            </div><?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?><br>

            <div class="input-group has-feedback">
                <div class="input-group-addon">
                    <i class="fa fa-lock fa-fw"></i>
                </div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
            </div><?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?><br>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-6">
                    <div class="checkbox icheck">
                        <label>

                        </label>
                    </div>
                </div>
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="<?= base_url('auth'); ?>" class="btn btn-block btn btn-warning btn-user btn-flat">Forgot Password?</a>
        <a href="<?= base_url('auth/registration'); ?>" class="btn btn-block btn btn-success btn-user btn-flat">Create an Account !</a>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->