<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('/assets/img/profile/') . $user['ft_pegawai']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $user['int_pegawai']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i><?= $user['jbt_pegawai']; ?></a>
            </div>
        </div>
        <!--AMBIL DATA DARI MENU. JOIN TABEL YANG BERKAITAN DENGAN MENU-->
        <?php $level = $user['level_id']; ?>
        <?php if ($level == 1) : ?>
            <!-- LOOPING MENU -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header"><b>GENERAL MENU</b></li>
                <?php
                    $queryMenu = "SELECT * FROM tb_menu WHERE for_menu LIKE '%1%' AND aktif_menu = '1' ";
                    $menu = $this->db->query($queryMenu)->result_array();
                    ?>
                <?php foreach ($menu as $sm) : ?>
                    <?php if ($title == $sm['nm_menu']) : ?>
                        <li class="active">
                        <?php else : ?>
                        <li>
                        <?php endif; ?>
                        <a href="<?php echo base_url($sm['link_menu']); ?>"><i class="<?= $sm['icon_menu']; ?>"></i><span><?= $sm['nm_menu']; ?></span></a></li>
                    <?php endforeach; ?>
                    <li class="header"><b>USER MENU</b></li>
                    <li><a href="<?php echo base_url(); ?>user"><i class="fa fa-odnoklassniki"></i> <span>Profile</span></a></li>
                    <li><a href="<?php echo base_url(); ?>user/change"><i class="fa fa-refresh"></i> <span>Change Password</span></a></li>
                    <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        <?php elseif ($level == 2) : ?>
            <!-- LOOPING MENU -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header"><b>GENERAL MENU</b></li>
                <?php
                    $queryMenu = "SELECT * FROM tb_menu WHERE for_menu LIKE '%2%' AND aktif_menu = '1' ";
                    $menu = $this->db->query($queryMenu)->result_array();
                    ?>
                <?php foreach ($menu as $sm) : ?>
                    <?php if ($title == $sm['nm_menu']) : ?>
                        <li class="active">
                        <?php else : ?>
                        <li>
                        <?php endif; ?>
                        <a href="<?php echo base_url($sm['link_menu']); ?>"><i class="<?= $sm['icon_menu']; ?>"></i><span><?= $sm['nm_menu']; ?></span></a></li>
                    <?php endforeach; ?>
                    <li class="header"><b>USER MENU</b></li>
                    <li><a href="<?php echo base_url(); ?>user"><i class="fa fa-odnoklassniki"></i> <span>Profile</span></a></li>
                    <li><a href="<?php echo base_url(); ?>user/change"><i class="fa fa-refresh"></i> <span>Change Password</span></a></li>
                    <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        <?php else : ?>
            <!-- LOOPING MENU -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header"><b>GENERAL MENU</b></li>
                <?php
                    $queryMenu = "SELECT * FROM tb_menu WHERE for_menu LIKE '%3%' AND aktif_menu = '1' ";
                    $menu = $this->db->query($queryMenu)->result_array();
                    ?>
                <?php foreach ($menu as $sm) : ?>
                    <?php if ($title == $sm['nm_menu']) : ?>
                        <li class="active">
                        <?php else : ?>
                        <li>
                        <?php endif; ?>
                        <a href="<?php echo base_url($sm['link_menu']); ?>"><i class="<?= $sm['icon_menu']; ?>"></i><span><?= $sm['nm_menu']; ?></span></a></li>
                    <?php endforeach; ?>
                    <li class="header"><b>USER MENU</b></li>
                    <li><a href="<?php echo base_url(); ?>user"><i class="fa fa-odnoklassniki"></i> <span>Profile</span></a></li>
                    <li><a href="<?php echo base_url(); ?>user/change"><i class="fa fa-refresh"></i> <span>Change Password</span></a></li>
                    <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        <?php endif; ?>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->