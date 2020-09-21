        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand d-xs-none d-flex" href="./dashboard"><?php include('title_name.php');?></a>
            <button class="btn btn-link navbar-brand d-none d-xs-show sidebarToggle" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
            <button class="btn btn-link btn-sm order-1 order-lg-0 d-xs-none sidebarToggle" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav navbar-right ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/img/default_pic.png" alt="" class="user-img" /> <?= $_SESSION['first_name'];?>
                            </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="./change-password">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../controller/api/session-destroy.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>