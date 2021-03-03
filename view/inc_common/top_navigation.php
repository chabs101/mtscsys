<!-- <div class="container-fluid position-absolute fixed-top h-100 text-center " id="loadScreen" style="z-index: 9999 !important;    background: #f9f9f9d9;"><span class="fa fa-paw animate__animated animate__pulse animate__infinite" style="margin-top:20%;font-size:150px"></span></div> -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="height:80px;">
            <a class="navbar-brand d-xs-none d-flex" href="./dashboard">
                <img src="../assets/img/denr.png" height="70px" width="70px">&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="../assets/img/fwrdec.png" height="70px" width="70px">
            </a>
            <button class="btn btn-link navbar-brand d-none d-xs-show sidebarToggle" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
            <button class="btn btn-link btn-sm order-1 order-lg-0 d-xs-none sidebarToggle" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
            <ul class="navbar-nav navbar-left ml-auto ml-md-0" style="justify-content: flex-start;flex:2;">
                <li class="nav-item" style="text-align: left;color:white;">
                        Department of Environment and Natural Resources<br>
                        Ecosystems Research and Development Bureau<br>
                         <span style="color:#7475ea;"> FOREST AND WETLAND RESEARCH, DEVELOPMENT AND EXTENSION CENTER </span>
                </li>
            </ul>
            <!-- Navbar-->
            <ul class="navbar-nav navbar-right ml-auto ml-md-0">
                <li class="nav-item d-xs-none d-flex"><h5 class="nav-link"><b id="time_display"></b></h5></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=$_SESSION['user']['image_url'] != "" ? "../storage/img/user_images/".$_SESSION['user']['image_url']  : "../storage/img/default_pic.png" ?>" alt="" class="user-img" /> <?= $_SESSION['first_name'];?>
                            </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="./my-profile">My Profile</a>
                        <a class="dropdown-item" href="./change-password">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../controller/api/session-destroy.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>