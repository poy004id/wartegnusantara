<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url('/'); ?>" class="brand-link">
      <img src="<?php echo base_url('themes/dist'); ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Warteg Nusantara</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('themes/dist'); ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><span class="text-capitalize"><?php echo $userdata['username'] ?></span></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url('/dashboard'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- ############################### Akses hanya untuk Admin dan Koki -->
                <?php if ($userdata['level']=="admin" or $userdata['level']=="koki") { ?>
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                            Bahan Makanan
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                          <li class="nav-item">
                            <a href="<?php echo base_url('kategori_bahan'); ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Kategori Bahan</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url('menu'); ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Daftar Bahan</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url('menu/stok'); ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Update Stok</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                            Menu Makanan
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                          <li class="nav-item">
                            <a href="<?php echo base_url('kategori_menu'); ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Kategori Menu</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url('menu'); ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Daftar Menu</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url('menu/stok'); ?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Update Stok</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('resep'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>Resep  </p>
                        </a>
                    </li>
                <?php  }  ?>




                <!-- <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                              <i class="nav-icon fas fa-copy"></i>
                              <p>
                                Layout Options
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">6</span>
                              </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: block;">
                              <li class="nav-item">
                                <a href="../layout/top-nav.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Top Navigation</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="../layout/boxed.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Boxed</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="../layout/fixed-sidebar.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Fixed Sidebar</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="../layout/fixed-topnav.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Fixed Navbar</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="../layout/fixed-footer.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Fixed Footer</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="../layout/collapsed-sidebar.html" class="nav-link active">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Collapsed Sidebar</p>
                                </a>
                              </li>
                            </ul>
                          </li> -->
                <?php if ($userdata['level']=="admin" or $userdata['level']=="kasir") { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('transaksi'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>Transaksi Penjualan </p>
                        </a>
                    </li>
                <?php  }  ?>

                <li class="nav-item">
                    <a href="<?php echo base_url('laporan_transaksi'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Laporan Transaksi  </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('laporan_stok'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Laporan Stok  </p>
                    </a>
                </li>
                <?php if ($userdata['level']=="admin") { ?>
                <li class="nav-header">ACCOUNT</li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Auth/user'); ?>" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">User Management</p>
                    </a>
                </li>
                  <?php  }  ?>
            </ul>
        </nav>
    </div>
</aside>
