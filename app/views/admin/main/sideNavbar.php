<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="?url=admin">Dashboard</a>
                <a class="nav-link" href="?url=admin/academicYear">Academic Year</a>
                <a class="nav-link" href="?url=admin/academicStandarMatser">Academic Standard</a>
                <a class="nav-link" href="?url=admin/academicFeesMatser">Fees Master</a>
                <a class="nav-link" href="?url=admin/studentMaster">Student Master</a>
                <a class="nav-link" href="?url=admin/studentStandarMatser">Admission</a>
                <a class="nav-link" href="?url=admin/feesCollection">Fees Collection</a>
                <a class="nav-link" href="?url=admin/accountMaster">Account</a>
                <a class="nav-link" href="?url=admin/receiptMasterList">Receipt</a>
                <a class="nav-link" href="?url=admin/userManagement">Users</a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: <?=  Session::getString(Session::USER_NAME)?></div>

        </div>
    </nav>
</div>