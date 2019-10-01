
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <?php $dataGet = fetch_array(query("(SELECT nm_dokter AS nama, jk FROM dokter WHERE kd_dokter = '{$_SESSION['username']}') UNION (SELECT nama AS nama, jk FROM pegawai WHERE nik = '{$_SESSION['username']}') UNION (SELECT nama AS nama, jk FROM petugas WHERE nip = '{$_SESSION['username']}')")); ?>
                <?php $dataGetBangsal = fetch_array(query("(SELECT nm_bangsal FROM bangsal WHERE kd_bangsal = '{$_SESSION['jenis_poli']}')")); ?>
                <div class="image">
                <?php
                if ($dataGet['1'] == 'L' || $dataGet['1'] == 'Pria') {
                    echo '<img src="'.URL.'/assets/images/pria.png" width="48" height="48" alt="User" />';
                } else if ($dataGet['1'] == 'P' || $dataGet['1'] == 'Wanita') {
                    echo '<img src="'.URL.'/assets/images/wanita.png" width="48" height="48" alt="User" />';
                } else {
                  echo '<img src="'.URL.'/assets/images/pria.png" width="48" height="48" alt="User" />';                  
                }
                ?>
                </div>
                <a href="javascript:void(0);" id="sticky" style="text-decoration: none;color: #ffffff;float: right" class="pin"><i class="material-icons">lock</i></a>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $dataGet['nama']; ?></div>
                    <div class="email"><?php echo $_SESSION['username']; ?> | <?php echo $role; ?> <?php if($_SESSION['jenis_poli'] !== "") { echo ' | ' . $_SESSION['jenis_poli']; } ?> </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo URL; ?>/profil.php"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo URL; ?>/login.php?action=logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?php echo URL; ?>/index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>/pendaftaran.php">
                            <i class="material-icons">text_fields</i>
                            <span>Pendaftaran</span>
                        </a>
                    </li>
                    <?php if($role == 'Admin' || $role == 'Manajemen' || $role == 'Kasir')  { ?>
                    <li>
                        <a href="<?php echo URL; ?>/kasir.php">
                            <i class="material-icons">attach_money</i>
                            <span>Kasir</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($role == 'Admin' || $role == 'Manajemen' || $role == 'Apotek')  { ?>
                    <li>
                        <a href="<?php echo URL; ?>/apotek.php">
                            <i class="material-icons">widgets</i>
                            <span>Apotek</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment_ind</i>
                            <span>Rekam Medik</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo URL; ?>/pasien.php">Data Pasien</a>
                            </li>
                            <li>
                                <a href="<?php echo URL; ?>/rekam-medik.php">Data Rekam Medik</a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                      <li>
                          <a href="<?php echo URL; ?>/profil.php">
                              <i class="material-icons">people</i>
                              <span>Data Pribadi</span>
                          </a>
                      </li>
                      <?php if($role == 'Admin')  { ?>
                      <li class="header">ADMINISTRASI</li>
                        <li>
                            <a href="<?php echo URL; ?>/pengguna.php">
                                <i class="material-icons">people</i>
                                <span>Pengguna</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>/pengaturan.php">
                                <i class="material-icons">settings_applications</i>
                                <span>Pengaturan</span>
                            </a>
                        </li>
                     <?php } ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                &copy; 2017 - <?php echo date('Y'); ?> <a href="#" data-toggle="modal" data-target="#ICTRSHD">Instalasi ICT RSHD</a>. v <?php echo VERSION; ?>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
