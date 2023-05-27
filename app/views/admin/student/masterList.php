<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Smart School Soft - School Management Software - Student List</title>
        <meta name="description" content="Streamline the management of school operations with Smart School Soft - a comprehensive school management system. Manage student information, grades, classes, payments, and more.">
        <meta name="keywords" content="smart school soft, school management software, student information, attendance, grading, reports, finances, personnel">
        <meta name="author" content="Kishor Deka" />
        <link rel="apple-touch-icon" sizes="180x180" href="web/images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="web/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="web/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="web/images/favicon/site.webmanifest">
        <link href="web/assest/css/styles.css" rel="stylesheet" />
        <link href="web/assest/css/bootstrap-select.min.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
        <!--Nav Bar Start-->
            <?php include view_path.'admin/main/navBar.php'; ?>
        <!--Nav Bar End-->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <!--Side Nav Bar Start-->
                    <?php include view_path.'admin/main/sideNavbar.php'; ?>
                <!--Side Nav Bar End-->    
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Student Management</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="?url=admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student Management</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col col-md-6">
                                        <i class="fas fa-table me-1"></i> Student Management
                                    </div>
                                    <div class="col col-md-6" align="right">
                                        <a href="?url=admin/studentRegister" class="btn btn-success btn-sm">Add Student</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Student Name</th>
                                            <th>Father Name</th>
                                            <th>Mother Name</th>
                                            <th>Date Of Birth</th>
                                            <th>Admission</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="fetchData">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <!--footer start-->
                    <?php include view_path.'admin/main/footer.php'; ?>
                <!--footer end-->
            </div>
        </div>
        <script src="web/js/fontawesome.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="web/js/jquery.js"></script>
        <script src="web/assest/js/bootstrap.bundle.min.js"></script>
        <script src="web/assest/js/scripts.js"></script>          
        <script src="web/assest/js/moment.min.js"></script>
        <script type="text/javascript" src="web/js/myJavaScript.js"></script>
        <script type="text/javascript">
            var type = 'all';
            $(document).ready(() => {
            loadData();
            });
            const loadData = () => {$.get('?q=loadStudent/loadData/' + type, (html) => {$("#fetchData").html(html)})}
        </script>
    </body>
</html>