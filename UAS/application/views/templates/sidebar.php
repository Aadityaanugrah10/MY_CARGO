        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-ship"></i>
                </div>
                <div class="sidebar-brand-text mx-3">My CARGO </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                Administator
            </div>

            <li class="nav-item">
                <a class="nav-link" href="dashboard">
                <i class="fas fa-eye"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "  SELECT `user_menu`.`id`,`menu`
                            FROM `user_menu` JOIN `user_access_menu` 
                            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC 
                            ";
            $menu = $this->db->query($queryMenu)->result_array();


            ?>
            <!-- LOOPING MENU -->
            <?php foreach ($menu as $m) : ?>
                </li>
                

                                <!-- menyiapkan sub-menu sesuai menu-->
                <?php
                $menuid = $m['id'];
                $querySubMenu = "SELECT *
                                     FROM `user_sub_menu` JOIN `user_menu`
                                       ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                    WHERE `user_sub_menu`.`menu_id` = $menuid 
                                      AND `user_sub_menu`.`is_active` = 1
                                    ";

                $submenu = $this->db->query($querySubMenu)->result_array();

                ?>
                            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                Profile
            </div>
            </li>
                <?php foreach ($submenu as $sm) : ?>
                    <?php if ($title ==  $sm['title']) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span></a>
                        </li>

                    <?php endforeach; ?>





                <?php endforeach; ?>
                
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <div class="sidebar-heading">
                    Menu
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="jadwal">
                    <i class="far fa-calendar-alt"></i>
                        <span>Jadwal</span></a>
                </li>
                
                <!-- Divider -->
                <li class="nav-item">
                    <a class="nav-link" href="cektarif">
                    <i class="fas fa-money-bill-wave"></i>
                        <span>Cek Tarif</span></a>
                </li>
                <div class="sidebar-heading">
                    
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="about">
                    <i class="fas fa-info-circle"></i>
                        <span>About</span></a>
                </li>


                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">



        </ul>