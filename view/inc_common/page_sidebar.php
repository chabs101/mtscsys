<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                
                <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#collapseform" aria-expanded="false" aria-controls="collapseform">
                    <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                    Forms
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseform" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="./seed-collection">Seed Collection Data Sheet</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="./seed-record">Seed Record Card</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="./assessment-table-of-species">Assessment Table of Species Location of Selected Trees</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="./detailed-info-identified-seed-source">Detailed Information on Identified Seed Source</a>
                    </nav>
                </div>

                <a class="nav-link" href="./generate-barcode">
                    <div class="sb-nav-link-icon"><i class="fas fa-barcode"></i></div>
                    Barcode
                </a>

                <?php if($_SESSION['user']['role'] == 1) {?>
                <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#collapseSetup" aria-expanded="false" aria-controls="collapseSetup">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Setup
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSetup" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="./setup-user">Users</a>
                        <a class="nav-link" href="./setup-role">Role</a>
                        <a class="nav-link" href="../controller/backup/database">Backup Database</a>

                    </nav>
                </div>
                <?php } ?>

            </div>
        </div>
    </nav>
</div>